<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressRequest;
use App\Models\Address;
use App\Models\User;
use App\Services\Interfaces\AddressServiceInterface;

class AddressController extends Controller
{
    protected $addressService;

    public function __construct(AddressServiceInterface $addressService)
    {
        $this->addressService = $addressService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $addresses = $this->addressService->index();
        return view('addresses.index', compact('addresses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('addresses.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddressRequest  $request)
    {
        $this->addressService->create($request->validated());
        return redirect()->route('addresses.index')->with('success', 'Address created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $address = $this->addressService->show($id);
        return view('addresses.show', compact('address'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $address = $this->addressService->show($id);
        $users = User::all();
        return view('addresses.edit', compact('address', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AddressRequest   $request, $id)
    {
        $this->addressService->update($request, $id);
        return redirect()->route('addresses.index')->with('success', 'Address updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->addressService->delete($id);
        return redirect()->route('addresses.index')->with('success', 'Address deleted successfully.');

    }
}
