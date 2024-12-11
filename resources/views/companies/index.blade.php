@extends('layouts.app')

@section('content')
<div class="bg-white shadow-md rounded-lg p-6">
    <h1 class="text-2xl font-bold text-primary mb-4">Companies</h1>
    <a href="{{ route('companies.create') }}" class="bg-secondary text-background px-4 py-2 rounded hover:bg-accent">Add Company</a>
    <table class="w-full mt-6 border-collapse">
        <thead>
            <tr class="bg-secondary text-background">
                <th class="p-2 text-left">Name</th>
                <th class="p-2 text-left">Email</th>
                <th class="p-2 text-left">Logo</th>
                <th class="p-2 text-left">Website</th>
                <th class="p-2 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($companies as $company)
            <tr class="hover:bg-gray-100">
                <td class="p-2 border">{{ $company->name }}</td>
                <td class="p-2 border">{{ $company->email }}</td>
                <td class="p-2 border">
                    @if ($company->logo)
                    <img src="{{ asset('storage/' . $company->logo) }}" alt="Logo" class="h-10 w-auto rounded-full">
                    @endif
                </td>
                <td class="p-2 border">{{ $company->website }}</td>
                <td class="p-2 border">
                    <a href="{{ route('companies.edit', $company) }}" class="text-primary hover:underline">Edit</a>
                    <form action="{{ route('companies.destroy', $company) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $companies->links() }}
</div>
@endsection
