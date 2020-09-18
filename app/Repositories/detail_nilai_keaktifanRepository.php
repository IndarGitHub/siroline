<?php

namespace App\Repositories;

use App\Models\detail_nilai_keaktifan;
use App\Repositories\BaseRepository;

/**
 * Class detail_nilai_keaktifanRepository
 * @package App\Repositories
 * @version March 27, 2020, 7:34 am UTC
*/

class detail_nilai_keaktifanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'santri_id',
        'nilai_keaktifan_id',
        'nilai_angka1',
        'qiroatul_quran',
        'nilai_angka2',
        'muhadhoroh',
        'nilai_angka3',
        'maulid_diba',
        'nilai_angka4',
        'kelakuan',
        'nilai_angka5',
        'kerajinan',
        'nilai_angka6',
        'kerapian',
        'ket_sakit',
        'ket_izin',
        'tanpa_ket'
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
        return detail_nilai_keaktifan::class;
    }
}
