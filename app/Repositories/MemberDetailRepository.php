<?php

namespace App\Repositories;

use App\Models\MemberDetail;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class MemberDetailRepository
 * @package App\Repositories
 * @version December 13, 2018, 10:36 pm UTC
 *
 * @method MemberDetail findWithoutFail($id, $columns = ['*'])
 * @method MemberDetail find($id, $columns = ['*'])
 * @method MemberDetail first($columns = ['*'])
*/
class MemberDetailRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return MemberDetail::class;
    }
}
