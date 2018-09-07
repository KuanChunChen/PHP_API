<?php
require_once __DIR__ . '/include/error.php';
require_once __DIR__ . '/include/define.php';
require_once __DIR__ . '/include/logdefine.php';
require_once __DIR__ . '/include/sqldefine.php';
require_once __DIR__ . '/insd_db.php';
require_once __DIR__ . '/insd_sql.php';
require_once __DIR__ . '/insd_debug.php';
require_once __DIR__ . '/insd_common.php';
//$test = INSD_DB_Connect();

 
//func
define ('d_FUNC_VENDOR_GET_VENDOR_LIST', 10020);
define ('d_FUNC_VENDOR_INSERT_VENDOR_LIST', 10021);
define ('d_FUNC_OS_INSERT_OS', 10022);
define ('d_FUNC_OS_GET_OS_LIST', 10023);
define ('d_FUNC_OS_VER_GET_OS_VER_INFO', 10024);
define ('d_FUNC_MODEL_GET_MODEL_LIST', 10025);
define ('d_FUNC_MODEL_INSERT_MODEL', 10026);
define ('d_FUNC_MODEL_FW_VER_INSERT_MODEL_VER', 10027);
define ('d_FUNC_MODEL_FW_VER_GET_MODEL_VER_INFO', 10028);
//insert venedor
define ( 'd_TAB_VENDOR',	'vendor' );
define ( 'd_VENDOR_VND_ID',	'VND_ID' );
define ( 'd_VENDOR_TYPE',	'Type' );
define ( 'd_VENDOR_NAME',	'Name' );
//get vendorlist
define ( 'd_VENDOR_LIST_COL_VENDOR_ID',	'VND_ID' );
define ( 'd_VENDOR_LIST_COL_TYPE',	'Vendor_Type' );
define ( 'd_VENDOR_LIST_COL_NAME',	'Vendor_Name' );

//OS
define('d_TAB_OS', 'os');
define('d_O_OS_ID', 'OS_ID');
define('d_O_OS_NAME', 'Name');
//
define('d_OS_LIST_COL_OS_ID', d_O_OS_ID);
define('d_OS_LIST_COL_NAME', d_O_OS_NAME);
//OS VER
define('d_TAB_OS_VER', 'os_version');
define('d_OV_OS_ID', 'OS_ID');
define('d_OV_VERSION', 'Version');
define('d_OV_VRCODE', 'VRCode');
//
define ( 'd_OS_VER_INFO_COL_OS_ID',	'OS_ID' );
define ( 'd_OS_VER_INFO_COL_VERSION',	'Version' );
define ( 'd_OS_VER_INFO_COL_VERCODE',	'VRCode' );
 
//model
define('d_TAB_MODEL', 'model');

define('d_M_M_ID', 'M_ID');
define('d_M_NAME', 'Name');
define('d_M_VND_ID', 'VND_ID');
define('d_M_DEF_OS_ID', 'Default_OS_ID');
//
define('d_MODEL_LIST_COL_M_ID', d_M_M_ID);
define('d_MODEL_LIST_COL_NAME', d_M_NAME);
define('d_MODEL_LIST_COL_VND_ID', d_M_VND_ID);
define('d_MODEL_LIST_COL_DEF_OS_ID', d_M_DEF_OS_ID);

//model fw ver
define('d_TAB_MODEL_VER', 'model_fw_version');

define('d_MFV_M_ID', 'M_ID');
define('d_MFV_VERSION', 'Version');
define('d_MFV_VRCODE', 'VRCode');
 
define('d_MODEL_FW_VER_INFO_COL_M_ID', d_MFV_M_ID);
define('d_MODEL_FW_VER_INFO_COL_VERSION', d_MFV_VERSION);
define('d_MODEL_FW_VER_INFO_COL_VERCODE', d_MFV_VRCODE);



