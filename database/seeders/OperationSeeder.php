<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Operation;
use App\Models\Panel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OperationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('operations')->delete();
        $operations = [
            ['title'=>'extend Month', 'value'=>'extend_month','department_id'=>Department::all()->random()->id],
        ];
        foreach ($operations as $operation) {
            Operation::create($operation);
        }
    }
}
