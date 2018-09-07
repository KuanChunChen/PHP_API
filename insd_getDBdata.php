<?php
require_once  __DIR__ . "/insd_db.php";
require_once  __DIR__ . "/insd_sql.php";
require_once  __DIR__ . "/insd_debug.php";
require_once  __DIR__ . "/insd_common.php";
require_once  __DIR__ . "/include/tool_func.php";

//


  
/**
 *  Temporary sqldefine
 */

//AvailableTime
define ( 'd_G_AVAILABLETIME_STARTTIME_ENDTIME',	1013 );
//Active
define ( 'd_G_ACTIVE_ENFORCETIME',	1014 );
//OS
define ( 'd_G_OS_NAME',	1015 );
define ( 'd_G_OS_VERSION_VRCODE',	1016 );
//Polling
define ( 'd_G_POLLING_TIME_EFFECTTIME',	1017 );
//MODEL
define ( 'd_G_MODEL',	1018 );
//TERM STATE type
define ( 'd_G_TERM_STATE_NAME',	1019);
//TERM Info
define ( 'd_G_TRANSMISSION_SIZE',	1020 );
//vendor
define ( 'd_G_VENDOR_INFORMATION',	1021 );
//group type
define ( 'd_G_GROUP_TYPE_NAME',	1022 );


/**
 *  Temporary dlcdefine
 */

//AvailableTime
define ( 'd_TAB_AVAILABLETIME', 'available_time');
define ( 'd_AVAILABLETIME_AVAILABLE_ID', 'Available_ID');
define ( 'd_AVAILABLETIME_STARTTIME', 'StartTime');
define ( 'd_AVAILABLETIME_ENDTIME', 'EndTime');
//Active
define ( 'd_TAB_ACTIVE','active');
define ( 'd_ACTIVE_ACTIVE_ID', 'Active_ID');
define ( 'd_ACTIVE_ENFORCETIME', 'EnforceTime');
//OS
define ( 'd_TAB_OS', 'os' );
define ( 'd_TAB_OS_VERSION', 'os_version' );
define ( 'd_OS_ID', 'OS_ID');
define ( 'd_OS_NAME', 'Name');
define ( 'd_OS_VERSION', 'Version');
define ( 'd_OS_VRCODE', 'VRCode');
//Polling
define ( 'd_TAB_POLLING', 'polling' );
define ( 'd_POLLING_ID', 'Polling_ID');
define ( 'd_POLLING_TIME', 'Time');
define ( 'd_POLLING_EFFECTTIME',	'Effect_Time' );
//MODEL List
define ( 'd_TAB_MODEL',	'model' );
define ( 'd_MODEL_MID',	'M_ID' );
define ( 'd_MODEL_NAME',	'Name' );
define ( 'd_MODEL_VNDID',	'VND_ID' );
define ( 'd_MODEL_DEFAULT_OS_ID',	'Default_OS_ID' );
define ( 'd_MODEL_DELETED',	'Deleted' );
//TERM state type
define ( 'd_TAB_TERM_STATE_TYPE',	'terminal_state_type' );
define ( 'd_TERM_STATE_TYPE_STATE_ID',	'State_ID' );
define ( 'd_TERM_STATE_TYPE_STATE_NAME',	'Name' );
//Transmisson size
define ( 'd_TAB_TRANSMISSION_SIZE',	'transmission_size' );
define ( 'd_TRANSMISSION_TS_ID',	'TS_ID' );
define ( 'd_TRANSMISSION_SIZE_SIZE',	'Size' );
//vendor
define ( 'd_TAB_VENDOR',	'vendor' );
define ( 'd_VENDOR_VND_ID',	'VND_ID' );
define ( 'd_VENDOR_TYPE',	'Type' );
define ( 'd_VENDOR_NAME',	'Name' );
define ( 'd_VENDOR_TEL',	'TEL' );
define ( 'd_VENDOR_MOBILE',	'Mobile' );
define ( 'd_VENDOR_MEMO',	'Memo' );
//group type
define ( 'd_TAB_GROUP_TYPE','group_type'	 );
define ( 'd_GROUP_TYPE_TYPEID','Type_ID'	 );
define ( 'd_GROUP_TYPE_NAME','Name'	 );

//func num
define('d_FUNC_OS_GET_OS_LIST', 10001);
define('d_FUNC_MODEL_GET_MODEL_LIST', 10002);
define('d_FUNC_POLLING_GET_TIME_EFFECTTIME', 10003);
define('d_FUNC_TERM_STAGE_GET_NAME', 10004);
define('d_FUNC_TRANSMISSION_SIZE_GET_SIZE', 10005);
define('d_FUNC_VENDOR_GET_TYPE_NAME_TEL_MOBILE_MEMO', 10006);
define('d_FUNC_GROUP_TYPE_GET_NAME', 10007);
define('d_FUNC_AVAILABLE_TIME_GET_START_TIME', 10008);
define('d_FUNC_ACTIVE_GET_ENFORCE_TIME', 10009);

