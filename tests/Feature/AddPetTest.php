<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AddPetTest extends TestCase
{
    use WithFaker;

    public function test_it_can_add_a_pet()
    {
        $response = $this->post('/add-pet', [
            'name' => $this->faker->firstName,
            'status' => 'available',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHas('response');
    }
}
