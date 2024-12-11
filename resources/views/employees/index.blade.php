@extends('layouts.app')

@section('content')
<div class="bg-white shadow-md rounded-lg p-6">
    <h1 class="text-2xl font-bold text-primary mb-4">Employees</h1>
    <a href="{{ route('employees.create') }}" class="bg-secondary text-background px-4 py-2 rounded hover:bg-accent">Add Employee</a>
    <table class="w-full mt-6 border-collapse">
        <thead>
            <tr class="bg-secondary text-background">
                <th class="p-2 text-left">First Name</th>
                <th class="p-2 text-left">Last Name</th>
                <th class="p-2 text-left">Company</th>
                <th class="p-2 text-left">Email</th>
                <th class="p-2 text-left">Phone Number</th>
                <th class="p-2 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
            <tr class="hover:bg-gray-100">
                <td class="p-2 border">{{ $employee->first_name }}</td>
                <td class="p-2 border">{{ $employee->last_name }}</td>
                <td class="p-2 border">{{ $employee->company->name }}</td>
                <td class="p-2 border">{{ $employee->email }}</td>
                <td class="p-2 border">{{ $employee->phone_number }}</td>
                <td class="p-2 border">
                    <a href="{{ route('employees.edit', $employee) }}" class="text-primary hover:underline">Edit</a>
                    <form action="{{ route('employees.destroy', $employee) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $employees->links() }}
</div>
@endsection
