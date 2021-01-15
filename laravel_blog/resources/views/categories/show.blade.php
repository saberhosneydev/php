<x-guest-layout>
    <div class="grid gap-1 grid-flow-row grid-cols-1 md:grid-cols-2 mx-auto max-w-max">
        @foreach($category->articles as $article)
        <div class="max-w-xl px-10 mx-2 my-4 py-6 bg-white rounded-lg shadow-md inline-block">
            <div class="flex justify-between items-center">
                <span class="font-light text-gray-600">{{ date('d M Y', strtotime($article->created_at)) }}</span>
                <a class="px-2 py-1 bg-gray-600 text-gray-100 font-bold rounded hover:bg-gray-500"
                    href="{{ route('category.show', ['category' => $article->category->name]) }}">{{strtoupper($article->category->name)}}</a>
            </div>
            <div class="mt-2">
                <a class="text-2xl text-gray-700 font-bold hover:text-gray-600"
                    href="{{ $article->category->name }}/{{ $article->slug }}">{{$article->title}}</a>
                <p class="mt-2 text-gray-600">{{Str::of($article->summary)->limit(300, ' (...)')}}</p>
            </div>
            <div class="flex justify-between items-center mt-4">
                <a class="text-blue-600 hover:underline" href="{{ $article->category->name }}/{{ $article->slug }}">Read
                    more</a>
                <div>
                    <a class="flex items-center" href="#">
                        <img class="mx-4 w-10 h-10 object-cover rounded-full hidden sm:block"
                            src="https://images.unsplash.com/photo-1502980426475-b83966705988?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=373&q=80"
                            alt="avatar">
                        <h1 class="text-gray-700 font-bold">{{$article->user->name}}</h1>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</x-guest-layout>