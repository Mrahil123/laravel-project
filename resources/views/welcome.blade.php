<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
        @auth
            @if (auth()->user()->is_approved == 0)
                <x-if-pending/>
            @else
                <x-dash/>
            @endif
        @else
        <x-layout>

            <x-card class="mx-auto mt-20 max-w-xl text-center">
                <h1 class="text-4xl text-bold mb-2">Wellcome!</h1>
                <p>Create Your Dream Account</p>
                <div class="flex text-white justify-around mt-12">
                    <a href="/login">
                        <button class="bg-blue-800 hover:bg-blue-600 px-6 py-3">Login</button>
                    </a>
                    <a href="/register">
                        <button class="bg-blue-800 hover:bg-blue-600 px-6 py-3">Create</button>
                    </a>
                </div>
            </x-card>
            </x-layout>
        @endauth
</body>
</html>