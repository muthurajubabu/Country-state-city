<?php
/*
* @author: Muthuraju babu
* class file for display all the data from the database
*/
require_once("../includes/config.php");
class sltCountry extends tableConfig {
   
   public static $data;

   function __construct() {
     parent::__construct();
   }
 
 //all countries list
   public static function getCountries() {
     try {
       $query = "SELECT id, name FROM countries";
       $result = tableConfig::run($query);
       if(!$result) {
         throw new exception("Country not found.");
       }
       $res = array();
       while($resultSet = mysqli_fetch_assoc($result)) {
        $res[$resultSet['id']] = $resultSet['name'];
       }
       $data = array('status'=>'success', 'tp'=>1, 'msg'=>"Countries fetched successfully.", 'result'=>$res);
     } catch (Exception $e) {
       $data = array('status'=>'error', 'tp'=>0, 'msg'=>$e->getMessage());
     } finally {
        return $data;
     }
   }

  //all states list by country id
  public static function getStates($countryId) {
     try {
       $query = "SELECT id, name FROM states WHERE country_id=".$countryId;
       $result = tableConfig::run($query);
       if(!$result) {
         throw new exception("State not found.");
       }
       $res = array();
       while($resultSet = mysqli_fetch_assoc($result)) {
        $res[$resultSet['id']] = $resultSet['name'];
       }
       $data = array('status'=>'success', 'tp'=>1, 'msg'=>"States fetched successfully.", 'result'=>$res);
     } catch (Exception $e) {
       $data = array('status'=>'error', 'tp'=>0, 'msg'=>$e->getMessage());
     } finally {
        return $data;
     }
   }

 //all cities list by state id
public static function getCities($stateId) {
	try{
		$query = "SELECT id, name FROM cities WHERE state_id=".$stateId;
		$result = tableConfig::run($query);
		if(!$result) {
			throw new exception("City not found.");
		}
		$res = array();
		while($resultSet = mysqli_fetch_assoc($result)) {
			$res[$resultSet['id']] = $resultSet['name'];
		}
		$data = array('status'=>'success', 'tp'=>1, 'msg'=>"Cities fetched successfully.", 'result'=>$res);
    }catch (Exception $e) {
		$data = array('status'=>'error', 'tp'=>0, 'msg'=>$e->getMessage());
    }finally {
		return $data;
    }
   }
}
