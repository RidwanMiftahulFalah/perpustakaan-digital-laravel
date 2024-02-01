<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Add New Book') }}
    </h2>
  </x-slot>

  <div class="py-4">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">

          <form action="{{ route('books.store') }}" method="POST">
            @csrf

            <div class="mb-3">
              <label for="title" class="block font-medium text-sm text-gray-700">
                Title
              </label>
              <input type="text" name="title" id="title"
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                value="{{ old('title') }}">
            </div>

            <div class="mb-3">
              <label for="author" class="block font-medium text-sm text-gray-700">
                Author
              </label>
              <select name="author_id" id="author_id"
                class="block w-60 p-2.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500">
                @foreach ($authors as $author)
                  <option value="{{ $author->id }}">
                    {{ $author->name }}
                  </option>
                @endforeach
              </select>
            </div>

            <div class="mb-3">
              <label for="publish_date" class="block font-medium text-sm text-gray-700">
                Publication Date
              </label>
              <input type="date" name="publish_date" id="publish_date"
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                value="{{ old('publish_date') }}">
            </div>

            <button type="submit"
              class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Submit</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
