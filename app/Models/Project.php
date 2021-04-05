<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','name', 'description', 'final_date', 'hex'
    ];

    public function tareas()
    {						 /*'App\Models\Task'*/
    	return $this->hasMany(Task::class); 
    }



    /*
    hasMany (uno a muchos) El modelo que tiene muchos registros vinculados
    belongsTo (Pertenece a) El modelo que debe vincularse a su padre
    hasOne (uno a uno)
	belongsToMany (Muchos a Muchos)*/

}


