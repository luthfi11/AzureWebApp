<?php
	/*
	try {
		$conn = new PDO("sqlsrv:server = tcp:luthfiwebserver.database.windows.net,1433; Database = luthfi_db", "luthfi", "vhs4bdgGOOD");
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch (PDOException $e) {
		print("Error connecting to SQL Server.");
		die(print_r($e));
	}

	$connectionInfo = array("UID" => "luthfi@luthfiwebserver", "pwd" => "vhs4bdgGOOD", "Database" => "luthfi_db", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
	$serverName = "tcp:luthfiwebserver.database.windows.net,1433";
	$conn = sqlsrv_connect($serverName, $connectionInfo);
	*/
	
	$host = "luthfiwebserver.database.windows.net";
    $user = "luthfi";
    $pass = "vhs4bdgGOOD";
    $db = "luthfi_db";
    try {
        $conn = new PDO("sqlsrv:server = $host; Database = $db", $user, $pass);
        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    } catch(Exception $e) {
        echo "Failed: " . $e;
    }
?>