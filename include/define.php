<?php
define('d_ENABLE_DBG', true);
define('d_DEBUG_FILE_PATH', __DIR__ . '/../tmp/dlclib.sqlite3');
define('d_LOGS_PATH', __DIR__ . '/../logs');

define('d_FUNC_COMM_PACK', 1);
define('d_FUNC_COMM_UNPACK', 2);
define('d_FUNC_COMM_SET_LOG', 3);

define('d_FUNC_DB_CONNECT', 4);
define('d_FUNC_DB_QUERY', 5);
define('d_FUNC_DB_ROW_COUNT', 6);
define('d_FUNC_DB_COL_COUNT', 7);
define('d_FUNC_DB_RESULT', 8);
define('d_FUNC_DB_RESULT_ALL', 9);
define('d_FUNC_DB_LAST_INSERT_ID', 10);
define('d_FUNC_DB_DISCONNECT', 11);
define('d_FUNC_DB_ERROR_NO', 12);
define('d_FUNC_DB_ERROR_MEG', 13);
define('d_FUNC_DB_BEGIN_TRANS', 14);
define('d_FUNC_DB_COMMIT_TRANS', 15);
define('d_FUNC_DB_ROLLBACK_TRANS', 16);

define('d_FUNC_SQL_GENERATOR_SQL', 17);

define('d_FUNC_USER_GET_U_ID_BY_NAME', 18);

define('d_FUNC_ROLE_GET_R_ID_BY_NAME', 19);
?>
