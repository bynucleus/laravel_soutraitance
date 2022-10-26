<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;


class Users extends Model
{
    use CrudTrait;

    protected $table = 'users';
    protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $fillable = ["id","name"];

    protected $guarded = ['id'];
}
