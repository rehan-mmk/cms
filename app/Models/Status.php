<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Parcel;


class Status extends Model {
    use HasFactory;

    public function parcels() {
        return $this->hasMany(Parcel::class);
    }
}
