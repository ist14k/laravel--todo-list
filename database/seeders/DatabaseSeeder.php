<?php

namespace Database\Seeders;

use App\Models\Note;
use App\Models\Task;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create()->each(function ($user) {
            Task::factory(random_int(5, 10))->create(['user_id' => $user->id])->each(function ($task) {
                Note::factory(random_int(3, 5))->create(['task_id' => $task->id, 'user_id' => $task->user_id]);
            });
        });

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ])->each(function ($user) {
            Task::factory(5)->create(['user_id' => $user->id])->each(function ($task) use ($user) {
                Note::factory(3)->create(['task_id' => $task->id, 'user_id' => $user->id]);
            });
        });
    }
}
