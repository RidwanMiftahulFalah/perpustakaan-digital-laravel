<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Authors') }}
    </h2>
  </x-slot>

  <div class="py-4">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">

          <a href="{{ route('authors.create') }}"
            class="inline-flex items-center mb-3 px-4 py-2 bg-emerald-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-emerald-500 focus:bg-emerald-500 active:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 transition ease-in-out duration-150">Add New Author</a>

          <div class="max-w-screen overflow-auto">
            <table class="w-full rounded-lg table-auto">
              <thead class="bg-sky-800 text-white text-center">
                <tr>
                  <th class="py-2 px-2 rounded-tl-lg">#</th>

                  <th class="py-2 px-2">Name</th>

                  <th class="py-2 px-2 rounded-tr-lg">Option</th>
                </tr>
              </thead>

              <tbody class="text-center bg-slate-200">
                @if ($authors->count())
                  @foreach ($authors as $author)
                    <tr class="{{ $loop->iteration != $authors->count() ? 'border-b border-sky-800' : '' }}">
                      <td
                        class="border-r border-r-sky-800 {{ $loop->iteration == $authors->count() ? 'rounded-bl-lg' : '' }}">
                        {{ $loop->iteration }}</td>

                      <td>{{ $author->name }}</td>

                      <td
                        class="w-1/5 py-2
                          border-l border-l-sky-800 {{ $loop->iteration === $authors->count() ? 'rounded-br-lg' : '' }}">
                        <ul>
                          <li>
                            <a href="{{ route('authors.edit', $author->id) }}"
                              class="inline-flex items-center justify-center w-32 mb-1.5 py-1.5 bg-amber-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-amber-400 focus:bg-amber-400 active:bg-amber-600 focus:outline-none focus:ring-2 focus:ring-amber-400 focus:ring-offset-2 transition ease-in-out duration-150">Edit</a>
                          </li>

                          <li>
                            <form action="{{ route('authors.destroy', $author->id) }}" method="POST">
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

<table class="table table-primary table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col" class="pr-0">Options</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($authors as $author)
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $author->name }}</td>
                  <td class="d-flex flex-row gap-2">
                    <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-warning">Edit</a>

                    <form action="{{ route('authors.destroy', $author->id) }}" method="post">
                      @csrf
                      @method('DELETE')

                      <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
