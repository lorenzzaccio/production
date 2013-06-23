/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
var arrec = [];
var ID_PRED=0;
var ORDRE_PROD = 1;
var ETAPE_PROD = 2;
var PREF_PROD = 3;
var ART_PROD = 4;
var QUANTITY_PROD = 5;
var TRANSFO_PROD = 6;
var COMMENT_PROD = 7;
var ART_TRANS_PROD = 8;
var DATE_PROD = 9;
var STATUS_PROD = 10;

function syncLclStorage(arr){
                var arrow ;
                var l = arr.length;
                var i=0;
                for(i=0;i<l;i++){
                    arrow = arr[i];
                    arrec[i] = arrow;
                    recordLine(arrow);
                }
}

function recordLine(arrow){
    var entry = {
        id: parseInt(arrow[ID_PRED]),
        ordre: arrow[ORDRE_PROD],
        etape: parseInt(arrow[ETAPE_PROD]),
        pref: (arrow[PREF_PROD]),
        art: arrow[ART_PROD],
        quantity:arrow[QUANTITY_PROD],
        transfo:(arrow[TRANSFO_PROD]),
        comment:arrow[COMMENT_PROD],
        arttrans:arrow[ART_TRANS_PROD],
        dateProd:arrow[DATE_PROD],
        status:parseInt(arrow[STATUS_PROD])
    };
    Production.storeAdd(entry);
}
