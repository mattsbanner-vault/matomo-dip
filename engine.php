<?php

    require_once('variables.php');

    foreach($hostnames as $hostname)
    {
        array_push($ip_addresses, gethostbyname($hostname));
    }

    $ip_list = substr(implode(', ', $ip_addresses),2);

    $conn = new mysqli($db_host, $db_username, $db_password, $db_name);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE `option` SET `option_value` = '".$ip_list."' WHERE `option_name` = 'SitesManager_ExcludedIpsGlobal'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    echo $sql;

    $conn->close();

?>