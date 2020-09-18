<?php

namespace App\Repositories;

use App\Models\detail_nilai_baca_alquran;
use App\Repositories\BaseRepository;

/**
 * Class detail_nilai_baca_alquranRepository
 * @package App\Repositories
 * @version March 3, 2020, 1:44 pm UTC
*/

class detail_nilai_baca_alquranRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'santri_id',
        'nilai_baca_alquran_id',
        'tajwid',
        'kelancaran',
        'makhorijul'
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
        return detail_nilai_baca_alquran::class;
    }
}
