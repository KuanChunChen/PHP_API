<?php

require_once __DIR__ . '/insd_debug.php';
require_once __DIR__ . '/include/error.php';
require_once __DIR__ . '/include/define.php';
require_once __DIR__ . '/include/logdefine.php';
require_once __DIR__ . '/include/sqldefine.php';
require_once __DIR__ . '/insd_common.php';
//func
define('d_FUNC_VND_LIST_JSON_PARSER', 10050);

define('d_ERR_JSON_FILE_INVAILD',23);
define('d_ERR_JSON_FORMAT_INVAILD',24);
define('d_ERR_JSON_VENDOR_FORMAT_INVAILD',25);
define('d_ERR_JSON_VENDOR_LIST_KEY_NOT_EXIST',26);
define('d_ERR_JSON_VENDOR_LIST_NAME_NOT_STR_OR_LEN_INVAILD',27);
define('d_VND_LIST_NAME', 'Name');
define('d_VND_LIST_NAME_LEN_UPPER', 180);
define('d_VND_LIST_VENDOR_LIST', 'Vendorlist');



function INSD_VendorListJsonParser($JsonFile =null){
 	
 	$retJSON =null;

 	if(is_string($JsonFile) && !empty($JsonFile) && !is_null($JsonFile)){
 		$strJSON = json_decode(file_get_contents($JsonFile), true);

 		if(is_string($strJSON) && is_object($strJSON) || is_array($strJSON)){
			
 			if(array_key_exists(d_VND_LIST_VENDOR_LIST,$strJSON)){
 				foreach ($strJSON[d_VND_LIST_VENDOR_LIST] as $key => $value){
 					 if (array_key_exists(d_VND_LIST_NAME,$value)){
 					 	if(is_string($value[d_VND_LIST_NAME]) && strlen($value[d_VND_LIST_NAME]) <d_VND_LIST_NAME_LEN_UPPER ){
 					 		
 					 		DBG_STR_STR(d_FUNC_VND_LIST_JSON_PARSER, d_OK, 'VND List Json parser success!');
 							$retJSON =$strJSON;
 							$status  = d_OK;
 					 
 					 	}else{
 					 		DBG_STR_STR(d_FUNC_VND_LIST_JSON_PARSER, d_ERR_JSON_VENDOR_LIST_NAME_NOT_STR_OR_LEN_INVAILD, 'Vendor List Name not String type or Length  invaild');
 							$retJSON =null;
        					$status = d_ERR_JSON_VENDOR_LIST_NAME_NOT_STR_OR_LEN_INVAILD;
 					 		break;
 					 	}

 					 }else{
 					 	DBG_STR_STR(d_FUNC_VND_LIST_JSON_PARSER, d_ERR_JSON_VENDOR_FORMAT_INVAILD, 'Vendor List format error');
        				$status = d_ERR_JSON_VENDOR_FORMAT_INVAILD;
        				$retJSON =null;
 					 	break;
 					}
 				}
 			}else{
 				DBG_STR_STR(d_FUNC_VND_LIST_JSON_PARSER, d_ERR_JSON_VENDOR_LIST_KEY_NOT_EXIST, 'Vendor list key not exist!');
 				$status = d_ERR_JSON_VENDOR_LIST_KEY_NOT_EXIST;
 			}

 		}else{
 			DBG_STR_STR(d_FUNC_VND_LIST_JSON_PARSER, d_ERR_JSON_FORMAT_INVAILD, 'The file is not JSON format');
            $status = d_ERR_JSON_FORMAT_INVAILD;
        }	
 	}else{
 		DBG_STR_STR(d_FUNC_VND_LIST_JSON_PARSER, d_ERR_JSON_FILE_INVAILD, 'The Json file you import is invaild');
        $status = d_ERR_JSON_FILE_INVAILD;
    }
 	return INSD_ResultToJSON($status,$retJSON);
 }


define('d_TERM_LIST_POLLING_TIME', 'PollingTime');
define('d_TERM_LIST_EFFECT_TIME', 'EffectTime');
define('d_TERM_LIST_TRANS_SIZE', 'TransSize');
define('d_TERM_LIST_TERM_ID', 'termID');
define('d_TERM_LIST_RPRE_TID', 'rpreTID');
define('d_TERM_LIST_VENDOR', 'Vendor');
define('d_TERM_LIST_MODEL', 'Model');
define('d_TERM_LIST_PID', 'pid');
define('d_TERM_LIST_GROUP', 'Group');
define('d_TERM_LIST_MERCHANT', 'Merchant');
define('d_TERM_LIST_STORE', 'Store');

