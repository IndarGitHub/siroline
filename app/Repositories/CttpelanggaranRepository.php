<?php

namespace App\Repositories;

use App\Models\Cttpelanggaran;
use App\Repositories\BaseRepository;

/**
 * Class CttpelanggaranRepository
 * @package App\Repositories
 * @version December 21, 2019, 1:28 pm UTC
*/

class CttpelanggaranRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'santri_id',
        'tgl',
        'pelanggaran',
        'tp_id',
        'catatan_pengasuh'
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
        return Cttpelanggaran::class;
    }
}
