<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employeewebhistory extends Model
{	public $timestamps = false;
	protected $table ='employeewebhistory';
	protected $fillable =['ip_address','url','date'];
    public function employees(){
    	return $this->belongsTo('App\employees','ip_address');
    }
}
