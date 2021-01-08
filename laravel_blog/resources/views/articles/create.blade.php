<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Article') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($errors->any())
                    @foreach ($errors->all() as $error)
                    <div
                    class="bg-red-200 px-6 py-4 mx-2 my-4 rounded-md text-lg flex items-center mx-auto w-3/4 xl:w-2/4"
                    >
                    <svg
                    viewBox="0 0 24 24"
                    class="text-red-600 w-5 h-5 sm:w-5 sm:h-5 mr-3"
                    >
                    <path
                    fill="currentColor"
                    d="M11.983,0a12.206,12.206,0,0,0-8.51,3.653A11.8,11.8,0,0,0,0,12.207,11.779,11.779,0,0,0,11.8,24h.214A12.111,12.111,0,0,0,24,11.791h0A11.766,11.766,0,0,0,11.983,0ZM10.5,16.542a1.476,1.476,0,0,1,1.449-1.53h.027a1.527,1.527,0,0,1,1.523,1.47,1.475,1.475,0,0,1-1.449,1.53h-.027A1.529,1.529,0,0,1,10.5,16.542ZM11,12.5v-6a1,1,0,0,1,2,0v6a1,1,0,1,1-2,0Z"
                    ></path>
                </svg>
                <span class="text-red-800">{{ $error }}</span>
            </div>
            @endforeach
            @endif
            <form method="POST" action="{{ route('storeArticle') }}" class="max-w-3xl mx-auto"  enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                <div>
                 <x-label for="title" value="Title" />
                 <x-input type="text" name="title" class="block mt-1 w-full" id="title" autofocus required />
             </div>
             <div class="mt-4">
                <x-label for="featuredImage" value="Featured Image:" />
                <div class="flex items-center">
                    <x-input type="text" id="featuredImage" class="truncate flex-grow mr-2" disabled required value="File name..." />
                    <label class="cursor-pointer">
                        <span class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Select a file <i class="ml-2 gg-software-upload"></i></span>
                        <input type='file' name="featuredImage" class="hidden" onchange="document.getElementById('featuredImage').value= this.files[0].name" />
                    </label>
                </div>
            </div>
            <div class="mt-4">
                <x-label for="content" value="Content" />
                <textarea name="content" id="content" cols="30" rows="20" class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
            </div>
            <div class="mt-4">
                <x-label for="summary" value="Summary (max: 400)" />
                <textarea name="summary" id="summary" cols="30" rows="5" maxlength="300" class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
            </div>
            <div class="mt-4">
                <x-label for="category" value="Category" />
                <x-input id="category_id" name="category_id" type="text" class="mr-4" />
                <x-button>Create article</x-button>
            </div>
        </form>
    </div>
</div>
</div>
</div>
<script src="https://cdn.tiny.cloud/1/m0t1mzzn66cmxazpmekymmuo0zcgxm7a5m63dgg0jnl71znm/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
      selector: '#content',
      plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak codesample code imagetools preview',
      toolbar_mode: 'floating',
  });
</script>
</x-app-layout>