//---COL---//
//OS
define('d_OS_LIST_COL_OS_ID', d_OS_ID);
define('d_OS_LIST_COL_NAME', 'OS_Name');
//ModelList
define('d_MODEL_LIST_COL_M_ID', d_MODEL_MID);
define('d_MODEL_LIST_COL_NAME', 'Model_Name');
define('d_MODEL_LIST_COL_VND_ID', d_MODEL_VNDID);
define('d_MODEL_LIST_COL_Default_OS_ID', d_MODEL_DEFAULT_OS_ID);
//Available time
define('d_AVAILABLE_TIME_COL_START_TIME', d_AVAILABLETIME_STARTTIME);
define('d_AVAILABLE_TIME_COL_END_TIME', d_AVAILABLETIME_ENDTIME);
//active
define('d_ACTIVE_COL_ENFORCETIME', d_ACTIVE_ENFORCETIME);
//polling
define('d_POLLING_COL_TIME', 'Polling_Time');
define('d_POLLING_COL_EFFECT_TIME', d_POLLING_EFFECTTIME);
//Terminal_State
define('d_TERM_STATE_COL_NAME', 'TermState_Name');
//Transmisson_Size
define('d_TRANSMISSION_COL_SIZE', 'Transmisson_Size');
//Vendor
define('d_VENDOR_COL_TYPE', 'Vendor_Type');
define('d_VENDOR_COL_NAME', 'Vendor_Name');
define('d_VENDOR_COL_TEL', 'Vendor_Tel');
define('d_VENDOR_COL_MOBILE', 'Vendor_Mobile');
define('d_VENDOR_COL_MEMO', 'Vendor_Memo');
//Group type 
define('d_GROUP_TYPE_COL_NAME', 'GroupType_Name');



 
//error code
define ( 'd_ERR_PARAMETER_INVALID', 18 );
define('d_ERR_COMM_NO_ANY_DATA', 20);
  

 /**
 *  Test API 
 */

$test = INSD_DB_Connect();
$bc=INSD_GetModelList();
$ww=INSD_GetActive(1);
$xx=INSD_GetGroupType(1);
$cc=INDS_GetAvailableTime(1);
$yy=INSD_GetTerminal_State(1);
$zz=INSD_GetTransmisson_Size(1);
$aa=INSD_GetVender(1);
$dd=INSD_GetOSList();
$ee=INSD_GetPollingTime(1);
 
if( 1)
{
   
    echo str_replace(" ", "&nbsp;", str_replace("\n", "<br>", json_encode($ww, $options = JSON_PRETTY_PRINT)))."<br>";
    echo str_replace(" ", "&nbsp;", str_replace("\n", "<br>", json_encode($bc, $options = JSON_PRETTY_PRINT)))."<br>";
    echo str_replace(" ", "&nbsp;", str_replace("\n", "<br>", json_encode($xx, $options = JSON_PRETTY_PRINT)))."<br>";
    echo str_replace(" ", "&nbsp;", str_replace("\n", "<br>", json_encode($cc, $options = JSON_PRETTY_PRINT)))."<br>";
    echo str_replace(" ", "&nbsp;", str_replace("\n", "<br>", json_encode($yy, $options = JSON_PRETTY_PRINT)))."<br>";
    echo str_replace(" ", "&nbsp;", str_replace("\n", "<br>", json_encode($zz, $options = JSON_PRETTY_PRINT)))."<br>";
    echo str_replace(" ", "&nbsp;", str_replace("\n", "<br>", json_encode($aa, $options = JSON_PRETTY_PRINT)))."<br>";
    echo str_replace(" ", "&nbsp;", str_replace("\n", "<br>", json_encode($dd, $options = JSON_PRETTY_PRINT)))."<br>";
    echo str_replace(" ", "&nbsp;", str_replace("\n", "<br>", json_encode($ee, $options = JSON_PRETTY_PRINT)))."<br>";
    
}else
{
    
    echo $ab->Status;
}
//*/