define('d_TERM_LIST', 'TermList');

define('d_TERM_LIST_TRANSSIZE_LEN_UPPER', 10);
define('d_TERM_LIST_TERM_ID_UPPER', 17);
define('d_TERM_LIST_TERM_ID_LOWER', 0);
define('d_TERM_LIST_RPRE_TID_UPPER', 13);
define('d_TERM_LIST_RPRE_TID_LOWER', 0);
define('d_TERM_LIST_VENDOR_UPPER', 180);
define('d_TERM_LIST_MODEL_UPPER', 180);
define('d_TERM_LIST_PID_UPPER', 8);
define('d_TERM_LIST_GROUP_UPPER', 64);
define('d_TERM_LIST_MERCHANT_UPPER', 11);
define('d_TERM_LIST_STORE_UPPER', 16);

define('d_FUNC_TERM_LIST_JSON_PARSER', 10051);

define('d_ERR_JSON_TERM_LIST_FORMAT_INVAILD',28);
define('d_ERR_JSON_TERM_LIST_KEY_NOT_EXIST',29);
define('d_ERR_JSON_TERM_LIST_POLLING_TIME_INVAILD',30);
define('d_ERR_JSON_TERM_LIST_TRANS_SIZE_INVAILD',31);
define('d_ERR_JSON_TERM_LIST_TERM_ID_INVAILD',32);
define('d_ERR_JSON_TERM_LIST_RPRE_TID_INVAILD',33);
define('d_ERR_JSON_TERM_LIST_VENDOR_INVAILD',34);
define('d_ERR_JSON_TERM_LIST_MODEL_INVAILD',35);
define('d_ERR_JSON_TERM_LIST_PID_INVAILD',36);
define('d_ERR_JSON_TERM_LIST_GROUP_INVAILD',37);
define('d_ERR_JSON_TERM_LIST_MERCHANT_INVAILD',38);
define('d_ERR_JSON_TERM_LIST_STORE_INVAILD',39);
define('d_ERR_JSON_TERM_LIST_EFFECT_TIME_INVAILD',57);

