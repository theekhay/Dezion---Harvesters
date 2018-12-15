<?php

namespace App\Repositories;

use App\Models\BranchMemberType;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class BranchMemberTypeRepository
 * @package App\Repositories
 * @version December 15, 2018, 10:30 am UTC
 *
 * @method BranchMemberType findWithoutFail($id, $columns = ['*'])
 * @method BranchMemberType find($id, $columns = ['*'])
 * @method BranchMemberType first($columns = ['*'])
*/
class BranchMemberTypeRepository extends BaseRepository
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
        return BranchMemberType::class;
    }
}
