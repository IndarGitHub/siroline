<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class detail_nilai_ujian_tulis
 * @package App\Models
 * @version March 19, 2020, 1:58 pm UTC
 *
 * @property integer santri_id
 * @property integer detail_mapel_id
 * @property integer nilai_angka
 * @property string nilai_huruf
 */
class detail_nilai_ujian_tulis extends Model
{
    // use SoftDeletes;

    public $table = 'detail_nilai_ujian_tulis';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'santri_id',
        'detail_mapel_id',
        'nilai_angka',
        'nilai_huruf'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'santri_id' => 'integer',
        'detail_mapel_id' => 'integer',
        'nilai_angka' => 'integer',
        'nilai_huruf' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'santri_id' => 'required',
        'detail_mapel_id' => 'required',
        'nilai_angka' => 'required'
        // 'nilai_huruf' => 'required'
    ];
    public function santri()
    {
        return $this->belongsTo(\App\Models\Santri::class, 'santri_id');
    }
    public function detail_mapel()
    {
        return $this->belongsTo(\App\Models\Detail_Mapel::class, 'detail_mapel_id');
    }
    
}
