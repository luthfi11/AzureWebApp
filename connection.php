<?php
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