/**
 * Created by erikn on 9/3/17.
 */

/*
Function returns json from grab_data.php given a sensor ID
 */

function returnJson(callback,sensorID){
    
console.log("func run");
    var dataArray;
    //First we send a GET request to the server with AJAX
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

    //Then we wait for the server to send something back
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            dataArray = JSON.parse(this.responseText);
            //console.log(JSON.stringify(dataArray));
            callback(dataArray);
            console.log(JSON.stringify(dataArray));
        }
    };

    xmlhttp.open("GET","grab_data.php?q="+sensorID,true);
    xmlhttp.send();


}