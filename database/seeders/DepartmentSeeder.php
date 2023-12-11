<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Panel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('panels')->delete();
        $departments = [
            ['title'=>'Student','value'=>'Student','panel_id'=>Panel::all()->random()->id],
            ['title'=>'Lesson','value'=>'Lesson','panel_id'=>Panel::all()->random()->id],
            ['title'=>'Exam','value'=>'Exam','panel_id'=>Panel::all()->random()->id],
        ];
        foreach ($departments as $department) {
            Department::create($department);
        }
    }
}
