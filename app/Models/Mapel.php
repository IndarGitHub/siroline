<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Mapel
 * @package App\Models
 * @version December 21, 2019, 12:35 pm UTC
 *
 * @property string nm_mapel
 * @property integer guru_id
 */
class Mapel extends Model
{
    // use SoftDeletes;

    public $table = 'mapels';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'kode_mapel',
        'nm_mapel',
        'guru_id',
        'kelas_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'kode_mapel' => 'string',
        'nm_mapel' => 'string',
        'guru_id' => 'integer',
        'kelas_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'kode_mapel' => 'required|unique:mapels,kode_mapel',
        'nm_mapel' => 'required',
        'guru_id' => 'required',
        'kelas_id' => 'required'
    ];
    public function guru()
    {
        return $this->belongsTo(\App\Models\Guru::class, 'guru_id');
    }  
    public function kelas()
    {
        return $this->belongsTo(\App\Models\Kelas::class, 'kelas_id');
    }    
}