function TEST_GeneratorSql($mode, $conditions, $statements)
{
	$status = d_OK;
	$sqlCmd = '';
	switch ($mode) {
		
		case d_G_AVAILABLETIME_STARTTIME_ENDTIME:
			$sqlCmd = 'SELECT ' . d_AVAILABLETIME_STARTTIME .','. d_AVAILABLETIME_ENDTIME .' FROM '. d_TAB_AVAILABLETIME;
			$newStr = CondAndStatToSql($conditions, $statements);
			if(is_null($newStr) != true)
			{
				$sqlCmd .= ' WHERE ' . $newStr;
			}
			break;
		case d_G_ACTIVE_ENFORCETIME:
			$sqlCmd = 'SELECT ' . d_ACTIVE_ENFORCETIME .' FROM '. d_TAB_ACTIVE;
			$newStr = CondAndStatToSql($conditions, $statements);
			if(is_null($newStr) != true)
			{
				$sqlCmd .= ' WHERE ' . $newStr;
			}
			break;	
		
		
		case d_G_POLLING_TIME_EFFECTTIME:
			$sqlCmd = 'SELECT ' . d_POLLING_TIME .','.d_POLLING_EFFECTTIME.' FROM '. d_TAB_POLLING;
			$newStr = CondAndStatToSql($conditions, $statements);
			if(is_null($newStr) != true)
			{
				$sqlCmd .= ' WHERE ' . $newStr;
			}
			break;
		/////////////////////////////////////////	
		
		case d_G_MODEL:
			$sqlCmd = 'SELECT ' . d_MODEL_NAME .','. d_MODEL_VNDID.','.d_MODEL_DEFAULT_OS_ID.' FROM '. d_TAB_MODEL;
			$newStr = CondAndStatToSql($conditions, $statements);
			if(is_null($newStr) != true)
			{
				$sqlCmd .= ' WHERE ' . $newStr;
			}
			break;
		
		case d_G_TERM_STATE_NAME:
			$sqlCmd = 'SELECT ' . d_TERM_STATE_TYPE_STATE_NAME  .' FROM '. d_TAB_TERM_STATE_TYPE;
			$newStr = CondAndStatToSql($conditions, $statements);
			if(is_null($newStr) != true)
			{
				$sqlCmd .= ' WHERE ' . $newStr;
			}
			break;
		case d_G_TRANSMISSION_SIZE:
			$sqlCmd = 'SELECT ' . d_TRANSMISSION_SIZE_SIZE  .' FROM '. d_TAB_TRANSMISSION_SIZE	;
			$newStr = CondAndStatToSql($conditions, $statements);
			if(is_null($newStr) != true)
			{
				$sqlCmd .= ' WHERE ' . $newStr;
			}
			break;
		
		case d_G_VENDOR_INFORMATION:
			$sqlCmd = 'SELECT ' . d_VENDOR_TYPE .','. d_VENDOR_NAME.','.d_VENDOR_TEL.','.d_VENDOR_MOBILE.','.d_VENDOR_MEMO.' FROM '. d_TAB_VENDOR;
			$newStr = CondAndStatToSql($conditions, $statements);
			if(is_null($newStr) != true)
			{
				$sqlCmd .= ' WHERE ' . $newStr;
			}
			break;
		
		case d_G_GROUP_TYPE_NAME:			
			$sqlCmd = 'SELECT ' . d_GROUP_TYPE_NAME.' FROM '. d_TAB_GROUP_TYPE;
			$newStr = CondAndStatToSql($conditions, $statements);
			if(is_null($newStr) != true)
			{
				$sqlCmd .= ' WHERE ' . $newStr;
			}
			break;							
									
		default:
			$status = d_ERR_COMM_MODE_UNEXCEPTED;
			break;
	}
	DBG_STR_STR(d_FUNC_SQL_GENERATOR_SQL, $status, 'Generator SQL result', $sqlCmd);
	return INSD_ResultToJSON($status, $sqlCmd);
}

 

 


 
function INDS_GetAvailableTime($Available_ID = 0)
{
	
	$retJSON = null;

	if ($Available_ID > 0) {
		$result = TEST_GeneratorSql(d_G_AVAILABLETIME_STARTTIME_ENDTIME, d_AVAILABLETIME_AVAILABLE_ID, $Available_ID);
		if ($result->Status == d_OK) {
			$sqlCmd = $result->Data;
			$result = INSD_DB_Query($sqlCmd);
			if ($result->Status == d_OK) {
				$result = INSD_DB_RowCount();
				if ($result->Status == d_OK) {
					if ($result->Data > 0) {
						$result = INSD_DB_Result(d_DB_FETCH_MODE_ASSOC);
						if ($result->Status == d_OK) {
							$retJSON = array(
								d_AVAILABLE_TIME_COL_START_TIME => $result->Data->{d_AVAILABLETIME_STARTTIME},
							 	d_AVAILABLE_TIME_COL_END_TIME => $result->Data->{d_AVAILABLETIME_ENDTIME}

							);
							DBG_STR_STR(d_FUNC_AVAILABLE_TIME_GET_START_TIME, d_OK, 'Get Available Time information successful', json_encode($retJSON));
							$status = d_OK;
						} else {
							DBG_STR_STR(d_FUNC_AVAILABLE_TIME_GET_START_TIME, $result->Status, 'Get Available Time information failure', $sqlCmd);
							$status = $result->Status;
						}
					} else {
						DBG_STR_STR(d_FUNC_AVAILABLE_TIME_GET_START_TIME, d_ERR_COMM_NO_ANY_DATA, 'Get Available Time information count from DB failure', $sqlCmd);
						$status = d_ERR_COMM_NO_ANY_DATA;
					}
				} else {
					DBG_STR_STR(d_FUNC_AVAILABLE_TIME_GET_START_TIME, $result->Status, 'Get Available Time information count from DB failure', $sqlCmd);
					$status = $result->Status;
				}
			} else {
				DBG_STR_STR(d_FUNC_AVAILABLE_TIME_GET_START_TIME, $result->Status, 'Get Available Time information from DB failure', $sqlCmd);
				$status = $result->Status;
			}
		} else {
			DBG_STR_STR(d_FUNC_AVAILABLE_TIME_GET_START_TIME, $result->Status, 'Generator SQL command to get Available information from DB failure', $Available_ID);
			$status = $result->Status;
		}
	} else {
		DBG_STR_STR(d_FUNC_AVAILABLE_TIME_GET_START_TIME, d_ERR_COMM_PARAMETER_INVALID, 'Input Available  id invalid', 'Available_ID :' . $Available_ID);
		$status = d_ERR_COMM_PARAMETER_INVALID;
	}
	return INSD_ResultToJSON($status, $retJSON);
}

