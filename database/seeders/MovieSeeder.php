<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movies = [
            [
                'movie_title' => 'Movie A',
                'duration' => 140,
                'release_date' => '2024-09-23',
            ],
            [
                'movie_title' => 'Movie B',
                'duration' => 175,
                'release_date' => '2024-09-23',
            ],
            [
                'movie_title' => 'Movie C',
                'duration' => 150,
                'release_date' => '2024-09-23',
            ],
            [
                'movie_title' => 'Movie D',
                'duration' => 210,
                'release_date' => '2024-09-23',
            ],
            [
                'movie_title' => 'Movie E',
                'duration' => 158,
                'release_date' => '2024-09-26',
            ],
        ];

        foreach ($movies as $movie) {
            \App\Models\Movie::create($movie);
        }
    }
}
