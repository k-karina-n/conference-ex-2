<!doctype html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">

    <title>Conference with Laravel</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<x-navigation.navigation>
    <x-navigation.link route="register">Registration Form</x-navigation.link>
    <x-navigation.link route="conference">Conference List</x-navigation.link>
    @auth
        <x-navigation.link route="logout">Log out</x-navigation.link>
    @else
        <x-navigation.link route="login">Log in</x-navigation.link>
    @endauth
</x-navigation.navigation>

<body class="h-full">
    <div class="min-h-full">
        {{ $slot }}
    </div>
</body>

</html>
