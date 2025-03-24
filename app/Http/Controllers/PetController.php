<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

use App\Services\PetApiService;

class PetController extends Controller
{
    private PetApiService $petApi;

    public function __construct(PetApiService $petApi)
    {
        $this->petApi = $petApi;
    }

    public function index(Request $request)
    {
        $status = $request->input('status', 'available');
        $petsResponse = $this->petApi->getAllPets($status);
        $pets = $petsResponse->successful()
            ? collect($petsResponse->json())->sortByDesc('id')->values()
            : collect();

        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 100;
        $currentItems = $pets->slice(($currentPage - 1) * $perPage, $perPage)->values();

        $paginated = new LengthAwarePaginator(
            $currentItems,
            $pets->count(),
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        return view('index', [
            'pets' => $paginated,
            'currentStatus' => $status
        ]);
    }

    public function add()
    {
        return view('add');
    }

    public function addPet(Request $request)
    {
        $response = $this->petApi->addPet([
            'name' => $request->input('name'),
            'status' => $request->input('status'),
        ]);

        return back()->with('response', $response->json());
    }

    public function editPetForm(Request $request)
    {
        $id = $request->input('id');
        $sessionPet = session('overridePet');

        if ($sessionPet && (int) $sessionPet['id'] === (int) $id) {
            $pet = $sessionPet;
        } else {
            $response = $this->petApi->getPet((int) $id);
            $pet = $response->successful() ? $response->json() : null;
        }

        return view('edit', compact('pet'));
    }

    public function editPet(Request $request)
    {
        $data = [
            'id' => (int) $request->input('id'),
            'name' => $request->input('name'),
            'status' => $request->input('status'),
        ];

        $response = $this->petApi->editPet($data);

        return redirect()->to('/edit?id=' . $request->input('id'))->with([
            'response' => $response->json(),
            'overridePet' => $data,
        ]);
    }

    public function deletePet(Request $request)
    {
        $response = $this->petApi->deletePet((int) $request->input('id'));

        return back()->with('response', [
            'status' => $response->status(),
            'body' => $response->json(),
        ]);
    }
}

