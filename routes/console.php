<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Database\QueryException;
use App\employees;
use App\employeewebhistory;
use App\services\employeeService;
use App\services\webHistory;
/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/
//command to insert employeed Details
Artisan::command('SETempdata{emp_id}{epm_Name}{ip_address}', function ($emp_id,$epm_Name,$ip_address) {
	$result=employeeService::setEmployeeDetails($emp_id,$epm_Name,$ip_address);
	$this->info($result);
})->describe('Add Employee Details');

//command to show employee details
Artisan::command('GETempdata{ip_address}', function ($ip_address) {
	$result=employeeService::getEmployeeDetails($ip_address);
	$this->info($result);
})->describe('Get employee details based on Ip address');

//command to delete employee details
Artisan::command('UNSETempdata{ip_address}', function ($ip_address) {
    $result=employeeService::deleteEmployee($ip_address);
	$this->info($result);
	
})->describe('Delete Employee details based on Ip');

//command to add employee web history details
Artisan::command('SETempwebhistory{ip_address}{url}', function ($ip_address,$url) {
	 $result=webHistory::setWebHistory($ip_address,$url);
	 $this->info($result);

})->describe('Add employee history details');

//command to get employee and web history details
Artisan::command('GETempwebhistory{ip_address}', function ($ip_address) {
    	
		$result=webHistory::getWebHistory($ip_address);
        $this->info($result);

})->describe('Display employee webhistory');

//delete web history details
Artisan::command('UNSETempwebhistory{ip_address}', function ($ip_address) {
	$result=webHistory::deleteWebHistory($ip_address);
        $this->info($result);
})->describe('Delete Employee web history');

//End command
Artisan::command('END', function () {
	return;
	})->describe('Exit from program');
