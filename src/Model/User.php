<?php
/**
 * Created by PhpStorm.
 * User: Fede Marquesto
 * Date: 6/9/2018
 * Time: 20:13
 */

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table ='usuario';
    public $timestamps = false;
    protected $fillable = [
        'username',
        'password',
        'name',
        'last_name'
    ];

    public static $type = [
        'AL'=>'Alumno',
        'AD'=>'Administrador'
    ];
}