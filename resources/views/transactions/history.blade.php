<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Transactions History') }}
    </h2>
  </x-slot>

  <div class="py-4">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">

          <a href="{{ route('transactions.index') }}"
            class="inline-flex items-center mb-3 px-4 py-2 bg-emerald-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-emerald-500 focus:bg-emerald-500 active:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 transition ease-in-out duration-150">Issue a Book</a>

          <div class="max-w-screen overflow-auto">
            <table class="w-full rounded-lg table-auto">
              <thead class="bg-sky-800 text-white text-center">
                <tr>
                  <th class="py-2 px-2 rounded-tl-lg">#</th>

                  <th class="py-2 px-2">User</th>

                  <th class="py-2 px-2">Patron Name</th>

                  <th class="py-2 px-2">Book Title</th>

                  <th class="py-2 px-2">Date</th>

                  <th class="py-2 px-2">Status</th>

                  <th class="py-2 px-2 rounded-tr-lg">Option</th>
                </tr>
              </thead>

              <tbody class="text-center bg-slate-200">
                @if ($transactions->count())
                  @foreach ($transactions as $transaction)
                    <tr class="{{ $loop->iteration != $transactions->count() ? 'border-b border-sky-800' : '' }}">
                      <td
                        class="border-r border-r-sky-800 {{ $loop->iteration == $transactions->count() ? 'rounded-bl-lg' : '' }}">
                        {{ $loop->iteration }}</td>

                      <td>{{ $transaction->user->name }}</td>

                      <td>{{ $transaction->patron->name }}</td>

                      <td>{{ $transaction->book->title }}</td>

                      <td>{{ $transaction->date }}</td>

                      <td class="py-3 px-2 flex justify-center">
                        <div
                          class="py-1 w-20 text-sm text-white font-bold rounded-full {{ $transaction->status === 'On Loan' ? 'bg-amber-500' : 'bg-emerald-700' }}">
                          {{ $transaction->status }}
                        </div>
                      </td>

                      <td
                        class="w-1/5 py-3 px-2 border-l border-l-sky-800 {{ $loop->iteration === $transactions->count() ? 'rounded-br-lg' : '' }}">
                        @if ($transaction->status == 'On Loan')
                          <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <button type="submit"
                              class="inline-flex items-center px-4 py-2 bg-emerald-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-emerald-500 focus:bg-emerald-500 active:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 transition ease-in-out duration-150">
                              Mark as Returned
                            </button>
                          </form>
                        @else
                          <div
                            class="inline-flex items-center px-4 py-2 bg-slate-400 border border-transparent rounded-md font-semibold text-xs text-slate-200 uppercase tracking-widest ">
                            Mark as Returned
                          </div>
                        @endif
                      </td>
                    </tr>
                  @endforeach
                @else
                  <td colspan="7" class="h-14">Data not found.</td>
                @endif
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
