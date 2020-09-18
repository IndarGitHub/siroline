<?php

namespace App\Repositories;

use App\Models\Kelas;
use App\Repositories\BaseRepository;

/**
 * Class KelasRepository
 * @package App\Repositories
 * @version December 21, 2019, 12:12 pm UTC
*/

class KelasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nm_kelas',
        'walikelas_id'
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
        return Kelas::class;
    }
}
