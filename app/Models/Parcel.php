<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Status;
use App\Models\Item;

class Parcel extends Model {
    use HasFactory;

    public function status() {
        return $this->belongsTo(Status::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
