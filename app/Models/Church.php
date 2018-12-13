<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Church extends Model
{
    use SoftDeletes;


    protected $dates = ['deleted_at'];

    public $guarded = [

    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [

    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        //
    ];


    /**
     * Defines the relationship between a church and a branch
     */
    public function branches()
    {
        return $this->hasMany(Branch::class, 'church_id');
    }


    public function members()
    {
        //return $this->hasManyThrough(Memb::class)
    }
}
