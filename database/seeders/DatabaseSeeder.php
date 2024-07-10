<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\User;
use App\Models\Skill;
use App\Models\City;
use App\Models\Country;
use App\Models\Jobs;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Contractor',
            'username' => 'contractor',
            'role' => 'contractor',
            'phone' => '081357638723',
            'identity' => '3175022809021001',
            'profile' => '1689331660.attachment_63466712.jpg',
            'email' => 'contractor@gmail.com',
            'password' => Hash::make('password')
        ]);

        User::create([
            'name' => 'Member',
            'username' => 'member',
            'role' => 'member',
            'phone' => '081357638722',
            'identity' => '3175022809021000',
            'profile' => '1689331901.attachment_127807231.jpg',
            'email' => 'member@gmail.com',
            'password' => Hash::make('password')
        ]);

        Jobs::create([
            'user_id' => 2,
            'title' => 'Membuat Saluran Air',
            'slug' => 'membuat-saluran-air',
            'image1' => '1688538029.download.jpg',
            'detail' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
            'category_id' => 2,
            'location_id' => 1,
            'rate' => 100000,
            'phone' => '081357638722',
            'option_one' => 'Large, Est. 4+ hrs',
            'option_two' => 2
        ]);

        Jobs::create([
            'user_id' => 2,
            'title' => 'Membuat Gedung',
            'slug' => 'membuat-gedung',
            'image1' => '1688631028.istockphoto-511061090-612x612.jpg',
            'detail' => "<div><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. <br><br>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. <br><br>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. <br><br>It was popularised in the 1960s with the release of <del>Letraset </del>sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div>",
            'category_id' => 1,
            'location_id' => 1,
            'rate' => 2000000,
            'phone' => '081357638722',
            'option_one' => "I'm not sure i know",
            'option_two' => "I'm not sure i know"
        ]);

        Jobs::create([
            'user_id' => 2,
            'title' => 'Membersihkan Lumut Halaman',
            'slug' => 'membersihkan-lumut-halaman',
            'image1' => '1688632004.lumut.jpg',
            'detail' => "<div><strong>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.&nbsp;<br><br>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</strong></div>",
            'category_id' => 3,
            'location_id' => 1,
            'rate' => 100000,
            'phone' => '081357638722',
            'option_one' => "Medium, Est. 2-3 hrs",
            'option_two' => "I'm not sure i know"
        ]);

        Jobs::create([
            'user_id' => 2,
            'title' => 'Membetulkan pipa bocor, URGENT!!!',
            'slug' => 'membetulkan-pipa-bocor-urgent',
            'image1' => '1688632070.pipe.jpg',
            'detail' => "<div><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div>",
            'category_id' => 2,
            'location_id' => 1,
            'rate' => 300000,
            'phone' => '081357638722',
            'option_one' => "Large, Est. 4+ hrs",
            'option_two' => 2
        ]);

        $skills = array("Gardening", "Electrical", "Heavy Lifting");
        foreach ($skills as $skill) {
            Skill::create([
                'name' => $skill
            ]);
        }

        City::create([
            'name' => "Jakarta",
            'slug' => "Jakarta",
            'image' => "jakarta.png"
        ]);
        City::create([
            'name' => "Bandung",
            'slug' => "Bandung",
            'image' => "bandung.png"
        ]);
        City::create([
            'name' => "Bali",
            'slug' => "Bali",
            'image' => "bali.png"
        ]);
        City::create([
            'name' => "Malang",
            'slug' => "Malang",
            'image' => "malang.png"
        ]);

        $countries = array("Indonesia", "Malaysia", "Singapura");
        foreach ($countries as $country) {
            Country::create([
                'name' => $country
            ]);
        }

        Category::create([
            'name' => "Electrical Help",
            'slug' => "Electrical-Help",
            'image' => "electrical.png"
        ]);
        Category::create([
            'name' => "Minor Repairs",
            'slug' => "Minor-Repairs",
            'image' => "repair.png"
        ]);
        Category::create([
            'name' => "Gardening",
            'slug' => "Gardening",
            'image' => "gardening.png"
        ]);
        Category::create([
            'name' => "Painting",
            'slug' => "Painting",
            'image' => "painting.png"
        ]);
        Category::create([
            'name' => "Cleaning Services",
            'slug' => "Cleaning-Services",
            'image' => "cleaning.png"
        ]);
    }
}
