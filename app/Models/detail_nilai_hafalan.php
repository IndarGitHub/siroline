<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class detail_nilai_hafalan
 * @package App\Models
 * @version February 26, 2020, 6:57 am UTC
 *
 * @property integer santri_id
 * @property integer nilai_hafalan_id
 * @property integer kelancaran
 */
class detail_nilai_hafalan extends Model
{
    // use SoftDeletes;

    public $table = 'detail_nilai_hafalans';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'santri_id',
        'nilai_hafalan_id',
        'kelancaran',
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
        'nilai_hafalan_id' => 'integer',
        'kelancaran' => 'integer',
        'nilai_huruf' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'santri_id' => 'required',
        'nilai_hafalan_id' => 'required',
        'kelancaran' => 'required'
        // 'nilai_huruf' => 'required'
    ];
    public function santri()
    {
        return $this->belongsTo(\App\Models\Santri::class, 'santri_id');
    }
    public function nilai_hafalan()
    {
        return $this->belongsTo(\App\Models\nilai_hafalan::class, 'nilai_hafalan_id');
    }
    
}
