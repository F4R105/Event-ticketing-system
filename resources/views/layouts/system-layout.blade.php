@props(['title' => 'Welcome'])
<!DOCTYPE html>
<html lang="en" class="scroll-smooth scroll-pt-20">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }} | Event ticketing system</title>
    @vite(['../../resources/css/app.css', '../../resources/js/app.js'])
</head>

<body class="">
    {{ $slot }}
    <footer class="bg-gray-100 text-gray-600 text-center py-4 border-t">
        <span class="text-sm">&copy; 2025 Event Ticketing System by <a href="https://github.com/F4R105">F4R105</a>. All rights reserved.</span>
    </footer>
</body>

</html>
