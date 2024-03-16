<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User Details') }}
        </h2>
    </x-slot>

    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <p class="card-text"><strong>Image:</strong>
                    @if ($user->image)
                        <img src="{{ asset('images/' . $user->image) }}" alt="User Image" class="img-fluid"
                            style="max-width: 200px;">
                    @else
                        <img src="https://upload.wikimedia.org/wikipedia/commons/6/65/No-Image-Placeholder.svg"
                            alt="No Image" class="img-fluid" style="max-width: 200px;">
                    @endif
                </p>
                <p class="card-text"><strong>Name:</strong> {{ $user->name }}</p>
                <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
                <h2 class="card-text"><strong>Addresses:</strong></h2>
                <ul>
                    @foreach ($addresses as $key => $address)
                        <li>{{ $key + 1 }}. {{ $address->details }}</li>
                    @endforeach
                </ul>

            </div>
        </div>
        <a href="{{ route('users.index') }}" class="btn btn-primary mt-3">Back</a>
    </div>
</x-app-layout>
