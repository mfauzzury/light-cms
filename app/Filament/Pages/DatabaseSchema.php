<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseSchema extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-circle-stack';

    protected static ?string $navigationLabel = 'Database Schema';

    protected static ?string $title = 'Database Schema';

    protected static ?string $navigationGroup = 'Site Miscellaneous';

    protected static ?int $navigationSort = 102;

    protected static string $view = 'filament.pages.database-schema';

    public function getTables(): array
    {
        $tables = [];

        try {
            $tableNames = DB::select('SHOW TABLES');
            $dbName = DB::getDatabaseName();
            $key = 'Tables_in_' . $dbName;

            foreach ($tableNames as $tableObj) {
                $tableName = $tableObj->$key;
                $columns = DB::select("SHOW FULL COLUMNS FROM `{$tableName}`");
                $indexes = DB::select("SHOW INDEX FROM `{$tableName}`");

                $tables[] = [
                    'name' => $tableName,
                    'columns' => $columns,
                    'row_count' => DB::table($tableName)->count(),
                    'indexes' => collect($indexes)->groupBy('Key_name')->toArray(),
                ];
            }
        } catch (\Exception $e) {
            // Return empty if DB not accessible
        }

        return $tables;
    }
}
