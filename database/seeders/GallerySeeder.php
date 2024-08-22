<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\gallery;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $galleries = [
            [
                'user_id' => 2,
                'category_id' => null,
                'image' => 'Enthusiart.jfif',
                'artwork_name' => 'Resonance',
                'artist_name' => 'Nico Robin',
                'materials' => 'Acrylic on Canvas',
                'dimension' => '150x110cm',
                'price' => 549000,
                'stock' => 1,
                'description' => 'Limited Edition',
                'year' => '2024'
            ],
            [
                'user_id' => 2,
                'category_id' => null,
                'image' => 'Rutinitas Realitas.jfif',
                'artwork_name' => 'Rutinitas Realitas',
                'artist_name' => 'Nico Robin',
                'materials' => 'Print on Canvas',
                'dimension' => '110x60cm',
                'price' => 999000,
                'stock' => 1,
                'description' => 'Limited Edition',
                'year' => '2024'
            ],
            [
                'user_id' => 2,
                'category_id' => null,
                'image' => 'Jalan Sunyi.jfif',
                'artwork_name' => 'Jalan Sunyi',
                'artist_name' => 'Nico Robin',
                'materials' => 'Acrylic on Canvas',
                'dimension' => '150x110cm',
                'price' => 549000,
                'stock' => 1,
                'description' => 'Limited Edition',
                'year' => '2024'
            ],
            [
                'user_id' => 2,
                'category_id' => null,
                'image' => 'Contemplation.jfif',
                'artwork_name' => 'Contemplation',
                'artist_name' => 'Nico Robin',
                'materials' => 'Acrylic on Canvas',
                'dimension' => '150x110cm',
                'price' => 549000,
                'stock' => 1,
                'description' => 'Limited Edition',
                'year' => '2024'
            ],
            [
                'user_id' => 2,
                'category_id' => null,
                'image' => 'You & I.jfif',
                'artwork_name' => 'You & I',
                'artist_name' => 'Nico Robin',
                'materials' => 'Acrylic on Canvas',
                'dimension' => '150x110cm',
                'price' => 549000,
                'stock' => 1,
                'description' => 'Limited Edition',
                'year' => '2024'
            ],
            [
                'user_id' => 4,
                'category_id' => null,
                'image' => 'Anggrek.jpg',
                'artwork_name' => 'Anggrek',
                'artist_name' => 'Karthono Yudhokusumo',
                'materials' => 'Oil on Canvas',
                'dimension' => '72x91cm',
                'price' => 999000,
                'stock' => 1,
                'description' => 'Limited Edition',
                'year' => '1956'
            ],
        ];

        foreach ($galleries as $user)
        {
            gallery::create($user);
        }
    }
}
