<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ListDbSchema extends Command
{
    protected $excluded_table_names = [
        'migrations',
        'failed_jobs',
        'personal_access_tokens',
    ];

    protected $table_headers = ['table', 'column', 'type', 'required'];

    protected $signature = 'app:db_schema';

    protected $schema_manager;

    protected $description = 'List the tables of the app and their fields';

    public function __construct()
    {
        parent::__construct();
        $this->schema_manager = DB::connection()->getDoctrineSchemaManager();
    }

    protected function allTables(): array
    {
        return Schema::getAllTables();
    }

    protected function businessTables(): array
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
    protected function printTable($table): void
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

    public function handle(): void
    {
        foreach ($this->businessTables() as $table) {
            $this->printTable($table);
        }
    }
}
