/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/*
function syncS2MPhp(){
    var arr = [];
    var value = 1;
    //call the php that has the php array which is json_encoded 
    $.getJSON("php/getFicheProd.php?val="+value, function(data) {
        //data will hold the php array as a javascript object 
        arr = data[0];
        syncLclStorage(arr);
        Production.init();
    });
}*/
function syncS2MPhp(){
    var arr = [];
    var value = 50;
    var req = {
        'value' : value ,
        type : 'sync'
    };
    /* call the php that has the php array which is json_encoded */
    $.ajax({
        type: "POST",
        url: "php/getFicheProd.php",
        data: req ,
        success: function(data){
            arr = makearray(data);
            //arr = JSON.parse(data);
            Production.storeRemoveAll();
            syncLclStorage(arr);
            Production.init();
        }
    });
    
}
function makearray(x){
    var arrec = [];
    var arrow;
    var tmparrow = x.split("],[");
                     var j=0;
                     var val=0;
                     var max = 0;
                     for(i=0;i<tmparrow.length;i++){
                        arrow=tmparrow[i].split('","'); 
                        //recordLine(arrow);
                        arrec[j] = arrow;
                        j++;
                     }
                     return arrec;
}
function getCompteur(machine){
    var arr = [];
    var req = {
        'machine' : machine ,
        type : 'sync'
    };
    
    $.ajax({
        type: "POST",
        url: "php/compteur.php",
        data: req ,
        success: function(data){
            //$.each(data, function(key) {
                            //var arr = [];
                            alert(JSON.parse(data));
            //});
        }
    });
}
function saveProd(arrow){
    var arr = [];
    var req = {
        'tab' : arrow ,
        type : 'sync'
    };
    
    $.ajax({
        type: "POST",
        url: "php/saveProd.php",
        data: req ,
        success: function(data){
            //$.each(data, function(key) {
                            //var arr = [];
                            //alert(data);
            //});
            //alert("production enregistrée");
            
            displayMessage("opération  réussie");
            document.getElementById("message").style.background='#717171';
            setTimeout("displayMessage('')",1000);
            //$('message').html("opération  réussie");
            resetScreen();
            setTimeout("window.location.reload(true)",1000);
            
        }
    });
}
function displayMessage(text){
    document.getElementById("message").value=text;
    document.getElementById("message").style.background='#FFFFFF';
}
function updateSql(tab,col,val,cond,callback){
    var req = {
        'table' : tab , 
        'column' : col,
        'value' : val,
        'condition' : cond,
        type : 'sync'
    };
    $.ajax({
        type: "POST",
        url: "php/update.php",
        data: req ,
        success: function(x){
            //resetScreen();
            if(callback!=null){
                callback();
                displayMessage("mise à jour ok");
                document.getElementById("message").style.background='#FF55AA';
                setTimeout("displayMessage('')",1000);
                //alert("opératio  réussie");
            }
            //alert("echo");
            return 1;
            //alert(x);
            //Production.storeRemoveAll();
            //syncS2MPhp();
            
        }
    });
}