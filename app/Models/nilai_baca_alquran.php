<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class nilai_baca_alquran
 * @package App\Models
 * @version March 3, 2020, 12:46 pm UTC
 *
 * @property integer mapel_id
 * @property integer semester_id
 * @property integer kelas_id
 */
class nilai_baca_alquran extends Model
{
    // use SoftDeletes;

    public $table = 'nilai_baca_alqurans';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'semester_id',
        'kelas_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'semester_id' => 'integer',
        'kelas_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'semester_id' => 'required',
        'kelas_id' => 'required'
    ];
    public function semester()
    {
        return $this->belongsTo(\App\Models\Semester::class, 'semester_id');
    } 
    public function kelas()
    {
        return $this->belongsTo(\App\Models\Kelas::class, 'kelas_id');
    }
    public function detail() 
    {
        return $this->hasMany(detail_nilai_baca_alquran::class, 'nilai_baca_alquran_id');
    } 
    
}
