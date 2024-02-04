<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller {
  /**
   * Display a listing of the resource.
   */
  public function index(Request $request) {
    if ($request->search) {
      $authors = Author::where('name', 'like', '%' . $request->search . '%')->get();
    } else {
      $authors = Author::all();
    }

    return view('authors.index', compact('authors'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create() {
    return view('authors.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request) {
    Author::create($request->all());

    return redirect()->route('authors.index')->with('message', 'New Author Data Added Successfully');
  }

  /**
   * Display the specified resource.
   */
  public function show(Author $author) {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Author $author) {
    return view('authors.edit', compact('author'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Author $author) {
    $author->update($request->all());

    return redirect()->route('authors.index')->with('message', 'Author Data Edited Successfully');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Author $author) {
    $author->deleteOrFail();

    return redirect()->route('authors.index')->with('message', 'Author Data Deleted Successfully');
  }
}
