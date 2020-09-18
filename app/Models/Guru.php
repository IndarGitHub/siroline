<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Guru
 * @package App\Models
 * @version December 18, 2019, 7:10 am UTC
 *
 * @property string name
 */
class Guru extends Model
{
    // use SoftDeletes;

    public $table = 'gurus';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'kode_guru',
        'name',
        'almt_guru',
        'tlp_guru'

    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'kode_guru' => 'string',
        'name' => 'string',
        'almt_guru' => 'text',
        'tlp_guru' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'kode_guru' => 'required|unique:gurus,kode_guru',
        'name' => 'required',
        'almt_guru' => 'required',
        'tlp_guru' => 'required'
        
    ];

    
}