/**
 * Get Active info by Active_ID
 *
 * @param
 *        	[DEC] Active_ID
 *        	- Query EnforceTime by Active_ID.
 * @return 	[JSON] retJSON
 *         	---Status---
 *			-Return Status
 *         	----Data---- 
 *			-ENFORCETIME
 *         	
 * @copyright Castles Technology
 */
function INSD_GetActive($Active_ID = 0)
{
	
	$retJSON = null;

	if ($Active_ID > 0) {
		$result = TEST_GeneratorSql(d_G_ACTIVE_ENFORCETIME, d_ACTIVE_ACTIVE_ID, $Active_ID);
		if ($result->Status == d_OK) {
			$sqlCmd = $result->Data;
			$result = INSD_DB_Query($sqlCmd);
			if ($result->Status == d_OK) {
				$result = INSD_DB_RowCount();
				if ($result->Status == d_OK) {
					if ($result->Data > 0) {
						$result = INSD_DB_Result(d_DB_FETCH_MODE_ASSOC);
						if ($result->Status == d_OK) {
							$retJSON = array(
								d_ACTIVE_COL_ENFORCETIME => $result->Data->{d_ACTIVE_ENFORCETIME}
								
							);
							DBG_STR_STR(d_FUNC_ACTIVE_GET_ENFORCE_TIME, d_OK, 'Get Active information successful', json_encode($retJSON));
							$status = d_OK;
						} else {
							DBG_STR_STR(d_FUNC_ACTIVE_GET_ENFORCE_TIME, $result->Status, 'Get Active information failure', $sqlCmd);
							$status = $result->Status;
						}
					} else {
						DBG_STR_STR(d_FUNC_ACTIVE_GET_ENFORCE_TIME, d_ERR_COMM_NO_ANY_DATA, 'Get Active information count from DB failure', $sqlCmd);
						$status = d_ERR_COMM_NO_ANY_DATA;
					}
				} else {
					DBG_STR_STR(d_FUNC_ACTIVE_GET_ENFORCE_TIME, $result->Status, 'Get Active information count from DB failure', $sqlCmd);
					$status = $result->Status;
				}
			} else {
				DBG_STR_STR(d_FUNC_ACTIVE_GET_ENFORCE_TIME, $result->Status, 'Get Active information from DB failure', $sqlCmd);
				$status = $result->Status;
			}
		} else {
			DBG_STR_STR(d_FUNC_ACTIVE_GET_ENFORCE_TIME, $result->Status, 'Generator SQL command to get Active information from DB failure', $Active_ID);
			$status = $result->Status;
		}
	} else {
		DBG_STR_STR(d_FUNC_ACTIVE_GET_ENFORCE_TIME, d_ERR_COMM_PARAMETER_INVALID, 'Input Active id invalid', 'Active_ID :' . $Active_ID);
		$status = d_ERR_COMM_PARAMETER_INVALID;
	}
	return INSD_ResultToJSON($status, $retJSON);
	



}

/**
 * Get OSList from DB
 *
 * @param
 *        	[DEC] $row
 *        	- Query Data and fecth it every $row 
 *			[DEC] $page
 *        	- Query Data and fecth it at Page $page
 *			[DEC] $nameFilter
 *        	- query condition 
 * @return 	[JSON] retJSON
 *         	---Status---
 *			-Return Status
 *         	----Data---- 
 *			-OS_ID-OS_NAME
 *         	
 * @copyright Castles Technology
 */


