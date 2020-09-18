<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class detail_kelas_santri
 * @package App\Models
 * @version March 31, 2020, 12:49 pm UTC
 *
 * @property integer santri_id
 * @property integer kelas_id
 */
class detail_kelas_santri extends Model
{
    // use SoftDeletes;

    public $table = 'detail_kelas_santris';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'santri_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'santri_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'santri_id' => 'required'
    ];
    public function santri()
    {
        return $this->belongsTo(\App\Models\Santri::class, 'santri_id');
    }
    public function kelas()
    {
        return $this->belongsTo(\App\Models\Kelas::class, 'kelas_id');
    }
  
}