function INSD_InsertVendor($type =0, $name = null)
{
	$retJSON = null;
	if ($type > 0 && !is_null($name) ) {
		
		$sqlCmd ='INSERT INTO `' . d_TAB_VENDOR. '`(`' . d_VENDOR_TYPE .'`,`' .d_VENDOR_NAME . '`)'.'VALUES' . '(' . ':'.d_VENDOR_TYPE .', :'.d_VENDOR_NAME .')';

		$result = INSD_DB_Query($sqlCmd, array(':' .d_VENDOR_TYPE => $type,':' .d_VENDOR_NAME =>$name
				));
		if($result->Status == d_OK){
			$result =INSD_DB_LastInsertID();
			if($result->Status == d_OK){	
				DBG_STR_STR(d_FUNC_VENDOR_GET_VENDOR_LIST, d_OK, 'Insert vendor information successful', $result->Status);
				$retJSON = array("LastInsertID" => $result->Data);
				$status = d_OK;
			}else{
				DBG_STR_STR(d_FUNC_VENDOR_GET_VENDOR_LIST, $result->Status, 'Get Last Insert ID  failure', $sqlCmd);
				$status =$result->Status;
			}
			
		}else{
			DBG_STR_STR(d_FUNC_VENDOR_GET_VENDOR_LIST, $result->Status, 'Insert vendor information into DB failure', $sqlCmd);
			$status = $result->Status;
		}
	}else{
		DBG_STR_STR(d_FUNC_VENDOR_GET_VENDOR_LIST, d_ERR_COMM_PARAMETER_INVALID, 'Insert vendor parameter invalid', 'type :' . $type .'name :' . $name); 
		$status = d_ERR_COMM_PARAMETER_INVALID;

	}
	return INSD_ResultToJSON($status, $retJSON);
	 
}




function INSD_GetVendorList($type = 0){
	
	$retJSON = null;
  
 	if ($type >= 0 ) {
 		if($type ==0){
 			$sqlCmd ='SELECT ' .'*' . 'FROM`' . d_TAB_VENDOR .'`';
 			$sqlCmd .= ' WHERE `' . d_U_DELETED . '` = '.d_DATA_LOGIC_UNEXPURGATED;
 		
 		}else{
			$sqlCmd = 'SELECT `' . d_VENDOR_VND_ID.'`,`'.d_VENDOR_TYPE . '`,`' . d_VENDOR_NAME . '`'; 
			$sqlCmd .= ' FROM `' . d_TAB_VENDOR . '`';
			$sqlCmd .= ' WHERE `' . d_VENDOR_TYPE .'`=:'.d_VENDOR_TYPE ;
			$sqlCmd .= ' AND'.'`'.d_U_DELETED . '` = '.d_DATA_LOGIC_UNEXPURGATED;
		}	
 	$result = INSD_DB_Query($sqlCmd,array(':' .d_VENDOR_TYPE => $type));
		if ($result->Status == d_OK) {
			$result = INSD_DB_RowCount();
			if ($result->Status == d_OK) {
				if ($result->Data > 0) {
					$retJSON = array();
					while (($result = INSD_DB_Result(d_DB_FETCH_MODE_ASSOC)) && ($result->Status == d_OK)) {
						array_push($retJSON, array(
							d_VENDOR_LIST_COL_VENDOR_ID => $result->Data->{d_VENDOR_VND_ID},
							d_VENDOR_LIST_COL_TYPE => $result->Data->{d_VENDOR_TYPE},
							d_VENDOR_LIST_COL_NAME => $result->Data->{d_VENDOR_NAME}
							
						));
					}
					DBG_STR_STR(d_FUNC_VENDOR_GET_VENDOR_LIST, d_OK, 'Get VendorList successful', json_encode($retJSON));
					$status = d_OK;
				} else {
					DBG_STR_STR(d_FUNC_VENDOR_GET_VENDOR_LIST, d_ERR_COMM_NO_ANY_DATA, 'Get  VendorList from DB failure', $sqlCmd);
					$status = d_ERR_COMM_NO_ANY_DATA;
				}
			} else {
				DBG_STR_STR(d_FUNC_VENDOR_GET_VENDOR_LIST, $result->Status, 'Get VendorList count from DB failure', $sqlCmd);
				$status = $result->Status;
			}
		} else {
			DBG_STR_STR(d_FUNC_VENDOR_GET_VENDOR_LIST, $result->Status, 'Get VendorList from DB failure', $sqlCmd);
			$status = $result->Status;
		}
	} else {

		DBG_STR_STR(d_FUNC_VENDOR_GET_VENDOR_LIST, d_ERR_COMM_PARAMETER_INVALID, 'Input type invalid', 'type :' . $type);		
		$status = d_ERR_COMM_PARAMETER_INVALID;
	}
	return INSD_ResultToJSON($status, $retJSON);

}