function INSD_TermListJsonParser($JsonFile =null){
 	
 	$retJSON =null;

 	if(is_string($JsonFile) && !empty($JsonFile) && !is_null($JsonFile)){
 		$strJSON = json_decode(file_get_contents($JsonFile), true);

 		if(is_string($strJSON) && is_object($strJSON) || is_array($strJSON)){
			
 			if(array_key_exists(d_TERM_LIST,$strJSON)){
 				foreach ($strJSON[d_TERM_LIST] as $key => $value){
 					 if (array_key_exists(d_TERM_LIST_POLLING_TIME,$value)
 					 	&&array_key_exists(d_TERM_LIST_TRANS_SIZE,$value)
 					 	&&array_key_exists(d_TERM_LIST_TERM_ID,$value)
 					 	&&array_key_exists(d_TERM_LIST_RPRE_TID,$value)
 					 	&&array_key_exists(d_TERM_LIST_VENDOR,$value)
 						&&array_key_exists(d_TERM_LIST_MODEL,$value)
 						&&array_key_exists(d_TERM_LIST_PID,$value)
 						&&array_key_exists(d_TERM_LIST_GROUP,$value)
 						&&array_key_exists(d_TERM_LIST_MERCHANT,$value)
 						&&array_key_exists(d_TERM_LIST_STORE,$value)
 						&&array_key_exists(d_TERM_LIST_EFFECT_TIME,$value)){
 					 	//判斷格式
 					 	if(is_string($value[d_TERM_LIST_POLLING_TIME]) && date('H:i:s', strtotime($value[d_TERM_LIST_POLLING_TIME]))  == $value[d_TERM_LIST_POLLING_TIME]){
 					 		if(is_string($value[d_TERM_LIST_TRANS_SIZE]) && strlen($value[d_TERM_LIST_TRANS_SIZE]) <d_TERM_LIST_TRANSSIZE_LEN_UPPER ){

 					 			if(is_string($value[d_TERM_LIST_TERM_ID]) && 
 					 				(strlen($value[d_TERM_LIST_TERM_ID]) <= d_TERM_LIST_TERM_ID_UPPER)&&
 					 				(strlen($value[d_TERM_LIST_TERM_ID]) > d_TERM_LIST_TERM_ID_LOWER)){

 					 				if(is_string($value[d_TERM_LIST_RPRE_TID]) &&(strlen($value[d_TERM_LIST_RPRE_TID]) <= d_TERM_LIST_RPRE_TID_UPPER)&&(strlen($value[d_TERM_LIST_RPRE_TID]) > d_TERM_LIST_RPRE_TID_LOWER)){
 					 					if(is_string($value[d_TERM_LIST_VENDOR]) && (strlen($value[d_TERM_LIST_VENDOR]) <= d_TERM_LIST_VENDOR_UPPER)){
 					 						if(is_string($value[d_TERM_LIST_MODEL]) && (strlen($value[d_TERM_LIST_MODEL]) <= d_TERM_LIST_MODEL_UPPER)){
 					 							if(is_string($value[d_TERM_LIST_PID]) && (strlen($value[d_TERM_LIST_PID]) <= d_TERM_LIST_PID_UPPER)){
 					 								if(is_string($value[d_TERM_LIST_GROUP]) && (strlen($value[d_TERM_LIST_GROUP]) <= d_TERM_LIST_GROUP_UPPER)){
 					 									if(is_string($value[d_TERM_LIST_MERCHANT]) && (strlen($value[d_TERM_LIST_MERCHANT]) <= d_TERM_LIST_MERCHANT_UPPER)){
 					 										if(is_string($value[d_TERM_LIST_STORE]) && (strlen($value[d_TERM_LIST_STORE]) <= d_TERM_LIST_STORE_UPPER)){
 					 											if(is_string($value[d_TERM_LIST_EFFECT_TIME]) && date('H:i:s', strtotime($value[d_TERM_LIST_EFFECT_TIME]))  == $value[d_TERM_LIST_EFFECT_TIME]){
 					 												DBG_STR_STR(d_FUNC_TERM_LIST_JSON_PARSER, d_OK, 'TERM List Json parser success!');
 																	$retJSON =$strJSON;
 																	$status  = d_OK;

 					 											}else{
 					 												DBG_STR_STR(d_FUNC_TERM_LIST_JSON_PARSER, d_ERR_JSON_TERM_LIST_EFFECT_TIME_INVAILD, 'TERM List EFFECT TIME invaild');
 					 											$status = d_ERR_JSON_TERM_LIST_EFFECT_TIME_INVAILD;
 					 											break;

 					 											}


 					 												
 															}else{
 					 										DBG_STR_STR(d_FUNC_TERM_LIST_JSON_PARSER, d_ERR_JSON_TERM_LIST_STORE_INVAILD, 'TERM List PID invaild');
 					 										$status = d_ERR_JSON_TERM_LIST_STORE_INVAILD;
 					 										break;

 					 										}
 					 									

 					 									}else{
 					 										DBG_STR_STR(d_FUNC_TERM_LIST_JSON_PARSER, d_ERR_JSON_TERM_LIST_MERCHANT_INVAILD, 'TERM List PID invaild');
 					 										$status = d_ERR_JSON_TERM_LIST_MERCHANT_INVAILD;
 					 										break;

 					 									}
 					 								}else{
 					 									DBG_STR_STR(d_FUNC_TERM_LIST_JSON_PARSER, d_ERR_JSON_TERM_LIST_GROUP_INVAILD, 'TERM List PID invaild');
 					 									$status = d_ERR_JSON_TERM_LIST_GROUP_INVAILD;
 					 									break;
 					 								}
 					 							}else{
 					 								DBG_STR_STR(d_FUNC_TERM_LIST_JSON_PARSER, d_ERR_JSON_TERM_LIST_PID_INVAILD, 'TERM List PID invaild');
 					 								$status = d_ERR_JSON_TERM_LIST_PID_INVAILD;
 					 								break;
 					 							}
 					 						}else{
 					 							DBG_STR_STR(d_FUNC_TERM_LIST_JSON_PARSER, d_ERR_JSON_TERM_LIST_MODEL_INVAILD, 'TERM List Model invaild');
 					 							$status = d_ERR_JSON_TERM_LIST_MODEL_INVAILD;
 					 							break;
 					 						}
 					 					}else{
 					 						
 					 						DBG_STR_STR(d_FUNC_TERM_LIST_JSON_PARSER, d_ERR_JSON_TERM_LIST_VENDOR_INVAILD, 'TERM List Vendor invaild');
 					 						$status = d_ERR_JSON_TERM_LIST_VENDOR_INVAILD;
 					 						break;
 					 					}
 					 					
 					 				}else{
 					 					DBG_STR_STR(d_FUNC_TERM_LIST_JSON_PARSER, d_ERR_JSON_TERM_LIST_RPRE_TID_INVAILD, 'TERM List RPRE TID invaild');
 										$retJSON =null;
 					 					$status = d_ERR_JSON_TERM_LIST_RPRE_TID_INVAILD;
 					 					break;

 					 				}	
 					 			}else{
 					 				DBG_STR_STR(d_FUNC_TERM_LIST_JSON_PARSER, d_ERR_JSON_TERM_LIST_TERM_ID_INVAILD, 'TERM List term id invaild');
 									$retJSON =null;
 					 				$status = d_ERR_JSON_TERM_LIST_TERM_ID_INVAILD;
 					 				break;
 					 			}

 					 		
 					 		}else{
 					 		DBG_STR_STR(d_FUNC_TERM_LIST_JSON_PARSER, d_ERR_JSON_TERM_LIST_TRANS_SIZE_INVAILD, 'TERM List trans size invaild');
 							$retJSON =null;
        					$status = d_ERR_JSON_TERM_LIST_TRANS_SIZE_INVAILD;
 					 		break;
 					 		}
 					 		
 					 
 					 	}else{
 					 		DBG_STR_STR(d_FUNC_TERM_LIST_JSON_PARSER, d_ERR_JSON_TERM_LIST_POLLING_TIME_INVAILD, 'TERM List Polling Time is invaild');
 							$retJSON =null;
        					$status = d_ERR_JSON_TERM_LIST_POLLING_TIME_INVAILD;
 					 		break;
 					 	}

 					 }else{
 					 	DBG_STR_STR(d_FUNC_TERM_LIST_JSON_PARSER, d_ERR_JSON_TERM_LIST_FORMAT_INVAILD, 'TERM List format error');
        				$status = d_ERR_JSON_TERM_LIST_FORMAT_INVAILD;
        				$retJSON =null;
 					 	break;
 					}
 				}
 			}else{
 				DBG_STR_STR(d_FUNC_TERM_LIST_JSON_PARSER, d_ERR_JSON_TERM_LIST_KEY_NOT_EXIST, 'TERM list key not exist!');
 				$status = d_ERR_JSON_TERM_LIST_KEY_NOT_EXIST;
 			}

 		}else{
 			DBG_STR_STR(d_FUNC_TERM_LIST_JSON_PARSER, d_ERR_JSON_FORMAT_INVAILD, 'The file is not JSON format');
            $status = d_ERR_JSON_FORMAT_INVAILD;
        }	
 	}else{
 		DBG_STR_STR(d_FUNC_TERM_LIST_JSON_PARSER, d_ERR_JSON_FILE_INVAILD, 'The Json file you import is invaild');
        $status = d_ERR_JSON_FILE_INVAILD;
    }
 	return INSD_ResultToJSON($status,$retJSON);
 }



