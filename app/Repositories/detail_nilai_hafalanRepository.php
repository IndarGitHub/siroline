<?php

namespace App\Repositories;

use App\Models\detail_nilai_hafalan;
use App\Repositories\BaseRepository;

/**
 * Class detail_nilai_hafalanRepository
 * @package App\Repositories
 * @version February 26, 2020, 6:57 am UTC
*/

class detail_nilai_hafalanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'santri_id',
        'nilai_hafalan_id',
        'kelancaran'
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
        return detail_nilai_hafalan::class;
    }
}
