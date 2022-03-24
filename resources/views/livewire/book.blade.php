<div>
    <x-slot name="title">{{ __('Book') }}</x-slot>
    <a
        class="flex items-center justify-between p-4 mb-8 mt-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">
        <div class="flex items-center">
            <span>{{ __('Books ') }} {{ __($totalBook) }}</span>
        </div>
        <span>
            <button
                class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                wire:click="showForm">
                Create Book
            </button>
        </span>
    </a>
    @if (session()->has('success'))
        <div class="bg-green-400 p-5 rounded my-4">
            <b>{{ session('success') }}</b>
        </div>
    @endif
    @if ($showTable == true)
        {{-- category table --}}
        <div class="container">
            <div class="flex flex-grow-1">
                <input
                    class="w-75 py-3 px-2 my-4 text-sm text-gray-700 placeholder-gray-900 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-dark focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"
                    wire:model="search" type="text" placeholder="Search Here..." />
            </div>
        </div>
        <div class="w-full overflow-hidden rounded-lg shadow-xs my-4">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Id</th>
                            <th class="px-4 py-3">Book Name</th>
                            <th class="px-4 py-3">Category</th>
                            <th class="px-4 py-3">Publisher</th>
                            <th class="px-4 py-3">Author</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($books as $book)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3">
                                    <div class="flex items-center text-sm">
                                        <div>
                                            <p class="font-semibold">{{ $book->id }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $book->book_name }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $book->categories->category_name }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $book->publishers->publisher_name }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $book->authors->author_name }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $book->book_status == 'Y' ? 'Available' : 'Not Available' }}
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <button
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Edit" wire:click="editBook({{ $book->id }})">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                </path>
                                            </svg>
                                        </button>
                                        <button
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Delete" wire:click="deleteBook({{ $book->id }})">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            {{ $books->links() }}
        </div>
    @endif


    @if ($createForm == true)
        {{-- create-Category --}}
        <button
            class="px-4 py-2 my-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-black-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
            type="submit" wire:click="goBack">
            Go Back
        </button>
        <form action="" wire:submit.prevent="store">

            <input
                class="w-full py-3 px-2 my-4 text-sm text-gray-700 placeholder-gray-900 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-dark focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"
                wire:model.lazy="book_name" type="text" />
            @error('book_name')
                <span class="text-red-600">{{ $message }}</span> <br>
            @enderror
            <select wire:model.lazy="category_id"
                class="w-full py-3 px-2 my-4 text-sm text-gray-700 placeholder-gray-900 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-dark focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input">
                <option selected>Enter the category</option>
                @foreach ($categorys as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <span class="text-red-600">{{ $message }}</span> <br>
            @enderror
            <select wire:model.lazy="publisher_id"
                class="w-full py-3 px-2 my-4 text-sm text-gray-700 placeholder-gray-900 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-dark focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input">
                <option selected>Enter the publisher</option>
                @foreach ($publishers as $publisher)
                    <option value="{{ $publisher->id }}">{{ $publisher->publisher_name }}</option>
                @endforeach
            </select>
            @error('publisher_id')
                <span class="text-red-600">{{ $message }}</span> <br>
            @enderror
            <select wire:model.lazy="author_id"
                class="w-full py-3 px-2 my-4 text-sm text-gray-700 placeholder-gray-900 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-dark focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input">
                <option selected>Enter the author</option>
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->author_name }}</option>
                @endforeach
            </select>
            @error('author_id')
                <span class="text-red-600">{{ $message }}</span> <br>
            @enderror
            <button
                class="px-4 py-2 my-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                type="submit">
                Save
            </button>
        </form>
    @endif
    @if ($updateForm == true)
        {{-- update Category --}}
        <button
            class="px-4 py-2 my-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-black-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
            type="submit" wire:click="goBack">
            Go Back
        </button>
        <form action="" wire:submit.prevent="update({{ $book_id }})">
            <input
                class="w-full py-3 px-2 my-4 text-sm text-gray-700 placeholder-gray-900 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-dark focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"
                wire:model.lazy="edit_book_name" type="text" />

            <select wire:model.lazy="edit_category_id"
                class="w-full py-3 px-2 my-4 text-sm text-gray-700 placeholder-gray-900 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-dark focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input">
                <option selected>Enter the category</option>
                @foreach ($categorys as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach
            </select>

            <select wire:model.lazy="edit_publisher_id"
                class="w-full py-3 px-2 my-4 text-sm text-gray-700 placeholder-gray-900 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-dark focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input">
                <option selected>Enter the publisher</option>
                @foreach ($publishers as $publisher)
                    <option value="{{ $publisher->id }}">{{ $publisher->publisher_name }}</option>
                @endforeach
            </select>
            <select wire:model.lazy="edit_author_id"
                class="w-full py-3 px-2 my-4 text-sm text-gray-700 placeholder-gray-900 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-dark focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input">
                <option selected>Enter the author</option>
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->author_name }}</option>
                @endforeach
            </select>
            <button
                class="px-4 py-2 my-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                type="submit">
                Update
            </button>
        </form>
        <!-- End of modal backdrop -->
    @endif
</div>
