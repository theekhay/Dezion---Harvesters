<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="MemberDetail",
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
class MemberDetail extends Model
{
    use SoftDeletes;

    public $table = 'member_details';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'branch_id', 'firstname', 'surname', 'email', 'address', 'telephone', 'created_by', 'member_type_id'
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

        'firstname' => 'required|string',
        'surname' => 'required|string',
        'email' => 'nullable|email|unique_with:member_details,branch_id',
        'telephone' => 'nullable|unique_with:member_details,branch_id',
        'branch_id' => 'required|numeric|exists:branches,id',
        'member_type_id' => 'required|numeric|exists:church_member_types,id'
    ];



    /**
     * returns the branch a member belongs to
     * @return App\Models\Branch
     */
    public function memberType()
    {
        return $this->belongsTo( MemberType::class ); // 'id', 'member_type_id'
    }


}
