<?php

namespace App\Services\Interfaces;
use Illuminate\Http\Request;

interface UserServiceInterface
{
    public function index();

    public function create(array $data);

    public function show(string $id);

    public function update(Request $request, string $id);

    public function delete(string $id);
}
