<div wire:poll.keep-alive.2s class="mt-10 p-5 mx-auto">
    <h2 class="text-2xl mb-auto mt-2 md-2">Users List</h2>
    <div class="relative overflow-x-auto shawon-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase dark:text-gray-300 bg-gray-50 dark:bg-gray-800">
                <tr>
                    <th scope="col" class="px-4 py-3">Name</th>
                    <th scope="col" class="px-4 py-3">Email</th>
                    <th scope="col" class="px-4 py-3">Joined</th>
                </tr>
            </thead>
            <tbody>
                {{-- Loop through the users and display the data --}}
                @foreach ($users as $user)
                    <tr class="bg-white border-b border-gray-200 dark:bg-gray-900 dark:border-gray-700">
                        <td scope="row"
                            class="px-4 py-3 font-medium whitespace-nowrap">
                            {{ $user->name }}
                        </td>
                        <td scope="row"
                            class="px-4 py-3">
                            {{ $user->email }}
                        </td>
                        <td scope="row"
                            class="px-4 py-3">
                            {{ $user->created_at->format('Y-m-d') }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div>
        {{ $users->links() }}
    </div>

</div>
