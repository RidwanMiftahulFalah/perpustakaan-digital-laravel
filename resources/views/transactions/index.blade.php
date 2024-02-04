<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Transaction - Select a Patron') }}
    </h2>
  </x-slot>

  <div class="py-4">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">

          @if (session('message'))
            <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 1500)"
              class="p-3 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
              <span class="font-semibold">{{ session('message') }}</span>
            </div>
          @endif

          <div class="mb-3 w-1/2">
            <form action="{{ route('transactions.index') }}" method="get">
              @csrf

              <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
              <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                  <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                  </svg>
                </div>
                <input type="text" name="search" value="{{ request('search') }}" id="default-search"
                  class="block h-3 w-full p-6 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                  placeholder="Search Patron's Name">
                <button type="submit"
                  class="text-white absolute inset-y-0 right-2.5 top-1.5 bottom-1.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
              </div>
            </form>
          </div>

          <div class="max-w-screen overflow-auto">
            <table class="w-full rounded-lg table-auto">
              <thead class="bg-sky-800 text-white text-center">
                <tr>
                  <th class="py-2 px-2 rounded-tl-lg">#</th>

                  <th class="py-2 px-2">Name</th>

                  <th class="py-2 px-2">NIK</th>

                  <th class="py-2 px-2">Phone</th>

                  <th class="py-2 px-2">Email</th>

                  <th class="py-2 px-2 rounded-tr-lg">Option</th>
                </tr>
              </thead>

              <tbody class="text-center bg-slate-200">
                @if ($patrons->count())
                  @foreach ($patrons as $patron)
                    <tr class="{{ $loop->iteration != $patrons->count() ? 'border-b border-sky-800' : '' }}">
                      <td
                        class="border-r border-r-sky-800 {{ $loop->iteration == $patrons->count() ? 'rounded-bl-lg' : '' }}">
                        {{ $loop->iteration }}</td>

                      <td>{{ $patron->name }}</td>

                      <td>{{ $patron->nik }}</td>

                      <td>{{ $patron->phone }}</td>

                      <td>{{ $patron->email }}</td>

                      <td
                        class="w-1/5 py-2
                          border-l border-l-sky-800 {{ $loop->iteration === $patrons->count() ? 'rounded-br-lg' : '' }}">
                        <ul>
                          <li>
                            <a href="{{ route('transactions.create', ['patron_id' => $patron->id]) }}"
                              class="inline-flex items-center justify-center w-32 mb-1.5 py-1.5 bg-emerald-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-emerald-500 focus:bg-emerald-500 active:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 transition ease-in-out duration-150">Select</a>
                          </li>
                        </ul>
                      </td>
                    </tr>
                  @endforeach
                @else
                  <td colspan="6" class="h-14">Data not found.</td>
                @endif
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
