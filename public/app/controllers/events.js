app.controller('eventsController', function($scope, $http,baseurl) {
   
    //location array to be stored from http request api	
    $scope.locations = [];
    //detail panel hide
    $scope.eventclicked = false;
    //function to retrieve event list
    $scope.getEventLocations = function(){
        
        //http request to retrieve all events to show on maps
        
          
                $http({
                         method: 'GET',
                         headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                         url: baseurl+"api/events",
                         data: ""
                     }).
                     success(function(data) {
                         //assign event list to scope var 
                         $scope.locations = data;
                         //show marker on the map
                         $scope.setEventLocationMarker();
                         
    
                     }).
                     error(function(data, response) {
                         console.log(response + " " + data);
                     });
          
          
        
        //http  request ends
    }
    
    //retrieve locations from api of laravel
    $scope.getEventLocations();
    
   
   //show map
    $scope.map = new google.maps.Map(document.getElementById('map'), {
      zoom: 12,
      center: new google.maps.LatLng(23.758598, 90.390057),
      mapTypeControl: false,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

     //called at the success of getEventLocations function
    $scope.setEventLocationMarker = function(){

          var infowindow = new google.maps.InfoWindow();
          var marker;
          angular.forEach($scope.locations, function(location){
             // console.log(location.eventAddress);
               var latlng = new google.maps.LatLng(location.eventLocationLat,location.eventLocationLong);
               //marker setting with each location
               marker = new google.maps.Marker({
                  position: latlng ,
                  map: $scope.map,
                  title:location.eventName
                });
             
               google.maps.event.addListener(marker, 'click', function() { 
                   
                    //localstorage to be available in other angular controller
                     localStorage.selectedeventid = location.eventId;
                     localStorage.selectedeventname = location.eventName;
                     localStorage.selectedeventaddress = location.eventAddress;
                   //show detail panel as clicked
                     $("#detailpanel").show();
                    //assign selected event values
                     $("#selectedeventname").html(":: "+location.eventName);
                     $("#selectedeventaddress").html(":: "+location.eventAddress);
                     $("#selectedeventdates").html(":: "+location.eventStartDate+" - "+location.eventEndDate);
                    //popup event details while clicked on any event
                    infowindow.setContent("<strong>Event Name: "+location.eventName+"<br>Address: "+location.eventAddress+"<br>Start: "+location.eventStartDate+"<br>End: "+location.eventEndDate+"</strong>");
                    infowindow.open($scope.map, marker);
                 }); 
                 return marker;     
          }) //end each 
    } //end of set marker   
 
    //redirect to expositioncontroller
    $scope.redirectToExpositionMap = function(){
        
        window.location = baseurl+"booking/"+localStorage.selectedeventid;
        
    }

});