function INSD_GetOSList($row = 5, $page = 0,$nameFilter = null)
{

	$retJSON = null;
    //init retJSON
	//$retJSON = INSD_ResultToJSON(null);

 	if (($row > 0) && ($page >= 0)) {
		$sqlCmd = 'SELECT `' . d_OS_ID . '`,`' . d_OS_NAME . '`'; 
		$sqlCmd .= ' FROM `' . d_TAB_OS . '`';
		$sqlCmd .= ' WHERE `' . d_TAB_OS . '`.`' . d_U_DELETED . '` = 0';

	if (!is_null($nameFilter)) {
			$sqlCmd .= ' AND `' . d_OS_NAME . '` LIKE \'%' . $nameFilter . '%\'';
		}	
	$sqlCmd .= ' LIMIT ' . intval($page) . ',' . intval($row) . ';';
	
	$result = INSD_DB_Query($sqlCmd);
		if ($result->Status == d_OK) {
			$result = INSD_DB_RowCount();
			if ($result->Status == d_OK) {
				if ($result->Data > 0) {
					$retJSON = array();
					while (($result = INSD_DB_Result(d_DB_FETCH_MODE_ASSOC)) && ($result->Status == d_OK)) {
						array_push($retJSON, array(
							d_OS_ID => $result->Data->{d_OS_ID},
							d_OS_NAME => $result->Data->{d_OS_NAME}
							
						));
					}
					DBG_STR_STR(d_FUNC_OS_GET_OS_LIST, d_OK, 'Get OS successful', json_encode($retJSON));
					$status = d_OK;
				} else {
					DBG_STR_STR(d_FUNC_OS_GET_OS_LIST, d_ERR_COMM_NO_ANY_DATA, 'Get  OS from DB failure', $sqlCmd);
					$status = d_ERR_COMM_NO_ANY_DATA;
				}
			} else {
				DBG_STR_STR(d_FUNC_OS_GET_OS_LIST, $result->Status, 'Get OS count from DB failure', $sqlCmd);
				$status = $result->Status;
			}
		} else {
			DBG_STR_STR(d_FUNC_OS_GET_OS_LIST, $result->Status, 'Get OS from DB failure', $sqlCmd);
			$status = $result->Status;
		}
	} else {
		DBG_STR_STR(d_FUNC_OS_GET_OS_LIST, d_ERR_COMM_PARAMETER_INVALID, 'Input row or page invalid', 'Row :' . $row . ', Page :' . $page);
		$status = d_ERR_COMM_PARAMETER_INVALID;
	}
	return INSD_ResultToJSON($status, $retJSON);

 
}


/**
 * Get PollingTime by $Polling_ID
 *
 * @param
 *        	[DEC] $Polling_ID
 *        	- Query EnforceTime by $Polling_ID.
 * @return 	[JSON] retJSON
 *         	---Status---
 *			-Return Status
 *         	----Data---- 
 *			-POLLING_TIME-POLLING_EFFECTTIME-
 *         	
 * @copyright Castles Technology
 */
function INSD_GetPollingTime($Polling_ID = 0)
{
	
	$retJSON = null;

	if ($Polling_ID > 0) {
		$result = TEST_GeneratorSql(d_G_POLLING_TIME_EFFECTTIME, d_POLLING_ID, $Polling_ID);
		if ($result->Status == d_OK) {
			$sqlCmd = $result->Data;
			$result = INSD_DB_Query($sqlCmd);
			if ($result->Status == d_OK) {
				$result = INSD_DB_RowCount();
				if ($result->Status == d_OK) {
					if ($result->Data > 0) {
						$result = INSD_DB_Result(d_DB_FETCH_MODE_ASSOC);
						if ($result->Status == d_OK) {
							$retJSON = array(
								d_POLLING_COL_TIME => $result->Data->{d_POLLING_TIME},
							 	d_POLLING_COL_EFFECT_TIME => $result->Data->{d_POLLING_EFFECTTIME}

							);
							DBG_STR_STR(d_FUNC_POLLING_GET_TIME_EFFECTTIME, d_OK, 'Get Polling information successful', json_encode($retJSON));
							$status = d_OK;
						} else {
							DBG_STR_STR(d_FUNC_POLLING_GET_TIME_EFFECTTIME, $result->Status, 'Get Polling Time information failure', $sqlCmd);
							$status = $result->Status;
						}
					} else {
						DBG_STR_STR(d_FUNC_POLLING_GET_TIME_EFFECTTIME, d_ERR_COMM_NO_ANY_DATA, 'Get Polling information count from DB failure', $sqlCmd);
						$status = d_ERR_COMM_NO_ANY_DATA;
					}
				} else {
					DBG_STR_STR(d_FUNC_POLLING_GET_TIME_EFFECTTIME, $result->Status, 'Get Polling information count from DB failure', $sqlCmd);
					$status = $result->Status;
				}
			} else {
				DBG_STR_STR(d_FUNC_POLLING_GET_TIME_EFFECTTIME, $result->Status, 'Get Polling information from DB failure', $sqlCmd);
				$status = $result->Status;
			}
		} else {
			DBG_STR_STR(d_FUNC_POLLING_GET_TIME_EFFECTTIME, $result->Status, 'Generator SQL command to get Polling information from DB failure', $Polling_ID);
			$status = $result->Status;
		}
	} else {
		DBG_STR_STR(d_FUNC_POLLING_GET_TIME_EFFECTTIME, d_ERR_COMM_PARAMETER_INVALID, 'Input Polling  id invalid', 'Polling_ID :' . $Polling_ID);
		$status = d_ERR_COMM_PARAMETER_INVALID;
	}
	return INSD_ResultToJSON($status, $retJSON);

	 

	}	

 
