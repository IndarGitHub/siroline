<?php

namespace App\Repositories;

use App\Models\nilai_baca_alquran;
use App\Repositories\BaseRepository;

/**
 * Class nilai_baca_alquranRepository
 * @package App\Repositories
 * @version March 3, 2020, 12:46 pm UTC
*/

class nilai_baca_alquranRepository extends BaseRepository
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
        return nilai_baca_alquran::class;
    }
    public function findWithDetail($id)
    {
        // relasi bertingkat, nilai uts berelasi dengan detail nilai uts, detail nilai uts berelasi dengan santri
        return $this->model->with('detail.santri')->find($id);
    }
    
}
