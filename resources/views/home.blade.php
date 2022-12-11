<x-layout>

    <div class="bg-violet-100">
        <div class="relative flex items-top justify-center bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                <a href="posts">Tutti i post</a>

                @if (Route::has('login'))
                @auth
                <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Accedi</a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Registrati</a>
                @endif
                @endauth
            </div>
            @endif


            <section class="px-6 py-4 bg-white">

                <div class="pt-10 md:pt-20 pb-20 text-xl text-center">
                    <p>Das home page.</p>
                </div>

                <div class="w-1/3 pt-10 pb-20 text-md text-center">
                    <p class="pb-4">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ea est sint hic, officiis consectetur atque dignissimos, animi id illum sunt porro pariatur rem deserunt. Nesciunt quisquam ipsa at qui necessitatibus!</p>
                    <p class="pb-4">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ea est sint hic, officiis consectetur atque dignissimos, animi id illum sunt porro pariatur rem deserunt. Nesciunt quisquam ipsa at qui necessitatibus!</p>
                    <p class="pb-4">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ea est sint hic, officiis consectetur atque dignissimos, animi id illum sunt porro pariatur rem deserunt. Nesciunt quisquam ipsa at qui necessitatibus!</p>
                    <p class="pb-4">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ea est sint hic, officiis consectetur atque dignissimos, animi id illum sunt porro pariatur rem deserunt. Nesciunt quisquam ipsa at qui necessitatibus!</p>
                    <p class="pb-4">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ea est sint hic, officiis consectetur atque dignissimos, animi id illum sunt porro pariatur rem deserunt. Nesciunt quisquam ipsa at qui necessitatibus!</p>
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