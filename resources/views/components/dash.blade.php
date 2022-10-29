<x-layout>
<x-card class="mx-auto max-w-6xl">
    <div class="text-right">
        
        <p class="text-xl">Hello {{auth()->user()->name}}</p>
        <form action="/logout" method="post">
            @csrf
            <button type="submit" class="bg-blue-500 px-2 rounded py-1 mt-2">Log out</button>
        </form>
    </div>
        <div>
            <div class="mt-10">
                <x-list-card/>
            </div>
    </div>
</x-card>
</x-layout>