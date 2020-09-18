<?php

namespace App\Repositories;

use App\Models\nilai_hafalan;
use App\Repositories\BaseRepository;

/**
 * Class nilai_hafalanRepository
 * @package App\Repositories
 * @version February 26, 2020, 1:53 am UTC
*/

class nilai_hafalanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'mapel_id',
        'semester_id',
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
        return nilai_hafalan::class;
    }
    public function findWithDetail($id)
    {
        // relasi bertingkat, nilai uts berelasi dengan detail nilai uts, detail nilai uts berelasi dengan santri
        return $this->model->with('detail.santri')->find($id);
    }
}
