<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'business_email',
        'name',
        'type',
        'abn',
        'account_number',
    ];

    /**
     * Get the user that owns the business detail.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
