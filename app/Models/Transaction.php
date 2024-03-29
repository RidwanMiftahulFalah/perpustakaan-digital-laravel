<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model {
  use HasFactory;
  use HasUuids;

  protected $guarded = ['id'];

  public function user() {
    return $this->belongsTo(User::class);
  }

  public function patron() {
    return $this->belongsTo(Patron::class);
  }

  public function book() {
    return $this->belongsTo(Book::class);
  }
}
