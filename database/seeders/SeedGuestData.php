<?php

namespace Database\Seeders;

use App\Models\Guest;
use App\Models\GuestInfo;
use Illuminate\Database\Seeder;
use Faker;
class SeedGuestData extends Seeder
{

    public function run()
    {
        $faker = Faker\Factory::create();
        $guests = Guest::factory(5)->create();
        foreach ($guests as $guest) {
            GuestInfo::create([
                'guest_id' => $guest->id,
                'age' => random_int(18, 60),
                'address' => $faker->address(),
            ]);
        }
    }
}
