<!doctype html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">

    <title>Conference with Laravel</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <script src="https://unpkg.com/htmx.org@1.8.4"
        integrity="sha384-wg5Y/JwF7VxGk4zLsJEcAojRtlVp1FKKdGy1qN+OMtdq72WRvX/EdRdqg/LOhYeV" crossorigin="anonymous">
    </script>

    <script defer src="https://unpkg.com/@alpinejs/persist@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://unpkg.com/@alpinejs/mask@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
</head>

<x-navigation>
    <x-nav-link route="register">Registration Form</x-nav-link>
    <x-nav-link route="conference">Conference List</x-nav-link>
    @auth
        <x-nav-link route="logout">Log out</x-nav-link>
    @else
        <x-nav-link route="login">Log in</x-nav-link>
    @endauth
</x-navigation>

<body class="h-full">
    <div class="min-h-full">
        {{ $slot }}
    </div>
</body>

</html>
