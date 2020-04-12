<?php
namespace App\services;

use App\employees;
use Illuminate\Database\QueryException;


class employeeService {
	private $details;
	public static function setEmployeeDetails($emp_id,$epm_Name,$ip_address){
		 try{
		     $employee=employees::create([
		         'emp_id'=>$emp_id,
		         'epm_Name'=>$epm_Name,
		         'ip_address'=>$ip_address,
		         
		      ]);

		 }catch(QueryException $ex){ 
		     return 'error:Failed to insert employee information'; 
		      
		 }
		 return 'Added '. $emp_id. 'details'; 


	}
	public static function getEmployeeDetails($ip_address){
		try{
			$result=employees::where('ip_address','=',$ip_address)->first();

		}catch(QueryException $ex){
			return 'error:Database error';
		}
		if($result){
			$details=json_encode(array("employees"=>$result));
		}else{
			$details="NULL";
		}
		return $details;

	}
	public static function deleteEmployee($ip_address){
		$record=employees::where('ip_address','=',$ip_address)->first('id');
		if($record){
			$status=employees::find($record->id)->delete();
			if($status){
				return $ip_address.'Employee details deleted';
			}else{
				return $ip_address.'Employee details not deleted';
			}
		}else{
			return 'Resource Not Found';
			 
		}

	}

}