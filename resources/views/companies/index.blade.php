@extends('layouts.app')

@section('content')
<div class="bg-white shadow-md rounded-lg p-6">
    <h1 class="text-3xl font-bold text-zinc-100 tracking-widest mb-4">Companies</h1>
    <a href="{{ route('companies.create') }}" class="bg-zinc-900 text-background px-4 py-2 rounded hover:bg-accent">Add Company</a>
  <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-lg text-zinc-100 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 tracking-widest">
            <tr class="bg-zinc-800 text-zinc-100">
                <th scope="col" class="px-6 py-3">Name</th>
                <th scope="col" class="px-6 py-3">Email</th>
                <th scope="col" class="px-6 py-3">Logo</th>
                <th scope="col" class="px-6 py-3">Website</th>
                <th scope="col" class="px-6 py-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($companies as $company)
            <tr class="bg-white border-b dark:bg-zinc-400 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-zinc-600">
                <th scope="row" class="px-6 py-4 font-medium text-zinc-100 whitespace-nowrap dark:text-zinc-100">{{ $company->name }}</th>
                <td class="px-6 py-4">{{ $company->email }}</td>
                <td class="px-6 py-4">
                    @if ($company->logo)
                    <img src="{{ asset('storage/' . $company->logo) }}" alt="Logo" class="h-10 w-auto object-contain rounded-full">
                    @endif
                </td>
                <td class="px-6 py-4">{{ $company->website }}</td>
                <td class="px-6 py-4">
                    <a href="{{ route('companies.edit', $company) }}" class="text-primary hover:underline">Edit</a>
                    <form action="{{ route('companies.destroy', $company) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-700 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
 </div>
    {{ $companies->links() }}
</div>
@endsection
