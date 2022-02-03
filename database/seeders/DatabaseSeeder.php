<?php

namespace Database\Seeders;

<<<<<<< HEAD
=======
use App\Models\Setting;
>>>>>>> 037bb2b (lms)
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
        // \App\Models\User::factory(10)->create();
<<<<<<< HEAD
=======

        Setting::create([
            'return_days' => 1,
            'fine' => 11,
        ]);
>>>>>>> 037bb2b (lms)
    }
}
