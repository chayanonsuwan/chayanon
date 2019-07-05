<!DOCTYPE html>
<html>
<body>

<body onload="getLocation()">

<p id="demo"></p>

<script>
    
var x = document.getElementById("demo");

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
    x.innerHTML = "<input   name='gps' type='text' value='"+position.coords.latitude+","+position.coords.longitude+"' />";
    x.innerHTML = "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=http://rtp.in.th/pom/wifi_home_pom/admin/new.php?gps="+position.coords.latitude+","+position.coords.longitude+"'/>";
}
</script>

    
</body>
</html>
