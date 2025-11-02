<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CompanyCollaboration;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CompanyCollaborationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CompanyCollaboration::factory()->count(10)->create();
    }
}
