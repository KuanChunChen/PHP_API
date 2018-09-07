<?php

require_once __DIR__ . '/insd_debug.php';
require_once __DIR__ . '/include/error.php';
require_once __DIR__ . '/include/define.php';
require_once __DIR__ . '/include/logdefine.php';
require_once __DIR__ . '/include/sqldefine.php';
require_once __DIR__ . '/insd_common.php';
//func
define('d_FUNC_JSON_PARSER', 10050);

define('d_ERR_JSON_FILE_INVAILD',23);
define('d_ERR_JSON_FORMAT_INVAILD',24);

/*
$test = INSD_JsonParser("http://localhost/api2/testJSON.json");
echo str_replace(" ", "&nbsp;", str_replace("\n", "<br>", json_encode($test , $options = JSON_PRETTY_PRINT)))."<br>";

//*/
//
 function INSD_JsonParser($JsonFile =null)
 {
 	
 	$retJSON =null ;
 	if(is_string($JsonFile) && !empty($JsonFile) && !is_null($JsonFile)){
 		
 		
 		// get json contents and decode it
 		$retJSON = json_decode(file_get_contents($JsonFile), true);
 		if(is_string($retJSON) && is_object($retJSON) || is_array($retJSON)){
 			DBG_STR_STR(d_FUNC_JSON_PARSER, d_OK, 'JSON Parset success!');
 			$status = d_OK;
 		}else{

 			DBG_STR_STR(d_FUNC_JSON_PARSER, d_ERR_JSON_FORMAT_INVAILD, 'The file is not JSON format');
            $status = d_ERR_JSON_FORMAT_INVAILD;
        }	
 	}else{
 		
 		DBG_STR_STR(d_FUNC_JSON_PARSER, d_ERR_JSON_FILE_INVAILD, 'The Json file you import is invaild');
        $status = d_ERR_JSON_FILE_INVAILD;
            
 	}

 	return INSD_ResultToJSON($status,$retJSON);;


 }
?>
