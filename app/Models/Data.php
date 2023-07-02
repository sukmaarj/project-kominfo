<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'nama_dinas',
        'email',
        'no_telp',
        'alamat',
        'file',
        'published_at',
        'status',
    ];

    protected $guarded = ['id'];


    public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}

}
