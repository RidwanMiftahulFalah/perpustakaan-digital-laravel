<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Edit Patron Data') }}
    </h2>
  </x-slot>

  <div class="py-4">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">

          <form action="{{ route('patrons.update', $patron->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
              <label for="name" class="block font-medium text-sm text-gray-700">
                Full Name
              </label>
              <input type="text" name="name" id="name"
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                value="{{ $patron->name }}">
            </div>

            <div class="mb-3">
              <label for="nik" class="block font-medium text-sm text-gray-700">
                NIK
              </label>
              <input type="text" name="nik" id="nik"
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                value="{{ $patron->nik }}">
            </div>

            <div class="mb-3">
              <label for="phone" class="block font-medium text-sm text-gray-700">
                Phone
              </label>
              <input type="text" name="phone" id="phone"
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                value="{{ $patron->phone }}">
            </div>

            <div class="mb-3">
              <label for="email" class="block font-medium text-sm text-gray-700">
                Email
              </label>
              <input type="email" name="email" id="email"
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                value="{{ $patron->email }}">
            </div>

            <div class="mb-3">
              <label for="birthdate" class="block font-medium text-sm text-gray-700">
                Birthdate
              </label>
              <input type="date" name="birthdate" id="birthdate"
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                value="{{ $patron->birthdate }}">
            </div>

            <div class="mb-3">
              <label for="address" class="block font-medium text-sm text-gray-700">
                Address
              </label>
              <textarea name="address" id="address" cols="30" rows="5"
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ $patron->address }}</textarea>
            </div>

            <button type="submit"
              class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Submit</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
