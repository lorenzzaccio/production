<?php
    
    $table= $_POST['table'];
    $column= $_POST['column'];
    $value= $_POST['value'];
    $condition= $_POST['condition'];
    //$table= mysql_real_escape_string($_POST['table']);
    //$column= mysql_real_escape_string($_POST['column']);
    //$value= mysql_real_escape_string($_POST['value']);
    //$condition= mysql_real_escape_string($_POST['condition']);


    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "lorenzo2301";
    $dbname = "capstech";
    
    //Connect to MySQL Server
    mysql_connect($dbhost, $dbuser, $dbpass);
    //Select Database
    mysql_select_db($dbname) or die(mysql_error());
    // Retrieve data from Query String
    
    	
    //build query
    //$query = "SELECT ficheprod_id,ficheprod_ordre,ficheprod_etape,ficheprod_pref,ficheprod_art,ficheprod_quantity,ficheprod_transfo,ficheprod_comment,ficheprod_status FROM ficheProduction where ficheprod_status<'3'";
    $query = sprintf("update %s set %s = '%s' where %s",
    $table,
    $column,
    $value,
    $condition);
    //$query = "update " . $table . " set " . $column . "='" . $value . "' where ". $condition;
    //echo $query;
    //Execute query
    $qry_result = mysql_query($query) or die(mysql_error());
    //echo $query;
    //Build Result String
    //$data = array();

    //while(($row = mysql_fetch_row($qry_result))) {
    //$data[] = $row;
    //}
    //echo json_encode(array($data));
    echo "1";
    mysql_close();

?>