<div>
    <x-slot name="title">{{ __('Issue Book') }}</x-slot>
    <a
        class="flex items-center justify-between p-4 mb-8 mt-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">
        <div class="flex items-center">
            <span>{{ __('Issue Book ') }} {{ __($totalIssueBook) }}</span>
        </div>
        <span>
            <button
                class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                wire:click="showForm">
                Issue Book
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
                            <th class="px-4 py-3">Name</th>
                            <th class="px-4 py-3">Book</th>
                            <th class="px-4 py-3">Issue_date</th>
                            <th class="px-4 py-3">Return_date</th>
                            <th class="px-4 py-3">Issue_status</th>
                            <th class="px-4 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($issues as $issue)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3">
                                    <div class="flex items-center text-sm">
                                        <div>
                                            <p class="font-semibold">{{ $issue->id }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $issue->students->name }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $issue->books->book_name }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $issue->issue_date }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $issue->return_date }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $issue->issue_status == 'Y' ? 'Return' : 'Not Return' }}
                                </td>

                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <button
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Edit" wire:click="editBook({{ $issue->id }})">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                </path>
                                            </svg>
                                        </button>
                                        <button
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Delete" wire:click="deleteBook({{ $issue->id }})">
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

            {{ $issues->links() }}
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
            <select wire:model.lazy="book_id"
                class="w-full py-3 px-2 my-4 text-sm text-gray-700 placeholder-gray-900 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-dark focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input">
                <option selected>Enter the Book</option>
                @foreach ($books as $book)
                    <option value="{{ $book->id }}">{{ $book->book_name }}</option>
                @endforeach
            </select>
            @error('book_id')
                <span class="text-red-600">{{ $message }}</span> <br>
            @enderror
            <select wire:model.lazy="student_id"
                class="w-full py-3 px-2 my-4 text-sm text-gray-700 placeholder-gray-900 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-dark focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input">
                <option selected>Enter the Student</option>
                @foreach ($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                @endforeach
            </select>
            @error('student_id')
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
        {{-- create-Category --}}
        <button
            class="px-4 py-2 my-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-black-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
            type="submit" wire:click="goBack">
            Go Back
        </button>
        <div class="">
            <h4>Name :{{ $student_name }}</h4>
            <h4>Email : {{ $email }}</h4>
            <h4>phone:{{ $phone }}</h4>
            <h4>issue_date :{{ $issue_date }}</h4>
            <h4>return_date : {{ $return_date }}</h4>
            @if ($issue_status == 'Y')
                <span>Status : Returned</span>
            @else
                @if (date('Y-m-d') > $return_date)
                    <span>Fine : @php
                        $date1 = date_create(date('Y-m-d'));
                        $date2 = date_create($return_date);
                        $diff = date_diff($date1, $date2);
                        $days = $diff->format('$a');
                    @endphp {{ $days }}</span>
                @endif
            @endif

        </div>

        @if ($issue_status == 'N')
            <button
                class="px-4 py-2 my-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                type="submit" wire:click="returnBook({{ $issue_id }})">
                return
            </button>
        @endif
    @endif

</div>
