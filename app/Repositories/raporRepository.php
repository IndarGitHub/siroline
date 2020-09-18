<?php

namespace App\Repositories;

use App\Models\rapor;
use App\Repositories\BaseRepository;

/**
 * Class raporRepository
 * @package App\Repositories
 * @version April 20, 2020, 12:52 pm UTC
*/

class raporRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'detail_nilai_ujian_tulis_id',
        'detail_mapel_id',
        'detail_nilai_hafalan_id',
        'detail_nilai_baca_alquran_id',
        'detail_nilai_keaktifan_id',
        'rata_rata'
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
        return rapor::class;
    }
}
