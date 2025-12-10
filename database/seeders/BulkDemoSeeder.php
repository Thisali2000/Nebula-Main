<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BulkDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert some demo revenue rows
        DB::table('bulk_revenue_uploads')->insert([
            ['year' => 2025, 'month' => 1, 'day' => 15, 'location' => 'Welisara', 'course' => '101', 'revenue' => 15000.00, 'created_at' => now(), 'updated_at' => now()],
            ['year' => 2025, 'month' => 2, 'day' => 10, 'location' => 'Moratuwa', 'course' => '102', 'revenue' => 12000.00, 'created_at' => now(), 'updated_at' => now()],
            ['year' => 2025, 'month' => 3, 'day' => 5, 'location' => 'Peradeniya', 'course' => '103', 'revenue' => 8000.00, 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Insert demo student upload rows
        DB::table('bulk_student_uploads')->insert([
            ['year' => 2025, 'location' => 'Welisara', 'course' => '101', 'student_count' => 25, 'created_at' => now(), 'updated_at' => now()],
            ['year' => 2025, 'location' => 'Moratuwa', 'course' => '102', 'student_count' => 18, 'created_at' => now(), 'updated_at' => now()],
            ['year' => 2025, 'location' => 'Peradeniya', 'course' => '103', 'student_count' => 12, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
