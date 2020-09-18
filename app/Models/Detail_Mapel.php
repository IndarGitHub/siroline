<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Detail_Mapel
 * @package App\Models
 * @version March 19, 2020, 2:47 am UTC
 *
 * @property integer nilai_ujian_tulis_id
 * @property integer mapel_id
 */
class Detail_Mapel extends Model
{
    // use SoftDeletes;

    public $table = 'detail_mapels';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'id',
        'nilai_ujian_tulis_id',
        'mapel_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nilai_ujian_tulis_id' => 'integer',
        'mapel_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nilai_ujian_tulis_id' => 'required',
        'mapel_id' => 'required'
    ];
    public function nilai_ujian_tulis()
    {
        return $this->belongsTo(\App\Models\nilai_ujian_tulis::class, 'nilai_ujian_tulis_id');
    }
    public function mapel()
    {
        return $this->belongsTo(\App\Models\Mapel::class, 'mapel_id');
    }
    public function detail()
    {
        return $this->hasMany(detail_nilai_ujian_tulis::class, 'detail_mapel_id');
    }
    
}
