<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;


class Listing extends Model
{
    protected $fillable = [
         'bed',
            'bath',
            'area',
            'city',
            'street',
            'code',
            'street_nr',
            'price'
        ];
    use HasFactory;
    public function owner()
    {
        return $this->belongsTo(User::class, 'by_user_id');
    }
}
