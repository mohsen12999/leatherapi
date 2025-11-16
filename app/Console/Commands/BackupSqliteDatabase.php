<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class BackupSqliteDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:backup-sqlite';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Backup the SQLite database file';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dbPath = database_path('database.sqlite');
        $backupDir = storage_path('app/backups');

        if (!file_exists($dbPath)) {
            $this->error("Database file not found at {$dbPath}");
            return;
        }

        if (!is_dir($backupDir)) {
            mkdir($backupDir, 0755, true);
        }

        $backupFile = $backupDir . '/backup-' . now()->format('Y-m-d_H-i-s') . '.sqlite';

        if (copy($dbPath, $backupFile)) {
            $this->info("✅ SQLite database backed up to: {$backupFile}");
        } else {
            $this->error("❌ Failed to back up database.");
        }
    }
}
