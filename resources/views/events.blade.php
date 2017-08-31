@include('slices.header')   
   <div class="container-fluid" ng-controller="eventsController">
        
       <!-- Event List on map -->
        <div class="row">
          
            <div class="panel panel-default" id="mappanel">
                <div class="panel-heading">Events </div>
                <div class="panel-body">
            
                    <div id="map"  ></div>
                    
                </div>  <!-- Panel Body map -->
            </div>  <!-- Panel  map -->
              
        </div>
       <!-- End of Event List on map -->
       
       <div class="panel panel-default" id="detailpanel">
            <div class="panel-heading">Event Booking </div>
            <div class="panel-body">
                
                <div class="row"> <div class="col-sm-2">Name  </div> <div id="selectedeventname" class="col-sm-4"></div>  </div>
                <div class="row"> <div class="col-sm-2">Location  </div> <div id="selectedeventaddress" class="col-sm-4"></div>  </div>
                <div class="row"> <div class="col-sm-2">Event Dates  </div> <div id="selectedeventdates" class="col-sm-4"></div>  </div>
                
                <div class="row booking-btn-div"> <button type="button" ng-click="redirectToExpositionMap();" class="btn btn-primary">Book your place</button>  </div>
                
            </div>
       </div>
       <!-- End of Event Details an Booking Panel -->
       
   </div>    

            
  <!-- End of container -->
 
 
@include('slices.footer')