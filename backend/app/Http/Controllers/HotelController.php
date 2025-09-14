<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHotelRequest;
use App\Http\Requests\UpdateHotelRequest;
use app\Http\Services\HotelService;
use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(HotelService $service)
    {
        $hotels = $service->index();

        return response()->json($hotels, 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHotelRequest $request, HotelService $service)
    {
        $service->store($request);
        return response()->json(['message'=>'Отель успешно добавлен.']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHotelRequest $request, Hotel $hotel, HotelService $service)
    {
       $updated = $service->update($request, $hotel);
       return response()->json(['message' => 'Данные успешно обновлены.', 'hotel' => $updated], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hotel $hotel, HotelService $service)
    {
        $hotel->delete();
        return response()->json(['message' => 'Отель успешно удален.']);
    }
}
