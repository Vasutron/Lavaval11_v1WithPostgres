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
            <span class="text-green-500">
                {{--  ending ...  --}}
                <svg aria-hidden="true"
                class="w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M50 0C22.386 0 0 22.386 0 50s22.386 50 50 50 50-22.386 50-50S77.614 0 50 0zm0 90c-22.056 0-40-17.944-40-40S27.944 10 50 10s40 17.944 40 40-17.944 40-40 40zm0-70c-19.882 0-36 16.118-36 36h8c0-17.673 14.327-32 32-32s32 14.327 32 32h8c0-19.882-16.118-36-36-36z"
                        fill="currentColor" />
                    <path
                        d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.079 33.5539C95.2932 28.8227 89.9781 26 84 26c-6.627 0-12.308 4.013-14.75 9.75c-1.083-0.25-2.192-0.45-3.25-0.75C61.308 33.013 55.627 29 49 29c-5.978 0-11.293 2.822-13.079 7.5539c-1.783 4.7312 0.002 10.4644 4.25 12.4461c-0.25 1.083-0.45 2.192-0.75 3.25C37.013 61.308 33 67.013 33 73c0 5.978 2.822 11.293 7.5539 13.079c4.7312 1.783 10.4644-0.002 12.4461-4.25c1.083 0.25 2.192 0.45 3.25 0.75C61.308 86.987 67.013 91 73 91c5.978 0 11.293-2.822 13.079-7.5539c1.783-4.7312-0.002-10.4644-4.25-12.4461c0.25-1.083 0.45-2.192 0.75-3.25C86.987 61.308 91 55.627 91 49c0-5.978-2.822-11.293-7.5539-13.079c-4.7312-1.783-10.4644 0.002-12.4461 4.25c-1.083-0.25-2.192-0.45-3.25-0.75C62.013 37.013 56.308 33 50 33c-5.978 0-11.293 2.822-13.079 7.5539c-1.783 4.7312 0.002 10.4644 4.25 12"
                        fill="currentColor">
                        <animateTransform
                            attributeName="transform"
                            type="rotate"
                            from="0 50 50"
                            to="360 50 50"
                            dur="2s"
                            repeatCount="indefinite" />
                    </path>
                </svg>
            </span>
        </div>

        <button
            type="button"
            wire:click.prevent="ReloadList"
            class="block mt-3 px-4 py-2 bg-teal-500 text-white font-semibold rounded hover:bg-teal-600">
            Reload List
        </button>

        <button wire:loading.class.remove="bg-blue-500" wire:loading.attr="disabled" type="submit"
            class="block mt-3 px-4 py-2 bg-teal-500 text-white font-semibold rounded hover:bg-teal-600">Register+
        </button>
    </form>

    <div class="text-center mt-5"></div>
        <p class="text-center text-sm text-gray-500">Version 1.0.0</p>
    </div>
</div>
