<?php 

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PetApiService
{
    private string $baseUrl = 'https://petstore.swagger.io/v2';

    public function addPet(array $data)
    {
        return Http::post("{$this->baseUrl}/pet", $data);
    }

    public function getPet(int $id)
    {
        return Http::get("{$this->baseUrl}/pet/{$id}");
    }

    public function getAllPets(string $status = 'available')
    {
        return Http::get("{$this->baseUrl}/pet/findByStatus", [
            'status' => $status
        ]);
    }

    public function editPet(array $data)
    {
        return Http::put("{$this->baseUrl}/pet", $data);
    }

    public function deletePet(int $id)
    {
        return Http::delete("{$this->baseUrl}/pet/{$id}");
    }
}