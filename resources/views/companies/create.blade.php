@extends('layouts.app')

@section('content')
<div class="bg-primary shadow-md rounded-lg p-6 max-w-2xl mx-auto">
    <h1 class="text-2xl font-bold text-accent mb-4">Create Company</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-600 p-4 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-accent font-semibold mb-2">Name</label>
            <input type="text" id="name" name="name" class="w-full border rounded px-4 py-2 text-secondary" value="{{ old('name') }}" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-accent font-semibold mb-2">Email</label>
            <input type="email" id="email" name="email" class="w-full border rounded px-4 py-2 text-secondary" value="{{ old('email') }}">
        </div>

        <div class="mb-4">
            <label for="logo" class="block text-accent font-semibold mb-2">Logo</label>
            <input type="file" id="logo" name="logo" class="w-full border rounded px-4 py-2 text-secondary" accept="image/*">
        </div>

        <div class="mb-4">
            <label for="website" class="block text-accent font-semibold mb-2">Website</label>
            <input type="url" id="website" name="website" class="w-full border rounded px-4 py-2 text-secondary" value="{{ old('website') }}">
        </div>

        <div class="flex justify-between items-center">
            <a href="{{ route('companies.index') }}" class="bg-secondary text-background px-4 py-2 rounded hover:bg-accent">Cancel</a>
            <button type="submit" class="bg-accent text-primary px-4 py-2 rounded hover:bg-secondary">Create</button>
        </div>
    </form>
</div>
@endsection
