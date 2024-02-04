<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Models\Book;
use App\Models\Patron;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransactionController extends Controller {
  public function history() {
    $transactions = Transaction::all();

    return view('transactions.history', compact('transactions'));
  }

  /**
   * Display a listing of the resource.
   */
  public function index(Request $request) {
    if ($request->search) {
      $patrons = Patron::where('name', 'like', '%' . $request->search . '%')->get();
    } else {
      $patrons = Patron::all();
    }

    return view('transactions.index', compact('patrons'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(Request $request) {
    if ($request->search) {
      $books = Book::where('title', 'like', '%' . $request->search . '%')->get();
    } else {
      $books = Book::all();
    }
    $patron = Patron::find($request->patron_id);

    return view('transactions.create', compact('books', 'patron'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request) {
    Transaction::create([
      'book_id' => $request->book_id,
      'patron_id' => $request->patron_id,
      'date' => Carbon::now(),
      'status' => 'On Loan',
    ]);

    return redirect()->route('transactions.history')->with('message', 'Transaction Success');
  }

  /**
   * Display the specified resource.
   */
  public function show(Transaction $transaction) {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Transaction $transaction) {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Transaction $transaction) {
    $transaction->update([
      'status' => 'Returned',
    ]);

    return redirect()->route('transactions.history')->with('message', 'Transaction Completed');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Transaction $transaction) {
    //
  }
}
