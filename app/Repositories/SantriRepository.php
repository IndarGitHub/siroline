<?php

namespace App\Repositories;

use App\Models\Santri;
use App\Repositories\BaseRepository;

/**
 * Class SantriRepository
 * @package App\Repositories
 * @version December 21, 2019, 12:25 pm UTC
*/

class SantriRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'no_induk',
        'nm_santri',
        'tmp_lhr',
        'tgl_lhr',
        'jk',
        'kelas_id'
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
        return Santri::class;
    }
}
