<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Parcel;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['parcel_id', 'item', 'weight', 'cargo_type', 'amount', 'additional_charges'];
    
    public function parcel() {
        return $this->belongsTo(Parcel::class);
    }
}
