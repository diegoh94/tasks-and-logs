<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Task::create([
        	'description' => 'Desafíos postulación TW Group',      
            'deadline' => '2022-03-30',
            'user_created_id' => '1',
            'user_assigning_id' => '2'
        ]);
        Task::create([
        	'description' => 'CRUD Proveedores MDS',      
            'deadline' => '2022-02-15',
            'user_created_id' => '1',
            'user_assigning_id' => '2'
        ]);
        Task::create([
            'description' => 'Redacción SERP de secciones de Nirex',      
            'deadline' => '2022-05-24',
            'user_created_id' => '2',
            'user_assigning_id' => '3'
        ]);
    }
}
