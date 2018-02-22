<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Advertisement extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description',
    ];

    /**
     * Get the user that made the advertisement.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Determine if the advertisement was edited.
     *
     * @return bool
     */
    public function getIsEditedAttribute()
    {
        return $this->updated_at > $this->created_at;
    }
}