function INSD_InsertOS($name = null)
{	$retJSON=null;
	if (!is_null($name) ) {
		
		$sqlCmd ='INSERT INTO `' . d_TAB_OS . '`(`' . d_O_OS_NAME .'`)'.'VALUES' . '(:' .d_O_OS_NAME .')';
		$result = INSD_DB_Query($sqlCmd,array(':' .d_O_OS_NAME => $name));
		if($result->Status == d_OK){
			$result =INSD_DB_LastInsertID();
			if($result->Status == d_OK){	
				DBG_STR_STR(d_FUNC_VENDOR_GET_VENDOR_LIST, d_OK, 'Insert OS information successful', $result->Status);
				$retJSON = array("LastInsertID" => $result->Data);
				$status = d_OK;
			}else{
				DBG_STR_STR(d_FUNC_OS_INSERT_OS, $result->Status, 'Get Last Insert ID failure', $sqlCmd);
				$status =$result->Status;
			}
		}else{
			DBG_STR_STR(d_FUNC_OS_INSERT_OS, $result->Status, 'Insert OS information into DB failure', $sqlCmd);
			$status = $result->Status;
		}
	}else{
 
		DBG_STR_STR(d_FUNC_OS_INSERT_OS, d_ERR_COMM_PARAMETER_INVALID, 'Insert OS parameter invalid', 'name :' . $name);
		$status = d_ERR_COMM_PARAMETER_INVALID;
	}
	return INSD_ResultToJSON($status, $retJSON);
}



function INSD_GetOSList()
{
	$retJSON = null;

	$sqlCmd = 'SELECT ' .'*'; 
	$sqlCmd .= ' FROM `' . d_TAB_OS . '`';
	$sqlCmd .= ' WHERE `' . d_U_DELETED . '` = '.d_DATA_LOGIC_UNEXPURGATED;
 	$result = INSD_DB_Query($sqlCmd);
		if ($result->Status == d_OK) {
			$result = INSD_DB_RowCount();
			if ($result->Status == d_OK) {
				if ($result->Data > 0) {
					$retJSON = array();
					while (($result = INSD_DB_Result(d_DB_FETCH_MODE_ASSOC)) && ($result->Status == d_OK)) {
						array_push($retJSON, array(
							d_OS_LIST_COL_OS_ID => $result->Data->{d_O_OS_ID},
							d_OS_LIST_COL_NAME => $result->Data->{d_O_OS_NAME}
							
						));
					}
					DBG_STR_STR(d_FUNC_OS_GET_OS_LIST, d_OK, 'Get OSList successful', json_encode($retJSON));
					$status = d_OK;
				} else {
					DBG_STR_STR(d_FUNC_OS_GET_OS_LIST, d_ERR_COMM_NO_ANY_DATA, 'Get  VendorList from DB failure', $sqlCmd);
					$status = d_ERR_COMM_NO_ANY_DATA;
				}
			}else{
				DBG_STR_STR(d_FUNC_OS_GET_OS_LIST, $result->Status, 'Get OSList count from DB failure', $sqlCmd);
				$status = $result->Status;
			}
		}else{
			DBG_STR_STR(d_FUNC_OS_GET_OS_LIST, $result->Status, 'Get OSList from DB failure', $sqlCmd);
			$status = $result->Status;
		}
	
	return INSD_ResultToJSON($status, $retJSON);
}


function INSD_InsertOSVer($osID = 0, $version = "null", $verCode = 0)
{	

	$retJSON =null;

	if ($osID > 0 && !is_null($version) && $verCode > 0 ) {
		
		$sqlCmd ='INSERT INTO `' . d_TAB_OS_VER . '` (`' . d_OV_OS_ID .'`, `'.d_OV_VERSION.'`, `'.d_OV_VRCODE.'`)'.' VALUES ' . '(:' .d_OV_OS_ID .', :'.d_OV_VERSION.', :'.d_OV_VRCODE.')';
		 
		$result = INSD_DB_Query($sqlCmd,array(':' .d_OV_OS_ID => $osID,':' .d_OV_VERSION => $version,':' .d_OV_VRCODE => $verCode));
		if($result->Status == d_OK){
			
				DBG_STR_STR(d_FUNC_VENDOR_GET_VENDOR_LIST, d_OK, 'Insert OS Version information successful', $result->Status);
				$retJSON = array("LastInsertID" => $osID);
				$status = d_OK;
			
		}else{
			DBG_STR_STR(d_FUNC_OS_INSERT_OS, $result->Status, 'Insert OS Version information into DB failure', $sqlCmd);
			$status = $result->Status;
		}
	}else{
 
		DBG_STR_STR(d_FUNC_OS_INSERT_OS, d_ERR_COMM_PARAMETER_INVALID, 'Insert OS Version parameter invalid', 'osID :' . $osID .'version :' . $version .'verCode :' . $verCode);
		$status = d_ERR_COMM_PARAMETER_INVALID;
	}
	return INSD_ResultToJSON($status, $retJSON);

}



