<x-layout>

    <div class="bg-violet-900">

        <div class="m-auto p-6 text-white">
            <a href="posts">Tutti i post</a>

        </div>
        <div class="m-auto p-6 text-white">
            <a href="/auth/google/login">Log In with Google</a>
        </div>

        <div class="m-auto p-6">
            <a href="/auth/facebook/login" class="flex items-center justify-center w-full px-4 py-2 mt-2 space-x-3 text-sm text-center bg-blue-500 text-white transition-colors duration-200 transform border rounded-lg dark:text-gray-300 dark:border-gray-300 hover:bg-gray-600 dark:hover:bg-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                </svg>
                <span class="text-sm text-white dark:text-gray-200">Log In with Facebook</span></a>
        </div>

        <section class="px-6 py-4 bg-white">

            <div class="pt-10 md:pt-20 pb-20 text-xl text-center">
                <p>Das home page.</p>
            </div>

        </section>

    </div>

    <!-- FOOTER - newsletter -->
    <div>
        <div id='newsletter' class="bg-violet-400 border border-black border-opacity-5 rounded-3xl text-center py-8 px-8 shadow-md">

            <h5 class="pt-2 text-3xl text-gray-700">Iscriviti alla nostra newsletter</h5>

            @error('email')
            <span class="text-lg text-red-500">{{ $message }}</span>
            @enderror

            <div class="mt-6">
                <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                    <form method="POST" action="/newsletter" class="lg:flex text-sm">
                        @csrf
                        <div class="lg:py-3 lg:px-5 flex items-center">
                            <label for="email" class="hidden lg:inline-block">
                                <img class="lg:pr-2" src="./img/mailbox-icon.svg" alt="mailbox letter">
                            </label>
                            <input name="email" type="text" placeholder="Indirizzo email" class="lg:bg-transparent py-2 lg:py-0 pl-2 border-none focus:border-none">
                        </div>

                        <button type="submit" class="transition-colors duration-300 bg-violet-500 hover:bg-violet-600 mt-4 lg:mt-0 lg:ml-3 rounded-3xl lg:rounded-r-full text-sm tracking-wide font-semibold text-white uppercase py-3 px-8">
                            Iscriviti
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-layout>