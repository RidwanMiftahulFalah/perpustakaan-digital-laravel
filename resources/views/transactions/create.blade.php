<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Transaction - Select a Book') }}
    </h2>
  </x-slot>

  <div class="py-4">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">

          <div class="mb-3">
            <label for="patron_name" class="block font-medium text-sm text-gray-700">
              Patron Name
            </label>
            <input type="text" name="patron_name" id="patron_name"
              class="w-1/3 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
              value="{{ $patron->name }}" disabled>
          </div>

          <div class="mb-3">
            <label for="patron_nik" class="block font-medium text-sm text-gray-700">
              Patron NIK
            </label>
            <input type="text" name="patron_nik" id="patron_nik"
              class="w-1/3 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
              value="{{ $patron->nik }}" disabled>
          </div>

          <div class="mb-3">
            <label for="patron_phone" class="block font-medium text-sm text-gray-700">
              Patron Phone
            </label>
            <input type="text" name="patron_phone" id="patron_phone"
              class="w-1/3 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
              value="{{ $patron->phone }}" disabled>
          </div>

          <div class="mb-3">
            <label for="patron_email" class="block font-medium text-sm text-gray-700">
              Patron Email
            </label>
            <input type="text" name="patron_email" id="patron_email"
              class="w-1/3 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
              value="{{ $patron->email }}" disabled>
          </div>

          <div class="max-w-screen overflow-auto">
            <table class="w-full rounded-lg table-auto">
              <thead class="bg-sky-800 text-white text-center">
                <tr>
                  <th class="py-2 px-2 rounded-tl-lg">#</th>

                  <th class="py-2 px-2">Title</th>

                  <th class="py-2 px-2">Author</th>

                  <th class="py-2 px-2">Publication Date</th>

                  <th class="py-2 px-2 rounded-tr-lg">Option</th>
                </tr>
              </thead>

              <tbody class="text-center bg-slate-200">
                @if ($books->count())
                  @foreach ($books as $book)
                    <tr class="{{ $loop->iteration != $books->count() ? 'border-b border-sky-800' : '' }}">
                      <td
                        class="border-r border-r-sky-800 {{ $loop->iteration == $books->count() ? 'rounded-bl-lg' : '' }}">
                        {{ $loop->iteration }}</td>

                      <td>{{ $book->title }}</td>

                      <td>{{ $book->author->name }}</td>

                      <td>{{ $book->publish_date }}</td>

                      <td
                        class="w-1/5 py-2
                          border-l border-l-sky-800 {{ $loop->iteration === $books->count() ? 'rounded-br-lg' : '' }}">
                        <ul>
                          <li>
                            <form action="{{ route('transactions.store') }}" method="POST">
                              @csrf       
                              
                              <input type="hidden" name="book_id", value="{{ $book->id }}">
                              <input type="hidden" name="patron_id", value="{{ $patron->id }}">

                              <button type="submit"
                                class="inline-flex items-center justify-center w-32 py-1.5 bg-emerald-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-emerald-500 focus:bg-emerald-500 active:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 transition ease-in-out duration-150">Select</button>
                            </form>
                          </li>
                        </ul>
                      </td>
                    </tr>
                  @endforeach
                @else
                  <td colspan="4">Data not found.</td>
                @endif
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
