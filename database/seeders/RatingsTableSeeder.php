<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rating;

class RatingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ratingRecords = [
            ['name' => 'Sarah', 'rating' => 4, 'review' => 'The salon atmosphere was relaxing and clean. Will definitely be returning!'],
            ['name' => 'Dian', 'rating' => 5, 'review' => 'Absolutely loved my experience at SEA Salon!'],
            ['name' => 'Rara', 'rating' => 3, 'review' => 'The staff was incredibly friendly and attentive'],

        ];

        Rating::insert($ratingRecords);
    }
}
