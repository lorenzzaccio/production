/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


function  getDate(){
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!

    var yyyy = today.getFullYear();
    if(dd<10){
        dd='0'+dd
        }
        if(mm<10){
        mm='0'+mm
        }
        today = yyyy+'-'+mm+'-'+dd;
    return today;
}

function getTime(){
    var currentdate = new Date(); 
    var datetime = currentdate.getHours() + "." +  currentdate.getMinutes();
    return datetime;
        
        /*"Last Sync: " + currentdate.getDate() + "/"
    + (currentdate.getMonth()+1)  + "/" 
    + currentdate.getFullYear() + " @ "  
    + currentdate.getHours() + ":"  
    + currentdate.getMinutes(); + ":" 
    + currentdate.getSeconds();*/
}