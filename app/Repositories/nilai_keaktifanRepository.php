<?php

namespace App\Repositories;

use App\Models\nilai_keaktifan;
use App\Repositories\BaseRepository;

/**
 * Class nilai_keaktifanRepository
 * @package App\Repositories
 * @version March 27, 2020, 6:54 am UTC
*/

class nilai_keaktifanRepository extends BaseRepository
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
        return nilai_keaktifan::class;
    }
    public function findWithDetail($id)
    {
        
        return $this->model->with('detail.santri')->find($id);
    }    
}
