<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Branch extends Model
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

        'church_id' => 'required|integer',
        'name' => 'required|string',
    ];


    /**
     * Defines the relationship between church and branch
     */
    public function getChurch()
    {
        return $this->belongsTo(Church::class);
    }


    /**
     * returns the member types that belong to this branch
     * @return App\Models\BranchMemberType
     */
    public function getMemberTypes()
    {
        return $this->hasMany( BranchMemberType::class);
    }
}
