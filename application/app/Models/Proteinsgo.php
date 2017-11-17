<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proteinsgo extends Model
{
    
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'proteinsgo';
    
    /**
     * Setting primary key not incremeting.
     *
     * @var boolean
     */
    public $incrementing = false;
    
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'protein_id',
        'goid',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];

}