function INSD_GetModelList($row = 5, $page = 0,$nameFilter = null)
{
	$retJSON = null;
   	if (($row > 0) && ($page >= 0)) {
		$sqlCmd = 'SELECT `' . d_MODEL_MID . '`,`' . d_MODEL_NAME  . '`,`' .d_MODEL_VNDID. '`,`'.d_MODEL_DEFAULT_OS_ID. '`'; 
		$sqlCmd .= ' FROM `' . d_TAB_MODEL . '`';
		$sqlCmd .= ' WHERE `' . d_TAB_MODEL . '`.`' . d_MODEL_DELETED . '` = 0';

	if (!is_null($nameFilter)) {
			$sqlCmd .= ' AND `' . d_MODEL_NAME . '` LIKE \'%' . $nameFilter . '%\'';
		}	
	$sqlCmd .= ' LIMIT ' . intval($page) . ',' . intval($row) . ';';
	
	$result = INSD_DB_Query($sqlCmd);
		if ($result->Status == d_OK) {
			$result = INSD_DB_RowCount();
			if ($result->Status == d_OK) {
				if ($result->Data > 0) {
					$retJSON = array();
					while (($result = INSD_DB_Result(d_DB_FETCH_MODE_ASSOC)) && ($result->Status == d_OK)) {
						array_push($retJSON, array(
							d_MODEL_MID => $result->Data->{d_MODEL_MID},
							d_MODEL_NAME => $result->Data->{d_MODEL_NAME},
							d_MODEL_VNDID => $result->Data->{d_MODEL_VNDID},
							d_MODEL_DEFAULT_OS_ID => $result->Data->{d_MODEL_DEFAULT_OS_ID}
							
						));
					}
					DBG_STR_STR(d_FUNC_OS_GET_OS_LIST, d_OK, 'Get OS successful', json_encode($retJSON));
					$status = d_OK;
				} else {
					DBG_STR_STR(d_FUNC_OS_GET_OS_LIST, d_ERR_COMM_NO_ANY_DATA, 'Get  OS from DB failure', $sqlCmd);
					$status = d_ERR_COMM_NO_ANY_DATA;
				}
			} else {
				DBG_STR_STR(d_FUNC_OS_GET_OS_LIST, $result->Status, 'Get OS count from DB failure', $sqlCmd);
				$status = $result->Status;
			}
		} else {
			DBG_STR_STR(d_FUNC_OS_GET_OS_LIST, $result->Status, 'Get OS from DB failure', $sqlCmd);
			$status = $result->Status;
		}
	} else {
		DBG_STR_STR(d_FUNC_OS_GET_OS_LIST, d_ERR_COMM_PARAMETER_INVALID, 'Input row or page invalid', 'Row :' . $row . ', Page :' . $page);
		$status = d_ERR_COMM_PARAMETER_INVALID;
	}
	return INSD_ResultToJSON($status, $retJSON);

 

	
}


/**
 * Get GetTerminal State by $State_ID
 *
 * @param
 *        	[DEC] $State_ID
 *        	- Query EnforceTime by $State_ID.
 * @return 	[JSON] retJSON
 *         	---Status---
 *			-Return Status
 *         	----Data---- 
 *			-TERM_STATE_NAME-
 *         	
 * @copyright Castles Technology
 */
function INSD_GetTerminal_State($State_ID = 0){
	
	$retJSON = null;

	if ($State_ID > 0) {
		$result = TEST_GeneratorSql(d_G_TERM_STATE_NAME, d_TERM_STATE_TYPE_STATE_ID, $State_ID);
		if ($result->Status == d_OK) {
			$sqlCmd = $result->Data;
			$result = INSD_DB_Query($sqlCmd);
			if ($result->Status == d_OK) {
				$result = INSD_DB_RowCount();
				if ($result->Status == d_OK) {
					if ($result->Data > 0) {
						$result = INSD_DB_Result(d_DB_FETCH_MODE_ASSOC);
						if ($result->Status == d_OK) {
							$retJSON = array(
								d_TERM_STATE_COL_NAME => $result->Data->{d_TERM_STATE_TYPE_STATE_NAME}
 
							);
							DBG_STR_STR(d_FUNC_TERM_STAGE_GET_NAME, d_OK, 'Get Terminal State information successful', json_encode($retJSON));
							$status = d_OK;
						} else {
							DBG_STR_STR(d_FUNC_TERM_STAGE_GET_NAME, $result->Status, 'Get Terminal State information failure', $sqlCmd);
							$status = $result->Status;
						}
					} else {
						DBG_STR_STR(d_FUNC_TERM_STAGE_GET_NAME, d_ERR_COMM_NO_ANY_DATA, 'Get Terminal State information count from DB failure', $sqlCmd);
						$status = d_ERR_COMM_NO_ANY_DATA;
					}
				} else {
					DBG_STR_STR(d_FUNC_TERM_STAGE_GET_NAME, $result->Status, 'Get Terminal State information count from DB failure', $sqlCmd);
					$status = $result->Status;
				}
			} else {
				DBG_STR_STR(d_FUNC_TERM_STAGE_GET_NAME, $result->Status, 'Get Terminal State information from DB failure', $sqlCmd);
				$status = $result->Status;
			}
		} else {
			DBG_STR_STR(d_FUNC_TERM_STAGE_GET_NAME, $result->Status, 'Generator SQL command to get Terminal State information from DB failure', $State_ID);
			$status = $result->Status;
		}
	} else {
		DBG_STR_STR(d_FUNC_TERM_STAGE_GET_NAME, d_ERR_COMM_PARAMETER_INVALID, 'Input State_ID invalid', 'State_ID :' . $State_ID);
		$status = d_ERR_COMM_PARAMETER_INVALID;
	}
	return INSD_ResultToJSON($status, $retJSON);

	 

	}		

	 

