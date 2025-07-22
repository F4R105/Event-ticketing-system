@props(['title' => 'Welcome'])
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Event ticketing system | {{ $title }}</title>
    @vite(['../../resources/css/app.css', '../../resources/js/app.js'])
</head>

<body>
    {{ $slot }}
    <footer class="bg-gray-100 text-gray-600 text-center py-4 border-t">
        <span class="text-sm">&copy; 2025 Event Ticketing System. All rights reserved.</span>
    </footer>
</body>

</html>
