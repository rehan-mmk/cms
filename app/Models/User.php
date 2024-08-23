<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use App\Models\Branch;
use App\Models\Role;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public function branch() {
        return $this->belongsTo(Branch::class);
    }
 
    public function role() {
        return $this->belongsTo(Role::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fullname',
        'email',
        'role_id',
        'branch_id',
        'picture',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }



    
    public function getPictureAttribute($value){
        if($value){
            return $value;
        }
        else {
            return asset('public/images/ProfileImages/dummy.jpg');
        }
    }

    // public function getPictureAttribute($value){
    //     if($value){
    //         return asset('common/images/'.$value);
    //     }else{
    //         return asset('common/images/no-image.png');
    //     }
    // }
}
