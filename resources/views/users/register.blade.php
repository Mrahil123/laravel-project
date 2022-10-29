<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
<header class="text-center">
    <h1 class="text-2xl font-bold uppercase mb-1">Register</h1>
    <p class="mb-4">Create New Account</p>
</header>

<form action="/users" method="post" enctype="multipart/form-data"> 
@csrf

<div class="mb-6">
    
    <label for="name" class="text-lg mb-2 inline-block">Name</label>
    <input type="text" name="name"  class="border border-gray-200 rounded p-2 w-full">

    @error('name')
    <p class="text-red-500 mt-1">{{$message}}</p>   
    @enderror
</div>

<div class="mb-6">

<label for="email" class="text-lg mb-2 inline-block">Email:</label>
<input type="email" name="email" class="w-full p-2 border border-gray-200 rounded">
@error('email')
 <p class="mt-1 text-red-500 ">{{$message}}</p>   
@enderror
</div>

<div class="mb-6">

<label for="password" class="inline-block text-lg mb-2">Password</label>
<input type="password" name="password" class="w-full p-2 rounded border border-gray-200">
@error('password')
 <p class="mt-1 text-red-500 ">{{$message}}</p>   
@enderror
</div>

<div class="mb-6">

<label for="password" class="inline-block text-lg mb-2">Conform Password</label>
<input type="password" name="password_confirmation" class="w-full p-2 rounded border border-gray-200">
@error('password_confirmation')
<p class="text-red-500 mt-1">{{$message}}</p>   
@enderror
</div>

<div class="mb-6">
    <label for="photo">Photo</label>
    <input type="file" name="photo" class="w-full p-2 border border-gray-200 rounded">
</div>

<button type="submit" class="bg-blue-800 text-white py-2 px-4 hover:bg-blue-400 rounded">Create Account</button>

<div class="mt-8">
    <p>Already Have Account?</p>
    <a href="/login" class="text-laravel">Login</a>
</div>

</form>


</x-card>
</x-layout>