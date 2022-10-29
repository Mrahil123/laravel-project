<x-layout>
<x-card class="mx-auto max-w-3xl p-10 mt-20">
    <header class="text-center">
        <h1 class="text-bold text-2xl uppercase mb-4">Manage Users</h1>
    </header>
<table cellspacing="10" cellpadding="30">
    <tr>
        <th>Name</td>
        <th>Email</td>
        <th>Status</th>
        <th>Action</th>
    </tr>
        @foreach ($users as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->is_approved ? "Approved" : "Pending"}}</td>
            <td class="flex flex-between">
                <form action="/users/{{$user->id}}" method="post">
                    @csrf
                    @method("PUT")
                    <button class="px-2 py-1 m-2 bg-green-600 hover:bg-green-800" type="submit">Approve</button>
                </form>
                <form action="/users/{{$user->id}}" method="post">
                    @csrf
                    @method("DELETE")
                    <button class="bg-red-600 hover:bg-red-800 px-2 py-1 m-2 " type="submit">Deny</button>
                </form>
            </td>
        </tr>
        @endforeach

    </table>

</x-card>
</x-layout>