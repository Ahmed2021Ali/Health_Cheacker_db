<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Artisan;

class BackupJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $panel;
    public function __construct($panel)
    {
        $this->panel = $panel;
    }
    public function handle(): void
    {
        setDBConnection($this->panel);
        add_db_backup($this->panel);
        Artisan::call('backup:run --only-db');
    }
}
