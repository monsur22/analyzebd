<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Address Page') }}
        </h2>
    </x-slot>

    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    <div class="container mt-5">
        <a href="{{ route('addresses.create') }}" class="btn btn-primary mb-3">Create Address</a>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>User Name</th>
                    <th>Details</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($addresses as $address)
                    <tr>
                        <td>{{ $address->id }}</td>
                        <td>{{ $address->user->name }}</td>
                        <td>{{ $address->details }}</td>
                        <td>
                            <a href="{{ route('addresses.show', $address->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('addresses.edit', $address->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('addresses.destroy', $address->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this address?')" style="background-color: red">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
