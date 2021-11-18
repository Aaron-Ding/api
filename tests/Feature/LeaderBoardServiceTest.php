<?php

namespace Tests\Feature;

use App\Models\Guest;
use App\Models\GuestInfo;
use App\Service\LeaderBoardService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\TestCase;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Tests\CreatesApplication;
use Tests\Traits\WithFakeGuest;

class LeaderBoardServiceTest extends TestCase
{
    use WithFakeGuest, DatabaseTransactions, WithFaker, CreatesApplication;


    protected $leaderBoardService;

    public function setUp(): void
    {
        parent::setUp();
        $this->leaderboardService = app()->make(LeaderBoardService::class);
    }

    public function testGetGuests()
    {
        $this->assertEquals(1, 1);
    }

    public function testUpdatePoint()
    {
        $guest =  $this->fakeGuest();
        $point = $this->faker()->randomDigit();
        $result = $this->leaderboardService->updateGuestPoint($guest[0]->id, $point);
        $this->assertTrue($result);
        $guest = Guest::find($guest[0]->id);
        $this->assertEquals($guest->point,$point);
    }

    public function testCreateGuest()
    {
        $name = $this->faker->firstName();
        $age = $this->faker->numberBetween(18, 60);
        $address = $this->faker->address();
        $data['name']  = $name;
        $data['age'] = $age;
        $data['address'] = $address;
        $guest = $this->leaderboardService->createNewGuest($data);
        $this->assertInstanceOf(Guest::class, $guest);
        $this->assertInstanceOf(GuestInfo::class,$guest->guestInfo);
        $this->assertEquals($name, $guest->name);
        $this->assertEquals($age, $guest->guestInfo->age);
        $this->assertEquals($address, $guest->guestInfo->address);
    }

    public function testDeleteGuest()
    {
        $guest = $this->prepareData();
        $result = $this->leaderboardService->deleteGuest($guest->id);
        $this->assertTrue($result);
    }

    public function testGuestIdNotFound()
    {
        $this->expectException(ModelNotFoundException::class);
        $this->leaderboardService->deleteGuest($this->faker->randomDigit());
    }

    public function prepareData()
    {
        $guests = $this->fakeGuest();
        foreach ($guests as $guest) {
            GuestInfo::create([
                'guest_id' => $guest->id,
                'age' => random_int(18, 60),
                'address' => $this->faker()->address()
            ]);
        }
        return $guest;
    }
}
