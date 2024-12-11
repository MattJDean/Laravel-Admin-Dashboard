<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-background text-secondary font-custom">
    <nav class="bg-accent text-primary shadow-md">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-xl font-bold hover:text-background">Admin Panel</a>
            <div class="flex gap-4">
                <a href="{{ route('companies.index') }}" class="hover:text-background">Companies</a>
                <a href="{{ route('employees.index') }}" class="hover:text-background">Employees</a>
                <a href="#" class="hover:text-background" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </nav>
    <main class="container mx-auto px-4 py-6">
        @yield('content')
    </main>
</body>
</html>
