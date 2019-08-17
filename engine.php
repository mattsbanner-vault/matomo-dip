<?php

    require_once('variables.php');

    foreach($hostnames as $hostname)
    {
        array_push($ip_addresses, gethostbyname($hostname));
    }

    $ip_list = implode(', ', $ip_addresses);

    $conn = new mysqli($db_host, $db_username, $db_password, $db_name);

    $sql = "UPDATE `option` SET `option_value` = '".$ip_list."' WHERE `option_name` = 'SitesManager_ExcludedIpsGlobal'";

    $conn->close();

?>