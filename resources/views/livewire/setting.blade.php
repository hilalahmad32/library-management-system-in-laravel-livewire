<div>
    <x-slot name="title">{{ __('Setting') }}</x-slot>

    @if (session()->has('success'))
        <div class="bg-green-400 p-5 rounded my-4">
            <b>{{ session('success') }}</b>
        </div>
    @endif
    @if ($showTable == true)
        <div class="w-full overflow-hidden rounded-lg shadow-xs my-4">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Id</th>
                            <th class="px-4 py-3">Return days</th>
                            <th class="px-4 py-3">Fine</th>
                            <th class="px-4 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <div>
                                        <p class="font-semibold">{{ $settings->id }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $settings->return_days }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $settings->fine }}
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm">
                                    <button
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Edit" wire:click="editSetting({{ $settings->id }})">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                            </path>
                                        </svg>
                                    </button>

                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    @endif


    @if ($updateForm == true)
        <button
            class="px-4 py-2 my-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-black-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
            type="submit" wire:click="goBack">
            Go Back
        </button>
        <form action="" wire:submit.prevent="update({{ $setting_id }})">
            <input
                class="w-full py-3 px-2 text-sm text-gray-700 placeholder-gray-900 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-dark focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"
                type="text" placeholder="Update return days" wire:model='return_days' />
            <br>
            <br>
            <input
                class="w-full py-3 px-2 text-sm text-gray-700 placeholder-gray-900 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-dark focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"
                type="text" placeholder="Update Fine" wire:model='fine' />
            <button
                class="px-4 py-2 my-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                type="submit">
                Update Setting
            </button>
        </form>
        <!-- End of modal backdrop -->
    @endif

</div>

</div>