define('d_MODEL_LIST', 'ModelList');


define('d_MODEL_LIST_VND_NAME', 'VND_Name');
define('d_MODEL_LIST_OS_NAME', 'OS_Name');
define('d_MODEL_LIST_MODEL_ID', 'Model_ID');
define('d_MODEL_LIST_MODEL_NAME', 'Model_NAME');
define('d_MODEL_LIST_MODEL_FW_VER', 'Model_fw_Ver');
define('d_MODEL_LIST_MODEL_FW_VRC_LOWER', 'Model_FW_VRCode_Lower');
define('d_MODEL_LIST_MODLE_FW_VRC_UPPER', 'Model_FW_VRCode_Upper');
define('d_MODEL_LIST_OS_VRC_LOWER', 'OS_VRCode_Lower');
define('d_MODEL_LIST_OS_VRC_UPPER', 'OS_VRCode_Upper');

define('d_FUNC_MODEL_LIST_JSON_PARSER', 10052);

define('d_MODEL_LIST_VENDOR_UPPER', 180);
define('d_MODEL_LIST_OS_NAME_UPPER', 180);
define('d_MODEL_LIST_MODEL_ID_UPPER', 10);
define('d_MODEL_LIST_MODEL_ID_LOWER', 0);
define('d_MODEL_LIST_MODEL_NAME_UPPER', 180);
define('d_MODEL_LIST_MODEL_FW_VER_UPPER', 12);
define('d_MODEL_LIST_MODEL_FW_VRC_LOWER_MAX', 10);
define('d_MODEL_LIST_MODEL_FW_VRC_LOWER_MIN', 0);
define('d_MODEL_LIST_MODEL_FW_VRC_UPPER_MAX', 10);
define('d_MODEL_LIST_MODEL_FW_VRC_UPPER_MIN', 0);
define('d_MODEL_LIST_OS_VRC_LOWER_MAX', 10);
define('d_MODEL_LIST_OS_VRC_LOWER_MIN', 0);
define('d_MODEL_LIST_OS_VRC_UPPER_MAX', 10);
define('d_MODEL_LIST_OS_VRC_UPPER_MIN', 0);
 


