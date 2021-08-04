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
            'deadline' => '2021-04-02',
            'user_created_id' => '1',
            'user_assigning_id' => '2'
        ]);
        Task::create([
        	'description' => 'CRUD Proveedores MDS',      
            'deadline' => '2021-08-15',
            'user_created_id' => '1',
            'user_assigning_id' => '2'
        ]);
        Task::create([
            'description' => 'Redacción SERP de secciones de Nirex',      
            'deadline' => '2021-01-25',
            'user_created_id' => '2',
            'user_assigning_id' => '3'
        ]);
    }
}
