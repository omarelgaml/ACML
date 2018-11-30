<?php
session_start();
if (empty($_SESSION['user_id']) ) {
    header("Location: login.php");
} else {
$user_id = $_SESSION['user_id'];
}

?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="css/style.css">
  <style>
         #map {
                 height: 400px;
               width: 100%;
            }
            
        
        </style>
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyA40FQ3bNtkaD5jf-Ir812aW8Czg4_GA58&libraries=drawing, geometry"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Document</title>
</head>

<body>
    

    <section class="home">
        
        <!-- Header -->
        <div class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-4 text-left">
                        <!-- Title -->
                        <p>Special Reminder</p>
                    </div>
                
                    <div class="col-6 text-right">
                      
                        <!-- Logout -->
                        <a href="logout.php">
                            <img src="img/logout.svg" alt="" class="logout">
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Side Menu -->
        
    </section>
  
          <div id="map"></div>
         
          <script>
        
        var map;
        var latitude, longitude;
        var markersArray = [];
           function initMap() {
                  map = new google.maps.Map(document.getElementById('map'), {
                  center: {lat: 30.044281, lng: 31.340002},
                  zoom: 16,
                  disableDoubleClickZoom: true // disable the default map zoom on double click
                 });
                 
                google.maps.event.addListener(map, 'click', function( event ){
                    
                    latitude= event.latLng.lat();
                    longitude = event.latLng.lng();
                    
                    if(markersArray.length>0){
                        for (var i = 0; i < markersArray.length; i++ ) {
    markersArray[i].setMap(null);
  }
  markersArray.length = 0;
                    }
                    
                  // document.getElementById('pickup_addresslat').value = event.latLng.lat()+', '+event.latLng.lng();
                   
                   document.getElementById('pickup_addresslat').value = event.latLng.lat();
                   
                   document.getElementById('pickup_addresslng').value = event.latLng.lng();
                
                         var pos = {
                            lat: latitude,
                            lng: longitude
                          };

                        // Create a marker and center map on user location
                        marker = new google.maps.Marker({
                            position: pos,
                            draggable: true,
                            animation: google.maps.Animation.DROP,
                            map: map
                        });
                    markersArray.push(marker);
                        map.setCenter(pos);
                });
                
           }
                 
        </script>
        
        <script>
          initMap();
        </script>
                          
        <h4 style="color:red;margin-top: 30px;margin-left: 20px">Please mark the Point accurately on the Map</h4>

    <!-- Form -->
    <div class="forms">
        <div class="container">
            <form action="save_reminder.php" id='myForm' method = "post">
           
   <div class="col-12 col-md-6">
                
             <input type="hidden" id="pickup_addresslat" name="pickup_addresslat" value="" class="form-control" placeholder="lat" required>
            </div>
            
            <div class="col-12 col-md-6">
                
                <input type="hidden" id="pickup_addresslng" name="pickup_addresslng" value="" class="form-control" placeholder="lng" required>
            </div>
              <div class="address-1">
                   <div class="row">
                       <div class="col-6"><h2>Reminder Description</h2></div>
                       <div class="col-6"></div>
                   </div>
                    <div class="row">
                         <div class="col-6">
                            <div class="group">
                                <input type="text" name = "desc" value=""  required>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label id="req">Reminder</label>
                            </div>
                        </div> 
            
                    </div>
                                 </div>
                  
                <!-- Submit -->
                <div class="submit">
                    <div class="row">
                        <div class="col-12 text-center">
                            <input type="submit" value="Finish" name="next">                     </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
     $('#myForm').submit(function() {
    if ( !$('#pickup_addresslat')[0].value && !$('#pickup_addresslng')[0].value ) {
        alert("Please mark the location on the map");
        return false; }
});
</script>
  
    <!-- jQuery JS -->
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- Nice Scroll -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <!-- Style -->
    <script src="js/style.js"></script>
</body>

</html>
