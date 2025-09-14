<?php

namespace app\Http\Services;

use App\Http\Requests\StoreHotelRequest;
use App\Http\Requests\UpdateHotelRequest;
use App\Models\Hotel;

class HotelService
{
    /**
     * Create a new class instance.
     */
    public function index()
    {
        return Hotel::query()->get()->toArray();
    }

    public function destroy(Hotel $hotel)
    {
       if ($hotel->delete()) {
           return true;
       } return false;
    }

    public function update(UpdateHotelRequest $request, Hotel $hotel)
    {
        $hotel->update($request->validated());
        return $hotel;
    }

    public function store(StoreHotelRequest $request)
    {
        # do nothing
        return true;
    }
}
