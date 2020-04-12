<?php
namespace App\services;

use App\employees;
use App\employeewebhistory;
use Illuminate\Database\QueryException;

class webHistory{
	public static function setWebHistory($ip_address,$url){
		$record=employees::where('ip_address','=',$ip_address)->first();
	    if($record){
	    	try{
		    	$webhistory=employeewebhistory::create([
		    			'ip_address'=>$ip_address,
		    			'url'=>$url,
		    	]);
	    	}catch(QueryException $ex){ 
	            return 'Failed to insert employeewebhistory information'; 
	            
        	}
        	return 'Added'.$ip_address.' web history details';
	    	
	    }else{
	    	return 'Record Not Found';
	    }
	}
	public static function getWebHistory($ip_address){
		try{
			$result=employeewebhistory::where('ip_address','=',$ip_address)->get('url','url');

		}catch(QueryException $ex){
			 
			return 'Database error';
		}
		if(!$result->isEmpty()){
			try{
				$empresult=employees::where('ip_address','=',$ip_address)->first();

			}catch(QueryException $ex){
				return 'error:Database error';
			}
			if($empresult){
				$eresult['id']=$empresult->id;
				$eresult['ip_address']=$empresult->ip_address;
				$eresult['urls']=$result;
				$historydetails=json_encode(array("employee"=>$empresult,"employeewebhistory:"=>$eresult));
			}else{
				$historydetails="NULL";
			}
		}else{
			$historydetails="NULL";
		}
		return $historydetails;
	}
	public static function deleteWebHistory($ip_address){
		$record=employeewebhistory::where('ip_address','=',$ip_address)->get('id');
		
		if($record){
			$status=employeewebhistory::where('ip_address','=',$ip_address)->delete();
			if($status){
				return $ip_address.'Employee web history details deleted';
			}else{
				return $ip_address.'Employee web history details not deleted';
			}
			
			
		}else{
			return 'Resource Not Found';
			 
		}
	}
}
?>