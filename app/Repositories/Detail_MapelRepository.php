<?php

namespace App\Repositories;

use App\Models\Detail_Mapel;
use App\Repositories\BaseRepository;

/**
 * Class Detail_MapelRepository
 * @package App\Repositories
 * @version March 19, 2020, 2:47 am UTC
*/

class Detail_MapelRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nilai_ujian_tulis_id',
        'mapel_id'
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
        return Detail_Mapel::class;
    }

    public function findWithDetail($id)
    {
        return $this->model->with('detail.santri')->find($id);
    }
}
