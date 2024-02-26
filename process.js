console.log("startscript");
console.log(window.location.hostname);

let day;
function sendday(){
    
     document.getElementById("clickdate").value = day;
    }
function setvaluedate(buttonvalue, date) {
    document.getElementById("clickdate").value = buttonvalue + " " + date;
    
}

async function timeuser(date, dayvalue) {
     
    day = dayvalue;
    
    
    document.getElementById("currentdate").innerHTML = "รายการจองวันที่ " + date;
    window.location.href = "?time=" + date + "&day=" + day
    
    
}

