<?php

namespace Database\Seeders;

use App\Models\MemberType;
use Illuminate\Database\Seeder;

class MemberTypeSeeder extends Seeder
{
    public function run()
    {
        MemberType::create([
            'id' => 1,
            'order_key' => 1,
            'title' => 'Non Members',
            'slug' => 'non-members',
            'description' => 'These people are not members of ICSB. Adding here is for adding as a member of the Council only.',
        ]);
    }
}
