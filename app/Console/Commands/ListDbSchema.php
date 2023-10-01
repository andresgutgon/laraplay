<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ListDbSchema extends Command
{
    protected $signature = 'app:db_schema {search? : Search by table name}';

    protected $description = 'List the tables of the app and their fields';

    protected $excluded_table_names = [
        'migrations',
        'failed_jobs',
        'personal_access_tokens',
    ];

    protected $table_headers = ['table', 'column', 'type', 'required'];

    protected $schema_manager;

    public function __construct()
    {
        parent::__construct();
        $this->schema_manager = DB::connection()->getDoctrineSchemaManager();
    }

    protected function allTables(): array
    {
        return Schema::getAllTables();
    }

    protected function business_tables(): array
    {
        return array_filter($this->allTables(), function ($table) {
            return ! in_array($table->tablename, $this->excluded_table_names);
        });
    }

    /**
     * This is a sample function that adds two numbers.
     *
     * @param  string  $table
     */
    protected function render_table($table): void
    {
        $name = $table->tablename;
        $columns = Schema::getColumnListing($name);
        $data = array_map(function ($column) use ($name) {
            $details = $this->schema_manager->listTableDetails($name);
            $type = Schema::getColumnType($name, $column);
            $is_nullable = $details->getColumn($column)->getNotnull();

            return [$name, $column, $type, $is_nullable];
        }, $columns);

        $this->table($this->table_headers, $data);
    }

    /**
     * Filter the tables based on the input from user
     *
     * @param  string  $search
     * @param  array  $all_tables
     */
    protected function grep_tables($all_tables, $search): array
    {
        $all_tables = $this->business_tables();
        $escaped_search = preg_quote($search, '/');
        $pattern = "/$escaped_search/i";

        $tables = array_filter($all_tables, function ($table) use ($pattern) {
            return preg_match($pattern, $table->tablename);
        });

        if (empty($tables)) {
            $this->error('No tables found for: '.$search);
        }

        return $tables;
    }

    public function handle(): void
    {
        $search = $this->argument('search');
        $all_tables = $this->business_tables();

        if ((bool) $search) {
            $tables = $this->grep_tables($all_tables, $search);
        } else {
            $tables = $all_tables;
        }

        foreach ($tables as $table) {
            $this->render_table($table);
        }
    }
}
