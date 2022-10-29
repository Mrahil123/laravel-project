<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl mb-1 text-bold uppercase">Login</h2>
            <p class="mb-5">Login Your Account!</p>
        </header>

<form action="/users/authenticate" method="post">
    @csrf

    <div class="mb-6">
    <label for="email" class="inline-block mb-2 text-lg">Email:</label>
    <input type="email" name="email" class="w-full p-2 border border-gray-200 rounded">
    @error('email')
     <p class="text-red-500 mt-1">{{$message}}</p>   
    @enderror
</div>
    <div class="mb-6">
    <label for="password" class="inline-block mb-2 text-lg">Password</label>
    <input type="password" name="password" class="w-full p-2 border border-gray-200 rounded">
    @error('password')
     <p class="text-red-500 mt-1">{{$message}}</p>   
    @enderror
    <p class="text-right mt-1">
        <a href="{{route("password.request")}}">Forget Password?</a>
    </p>
</div>

    <button type="submit" class="bg-blue-800 text-white py-2 px-4 hover:bg-blue-400 rounded">Login</button>

    <div class="mt-8">
        <p>Not Have Account?</p>
        <a href="/register" class="text-laravel">Create Account</a>
    </div>

    </form>

</x-card>
</x-layout>