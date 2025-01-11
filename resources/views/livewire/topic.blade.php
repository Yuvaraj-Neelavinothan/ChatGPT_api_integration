<div>
    {{-- Success is as dangerous as failure. --}}
    <aside
        class="fixed top-0 right-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-gray-100 border-l border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
        aria-label="Sidenav" id="drawer-navigation">
        <span class="mb-2 text-gray-400 mx-auto text-center self-center text-4xl font-bold whitespace-nowrap dark:text-white">Bluemein GPT</span>
        <div class="overflow-y-auto py-5 px-3 h-full bg-white dark:bg-gray-800">

            <button wire:click ="newChat" type="button"
                class="text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800">
                New Chat
                <svg class="w-5 h-5 ms-2 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M14 4.182A4.136 4.136 0 0 1 16.9 3c1.087 0 2.13.425 2.899 1.182A4.01 4.01 0 0 1 21 7.037c0 1.068-.43 2.092-1.194 2.849L18.5 11.214l-5.8-5.71 1.287-1.31.012-.012Zm-2.717 2.763L6.186 12.13l2.175 2.141 5.063-5.218-2.141-2.108Zm-6.25 6.886-1.98 5.849a.992.992 0 0 0 .245 1.026 1.03 1.03 0 0 0 1.043.242L10.282 19l-5.25-5.168Zm6.954 4.01 5.096-5.186-2.218-2.183-5.063 5.218 2.185 2.15Z"
                        clip-rule="evenodd" />
                </svg>
            </button>

            <h4 class="text-xl font-semibold text-gray-500 text-right mt-4 mr-0 mb-0 dark:text-white">Topics:</h4>

            <ul class="pt-5 mt-1 space-y-2 border-t border-gray-200 dark:border-gray-700">

                @foreach ($conversation as $con)
                    <li>
                        <a wire:click="setConId('{{ $con->id }}')"
                            class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 cursor-pointer dark:hover:bg-gray-700 dark:text-white group">
                            <span class="ml-3">{{ $con->topic }}</span>
                        </a>
                    </li>
                @endforeach


            </ul>
        </div>
    </aside>
</div>
