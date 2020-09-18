<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class detail_nilai_baca_alquran
 * @package App\Models
 * @version March 3, 2020, 1:44 pm UTC
 *
 * @property integer santri_id
 * @property integer nilai_baca_alquran_id
 * @property integer tajwid
 * @property integer kelancaran
 * @property integer makhorijul
 */
class detail_nilai_baca_alquran extends Model
{
    // use SoftDeletes;

    public $table = 'detail_nilai_baca_alqurans';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'santri_id',
        'nilai_baca_alquran_id',
        'tajwid',
        'tajwid_huruf',
        'kelancaran',
        'kel_huruf',
        'makhorijul',
        'makho_huruf'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'santri_id' => 'integer',
        'nilai_baca_alquran_id' => 'integer',
        'tajwid' => 'integer',
        'tajwid_huruf' => 'string',
        'kelancaran' => 'integer',
        'kel_huruf' => 'string',
        'makhorijul' => 'integer',
        'makho_huruf' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'santri_id' => 'required',
        'nilai_baca_alquran_id' => 'required',
        'tajwid' => 'required',
        // 'tajwid_huruf' => 'required',
        'kelancaran' => 'required',
        // 'kel_huruf' => 'required',
        'makhorijul' => 'required'
        // 'makho_huruf' => 'required'
    ];
    public function santri()
    {
        return $this->belongsTo(\App\Models\Santri::class, 'santri_id');
    }
    public function nilai_baca_alquran()
    {
        return $this->belongsTo(\App\Models\nilai_baca_alquran::class, 'nilai_baca_alquran_id');
    }
    
}
