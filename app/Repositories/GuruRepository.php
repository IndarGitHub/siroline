<?php

namespace App\Repositories;

use App\Models\Guru;
use App\Repositories\BaseRepository;

/**
 * Class GuruRepository
 * @package App\Repositories
 * @version December 18, 2019, 7:10 am UTC
*/

class GuruRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Guru::class;
    }
}