/**
 * Get GetTerminal State by $TS_ID
 *
 * @param
 *        	[DEC] $TS_ID
 *        	- Query EnforceTime by $TS_ID.
 * @return 	[JSON] retJSON
 *         	---Status---
 *			-Return Status
 *         	----Data---- 
 *			-TRANSMISSION_SIZE-
 *         	
 * @copyright Castles Technology
 */

function INSD_GetTransmisson_Size($TS_ID = 0){
	$retJSON = null;

	if ($TS_ID > 0) {
		$result = TEST_GeneratorSql(d_G_TRANSMISSION_SIZE, d_TRANSMISSION_TS_ID, $TS_ID);
		if ($result->Status == d_OK) {
			$sqlCmd = $result->Data;
			$result = INSD_DB_Query($sqlCmd);
			if ($result->Status == d_OK) {
				$result = INSD_DB_RowCount();
				if ($result->Status == d_OK) {
					if ($result->Data > 0) {
						$result = INSD_DB_Result(d_DB_FETCH_MODE_ASSOC);
						if ($result->Status == d_OK) {
							$retJSON = array(
								d_TRANSMISSION_COL_SIZE => $result->Data->{d_TRANSMISSION_SIZE_SIZE}
								
							);
							DBG_STR_STR(d_FUNC_TRANSMISSION_SIZE_GET_SIZE, d_OK, 'Get Transmisson information successful', json_encode($retJSON));
							$status = d_OK;
						} else {
							DBG_STR_STR(d_FUNC_TRANSMISSION_SIZE_GET_SIZE, $result->Status, 'Get Transmisson information failure', $sqlCmd);
							$status = $result->Status;
						}
					} else {
						DBG_STR_STR(d_FUNC_TRANSMISSION_SIZE_GET_SIZE, d_ERR_COMM_NO_ANY_DATA, 'Get Transmisson information count from DB failure', $sqlCmd);
						$status = d_ERR_COMM_NO_ANY_DATA;
					}
				} else {
					DBG_STR_STR(d_FUNC_TRANSMISSION_SIZE_GET_SIZE, $result->Status, 'Get Transmisson information count from DB failure', $sqlCmd);
					$status = $result->Status;
				}
			} else {
				DBG_STR_STR(d_FUNC_TRANSMISSION_SIZE_GET_SIZE, $result->Status, 'Get Transmisson information from DB failure', $sqlCmd);
				$status = $result->Status;
			}
		} else {
			DBG_STR_STR(d_FUNC_TRANSMISSION_SIZE_GET_SIZE, $result->Status, 'Generator SQL command to get Transmisson  information from DB failure', $TS_ID);
			$status = $result->Status;
		}
	} else {
		DBG_STR_STR(d_FUNC_TRANSMISSION_SIZE_GET_SIZE, d_ERR_COMM_PARAMETER_INVALID, 'Input Transmisson ID invalid', 'TS_ID :' . $TS_ID);
		$status = d_ERR_COMM_PARAMETER_INVALID;
	}
	return INSD_ResultToJSON($status, $retJSON);

}




/**
 * Get GetTerminal State by $VND_ID
 *
 * @param
 *        	[DEC] $VND_ID
 *        	- Query EnforceTime by $VND_ID.
 * @return 	[JSON] retJSON
 *         	---Status---
 *			-Return Status
 *         	----Data---- 
 *			-VENDOR_TYPE-VENDOR_NAME-VENDOR_TEL-VENDOR_MOBILE-VENDOR_MEMO-
 *         	
 * @copyright Castles Technology
 */
