<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Semester
 * @package App\Models
 * @version December 21, 2019, 2:12 pm UTC
 *
 * @property string semester
 * @property string thn_ajaran
 */
class Semester extends Model
{
    // use SoftDeletes;

    public $table = 'semesters';
    

    // protected $dates = ['deleted_at'];



    public $fillable = [
        'semester',
        'thn_ajaran',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'semester' => 'string',
        'thn_ajaran' => 'string',
        'status' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'semester' => 'required',
        'thn_ajaran' => 'required',
        // 'status' => 'required'
    ];

    
}
