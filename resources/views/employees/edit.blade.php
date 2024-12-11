@extends('layouts.app')

@section('content')
<div class="bg-primary shadow-md rounded-lg p-6 max-w-2xl mx-auto">
    <h1 class="text-2xl font-bold text-accent mb-4">Edit Employee</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-600 p-4 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('employees.update', $employee) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="first_name" class="block text-accent font-semibold mb-2">First Name</label>
            <input type="text" id="first_name" name="first_name" class="w-full border rounded px-4 py-2 text-secondary" value="{{ old('first_name', $employee->first_name) }}" required>
        </div>

        <div class="mb-4">
            <label for="last_name" class="block text-accent font-semibold mb-2">Last Name</label>
            <input type="text" id="last_name" name="last_name" class="w-full border rounded px-4 py-2 text-secondary" value="{{ old('last_name', $employee->last_name) }}" required>
        </div>

        <div class="mb-4">
            <label for="company_id" class="block text-accent font-semibold mb-2">Company</label>
            <select id="company_id" name="company_id" class="w-full border rounded px-4 py-2 text-secondary" required>
                <option value="">Select a Company</option>
                @foreach ($companies as $company)
                    <option value="{{ $company->id }}" {{ old('company_id', $employee->company_id) == $company->id ? 'selected' : '' }}>
                        {{ $company->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-accent font-semibold mb-2">Email</label>
            <input type="email" id="email" name="email" class="w-full border rounded px-4 py-2 text-secondary" value="{{ old('email', $employee->email) }}">
        </div>

        <div class="mb-4">
            <label for="phone_number" class="block text-accent font-semibold mb-2">Phone Number</label>
            <input type="text" id="phone_number" name="phone_number" class="w-full border rounded px-4 py-2 text-secondary" value="{{ old('phone_number', $employee->phone_number) }}">
        </div>

        <div class="flex justify-between items-center">
            <a href="{{ route('employees.index') }}" class="bg-secondary text-background px-4 py-2 rounded hover:bg-accent">Cancel</a>
            <button type="submit" class="bg-accent text-primary px-4 py-2 rounded hover:bg-secondary">Update</button>
        </div>
    </form>
</div>
@endsection
