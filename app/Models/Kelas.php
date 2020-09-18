<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Kelas
 * @package App\Models
 * @version December 21, 2019, 12:12 pm UTC
 *
 * @property string nm_kelas
 * @property integer walikelas_id
 */
class Kelas extends Model
{
    // use SoftDeletes;

    public $table = 'kelas';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'kode_kls',
        'nm_kelas',
        'guru_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'kode_kls' => 'string',
        'nm_kelas' => 'string',
        'guru_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'kode_kls' => 'required|unique:kelas,kode_kls',
        'nm_kelas' => 'required',
        'guru_id'  => 'required'
    ];

    // untuk beberapa santri
    public function santri()
    {
        return $this->hasMany(Santri::class);
    }
    public function mapel()
    {
        return $this->hasMany(Mapel::class);
    }
    public function guru()
    {
        return $this->belongsTo(\App\Models\Guru::class, 'guru_id');
    }  
    
}
