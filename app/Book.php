<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'nr', 'user_id', 'place', 'ip', 'verf', 'end_verf_date', 'token', 'checked_in', 'paid',
    ];
    /**
     * Get the booking infomation for the user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo('App\User');
    }

}
