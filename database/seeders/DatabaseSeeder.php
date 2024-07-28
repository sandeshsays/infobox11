<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\Calendar\MstFiscalYearTableSeeder;
use Database\Seeders\MasterSettings\DistrictTableSeeder;
use Database\Seeders\MasterSettings\LocalBodyTableSeeder;
use Database\Seeders\MasterSettings\LocalBodyTypeTableSeeder;
use Database\Seeders\MasterSettings\ProvinceTableSeeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\MenuTableSeeder;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        $this->call(MenuTableSeeder::class);
        $this->call(ProvinceTableSeeder::class);
        $this->call(DistrictTableSeeder::class);
        $this->call(LocalBodyTypeTableSeeder::class);
        $this->call(LocalBodyTableSeeder::class);
        $this->call(MstFiscalYearTableSeeder::class);

    }
}
