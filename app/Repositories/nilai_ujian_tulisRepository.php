<?php

namespace App\Repositories;

use App\Models\nilai_ujian_tulis;
use App\Repositories\BaseRepository;

/**
 * Class nilai_ujian_tulisRepository
 * @package App\Repositories
 * @version March 18, 2020, 1:39 pm UTC
*/

class nilai_ujian_tulisRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kelas_id',
        'semester_id'
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
        return nilai_ujian_tulis::class;
    }
    public function findWithDetail($id)
    {
        // relasi bertingkat, nilai uts berelasi dengan detail nilai uts, detail nilai uts berelasi dengan santri
        return $this->model->with('detail.mapel')->find($id);
    }
}
