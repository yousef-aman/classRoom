<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Option;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name'=>'yousef',
            'email'=>'yousef@gmail.com',
            'password'=>bcrypt('yousef1234'),
            'role'=>'teacher'
        ]);

        User::factory()->create([
            'name'=>'ahmed',
            'email'=>'ahmed@gmail.com',
            'password'=>bcrypt('ahmed1234'),
        ]);
        Option::factory(5)->create();

        Option::factory(4)->create([
            'question_id'=>1
        ]);

        Option::factory(4)->create([
            'question_id'=>2
        ]);

        Option::factory(4)->create([
            'question_id'=>3
        ]);

        Option::factory(4)->create([
            'question_id'=>4
        ]);

        Option::factory(4)->create([
            'question_id'=>5
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $user =User::find(1);
        $user->classrooms()->attach(1);
        $user->classrooms()->attach(2);
        $user->classrooms()->attach(3);
    }
}
