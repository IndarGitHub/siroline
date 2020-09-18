<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Tp
 * @package App\Models
 * @version December 20, 2019, 11:42 pm UTC
 *
 * @property string tipe_pelanggaran
 */
class Tp extends Model
{
    // use SoftDeletes;

    public $table = 'tps';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'kode_tp',
        'tipe_pelanggaran',
        'sanksi'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'kode_tp' => 'string',
        'tipe_pelanggaran' => 'string',
        'sanksi' => 'text'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'kode_tp' => 'required|unique:tps,kode_tp',
        'tipe_pelanggaran' => 'required',
        'sanksi' => 'required'
    ];

    
}
