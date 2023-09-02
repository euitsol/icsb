<?php

namespace Database\Seeders;

use App\Models\NoticeCategory;
use Illuminate\Database\Seeder;

class NoticeCategorySeeder extends Seeder
{
    public function run()
    {
        NoticeCategory::create([
            'id' => '1',
            'title' => 'Student Notice',
            'slug' => 'student-notice',
            'description' => '',
        ]);
        NoticeCategory::create([
            'id' => '2',
            'title' => 'Member Notice',
            'slug' => 'member-notice',
            'description' => '',
        ]);
    }
}
