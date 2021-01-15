<!-- This example requires Tailwind CSS v2.0+ -->
<div class="relative bg-white" x-data="{ isOpen: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="flex justify-between items-center border-b-2 border-gray-100 py-6 md:justify-start md:space-x-10">
            <div class="flex justify-start lg:w-0 lg:flex-1">
                <a href="#">
                    <span class="sr-only">Workflow</span>
                    <img class="h-8 w-auto sm:h-10" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg"
                        alt="">
                </a>
            </div>
            <div class="-mr-2 -my-2 md:hidden">
                <button type="button" @click="isOpen = !isOpen"
                    class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                    <span class="sr-only">Open menu</span>
                    <!-- Heroicon name: menu -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
            <nav class="hidden md:flex space-x-10">
                <div class="relative">
                    <!-- Item active: "text-gray-900", Item inactive: "text-gray-500" -->
                    <button type="button" @mouseenter="isOpen = true" @mouseleave="isOpen = false"
                        :class="{ 'text-gray-900': isOpen, 'text-gray-500':!isOpen}"
                        class="group bg-white rounded-md text-gray-500 inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none">
                        <span>Categories</span>
                        <!--
                Heroicon name: chevron-down
  
                Item active: "text-gray-600", Item inactive: "text-gray-400"
              -->
                        <svg :class="{ 'text-gray-600': isOpen, 'text-gray-400':!isOpen}"
                            class="ml-2 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>

                    <!--
              'Solutions' flyout menu, show/hide based on flyout menu state.
  
              Entering: ""
                From: ""
                To: ""
              Leaving: ""
                From: ""
                To: ""
            -->
                    <div @mouseenter="isOpen = true" @mouseleave="isOpen = false" x-show="isOpen"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 translate-y-1"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 translate-y-1"
                        class="absolute z-10 -ml-4 mt-3 transform px-2 w-screen max-w-max sm:px-0 lg:ml-0 lg:left-1/2 lg:-translate-x-1/2">
                        <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
                            <div class="relative grid gap-6 bg-white px-5 py-6 md:p-4 sm:gap-8 sm:p-8">

                                @foreach(App\Models\Category::all() as $category)
                                <a href="{{ route('category.show', ['category' => $category->name]) }}"
                                    class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
                                    <!-- Heroicon name: chart-bar -->
                                    {{-- <svg class="flex-shrink-0 h-6 w-6 text-indigo-600"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                                    </svg> --}}
                                    <div class="capitalize">
                                        <p class="text-base font-medium text-gray-900">
                                            {{$category->name}}
                                        </p>

                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <a href="/sample" class="text-base font-medium text-gray-500 hover:text-gray-900">
                    Sample
                </a>
                <a href="https://github.com/saberhosneydev/" target="_blank"
                    class="text-base font-medium text-gray-500 hover:text-gray-900 flex items-center">
                    Github
                    <svg class="flex-shrink-0 h-4 w-4 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                    </svg>
                </a>


            </nav>
            <div class="hidden md:flex items-center justify-end md:flex-1 lg:w-0">
                @if (Route::has('login'))
                @auth
                <a href="{{ route('dashboard')}}"
                    class="whitespace-nowrap text-base font-medium text-gray-500 hover:text-gray-900">
                    Dashboard
                </a>
                @else
                <a href="{{ route('login')}}"
                    class="whitespace-nowrap text-base font-medium text-gray-500 hover:text-gray-900">
                    Login
                </a>
                @if (Route::has('register'))
                <a href="{{ route('register') }}"
                    class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                    Register
                </a>
                @endif
                @endauth
                @endif


            </div>
        </div>
    </div>

    <!--
      Mobile menu, show/hide based on mobile menu state.
  
      Entering: ""
        From: ""
        To: ""
      Leaving: ""
        From: ""
        To: ""
    -->
    <div class="absolute top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden z-40"
        :class="{ 'hidden': !isOpen }" x-transition:enter="duration-200 ease-out"
        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="duration-100 ease-in" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95">
        <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white divide-y-2 divide-gray-50">
            <div class="pt-5 pb-6 px-5">
                <div class="flex items-center justify-between">
                    <div>
                        <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg"
                            alt="Workflow">
                    </div>
                    <div class="-mr-2">
                        <button type="button" @click="isOpen = !isOpen"
                            class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                            <span class="sr-only">Close menu</span>
                            <!-- Heroicon name: x -->
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="mt-6">
                    <nav class="grid gap-y-8">
                        <a href="/sample" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
                            <!-- Heroicon name: chart-bar -->
                            <svg class="flex-shrink-0 h-6 w-6 text-indigo-600" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                            <span class="ml-3 text-base font-medium text-gray-900">
                                Sample
                            </span>
                        </a>
                        <a href="https://github.com/saberhosneydev" target="_blank"
                            class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
                            <!-- Heroicon name: chart-bar -->
                            <svg class="flex-shrink-0 h-6 w-6 text-indigo-600" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                            <span class="ml-3 text-base font-medium text-gray-900">
                                Github
                            </span>
                        </a>
                    </nav>
                </div>
            </div>
            <div class="py-6 px-5 space-y-6">
                <div class="grid grid-cols-2 gap-y-4 gap-x-8">
                    @foreach(App\Models\Category::all() as $category)
                    <a href="{{ route('category.show', ['category' => $category->name])}}"
                        class="text-base font-medium text-gray-900 hover:text-gray-700">
                        {{$category->name}}
                    </a>
                    @endforeach

                </div>
                <div>
                    @if (Route::has('login'))
                    @auth
                    <a href="{{ route('dashboard') }}"
                        class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                        Dashboard
                    </a>
                    @else
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                        Register
                    </a>
                    @endif
                    <p class="mt-6 text-center text-base font-medium text-gray-500">
                        Existing customer?
                        <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-500">
                            Login
                        </a>
                    </p>
                    @endauth
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>