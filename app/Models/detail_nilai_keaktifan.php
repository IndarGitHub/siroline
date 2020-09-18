<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class detail_nilai_keaktifan
 * @package App\Models
 * @version March 27, 2020, 7:34 am UTC
 *
 * @property integer santri_id
 * @property integer nilai_keaktifan_id
 * @property string qiroatul_quran
 * @property string muhadhoroh
 * @property string maulid_diba
 * @property string kelakuan
 * @property string kerajinan
 * @property string kerapian
 * @property integer ket_sakit
 * @property integer ket_izin
 * @property integer tanpa_ket
 */
class detail_nilai_keaktifan extends Model
{
    // use SoftDeletes;

    public $table = 'detail_nilai_keaktifans';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'santri_id',
        'nilai_keaktifan_id',
        'nilai_angka1',
        'qiroatul_quran',
        'nilai_angka2',
        'muhadhoroh',
        'nilai_angka3',
        'maulid_diba',
        'nilai_angka4',
        'kelakuan',
        'nilai_angka5',
        'kerajinan',
        'nilai_angka6',
        'kerapian',
        'ket_sakit',
        'ket_izin',
        'tanpa_ket'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'santri_id' => 'integer',
        'nilai_keaktifan_id' => 'integer',
        'nilai_angka1' => 'integer',
        'qiroatul_quran' => 'string',
        'nilai_angka2' => 'integer',
        'muhadhoroh' => 'string',
        'nilai_angka3' => 'integer',
        'maulid_diba' => 'string',
        'nilai_angka4' => 'integer',
        'kelakuan' => 'string',
        'nilai_angka5' => 'integer',
        'kerajinan' => 'string',
        'nilai_angka6' => 'integer',
        'kerapian' => 'string',
        'ket_sakit' => 'integer',
        'ket_izin' => 'integer',
        'tanpa_ket' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'santri_id' => 'required',
        'nilai_keaktifan_id' => 'required',
        'nilai_angka1' => 'required',
        // 'qiroatul_quran' => 'required',
        'nilai_angka2' => 'required',
        // 'muhadhoroh' => 'required',
        'nilai_angka3' => 'required',
        // 'maulid_diba' => 'required',
        'nilai_angka4' => 'required',
        // 'kelakuan' => 'required',
        'nilai_angka5' => 'required',
        // 'kerajinan' => 'required',
        'nilai_angka6' => 'required',
        // 'kerapian' => 'required',
        'ket_sakit' => 'required',
        'ket_izin' => 'required',
        'tanpa_ket' => 'required'
    ];
    public function santri()
    {
        return $this->belongsTo(\App\Models\Santri::class, 'santri_id');
    }
    public function nilai_keaktifan()
    {
        return $this->belongsTo(\App\Models\nilai_hafalan::class, 'nilai_keaktifan_id');
    }
    
}
