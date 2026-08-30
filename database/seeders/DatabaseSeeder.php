<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seeders disabled - application data is managed directly via imports and UI.
        // $this->call([
        //     FrameworkUclMappingSeeder::class,
        // ]);
    }
}
