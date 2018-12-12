<?php

namespace App\Repositories;

use App\Models\Setting;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SettingRepository
 * @package App\Repositories
 * @version December 11, 2018, 11:33 pm UTC
 *
 * @method Setting findWithoutFail($id, $columns = ['*'])
 * @method Setting find($id, $columns = ['*'])
 * @method Setting first($columns = ['*'])
*/
class SettingRepository extends BaseRepository
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
        return Setting::class;
    }
}
