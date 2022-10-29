<x-layout>
    <div class="text-center mt-20">
        <p class="text-3xl">Your Account is Pending!</p>
        <form action="/logout" method="post">
            @csrf
            <button type="submit" class="px-4 py-2 bg-blue-500 rounded mt-4">Logout</button>
        </form>
    </div>
</x-layout>