function INSD_GetOSVerInfo($osID = 0)
{
	$retJSON = null;

	if ($osID > 0) {
		$sqlCmd = 'SELECT `' .d_OV_OS_ID. '`,`'. d_OV_VERSION . '`,`'.d_OV_VRCODE .'`'; 
		$sqlCmd .= ' FROM `' . d_TAB_OS_VER . '`';
		$sqlCmd .= ' WHERE `' . d_OV_OS_ID .'`=:'.d_OV_OS_ID ;
		$sqlCmd .= ' AND'.'`'.d_U_DELETED . '` = '.d_DATA_LOGIC_UNEXPURGATED;

		
		$result = INSD_DB_Query($sqlCmd,array(':' .d_OV_OS_ID => $osID));
		if ($result->Status == d_OK) {
			$result = INSD_DB_RowCount();
			if ($result->Status == d_OK) {
				if ($result->Data > 0) {
					
					$retJSON = array();
					while (($result = INSD_DB_Result(d_DB_FETCH_MODE_ASSOC)) && ($result->Status == d_OK)) {
						array_push($retJSON, array(
							d_OS_VER_INFO_COL_OS_ID=>$result->Data->{d_OV_OS_ID},
							d_OS_VER_INFO_COL_VERSION => $result->Data->{d_OV_VERSION},
							d_OS_VER_INFO_COL_VERCODE => $result->Data->{d_OV_VRCODE}
							
						));
					}
					DBG_STR_STR(d_FUNC_OS_VER_GET_OS_VER_INFO, d_OK, 'Get OS successful', json_encode($retJSON));
					$status = d_OK;
				
				} else {
					DBG_STR_STR(d_FUNC_OS_VER_GET_OS_VER_INFO, d_ERR_COMM_NO_ANY_DATA, 'Get OSVerInfo information count from DB failure', $sqlCmd);
					$status = d_ERR_COMM_NO_ANY_DATA;
				}
			} else {
				DBG_STR_STR(d_FUNC_OS_VER_GET_OS_VER_INFO, $result->Status, 'Get OSVerInfo information count from DB failure', $sqlCmd);
				$status = $result->Status;
			}
		} else {
			DBG_STR_STR(d_FUNC_OS_VER_GET_OS_VER_INFO, $result->Status, 'Get OSVerInfo information from DB failure', $sqlCmd);
			$status = $result->Status;
		}
		
	} else {
		DBG_STR_STR(d_FUNC_OS_VER_GET_OS_VER_INFO, d_ERR_COMM_PARAMETER_INVALID, 'Input os ID invalid', 'osID :' . $osID);
		$status = d_ERR_COMM_PARAMETER_INVALID;
	}
	return INSD_ResultToJSON($status, $retJSON);
}




 

function INSD_InsertModel($name = null, $vndID = 0, $defOSID = 0)
{

	$retJSON =null;

	if (!is_null($name) && $vndID > 0  && $defOSID > 0 ) {
		
		$sqlCmd ='INSERT INTO `' . d_TAB_MODEL . '` (`' . d_M_NAME .'`, `'.d_M_VND_ID.'`, `'.d_M_DEF_OS_ID.'`)'.' VALUES ' . '(:' .d_M_NAME .', :'.d_M_VND_ID.', :'.d_M_DEF_OS_ID.')';
		
		$result = INSD_DB_Query($sqlCmd,array(':' .d_M_NAME => $name,':' .d_M_VND_ID => $vndID,':' .d_M_DEF_OS_ID => $defOSID));
		
		if($result->Status == d_OK){
			
			$result =INSD_DB_LastInsertID();
			if($result->Status == d_OK){	
				DBG_STR_STR(d_FUNC_MODEL_INSERT_MODEL, d_OK, 'Insert Model information successful', $result->Status);
				$retJSON = array("LastInsertID" => $result->Data);
				$status = d_OK;
			}else{
				DBG_STR_STR(d_FUNC_MODEL_INSERT_MODEL, $result->Status, 'Get Last Insert ID failure', $sqlCmd);
				$status =$result->Status;
			}
			
		}else{
			DBG_STR_STR(d_FUNC_MODEL_INSERT_MODEL, $result->Status, 'Insert Model Version information into DB failure', $sqlCmd);
			$status = $result->Status;
		}
	}else{
 
		DBG_STR_STR(d_FUNC_MODEL_INSERT_MODEL, d_ERR_COMM_PARAMETER_INVALID, 'Insert Model Version parameter invalid', 'name :' . $name .'vndID :' . $vndID .'defOSID :' . $defOSID);
		$status = d_ERR_COMM_PARAMETER_INVALID;
	}
	return INSD_ResultToJSON($status, $retJSON);

}
 

