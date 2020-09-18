<?php

namespace App\Repositories;

use App\Models\detail_nilai_ujian_tulis;
use App\Repositories\BaseRepository;

/**
 * Class detail_nilai_ujian_tulisRepository
 * @package App\Repositories
 * @version March 19, 2020, 1:58 pm UTC
*/

class detail_nilai_ujian_tulisRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'santri_id',
        'detail_mapel_id',
        'nilai_angka',
        'nilai_huruf'
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
        return detail_nilai_ujian_tulis::class;
    }
}
