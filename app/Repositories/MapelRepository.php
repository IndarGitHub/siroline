<?php

namespace App\Repositories;

use App\Models\Mapel;
use App\Repositories\BaseRepository;

/**
 * Class MapelRepository
 * @package App\Repositories
 * @version December 21, 2019, 12:35 pm UTC
*/

class MapelRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nm_mapel',
        'guru_id'
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
        return Mapel::class;
    }
}
