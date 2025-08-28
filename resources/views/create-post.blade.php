<x-app-layout>
     <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Novo post
        </h2>
    </x-slot>
  <div class="max-w-7xl mx-auto mb-6 mt-5 bg-white rounded-sm shadow-sm p-10" >
     <form action="{{ route('post.store') }}" method="POST" class="max-w-3xl mx-auto p-6 bg-white rounded shadow">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-bold mb-2">Title</label>
            <input type="text" id="title" name="title" class="w-full px-3 py-2 border rounded">
            @error('title')
                {{ $message }}
            @enderror
        </div>
        <div class="mb-4">
            <label for="content" class="block text-gray-700 font-bold mb-2">Content</label>
            <textarea id="content" name="content" rows="5" class="w-full px-3 py-2 border rounded"></textarea>
             @error('content')
                {{ $message }}
            @enderror
        </div>

        <div class="mb-3 flex justify-between">
            <button type="submit" class="bg-blue-700 hover:bg-blue-900 text-white font-bold py-2 px-6 rounded">Create Post</button>
            <a href="{{  route('dashboard') }}" class="bg-blue-700 hover:bg-blue-900 text-white font-bold py-2 px-6 rounded">Cancel</a>
        </div>


    </form>
    </div>

</x-app-layout>

