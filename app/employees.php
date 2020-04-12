<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class employees extends Model
{
	use SoftDeletes;
    public $timestamps = false;
    protected $fillable =['emp_id','epm_Name','ip_address'];
    protected $dates = ['deleted_at'];

    public function EmployeeWebHistory(){
    	return $this->hasMany('App/employeewebhistory','ip_address');
    }
}
