<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="BranchMemberType",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class BranchMemberType extends Model
{
    use SoftDeletes;

    public $table = 'branch_member_types';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'branch_id', 'name'
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
        'name' => 'required|alpha_dash|unique_with:branch_member_types,branch_id',
        'branch_id' => 'required|exists:branches,id|numeric',

    ];


    /**
     * Returns the branch this memberType belongs to
     * @return App\Models\Branch
    */
    public function getBranch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }


}
