<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Address Details') }}
        </h2>
    </x-slot>

    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <p class="card-text"><strong>User ID:</strong> {{ $address->user_id }}</p>
                <p class="card-text"><strong>Details:</strong> {{ $address->details }}</p>
            </div>
        </div>
        <a href="{{ route('addresses.index') }}" class="btn btn-primary mt-3">Back</a>
    </div>
</x-app-layout>
