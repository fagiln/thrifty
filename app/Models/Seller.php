<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $guarded = ['id'];
    protected $fillable = [
        'username',
        'first_name',
        'last_name',
        'email',
        'alamat',
        'no_hp',
        'avatar',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        // 'remember_token',
    ];

    protected $attributes = [
        'role' => 'seller', // Nilai default untuk kolom is_active
    ];

}
