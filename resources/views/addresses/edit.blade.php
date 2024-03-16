<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Address') }}
        </h2>
    </x-slot>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Address') }}</div>

                    <div class="card-body">
                        <form action="{{ route('addresses.update', $address->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="user_id">{{ __('User Name:') }}</label>
                                <select class="form-control @error('user_id') is-invalid @enderror" id="user_id" name="user_id">
                                    <option value="" selected disabled>{{ __('Select User Name') }}</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}" @if($address->user_id == $user->id) selected @endif>{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="details">{{ __('Address Details:') }}</label>
                                <textarea class="form-control @error('details') is-invalid @enderror" rows="3"id="details" name="details" >{{ old('details', $address->details) }}</textarea>
                                @error('details')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <a href="{{ route('addresses.index') }}" class="btn btn-secondary">{{ __('Back') }}</a>

                                <button type="submit" class="btn btn-primary" style="background-color: blue">{{ __('Update') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
