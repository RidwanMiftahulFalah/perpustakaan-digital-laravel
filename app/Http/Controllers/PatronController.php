<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePatronRequest;
use App\Http\Requests\UpdatePatronRequest;
use App\Models\Patron;
use Illuminate\Http\Request;

class PatronController extends Controller {
  /**
   * Display a listing of the resource.
   */
  public function index(Request $request) {
    if ($request->search) {
      $patrons = Patron::where('name', 'like', '%' . $request->search . '%')->get();
    } else {
      $patrons = Patron::all();
    }

    return view('patrons.index', compact('patrons'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create() {
    return view('patrons.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request) {
    Patron::create($request->all());

    return redirect()->route('patrons.index')->with('message', 'New Patron Data Added Successfully');
  }

  /**
   * Display the specified resource.
   */
  public function show(Patron $patron) {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Patron $patron) {
    return view('patrons.edit', compact('patron'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Patron $patron) {
    $patron->update($request->all());

    return redirect()->route('patrons.index')->with('message', 'Patron Data Edited Successfully');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Patron $patron) {
    $patron->deleteOrFail();

    return redirect()->route('patrons.index')->with('message', 'Patron Data Deleted Successfully');

  }
}
