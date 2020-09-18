<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class rapor
 * @package App\Models
 * @version April 20, 2020, 12:52 pm UTC
 *
 * @property integer detail_nilai_ujian_tulis_id
 * @property integer detail_mapel_id
 * @property integer detail_nilai_hafalan_id
 * @property integer detail_nilai_baca_alquran_id
 * @property integer detail_nilai_keaktifan_id
 * @property integer rata_rata
 */
class rapor extends Model
{
    // use SoftDeletes;

    public $table = 'rapors';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'detail_nilai_ujian_tulis_id',
        'detail_mapel_id',
        'detail_nilai_hafalan_id',
        'detail_nilai_baca_alquran_id',
        'detail_nilai_keaktifan_id',
        'rata_rata'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'detail_nilai_ujian_tulis_id' => 'integer',
        'detail_mapel_id' => 'integer',
        'detail_nilai_hafalan_id' => 'integer',
        'detail_nilai_baca_alquran_id' => 'integer',
        'detail_nilai_keaktifan_id' => 'integer',
        'rata_rata' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'detail_nilai_ujian_tulis_id' => 'required',
        'detail_mapel_id' => 'required',
        'detail_nilai_hafalan_id' => 'required',
        'detail_nilai_baca_alquran_id' => 'required',
        'detail_nilai_keaktifan_id' => 'required',
        // 'rata_rata' => 'required'
    ];
    public function detail_nilai_ujian_tulis()
    {
        return $this->belongsTo(\App\Models\detail_nilai_ujian_tulis::class, 'detail_nilai_ujian_tulis_id');
    }
    public function detail_mapel()
    {
        return $this->belongsTo(\App\Models\Detail_Mapel::class, 'detail_mapel_id');
    }
    public function detail_nilai_hafalan()
    {
        return $this->belongsTo(\App\Models\detail_nilai_hafalan::class, 'detail_nilai_hafalan_id');
    }
    public function detail_nilai_baca_alquran()
    {
        return $this->belongsTo(\App\Models\detail_nilai_baca_alquran::class, 'detail_nilai_baca_alquran_id');
    }
    public function detail_nilai_keaktifan()
    {
        return $this->belongsTo(\App\Models\detail_nilai_keaktifan::class, 'detail_nilai_keaktifan_id');
    }
}