define('d_ERR_JSON_MODEL_LIST_VENDOR_INVAILD',40);
define('d_ERR_JSON_MODEL_LIST_OS_NAME_NOT_EXIST',41);
define('d_ERR_JSON_MODEL_LIST_MODEL_ID_INVAILD',42);
define('d_ERR_JSON_MODEL_LIST_MODEL_NAME_INVAILD',43);
define('d_ERR_JSON_MODEL_LIST_MODEL_FW_VER_INVAILD',44);
define('d_ERR_JSON_MODEL_LIST_MODEL_FW_VRC_LOWER_INVAILD',45);
define('d_ERR_JSON_MODEL_LIST_MODEL_FW_VRC_UPPER_INVAILD',46);
define('d_ERR_JSON_MODEL_LIST_OS_VRC_LOWER_INVAILD',47);
define('d_ERR_JSON_MODEL_LIST_OS_VRC_UPPER_INVAILD',48);
define('d_ERR_JSON_MODEL_LIST_KEY_NOT_EXIST',49);
define('d_ERR_JSON_MODEL_LIST_FORMAT_INVAILD',50);


function INSD_ModelListJsonParser($JsonFile =null){
 	
 	$retJSON =null;

 	if(is_string($JsonFile) && !empty($JsonFile) && !is_null($JsonFile)){
 		$strJSON = json_decode(file_get_contents($JsonFile), true);

 		if(is_string($strJSON) && is_object($strJSON) || is_array($strJSON)){
			
 			if(array_key_exists(d_MODEL_LIST,$strJSON)){
 				foreach ($strJSON[d_MODEL_LIST] as $key => $value){
 					 if (array_key_exists(d_MODEL_LIST_VND_NAME,$value)
 					 	&&array_key_exists(d_MODEL_LIST_OS_NAME,$value)
 					 	&&array_key_exists(d_MODEL_LIST_MODEL_ID,$value)
 					 	&&array_key_exists(d_MODEL_LIST_MODEL_NAME,$value)
 					 	&&array_key_exists(d_MODEL_LIST_MODEL_FW_VER,$value)
 						&&array_key_exists(d_MODEL_LIST_MODEL_FW_VRC_LOWER,$value)
 						&&array_key_exists(d_MODEL_LIST_MODLE_FW_VRC_UPPER,$value)
 						&&array_key_exists(d_MODEL_LIST_OS_VRC_LOWER,$value)
 						&&array_key_exists(d_MODEL_LIST_OS_VRC_UPPER,$value)){
 					 	//判斷格式
 					 	if(is_string($value[d_MODEL_LIST_VND_NAME]) &&(strlen($value[d_MODEL_LIST_VND_NAME]) <= d_MODEL_LIST_VENDOR_UPPER)){
 					 		if(is_string($value[d_MODEL_LIST_OS_NAME]) && strlen($value[d_MODEL_LIST_OS_NAME]) <=d_MODEL_LIST_OS_NAME_UPPER ){

 					 			if(is_string($value[d_MODEL_LIST_MODEL_ID]) && 
 					 				(strlen($value[d_MODEL_LIST_MODEL_ID]) <= d_MODEL_LIST_MODEL_ID_UPPER)&&
 					 				(strlen($value[d_MODEL_LIST_MODEL_ID]) > d_MODEL_LIST_MODEL_ID_LOWER)){

 					 				if(is_string($value[d_MODEL_LIST_MODEL_NAME]) &&(strlen($value[d_MODEL_LIST_MODEL_NAME]) <= d_MODEL_LIST_MODEL_NAME_UPPER)){
 					 					if(is_string($value[d_MODEL_LIST_MODEL_FW_VER]) && (strlen($value[d_MODEL_LIST_MODEL_FW_VER]) <= d_MODEL_LIST_MODEL_FW_VER_UPPER)){
 					 						if(is_string($value[d_MODEL_LIST_MODEL_FW_VRC_LOWER]) && (strlen($value[d_MODEL_LIST_MODEL_FW_VRC_LOWER]) <= d_MODEL_LIST_MODEL_FW_VRC_LOWER_MAX) && (strlen($value[d_MODEL_LIST_MODEL_FW_VRC_LOWER]) > d_MODEL_LIST_MODEL_FW_VRC_LOWER_MIN)){
 					 							if(is_string($value[d_MODEL_LIST_MODLE_FW_VRC_UPPER]) && (strlen($value[d_MODEL_LIST_MODLE_FW_VRC_UPPER]) <= d_MODEL_LIST_MODEL_FW_VRC_UPPER_MAX)&& (strlen($value[d_MODEL_LIST_MODLE_FW_VRC_UPPER]) > d_MODEL_LIST_MODEL_FW_VRC_UPPER_MIN)){
 					 								if(is_string($value[d_MODEL_LIST_OS_VRC_LOWER]) && (strlen($value[d_MODEL_LIST_OS_VRC_LOWER]) <= d_MODEL_LIST_OS_VRC_LOWER_MAX)&& (strlen($value[d_MODEL_LIST_OS_VRC_LOWER]) > d_MODEL_LIST_OS_VRC_LOWER_MIN)){
 					 									if(is_string($value[d_MODEL_LIST_OS_VRC_UPPER]) && (strlen($value[d_MODEL_LIST_OS_VRC_UPPER]) <= d_MODEL_LIST_OS_VRC_UPPER_MAX)&& (strlen($value[d_MODEL_LIST_OS_VRC_UPPER]) > d_MODEL_LIST_OS_VRC_UPPER_MIN)){

 					 										DBG_STR_STR(d_FUNC_MODEL_LIST_JSON_PARSER, d_OK, 'Model TERM List Json parser success!');
 																	$retJSON =$strJSON;
 																	$status  = d_OK;
 					 										
 					 									

 					 									}else{
 					 										DBG_STR_STR(d_FUNC_MODEL_LIST_JSON_PARSER, d_ERR_JSON_MODEL_LIST_OS_VRC_UPPER_INVAILD, 'Model List os vrcode upper invaild');
 					 										$status = d_ERR_JSON_MODEL_LIST_OS_VRC_UPPER_INVAILD;
 					 										break;

 					 									}
 					 								}else{
 					 									DBG_STR_STR(d_FUNC_MODEL_LIST_JSON_PARSER, d_ERR_JSON_MODEL_LIST_OS_VRC_LOWER_INVAILD, 'Model List os vrcode lower invaild');
 					 									$status = d_ERR_JSON_MODEL_LIST_OS_VRC_LOWER_INVAILD;
 					 									break;
 					 								}
 					 							}else{
 					 								DBG_STR_STR(d_FUNC_MODEL_LIST_JSON_PARSER, d_ERR_JSON_MODEL_LIST_MODEL_FW_VRC_UPPER_INVAILD, 'Model List model firmwave vrcode upper invaild');
 					 								$status = d_ERR_JSON_MODEL_LIST_MODEL_FW_VRC_UPPER_INVAILD;
 					 								break;
 					 							}
 					 						}else{
 					 							DBG_STR_STR(d_FUNC_MODEL_LIST_JSON_PARSER, d_ERR_JSON_MODEL_LIST_MODEL_FW_VRC_LOWER_INVAILD, 'Model List model firmwave vrcode lower invaild');
 					 							$status = d_ERR_JSON_MODEL_LIST_MODEL_FW_VRC_LOWER_INVAILD;
 					 							break;
 					 						}
 					 					}else{
 					 						
 					 						DBG_STR_STR(d_FUNC_MODEL_LIST_JSON_PARSER, d_ERR_JSON_MODEL_LIST_MODEL_FW_VER_INVAILD, 'Model List model firmwave version invaild');
 					 						$status = d_ERR_JSON_MODEL_LIST_MODEL_FW_VER_INVAILD;
 					 						break;
 					 					}
 					 					
 					 				}else{
 					 					DBG_STR_STR(d_FUNC_MODEL_LIST_JSON_PARSER, d_ERR_JSON_MODEL_LIST_MODEL_NAME_INVAILD, 'Model List model name invaild');
 										$retJSON =null;
 					 					$status = d_ERR_JSON_MODEL_LIST_MODEL_NAME_INVAILD;
 					 					break;

 					 				}	
 					 			}else{
 					 				DBG_STR_STR(d_FUNC_MODEL_LIST_JSON_PARSER, d_ERR_JSON_MODEL_LIST_MODEL_ID_INVAILD, 'Model List model id invaild');
 									$retJSON =null;
 					 				$status = d_ERR_JSON_MODEL_LIST_MODEL_ID_INVAILD;
 					 				break;
 					 			}

 					 		
 					 		}else{
 					 		DBG_STR_STR(d_FUNC_MODEL_LIST_JSON_PARSER, d_ERR_JSON_MODEL_LIST_OS_NAME_NOT_EXIST, 'Model List OS name invaild');
 							$retJSON =null;
        					$status = d_ERR_JSON_MODEL_LIST_OS_NAME_NOT_EXIST;
 					 		break;
 					 		}
 					 		
 					 
 					 	}else{
 					 		DBG_STR_STR(d_FUNC_MODEL_LIST_JSON_PARSER, d_ERR_JSON_MODEL_LIST_VENDOR_INVAILD, 'Model List vendor is invaild');
 							$retJSON =null;
        					$status = d_ERR_JSON_MODEL_LIST_VENDOR_INVAILD;
 					 		break;
 					 	}

 					 }else{
 					 	DBG_STR_STR(d_FUNC_MODEL_LIST_JSON_PARSER, d_ERR_JSON_MODEL_LIST_FORMAT_INVAILD, 'Model List format error');
        				$status = d_ERR_JSON_MODEL_LIST_FORMAT_INVAILD;
        				$retJSON =null;
 					 	break;
 					}
 				}
 			}else{
 				DBG_STR_STR(d_FUNC_MODEL_LIST_JSON_PARSER, d_ERR_JSON_MODEL_LIST_KEY_NOT_EXIST, 'Model list key not exist!');
 				$status = d_ERR_JSON_MODEL_LIST_KEY_NOT_EXIST;
 			}

 		}else{
 			DBG_STR_STR(d_FUNC_MODEL_LIST_JSON_PARSER, d_ERR_JSON_FORMAT_INVAILD, 'The file is not JSON format');
            $status = d_ERR_JSON_FORMAT_INVAILD;
        }	
 	}else{
 		DBG_STR_STR(d_FUNC_MODEL_LIST_JSON_PARSER, d_ERR_JSON_FILE_INVAILD, 'The Json file you import is invaild');
        $status = d_ERR_JSON_FILE_INVAILD;
    }
 	return INSD_ResultToJSON($status,$retJSON);
 }

 

