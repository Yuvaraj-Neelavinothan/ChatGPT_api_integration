<div>
    <div class="relative">
        <div class="messages">
            @foreach ($messages as $message)
                @if ($message['role'] === 'user')
                    <div class="flex justify-end items-start gap-2.5">
                        <div class="flex flex-col gap-1 w-full max-w-[320px] text-right">
                            <div class="flex items-center justify-end space-x-2 rtl:space-x-reverse">
                                <span
                                    class="text-sm font-normal text-gray-500 dark:text-gray-400">{{ \Carbon\Carbon::parse($message['timestamp'])->format('d-M-y (h:i a)') }}</span>
                                <span class="text-sm font-semibold text-gray-900 dark:text-white">You</span>
                                <img class="w-8 h-8 rounded-full" src="{{ asset('logo/user.png') }}" alt="User image">
                            </div>
                            <div
                                class="flex flex-col leading-1.5 p-4 border-gray-200 bg-gray-100 rounded-s-xl rounded-se-xl dark:bg-gray-700">
                                <p class="text-sm font-normal text-gray-900 dark:text-white">{{ $message['content'] }}
                                </p>
                            </div>

                        </div>
                    </div>
                @else
                    <div class="flex justify-start items-start gap-2.5 mb-5">
                        <img class="w-8 h-8 rounded-full" src="{{ asset('logo/chatgpt.png') }}" alt="ChatGPT image">
                        <div class="flex flex-col gap-1 w-full max-w-[420px] text-left">
                            <div class="flex items-center space-x-2 rtl:space-x-reverse">
                                <span class="text-sm font-semibold text-gray-900 dark:text-white">ChatGPT</span>
                            </div>
                            <div
                                class="flex flex-col leading-1.5 p-4 border-gray-200 bg-gray-100 rounded-e-xl rounded-es-xl dark:bg-gray-700">
                                <p class="text-sm font-normal text-gray-900 dark:text-white">{{ $message['content'] }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        
        <form wire:submit.prevent="sendMessage" class="fixed mb-4 bottom-0 w-3/4 bg-gray-50 dark:bg-gray-700 shadow-md">
            <label for="chat" class="sr-only">Your message</label>
            <div class="flex items-center px-3 py-2 rounded-lg bg-gray-50 dark:bg-gray-700">
                <textarea id="chat" rows="1" wire:model="inputMessage"
                    class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Ask me..."></textarea>
                <button type="submit"
                    class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100 dark:text-blue-500 dark:hover:bg-gray-600">
                    <svg class="w-5 h-5 rotate-90 rtl:-rotate-90" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 18 20">
                        <path
                            d="m17.914 18.594-8-18a1 1 0 0 0-1.828 0l-8 18a1 1 0 0 0 1.157 1.376L8 18.281V9a1 1 0 0 1 2 0v9.281l6.758 1.689a1 1 0 0 0 1.156-1.376Z" />
                    </svg>
                    <span class="sr-only">Send message</span>
                </button>
            </div>
        </form>
    </div>
</div>
