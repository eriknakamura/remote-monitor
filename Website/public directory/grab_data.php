<?php
/*
Grabs data from database given a specific sensor ID, type of measurement, or location.
*/
   include("config.php");

    $q = intval($_GET['q']);
    $sql="SELECT value, datetime FROM emerald_data_active WHERE sensor_id = '".$q."'";

    $result = mysqli_query($db,$sql);

    if ( ! $result ) {
    $fail = array("SQL query fail");
            echo json_encode($fail);
            die;
        }

    $data = array();

    for ($x = 0; $x < mysqli_num_rows($result); $x++) {
        $data[] = mysqli_fetch_assoc($result);
    }

    echo json_encode($data);
    mysqli_close($db);

?>