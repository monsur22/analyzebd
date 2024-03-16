<?php

namespace App\Services\Interfaces;
use Illuminate\Http\Request;

interface AddressServiceInterface
{
    public function index();

    public function create(array $data);

    public function show(int $id);

    public function update(Request $request, int $id);

    public function delete(int $id);
}
