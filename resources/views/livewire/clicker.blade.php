<div>
    @if (session('success'))
        <span class="px-3 py-3 bg-green-600 text-with rounded"> {{ session('success') }} </span>
    @endif

    <form class="p-5" wire:submit="createNewUser" action="">
        @foreach (['name', 'email', 'password'] as $field)
            <input class="block rounded border border-gray-100 px-3 py-1 mb-1 mt-1 text-black"
                wire:model="{{ $field }}"
                type="{{ $field == 'password' ? 'password' : 'text' }}"
                placeholder="{{ $field }}">

            @error($field)
                <p class="text-xs text-red-500 block">{{ $message }}</p>
            @enderror

        @endforeach

        <button class="block rounded px-3 py-1 bg-gray-400 text-whie mt-1">Create</button>
    </form>
    <hr>
    @foreach ($users as $user)
        <h3 class="">{{ $user->name }}</h3>
    @endforeach

    {{ $users->links() }}
</div>
