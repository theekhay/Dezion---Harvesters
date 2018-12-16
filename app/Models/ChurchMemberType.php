<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="ChurchMemberType",
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
class ChurchMemberType extends Model
{
    use SoftDeletes;

    public $table = 'church_member_types';


    protected $dates = ['deleted_at'];


    public $guarded = [
        //'created_by'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name', 'church_id', 'created_by'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

        'name'      => 'required|alpha_dash|unique_with:church_member_types,church_id',
        'church_id' => 'required|exists:churches,id|numeric',
    ];



    /**
     * returns the church this member type belongs to
     * @return App\Models\Church
     */
    public function getMemberTypes()
    {
        return $this->belongsTo(Church::class);
    }


}