function INSD_GetVender($VND_ID = 0){
	
	$retJSON = null;

	if ($VND_ID > 0) {
		$result = TEST_GeneratorSql(d_G_VENDOR_INFORMATION, d_VENDOR_VND_ID, $VND_ID);
		if ($result->Status == d_OK) {
			$sqlCmd = $result->Data;
			$result = INSD_DB_Query($sqlCmd);
			if ($result->Status == d_OK) {
				$result = INSD_DB_RowCount();
				if ($result->Status == d_OK) {
					if ($result->Data > 0) {
						$result = INSD_DB_Result(d_DB_FETCH_MODE_ASSOC);
						if ($result->Status == d_OK) {
							$retJSON = array(
								d_VENDOR_COL_TYPE => $result->Data->{d_VENDOR_TYPE},
 								d_VENDOR_COL_NAME => $result->Data->{d_VENDOR_NAME},
 								d_VENDOR_COL_TEL => $result->Data->{d_VENDOR_TEL},
 								d_VENDOR_COL_MOBILE => $result->Data->{d_VENDOR_MOBILE},
 								d_VENDOR_COL_MEMO => $result->Data->{d_VENDOR_MEMO}
 								
							);
							DBG_STR_STR(d_FUNC_VENDOR_GET_TYPE_NAME_TEL_MOBILE_MEMO, d_OK, 'Get Vender information successful', json_encode($retJSON));
							$status = d_OK;
						} else {
							DBG_STR_STR(d_FUNC_VENDOR_GET_TYPE_NAME_TEL_MOBILE_MEMO, $result->Status, 'Get Vender  information failure', $sqlCmd);
							$status = $result->Status;
						}
					} else {
						DBG_STR_STR(d_FUNC_VENDOR_GET_TYPE_NAME_TEL_MOBILE_MEMO, d_ERR_COMM_NO_ANY_DATA, 'Get Vender information count from DB failure', $sqlCmd);
						$status = d_ERR_COMM_NO_ANY_DATA;
					}
				} else {
					DBG_STR_STR(d_FUNC_VENDOR_GET_TYPE_NAME_TEL_MOBILE_MEMO, $result->Status, 'Get Vender information count from DB failure', $sqlCmd);
					$status = $result->Status;
				}
			} else {
				DBG_STR_STR(d_FUNC_VENDOR_GET_TYPE_NAME_TEL_MOBILE_MEMO, $result->Status, 'Get Vender information from DB failure', $sqlCmd);
				$status = $result->Status;
			}
		} else {
			DBG_STR_STR(d_FUNC_VENDOR_GET_TYPE_NAME_TEL_MOBILE_MEMO, $result->Status, 'Generator SQL command to get Vender information from DB failure', $State_ID);
			$status = $result->Status;
		}
	} else {
		DBG_STR_STR(d_FUNC_VENDOR_GET_TYPE_NAME_TEL_MOBILE_MEMO, d_ERR_COMM_PARAMETER_INVALID, 'Input VND ID invalid', 'VND_ID :' . $VND_ID);
		$status = d_ERR_COMM_PARAMETER_INVALID;
	}
	return INSD_ResultToJSON($status, $retJSON);
	
}

/**
 * Get GetTerminal State by $Type_ID
 *
 * @param
 *        	[DEC] $Type_ID
 *        	- Query EnforceTime by $Type_ID.
 * @return 	[JSON] retJSON
 *         	---Status---
 *			-Return Status
 *         	----Data---- 
 *			-GROUP_TYPE_NAME-
 *         	
 * @copyright Castles Technology
 */
function INSD_GetGroupType($Type_ID = 0){
	
	$retJSON = null;

	if ($Type_ID > 0) {
		$result = TEST_GeneratorSql(d_G_GROUP_TYPE_NAME, d_GROUP_TYPE_TYPEID, $Type_ID);
		if ($result->Status == d_OK) {
			$sqlCmd = $result->Data;
			$result = INSD_DB_Query($sqlCmd);
			if ($result->Status == d_OK) {
				$result = INSD_DB_RowCount();
				if ($result->Status == d_OK) {
					if ($result->Data > 0) {
						$result = INSD_DB_Result(d_DB_FETCH_MODE_ASSOC);
						if ($result->Status == d_OK) {
							$retJSON = array(
								d_GROUP_TYPE_COL_NAME => $result->Data->{d_GROUP_TYPE_NAME}
 					 
 								
							);
							DBG_STR_STR(d_FUNC_GROUP_TYPE_GET_NAME, d_OK, 'Get GroupType information successful', json_encode($retJSON));
							$status = d_OK;
						} else {
							DBG_STR_STR(d_FUNC_GROUP_TYPE_GET_NAME, $result->Status, 'Get GroupType   information failure', $sqlCmd);
							$status = $result->Status;
						}
					} else {
						DBG_STR_STR(d_FUNC_GROUP_TYPE_GET_NAME, d_ERR_COMM_NO_ANY_DATA, 'Get GroupType  information count from DB failure', $sqlCmd);
						$status = d_ERR_COMM_NO_ANY_DATA;
					}
				} else {
					DBG_STR_STR(d_FUNC_GROUP_TYPE_GET_NAME, $result->Status, 'Get GroupType information count from DB failure', $sqlCmd);
					$status = $result->Status;
				}
			} else {
				DBG_STR_STR(d_FUNC_GROUP_TYPE_GET_NAME, $result->Status, 'Get GroupType information from DB failure', $sqlCmd);
				$status = $result->Status;
			}
		} else {
			DBG_STR_STR(d_FUNC_GROUP_TYPE_GET_NAME, $result->Status, 'Generator SQL command to get GroupType  information from DB failure', $State_ID);
			$status = $result->Status;
		}
	} else {
		DBG_STR_STR(d_FUNC_GROUP_TYPE_GET_NAME, d_ERR_COMM_PARAMETER_INVALID, 'Input Type ID invalid', 'Type_ID :' . $Type_ID);
		$status = d_ERR_COMM_PARAMETER_INVALID;
	}
	return INSD_ResultToJSON($status, $retJSON);
		
}



?>