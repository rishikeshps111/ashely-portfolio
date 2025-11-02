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
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call([
            TestimonialSeeder::class,
            CompanyCollaborationSeeder::class,
            ServiceCategorySeeder::class,
            ServiceSeeder::class,
            ContactMessageSeeder::class,
            NewsletterSubscriberSeeder::class,
            ProjectCategorySeeder::class,
            ProjectSeeder::class,
        ]);
    }
}
