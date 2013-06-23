<?php
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "lorenzo2301";
    $dbname = "capstech";
    
    //Connect to MySQL Server
    mysql_connect($dbhost, $dbuser, $dbpass);
    //Select Database
    mysql_select_db($dbname) or die(mysql_error());
    // Retrieve data from Query String
    $val = $_POST['value'];
    //echo $val;	
    //build query
    $query = sprintf("SELECT ficheprod_id,ficheprod_ordre,ficheprod_etape,ficheprod_pref,ficheprod_art,ficheprod_quantity,ficheprod_transfo,ficheprod_comment,ficheprod_art_trans,ficheprod_date_prevue,ficheprod_status FROM ficheProduction where ficheprod_status<'3'  order by ficheprod_date_prevue asc limit 0,%s",$val);
    //$query = "SELECT ficheprod_id,ficheprod_ordre,ficheprod_etape,ficheprod_pref,ficheprod_art,ficheprod_quantity,ficheprod_transfo,ficheprod_comment,ficheprod_art_trans,ficheprod_date_prevue,ficheprod_status FROM ficheProduction where ficheprod_status<'3'";
    //echo $query;

    //Execute query
    $qry_result = mysql_query($query) or die(mysql_error());

    //Build Result String
    $data = array();

    while(($row = mysql_fetch_row($qry_result))) {
    $data[] = $row;
    }
    echo json_encode(array($data));

?>