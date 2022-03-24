   <!-- Desktop sidebar -->
   <aside class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0">
       <div class="py-4 text-gray-500 dark:text-gray-400">
           <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
               LMS
           </a>
           <ul class="mt-6">
               <li class="relative px-6 py-3">
                   <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                       aria-hidden="true"></span>
                   <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                       href="{{ route('dashboard') }}">
                       <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                           stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                           <path
                               d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                           </path>
                       </svg>
                       <span class="ml-4">Dashboard</span>
                   </a>
               </li>

               <li class="relative px-6 py-3">
                   <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                       aria-hidden="true"></span>
                   <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                       href="{{ route('author') }}">
                       <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                           stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                           <path
                               d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                           </path>
                       </svg>
                       <span class="ml-4">Author</span>
                   </a>
               </li>

               <li class="relative px-6 py-3">
                   <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                       aria-hidden="true"></span>
                   <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                       href="{{ route('category') }}">
                       <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                           stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                           <path
                               d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                           </path>
                       </svg>
                       <span class="ml-4">Category</span>
                   </a>
               </li>
               <li class="relative px-6 py-3">
                   <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                       aria-hidden="true"></span>
                   <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                       href="{{ route('publisher') }}">
                       <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                           stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                           <path
                               d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                           </path>
                       </svg>
                       <span class="ml-4">Publisher</span>
                   </a>
               </li>
               <li class="relative px-6 py-3">
                   <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                       aria-hidden="true"></span>
                   <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                       href="{{ route('book') }}">
                       <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                           stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                           <path
                               d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                           </path>
                       </svg>
                       <span class="ml-4">Book</span>
                   </a>
               </li>
               <li class="relative px-6 py-3">
                   <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                       aria-hidden="true"></span>
                   <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                       href="{{ route('students') }}">
                       <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                           stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                           <path
                               d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                           </path>
                       </svg>
                       <span class="ml-4">Student</span>
                   </a>
               </li>
               <li class="relative px-6 py-3">
                   <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                       aria-hidden="true"></span>
                   <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                       href="{{ route('issue_book') }}">
                       <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                           stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                           <path
                               d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                           </path>
                       </svg>
                       <span class="ml-4">Issue Book</span>
                   </a>
               </li>
               <li class="relative px-6 py-3">
                   <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                       aria-hidden="true"></span>
                   <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                       href="{{ route('report') }}">
                       <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                           stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                           <path
                               d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                           </path>
                       </svg>
                       <span class="ml-4">Report</span>
                   </a>
               </li>
               <li class="relative px-6 py-3">
                   <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                       aria-hidden="true"></span>
                   <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                       href="{{ route('setting') }}">
                       <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                           stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                           <path
                               d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                           </path>
                       </svg>
                       <span class="ml-4">Setting</span>
                   </a>
               </li>
               <li class="relative px-6 py-3 flex">
                   <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                       aria-hidden="true"></span>

                   <span class="ml-4"> @livewire('logout') </span>
                   </a>
               </li>
           </ul>
       </div>
   </aside>
   <!-- Mobile sidebar -->
