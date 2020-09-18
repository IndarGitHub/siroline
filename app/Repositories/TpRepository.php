<?php

namespace App\Repositories;

use App\Models\Tp;
use App\Repositories\BaseRepository;

/**
 * Class TpRepository
 * @package App\Repositories
 * @version December 20, 2019, 11:42 pm UTC
*/

class TpRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tipe_pelanggaran',
        'sanksi'
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
        return Tp::class;
    }
}
