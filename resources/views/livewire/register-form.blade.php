<div class="mt-10 p-5 mx-auto sm:w-full sm:max-w-sm shadow border-teal-500 border-t-2">
    <div class="flex">
        <h2 class="text-center font-semibold text-2x text-gray-800 mt-5">Create New Accont</h2>
    </div>

    @if (session('success'))
        <span class="px-3 py-3 bg-green-600 text-with rounded"> {{ session('success') }} </span>
    @endif
    <form class="p-5" wire:submit="create" action="">
        @foreach (['name', 'email', 'password'] as $field)

            <label class="block text-lg font-medium text-slate-700">{{ $field }}</label>

            <input class="block rounded border border-gray-100 px-3 py-1 mb-1 mt-1 text-black"
                wire:model="{{ $field }}"
                type="{{ $field == 'password' ? 'password' : 'text' }}"
                placeholder="{{ $field }}">

            @error($field)
                <p class="text-xs text-red-500 block">{{ $message }}</p>
            @enderror

        @endforeach

        <label class="block text-sm font-medium text-slate-700">Profile Picture</label>
        <input wire:model="image" accept="image-png, image/jpeg" type="file" id="image"
            class="block rounded border border-gray-100 px-3 py-1 mb-1 mt-1 text-black">

        @error('image')
            <span class="text-xs text-red-500 block">{{ $message }}</span>
        @enderror

        @if ($image)
            <img src="{{ $image->temporaryUrl() }}" alt="profile picture" class="rounded w-10 h-10 mt-5 block">

        @endif

        <div wire:loading wire:target="image">
            <span class="text-green-500">Uploading ...</span>
        </div>

        <div wire:loading.delay.longest>
            <span class="text-green-500">ending ...</span>
        </div>

        <button wire:loading.class.remove="bg-blue-500" wire:loading.attr="disabled" type="submit"
            class="block mt-3 px-4 py-2 bg-teal-500 text-white font-semibold rounded hover:bg-teal-600">Register+
        </button>
    </form>

    <div class="text-center mt-5"></div>
        <p class="text-center text-sm text-gray-500">Version 1.0.0</p>
    </div>
</div>
