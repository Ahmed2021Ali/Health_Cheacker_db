<?php

use App\Models\Panel;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

function add_db_connection(Panel $panel)
{
    config(['database.connections.'.$panel->db_name=> [
        'driver' => 'mysql',
        'host' => $panel->server,
        'database' => $panel->db_name,
        'username' => $panel->username,
        'password' => $panel->password,
        'port' => $panel->port,
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix' => '',
        'strict' => false,
    ]]);
}


function setDBConnection(Panel $panel)
{
   // dd($panel);
    add_db_connection($panel);
    try {
        return DB::connection($panel->db_name)->getPdo();
    } catch (\Exception $e) {
        return false;
    }
}

function add_db_backup($panel)
{
    //setDBConnection($panel);
    config(['backup.backup.source.databases'=>[
        $panel->db_name
    ]]);
}

