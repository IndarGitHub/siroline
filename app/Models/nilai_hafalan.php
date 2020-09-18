<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class nilai_hafalan
 * @package App\Models
 * @version February 26, 2020, 1:53 am UTC
 *
 * @property integer mapel_id
 * @property integer semester_id
 * @property integer kelas_id
 */
class nilai_hafalan extends Model
{
    // use SoftDeletes;

    public $table = 'nilai_hafalans';
    

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

    // relasi dari nilai uts ke detail nilai uts, satu nilai uts memiliki banyak detail nilai uts
    public function detail() 
    {
        return $this->hasMany(detail_nilai_hafalan::class, 'nilai_hafalan_id');
    }
    
}
