<?php

namespace Database\Seeders;

use App\Models\Panel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PanelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('panels')->delete();
        $panels = [
            ['name' => 'TaskDatabase','url'=>'https://www.facebook.com/watch','server'=>'http://localhost','port'=>'3306','username'=>'root','password'=>'','db_name'=>'tasks'],
            ['name' => 'TaskDatabase','url'=>'https://www.face5book.com/watch','server'=>'http://localhost','port'=>'3306','username'=>'root','password'=>'','db_name'=>'tasks'],
        ];
        foreach ($panels as $panel) {
            Panel::create($panel);
        }
    }
}
