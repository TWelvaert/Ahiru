<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FreelanceAdvertisement;

class FreelanceAdsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        FreelanceAdvertisement::factory()
            ->times(10)
            ->create();
    }
}
