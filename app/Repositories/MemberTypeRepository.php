<?php

namespace App\Repositories;

use App\Models\MemberType;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class MemberTypeRepository
 * @package App\Repositories
 * @version December 12, 2018, 12:23 am UTC
 *
 * @method MemberType findWithoutFail($id, $columns = ['*'])
 * @method MemberType find($id, $columns = ['*'])
 * @method MemberType first($columns = ['*'])
*/
class MemberTypeRepository extends BaseRepository
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
        return MemberType::class;
    }
}
