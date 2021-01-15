<x-guest-layout>
    <div class="mx-auto bg-white w-full md:w-8/12 md:rounded-t-md my-2 shadow-md relative z-0">
        <div class="relative">
            <div class="absolute h-full w-full bg-black opacity-30 md:rounded-t-md"></div>
            <img src="{{ asset('storage/'.$article->featuredImage) }}" class="h-96 w-full md:rounded-t-md" alt="">
            <div class="absolute transform -translate-y-full -mt-4 text-white w-full">
                <div class="flex items-center justify-between">
                    <a class="flex items-center" href="#">
                        <img class="mx-4 w-10 h-10 object-cover rounded-full sm:block ring-2 ring-white"
                            src="https://images.unsplash.com/photo-1502980426475-b83966705988?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=373&q=80"
                            alt="avatar">
                        <h1 class="font-semibold">{{$article->user->name}}</h1>
                    </a>
                    <h1 class="mx-4 font-semibold">{{ date('M jS Y', strtotime($article->created_at)) }}</h1>
                </div>
            </div>
        </div>
        <h1 class="font-bold text-4xl p-4">
            {{$article->title}}
        </h1>
        <div class="p-8 text-lg">
            {!!$article->content!!}
        </div>
    </div>
</x-guest-layout>