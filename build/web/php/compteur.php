<?php
    //$machine= $_POST['machine'];
    $arrow=$_POST['tab'];

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
    $query=sprintf("SELECT MAX(mat_compteur_fin) FROM gestion_matiere WHERE mat_machine='%s'",$machine);
    //$query="SELECT MAX(mat_compteur_fin) FROM gestion_matiere WHERE mat_machine='marcel'";
    
    //Execute query
    $qry_result = mysql_query($query) or die(mysql_error());
    //Build Result String
    $data = array();

    while(($row = mysql_fetch_row($qry_result))) {
    $data[] = $row;
    }
    $compteurDeb=$data[0];
    //echo $compteurDeb;

    echo json_encode(array($data));


?>