function INSD_GetModelList($vndID = 0)
{
	$retJSON = null;
  
 	if ($vndID >= 0 ) {
 		if($vndID ==0){
 			$sqlCmd ='SELECT ' .'* ' . 'FROM `' . d_TAB_MODEL .'`';
 			$sqlCmd .= ' WHERE `' . d_U_DELETED . '` = '.d_DATA_LOGIC_UNEXPURGATED;
 			 
 		}else{
			$sqlCmd = 'SELECT `' . d_M_M_ID.'`,`'.d_M_NAME . '`,`' . d_M_VND_ID . '`,`' .d_M_DEF_OS_ID. '`'; 
			$sqlCmd .= ' FROM `' . d_TAB_MODEL . '`';
			$sqlCmd .= ' WHERE `' . d_M_VND_ID .'`=:'.d_M_VND_ID ;
			$sqlCmd .= ' AND'.'`'.d_U_DELETED . '` = '.d_DATA_LOGIC_UNEXPURGATED;
		}	
 	$result = INSD_DB_Query($sqlCmd,array(':' .d_M_VND_ID => $vndID));
		if ($result->Status == d_OK) {
			$result = INSD_DB_RowCount();
			if ($result->Status == d_OK) {
				if ($result->Data > 0) {
					$retJSON = array();
					while (($result = INSD_DB_Result(d_DB_FETCH_MODE_ASSOC)) && ($result->Status == d_OK)) {
						array_push($retJSON, array(
							d_MODEL_LIST_COL_M_ID => $result->Data->{d_M_M_ID},
							d_MODEL_LIST_COL_NAME => $result->Data->{d_M_NAME},
							d_MODEL_LIST_COL_VND_ID => $result->Data->{d_M_VND_ID},
							d_MODEL_LIST_COL_DEF_OS_ID => $result->Data->{d_M_DEF_OS_ID}
							
						));
					}
					DBG_STR_STR(d_FUNC_MODEL_GET_MODEL_LIST, d_OK, 'Get ModelList successful', json_encode($retJSON));
					$status = d_OK;
				} else {
					DBG_STR_STR(d_FUNC_MODEL_GET_MODEL_LIST, d_ERR_COMM_NO_ANY_DATA, 'Get ModelList from DB failure', $sqlCmd);
					$status = d_ERR_COMM_NO_ANY_DATA;
				}
			} else {
				DBG_STR_STR(d_FUNC_MODEL_GET_MODEL_LIST, $result->Status, 'Get ModelList count from DB failure', $sqlCmd);
				$status = $result->Status;
			}
		} else {
			DBG_STR_STR(d_FUNC_MODEL_GET_MODEL_LIST, $result->Status, 'Get ModelList from DB failure', $sqlCmd);
			$status = $result->Status;
		}
	} else {

		DBG_STR_STR(d_FUNC_MODEL_GET_MODEL_LIST, d_ERR_COMM_PARAMETER_INVALID, 'Input vndID invalid', 'vndID :' . $tvndIDype);		
		$status = d_ERR_COMM_PARAMETER_INVALID;
	}
	return INSD_ResultToJSON($status, $retJSON);

    
}



