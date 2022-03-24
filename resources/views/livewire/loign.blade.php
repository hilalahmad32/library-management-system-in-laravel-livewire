<div>
    <div class="flex justify-center items-center h-full">
        <div class="my-6">
            <form action="" class="w-72" wire:submit.prevent="update">
                <input
                    class="w-72 py-3 px-2 my-4 text-sm text-gray-700 placeholder-gray-900 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-dark focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"
                    type="text" placeholder="Update Author" wire:model='edit_author_name' />
                @error('edit_author_name')
                    <span class="text-red-600">{{ $message }}</span> <br>
                @enderror
                <br>
                <input
                    class="w-72 py-3 px-2 my-4 text-sm text-gray-700 placeholder-gray-900 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-dark focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"
                    type="text" placeholder="Update Author" wire:model='edit_author_name' />
                @error('edit_author_name')
                    <span class="text-red-600">{{ $message }}</span> <br>
                @enderror
                <br>
                <button
                    class="px-4 py-2 my-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                    type="submit">
                    Update Author
                </button>
            </form>
        </div>
    </div>
</div>
