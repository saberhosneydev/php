<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @if(count($articles) > 0)
        @foreach($articles as $article)
        <div class="max-w-xl px-10 my-4 py-6 bg-white rounded-lg shadow-md mx-auto">
            <div class="flex justify-between items-center">
                <span class="font-light text-gray-600">{{ date('d M Y', strtotime($article->created_at)) }}</span>
                <a class="px-2 py-1 bg-gray-600 text-gray-100 font-bold rounded hover:bg-gray-500"
                    href="{{ route('category.show', ['category' => $article->category->name]) }}">{{strtoupper($article->category->name)}}</a>
            </div>
            <div class="mt-2">
                <a class="text-2xl text-gray-700 font-bold hover:text-gray-600"
                    href="{{ route('articles.show', ['category' => $article->category->name, 'article' => $article->slug]) }}">{{$article->title}}</a>
                <p class="mt-2 text-gray-600">{{Str::of($article->summary)->limit(300, ' (...)')}}</p>
            </div>
            <div class="flex justify-between items-center mt-4">
                <a class="text-blue-600 hover:underline"
                    href="{{ route('articles.show', ['category' => $article->category->name, 'article' => $article->slug]) }}">Read
                    more</a>
                <div>
                    <a class="flex items-center" href="#">
                        <img class="mx-4 w-10 h-10 object-cover rounded-full sm:block"
                            src="https://images.unsplash.com/photo-1502980426475-b83966705988?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=373&q=80"
                            alt="avatar">
                        <h1 class="text-gray-700 font-bold">{{$article->user->name}}</h1>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <div class="bg-blue-200 px-6 py-4 my-4 rounded-md text-lg flex items-center mx-auto w-3/4 xl:w-2/4">
            <svg viewBox="0 0 24 24" class="text-blue-600 w-5 h-5 sm:w-5 sm:h-5 mr-3">
                <path fill="currentColor"
                    d="M12,0A12,12,0,1,0,24,12,12.013,12.013,0,0,0,12,0Zm.25,5a1.5,1.5,0,1,1-1.5,1.5A1.5,1.5,0,0,1,12.25,5ZM14.5,18.5h-4a1,1,0,0,1,0-2h.75a.25.25,0,0,0,.25-.25v-4.5a.25.25,0,0,0-.25-.25H10.5a1,1,0,0,1,0-2h1a2,2,0,0,1,2,2v4.75a.25.25,0,0,0,.25.25h.75a1,1,0,1,1,0,2Z">
                </path>
            </svg>
            <span class="text-blue-800"> Maybe start by creating a new article ? </span>
        </div>
        @endif
    </div>
</x-app-layout>