function INSD_InsertModelVer($mID = 0, $version = null, $verCode = 0)
{

	$retJSON =null;

	if ($mID > 0 && !is_null($version) && $verCode > 0) {
		
		$sqlCmd ='INSERT INTO `' . d_TAB_MODEL_VER . '` (`' . d_MFV_M_ID .'`, `'.d_MFV_VERSION.'`, `'.d_MFV_VRCODE.'`)'.' VALUES ' . '(:' .d_MFV_M_ID .', :'.d_MFV_VERSION.', :'.d_MFV_VRCODE.')';
		
		$result = INSD_DB_Query($sqlCmd,array(':' .d_MFV_M_ID => $mID,':' .d_MFV_VERSION => $version,':' .d_MFV_VRCODE => $verCode));
		
		if($result->Status == d_OK){
			
			DBG_STR_STR(d_FUNC_VENDOR_GET_VENDOR_LIST, d_OK, 'Insert Model Version information successful', $result->Status);
			$retJSON = array("LastInsertID" => $mID);
			$status = d_OK;
			
		}else{
			DBG_STR_STR(d_FUNC_MODEL_FW_VER_INSERT_MODEL_VER, $result->Status, 'Insert Model Version information into DB failure', $sqlCmd);
			$status = $result->Status;
		}
	}else{
 
		DBG_STR_STR(d_FUNC_MODEL_FW_VER_INSERT_MODEL_VER, d_ERR_COMM_PARAMETER_INVALID, 'Insert Model Version parameter invalid', 'name :' . $name .'vndID :' . $vndID .'defOSID :' . $defOSID);
		$status = d_ERR_COMM_PARAMETER_INVALID;
	}
	return INSD_ResultToJSON($status, $retJSON);
}



function INSD_GetModelFWVerInfo($mID = 0)
{
	$retJSON = null;

	if ($mID > 0) {
		$sqlCmd = 'SELECT `' .d_MFV_M_ID. '`,`'. d_MFV_VERSION . '`,`'.d_MFV_VRCODE .'`'; 
		$sqlCmd .= ' FROM `' . d_TAB_MODEL_VER . '`';
		$sqlCmd .= ' WHERE `' . d_MFV_M_ID .'`=:'.d_MFV_M_ID ;
		$sqlCmd .= ' AND'.'`'.d_U_DELETED . '` = '.d_DATA_LOGIC_UNEXPURGATED;

		
		$result = INSD_DB_Query($sqlCmd,array(':' .d_MFV_M_ID => $mID));
		if ($result->Status == d_OK) {
			$result = INSD_DB_RowCount();
			if ($result->Status == d_OK) {
				if ($result->Data > 0) {
					
					$retJSON = array();
					while (($result = INSD_DB_Result(d_DB_FETCH_MODE_ASSOC)) && ($result->Status == d_OK)) {
						array_push($retJSON, array(
							d_MODEL_FW_VER_INFO_COL_M_ID=>$result->Data->{d_MFV_M_ID},
							d_MODEL_FW_VER_INFO_COL_VERSION => $result->Data->{d_MFV_VERSION},
							d_MODEL_FW_VER_INFO_COL_VERCODE => $result->Data->{d_MFV_VRCODE}
							
						));
					}
					DBG_STR_STR(d_FUNC_MODEL_FW_VER_GET_MODEL_VER_INFO, d_OK, 'Get ModelFWVerInfo successful', json_encode($retJSON));
					$status = d_OK;
				
				} else {
					DBG_STR_STR(d_FUNC_MODEL_FW_VER_GET_MODEL_VER_INFO, d_ERR_COMM_NO_ANY_DATA, 'Get ModelFWVerInfo information count from DB failure', $sqlCmd);
					$status = d_ERR_COMM_NO_ANY_DATA;
				}
			} else {
				DBG_STR_STR(d_FUNC_MODEL_FW_VER_GET_MODEL_VER_INFO, $result->Status, 'Get ModelFWVerInfo information count from DB failure', $sqlCmd);
				$status = $result->Status;
			}
		} else {
			DBG_STR_STR(d_FUNC_MODEL_FW_VER_GET_MODEL_VER_INFO, $result->Status, 'Get ModelFWVerInfo  information from DB failure', $sqlCmd);
			$status = $result->Status;
		}
		
	} else {
		DBG_STR_STR(d_FUNC_MODEL_FW_VER_GET_MODEL_VER_INFO, d_ERR_COMM_PARAMETER_INVALID, 'Input M_ID invalid', 'mID :' . $mID);
		$status = d_ERR_COMM_PARAMETER_INVALID;
	}
	return INSD_ResultToJSON($status, $retJSON);
}

?>
