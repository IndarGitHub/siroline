<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class nilai_keaktifan
 * @package App\Models
 * @version March 27, 2020, 6:54 am UTC
 *
 * @property integer kelas_id
 * @property integer semester_id
 */
class nilai_keaktifan extends Model
{
    // use SoftDeletes;

    public $table = 'nilai_keaktifans';
    

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
        return $this->hasMany(detail_nilai_keaktifan::class, 'nilai_keaktifan_id');
    }  
}
