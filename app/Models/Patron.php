<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patron extends Model {
  use HasFactory;
  use HasUuids;

  protected $guarded = ['id'];

  public function transactions() {
    return $this->hasMany(Transaction::class);
  }
}
