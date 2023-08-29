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
            'title' => 'Fellow Members',
            'slug' => 'fellow-members',
            'description' => '',
        ]);
        MemberType::create([
            'id' => 2,
            'order_key' => 2,
            'title' => 'Associate Members',
            'slug' => 'associate-members',
            'description' => '',
        ]);
        MemberType::create([
            'id' => 3,
            'order_key' => 3,
            'title' => 'Honorary Members',
            'slug' => 'honorary-members',
            'description' => '',
        ]);
        MemberType::create([
            'id' => 4,
            'order_key' => 4,
            'title' => 'Deceased Members',
            'slug' => 'deceased',
            'description' => '',
        ]);
        MemberType::create([
            'id' => 5,
            'order_key' => 5,
            'title' => 'Non Members',
            'slug' => 'non-members',
            'description' => 'These people are not members of ICSB. Adding here is for adding as a member of the Council only.',
        ]);
    }
}
