<?php

use Illuminate\Database\Seeder;
use App\Models\Fundraiser;

class FundraiserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Fundraiser::create([
            'name' => 'Test Fundraiser 1'
        ]);
        Fundraiser::create([
            'name' => 'Test Fundraiser 2'
        ]);
        Fundraiser::create([
            'name' => 'Test Fundraiser 3'
        ]);
    }
}
