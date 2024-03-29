<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
  
class Book extends Model {
  use HasFactory;
  use HasUuids;

  protected $guarded = ['id'];

  public function author() {
    return $this->belongsTo(Author::class);
  }

  public function transactions() {
    return $this->hasMany(Transaction::class);
  }
}
