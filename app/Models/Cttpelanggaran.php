<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Cttpelanggaran
 * @package App\Models
 * @version December 21, 2019, 1:28 pm UTC
 *
 * @property integer santri_id
 * @property string tgl
 * @property string pelanggaran
 * @property integer tp_id
 * @property string sanksi
 * @property string catatan_pengasuh
 */
class Cttpelanggaran extends Model
{
    // use SoftDeletes;

    public $table = 'cttpelanggarans';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'santri_id',
        'tgl',
        'tp_id',
        'catatan_pengasuh'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'santri_id' => 'integer',
        'tgl' => 'string',
        'tp_id' => 'integer',
        'catatan_pengasuh' => 'text'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'santri_id' => 'required',
        'tgl' => 'required',
        'tp_id' => 'required',
        'catatan_pengasuh' => 'required'
    ];
    public function santri()
    {
        return $this->belongsTo(\App\Models\Santri::class, 'santri_id');
    }
    public function tp()
    {
        return $this->belongsTo(\App\Models\Tp::class, 'tp_id');
    }  
}
