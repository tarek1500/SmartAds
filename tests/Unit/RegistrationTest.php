<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RegistrationTest extends TestCase
{
    //Next ine controls database rollback
    // use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUserRegisteration()
    {
        $response = $this->json('POST', 'api/register', factory(\App\User::class, 1)->make()->makeVisible('password')->toArray()[0]);
        // dd(factory(\App\User::class, 1)->make()->makeVisible('password')->toArray()[0]);
        dd($response->getContent());
        $response->assertStatus(200)->assertJson([
        'success' => true
        ]);

    }
}
