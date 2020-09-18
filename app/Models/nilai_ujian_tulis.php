<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class nilai_ujian_tulis
 * @package App\Models
 * @version March 18, 2020, 1:39 pm UTC
 *
 * @property integer kelas_id
 * @property integer semester_id
 */
class nilai_ujian_tulis extends Model
{
    // use SoftDeletes;

    public $table = 'nilai_ujian_tulis';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'kelas_id',
        'semester_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'kelas_id' => 'integer',
        'semester_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'kelas_id' => 'required',
        'semester_id' => 'required'
    ];
    public function kelas()
    {
        return $this->belongsTo(\App\Models\Kelas::class, 'kelas_id');
    }
    public function semester()
    {
        return $this->belongsTo(\App\Models\Semester::class, 'semester_id');
    } 
    public function detail() 
    {
        return $this->hasMany(Detail_Mapel::class, 'nilai_ujian_tulis_id');
    }
}
