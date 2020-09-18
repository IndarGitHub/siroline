<?php

namespace App\Repositories;

use App\Models\detail_kelas_santri;
use App\Repositories\BaseRepository;

/**
 * Class detail_kelas_santriRepository
 * @package App\Repositories
 * @version March 31, 2020, 12:49 pm UTC
*/

class detail_kelas_santriRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'santri_id'
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
        return detail_kelas_santri::class;
    }
}