define('d_OS_LIST', 'OSList');

define('d_OS_LIST_OS_ID', 'OS_ID');
define('d_OS_LIST_OS_NAME', 'OS_Name');
define('d_OS_LIST_OS_VER', 'OS_VER');
define('d_OS_LIST_OS_VRCODE', 'OS_VRCode');

define('d_FUNC_OS_LIST_JSON_PARSER', 10053);

define('d_OS_LIST_OS_ID_UPPER', 10);
define('d_OS_LIST_OS_ID_LOWER', 0);
define('d_OS_LIST_OS_NAME_UPPER', 180);
define('d_OS_LIST_OS_VER_UPPER', 12);
define('d_OS_LIST_OS_VRCODE_UPPER', 10);
define('d_OS_LIST_OS_VRCODE_LOWER', 0);

define('d_ERR_JSON_OS_LIST_OS_ID_INVAILD',51);
define('d_ERR_JSON_OS_LIST_OS_NAME_INVAILD',52);
define('d_ERR_JSON_OS_LIST_OS_VER_INVAILD',53);
define('d_ERR_JSON_OS_LIST_OS_VRCODE_INVAILD',54);
 
 
define('d_ERR_JSON_OS_LIST_KEY_NOT_EXIST',55);
define('d_ERR_JSON_OS_LIST_FORMAT_INVAILD',56);





