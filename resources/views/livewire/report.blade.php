<div>
    <x-slot name="title">
        Report
    </x-slot>
    <div class="container my-10">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 ">
            <div class="bg-purple-600 p-5 my-5">
                <h1 class="text-4xl text-white">Date Wise Report</h1>
                <input type="date"
                    class="w-full py-3 px-2 text-sm text-gray-700 placeholder-gray-900 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-dark focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"
                    wire:model='dateReport'>
                <button
                    class="px-4 py-2 my-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                    type="submit" wire:click.prevent="getDateReport">
                    Date Wise Report
                </button>
            </div>
            <div class="bg-purple-600 p-5 my-5">
                <h1 class="text-4xl text-white">Month Wise Report</h1>
                <input type="month"
                    class="w-full py-3 px-2 text-sm text-gray-700 placeholder-gray-900 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-dark focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"
                    wire:model='monthReport'>
                <button
                    class="px-4 py-2 my-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                    type="submit" wire:click.prevent="getMonthReport">
                    Month Wise Report
                </button>
            </div>
        </div>
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
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @if ($reports != '')
                            @foreach ($reports as $reports)
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3">
                                        <div class="flex items-center text-sm">
                                            <div>
                                                <p class="font-semibold">{{ $reports->id }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ $reports->students->name }}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ $reports->books->book_name }}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ $reports->issue_date }}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ $reports->return_date }}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ $reports->issue_status == 'Y' ? 'Return' : 'Not Return' }}
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
