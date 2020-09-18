<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Santri
 * @package App\Models
 * @version December 21, 2019, 12:25 pm UTC
 *
 * @property string no_induk
 * @property string nm_santri
 * @property string tmp_lhr
 * @property string tgl_lhr
 * @property boolean jk
 * @property integer kelas_id
 */
class Santri extends Model
{
    // use SoftDeletes;

    public $table = 'santris';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'no_induk',
        'nm_santri',
        'tmp_lhr',
        'tgl_lhr',
        'jk',
        'kelas_id',
        'nm_ayah',
        'nm_ibu',
        'nm_wali_santri'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'no_induk' => 'string',
        'nm_santri' => 'string',
        'tmp_lhr' => 'string',
        'tgl_lhr' => 'string',
        'jk' => 'boolean',
        'kelas_id' => 'integer',
        'nm_ayah' => 'string',
        'nm_ibu' => 'string',
        'nm_wali_santri' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'no_induk' => 'required|unique:santris,no_induk',
        'nm_santri' => 'required',
        'tmp_lhr' => 'required',
        'tgl_lhr' => 'required',
        'jk' => 'required',
        'kelas_id' => 'required',
        'nm_ayah' => 'required',
        'nm_ibu' => 'required',
        'nm_wali_santri' => 'required'
    ];
    public function kelas()
    {
        return $this->belongsTo(\App\Models\Kelas::class, 'kelas_id');
    }
    
}
