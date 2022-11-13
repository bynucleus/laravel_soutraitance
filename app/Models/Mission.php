<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'mission';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = ['date_debut','nbre_heure','code_t','code_nt','date_fin','id_consultant','id_entreprise_cliente','id_entreprise_conseil'];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public function openFeuille($crud = false)
    {
        return "<a class='btn btn-sm btn-link' href='feuille_temps/".$this->id."/semaine' data-toggle='tooltip' title='Renseigner la feuille de temps'><i class='la la-file'></i> Renseigner feuille de temps</a>";
    }
    public function entreprisescl()
    {
        return $this->belongsTo('App\Models\Entreprise','id_entreprise_cliente','id');
    }
    public function entreprisesco()
    {
        return $this->belongsTo('App\Models\Entreprise','id_entreprise_conseil','id');
    }
    public function consultants()
    {
        return $this->belongsTo('App\Models\Consultant','id_consultant','id');
    }
    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
