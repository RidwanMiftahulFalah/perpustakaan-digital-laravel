<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Patrons') }}
    </h2>
  </x-slot>

  <div class="py-4">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">

          <a href="{{ route('patrons.create') }}"
            class="inline-flex items-center mb-3 px-4 py-2 bg-emerald-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-emerald-500 focus:bg-emerald-500 active:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 transition ease-in-out duration-150">Add New Patron</a>

          <div class="max-w-screen overflow-auto">
            <table class="w-full rounded-lg table-auto">
              <thead class="bg-sky-800 text-white text-center">
                <tr>
                  <th class="py-2 px-2 rounded-tl-lg">#</th>

                  <th class="py-2 px-2">Name</th>

                  <th class="py-2 px-2">NIK</th>

                  <th class="py-2 px-2">Phone</th>

                  <th class="py-2 px-2">Email</th>

                  <th class="py-2 px-2">Birthdate</th>

                  <th class="py-2 px-2">Address</th>

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

                      <td>{{ $patron->birthdate }}</td>

                      <td>{{ $patron->address }}</td>

                      <td
                        class="w-1/7 py-2
                          border-l border-l-sky-800 {{ $loop->iteration === $patrons->count() ? 'rounded-br-lg' : '' }}">
                        <ul>
                          <li>
                            <a href="{{ route('patrons.edit', $patron->id) }}"
                              class="inline-flex items-center justify-center w-32 mb-1.5 py-1.5 bg-amber-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-amber-400 focus:bg-amber-400 active:bg-amber-600 focus:outline-none focus:ring-2 focus:ring-amber-400 focus:ring-offset-2 transition ease-in-out duration-150">Edit</a>
                          </li>

                          <li>
                            <form action="{{ route('patrons.destroy', $patron->id) }}" method="POST">
                              @csrf
                              @method('DELETE')

                              <button type="submit"
                                class="inline-flex items-center justify-center w-32 py-1.5 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">Delete</button>
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
