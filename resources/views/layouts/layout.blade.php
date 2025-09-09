<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEST</title>
    @vite('resources/css/app.css')
</head>
<body>
    @include('layouts.navbar')
    @include('layouts.success_sessions')
    <div class="flex items-center justify-center mt-10">
        {{-- TASKS CONTENT --}}
        @yield('content')
    </div>
</body>
</html>