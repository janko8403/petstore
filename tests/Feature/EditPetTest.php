<?php

namespace Tests\Feature;

use Tests\TestCase;

class EditPetTest extends TestCase
{
    public function test_it_can_edit_a_pet()
    {
        $add = $this->post('/add-pet', [
            'name' => 'EditMe',
            'status' => 'available'
        ]);
        $pet = session('response');

        if (!isset($pet['id'])) {
            $this->fail('Pet ID not returned from API');
        }

        $edit = $this->post('/edit', [
            'id' => $pet['id'],
            'name' => 'EditedName',
            'status' => 'sold'
        ]);

        $edit->assertStatus(302);
        $edit->assertSessionHas('response');
    }
}
