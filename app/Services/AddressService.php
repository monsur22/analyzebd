<?php
namespace App\Services;

use App\Models\Address;
use App\Services\Interfaces\AddressServiceInterface;
use Illuminate\Http\Request;

class AddressService implements AddressServiceInterface
{
    public function index()
    {
        return Address::all();
    }

    public function create(array $data)
    {
        return Address::create($data);
    }

    public function show(int $id)
    {
        return Address::findOrFail($id);
    }

    public function update(Request $request, int $id)
    {
        $address = Address::findOrFail($id);
        $address->update($request->all());
        return $address;
    }

    public function delete(int $id)
    {
        $address = Address::findOrFail($id);
        $address->delete();
    }
}