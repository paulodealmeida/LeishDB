<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ncrna extends Model
{
    
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ncrna';
    
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'chromosome_id',
        'family',
        'start',
        'end',
        'type',
        'predictor',
        'covariance_model',
        'similarity',
        'transcript',
        'have_target_genes',
        'conserved_species',
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
