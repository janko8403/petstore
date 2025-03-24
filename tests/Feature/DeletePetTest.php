<?php

namespace Tests\Feature;

use Tests\TestCase;

class DeletePetTest extends TestCase
{
    public function test_it_can_delete_a_pet()
    {
        $add = $this->post('/add-pet', [
            'name' => 'ToDelete',
            'status' => 'available'
        ]);
        $pet = session('response');

        if (!isset($pet['id'])) {
            $this->fail('Pet ID not returned from API');
        }

        $delete = $this->post('/delete', [
            'id' => $pet['id']
        ]);

        $delete->assertStatus(302);
        $delete->assertSessionHas('response');
    }
}