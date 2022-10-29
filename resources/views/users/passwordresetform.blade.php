<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl mb-1 text-bold uppercase">Reset Password</h2>
            <p class="mb-5">Reset Your Password!</p>
        </header>

<form action="{{route("password.request")}}" method="post">
    @csrf

    <div class="mb-6">
    <label for="email" class="inline-block mb-2 text-lg">Email:</label>
    <input type="email" name="email" class="w-full p-2 border border-gray-200 rounded">
    @error('email')
     <p class="text-red-500 mt-1">{{$message}}</p>   
    @enderror
</div>

    <button type="submit" class="bg-blue-800 text-white py-2 px-4 hover:bg-blue-400 rounded">Reset</button>
    </form>

</x-card>
</x-layout>