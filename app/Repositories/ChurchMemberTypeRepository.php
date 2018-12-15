<?php

namespace App\Repositories;

use App\Models\ChurchMemberType;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ChurchMemberTypeRepository
 * @package App\Repositories
 * @version December 15, 2018, 10:32 am UTC
 *
 * @method ChurchMemberType findWithoutFail($id, $columns = ['*'])
 * @method ChurchMemberType find($id, $columns = ['*'])
 * @method ChurchMemberType first($columns = ['*'])
*/
class ChurchMemberTypeRepository extends BaseRepository
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
        return ChurchMemberType::class;
    }
}
