<?php
    $arrow=$_POST['tab'];

    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "lorenzo2301";
    $dbname = "capstech";
    
    //Connect to MySQL Server
    //mysql_connect($dbhost, $dbuser, $dbpass);
    $con=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    if (mysqli_connect_errno($con))
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }


    //Select Database
    //mysql_select_db($dbname) or die(mysql_error());
    // Retrieve data from Query String
    
    $machine = $arrow[8];
    	
    //build query
    $query=sprintf("SELECT MAX(mat_compteur_fin) FROM gestion_matiere WHERE mat_machine='%s'",$machine);
    //$data = array();
    //Execute query
    //$qry_result = mysql_query($query) or die(mysql_error());
    if ($result=mysqli_query($con,$query))
    {
        // Fetch one and one row
        while ($row=mysqli_fetch_row($result))
        {
            //printf ("compteurdeb=%s ",$row[0]);
            $compteurDeb=sprintf ("%s",$row[0]);
            
        }

        // Free result set
        mysqli_free_result($result);
        
    }


    
    //print_r("compteur=" . $compteurDeb);
    //echo json_encode(array($data));

    $date = date("Y-m-d");
    $prefix= $arrow[0];
    $articleTrans=$arrow[1];
    $texteFiscal=$arrow[2];
    
    

    $dechetTrans = $arrow[3];
    $capsBonnes = $arrow[4];
    $typeTimbre = $arrow[5];
    $centilisation = $arrow[6];
    $droitsCrd = 0;
    $timeStamp=date( "Y-m-d H:i:s",mktime(0, 0, 0));
    $coupsVides=$arrow[7];
    $compteurFin = (intVal($compteurDeb) +  intVal($capsBonnes) + intVal($coupsVides) + intVal($dechetTrans));
    //printf ("compteurdeb=%d - compteurFin=%d ",$compteurDeb,$compteurFin);




    $reste = ((intVal($compteurDeb) +  intVal($capsBonnes) + intVal($coupsVides) + intVal($dechetTrans)) - 9501)%4;
    if($reste!=0)
        $compteurFin = $compteurFin + (4-$reste);

    
    $poubelle = $arrow[9];
    $article = $arrow[10];
    if($typeTimbre=="EXPORT"){
        $operation="PROD_EXPORT";
    }else if($typeTimbre=="REPIQUAGE_UV" || $typeTimbre=="LOGO" || $typeTimbre=="COLORIAGE"){
        $operation="INTER";
    }else{
        $operation="PROD_CRD";
    }
    //printf ("compteurdeb=%d - compteurFin=%d - %s",$compteurDeb,$compteurFin,$operation);

    $query = sprintf("insert into gestion_matiere values(null,'%s','0','%s','%s','CAPS-TECH','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')",
    $date,
    $prefix,
    $articleTrans,
    $texteFiscal,
    $compteurDeb,
    $compteurFin,
    $dechetTrans,
    $capsBonnes,
    $typeTimbre,
    $centilisation,
    $droitsCrd,
    $timeStamp,
    $coupsVides,
    $machine,
    $poubelle,
    $article,
    $operation);
    
    //echo $query;
    if ($result=mysqli_query($con,$query))
    {
        // Fetch one and one row
        //while ($row=mysqli_fetch_row($result))
        //{  
        //}

        // Free result set
        mysqli_free_result($result);
        
    }
    //echo json_encode(array($data));


?>