function INSD_OSListJsonParser($JsonFile =null){
 	
 	$retJSON =null;

 	if(is_string($JsonFile) && !empty($JsonFile) && !is_null($JsonFile)){
 		$strJSON = json_decode(file_get_contents($JsonFile), true);

 		if(is_string($strJSON) && is_object($strJSON) || is_array($strJSON)){
			
 			if(array_key_exists(d_OS_LIST,$strJSON)){
 				foreach ($strJSON[d_OS_LIST] as $key => $value){
 					 if (array_key_exists(d_OS_LIST_OS_ID,$value)
 					 	&&array_key_exists(d_OS_LIST_OS_NAME,$value)
 					 	&&array_key_exists(d_OS_LIST_OS_VER,$value)
 					 	&&array_key_exists(d_OS_LIST_OS_VRCODE,$value)){
 					 	//判斷格式
 					 	if(is_string($value[d_OS_LIST_OS_ID]) &&(strlen($value[d_OS_LIST_OS_ID]) <= d_OS_LIST_OS_ID_UPPER)&&(strlen($value[d_OS_LIST_OS_ID]) > d_OS_LIST_OS_ID_LOWER)){
 					 		if(is_string($value[d_OS_LIST_OS_NAME]) && strlen($value[d_OS_LIST_OS_NAME]) <=d_OS_LIST_OS_NAME_UPPER ){

 					 			if(is_string($value[d_OS_LIST_OS_VER]) && 
 					 				(strlen($value[d_OS_LIST_OS_VER]) <= d_OS_LIST_OS_VER_UPPER)){

 					 				if(is_string($value[d_OS_LIST_OS_VRCODE]) &&(strlen($value[d_OS_LIST_OS_VRCODE]) <= d_OS_LIST_OS_VRCODE_UPPER)&&(strlen($value[d_OS_LIST_OS_VRCODE]) > d_OS_LIST_OS_VRCODE_LOWER)){
 					 						DBG_STR_STR(d_FUNC_OS_LIST_JSON_PARSER, d_OK, 'TERM List Json parser success!');
 											$retJSON =$strJSON;
 											$status  = d_OK;
 					 					
 					 					
 					 				}else{
 					 					DBG_STR_STR(d_FUNC_OS_LIST_JSON_PARSER, d_ERR_JSON_OS_LIST_OS_VRCODE_INVAILD, 'OS List os vrcode invaild');
 										$retJSON =null;
 					 					$status = d_ERR_JSON_OS_LIST_OS_VRCODE_INVAILD;
 					 					break;

 					 				}	
 					 			}else{
 					 				DBG_STR_STR(d_FUNC_OS_LIST_JSON_PARSER, d_ERR_JSON_OS_LIST_OS_VER_INVAILD, 'OS List OS Version invaild');
 									$retJSON =null;
 					 				$status = d_ERR_JSON_OS_LIST_OS_VER_INVAILD;
 					 				break;
 					 			}

 					 		
 					 		}else{
 					 		DBG_STR_STR(d_FUNC_OS_LIST_JSON_PARSER, d_ERR_JSON_OS_LIST_OS_NAME_INVAILD, 'OS List OS name invaild');
 							$retJSON =null;
        					$status = d_ERR_JSON_OS_LIST_OS_NAME_INVAILD;
 					 		break;
 					 		}
 					 		
 					 
 					 	}else{
 					 		DBG_STR_STR(d_FUNC_OS_LIST_JSON_PARSER, d_ERR_JSON_OS_LIST_OS_ID_INVAILD, 'OS List OS ID is invaild');
 							$retJSON =null;
        					$status = d_ERR_JSON_OS_LIST_OS_ID_INVAILD;
 					 		break;
 					 	}

 					 }else{
 					 	DBG_STR_STR(d_FUNC_OS_LIST_JSON_PARSER, d_ERR_JSON_OS_LIST_FORMAT_INVAILD, 'OS List format error');
        				$status = d_ERR_JSON_OS_LIST_FORMAT_INVAILD;
        				$retJSON =null;
 					 	break;
 					}
 				}
 			}else{
 				DBG_STR_STR(d_FUNC_OS_LIST_JSON_PARSER, d_ERR_JSON_OS_LIST_KEY_NOT_EXIST, 'OS list key not exist!');
 				$status = d_ERR_JSON_OS_LIST_KEY_NOT_EXIST;
 			}

 		}else{
 			DBG_STR_STR(d_FUNC_OS_LIST_JSON_PARSER, d_ERR_JSON_FORMAT_INVAILD, 'The file is not JSON format');
            $status = d_ERR_JSON_FORMAT_INVAILD;
        }	
 	}else{
 		DBG_STR_STR(d_FUNC_OS_LIST_JSON_PARSER, d_ERR_JSON_FILE_INVAILD, 'The Json file you import is invaild');
        $status = d_ERR_JSON_FILE_INVAILD;
    }
 	return INSD_ResultToJSON($status,$retJSON);
 }
// 2018/07/24 
?>