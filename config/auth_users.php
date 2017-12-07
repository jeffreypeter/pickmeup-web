<?php
//
//	if (!$link = mysql_connect('127.0.0.1', 'root', '')) {
//	    echo 'Could not connect to mysql';
//	    exit;
//	}
//
//	if (!mysql_select_db("pickmeup", $link)) {
//    echo 'Could not select database';
//    exit;
//}
//	$query = 'SELECT id FROM pickmeup WHERE email=$email AND password =$password';
//	$result = mysql_query($sql, $link);
//
//	if (!$result) {
//    	echo "DB Error, could not query the database\n";
//    	echo 'MySQL Error: ' . mysql_error();
//    	exit;
//}
//
//	while ($row = mysql_fetch_assoc($result)) {
//    	echo $row['id'];
//}
//?>