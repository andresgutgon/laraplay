<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;

class ListDbSchema extends Command
{
    protected $excluded_table_names = [
        'migrations',
        'password_reset_tokens',
        'failed_jobs',
        'personal_access_tokens',
    ];

    protected $signature = 'app:db_schema';

    protected $description = 'List the tables of the app and their fields';

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

    public function handle(): void
    {
        foreach ($this->businessTables() as $table) {
            $this->info($table->tablename);
        }
        $this->info('The command was successful!');
    }
}
