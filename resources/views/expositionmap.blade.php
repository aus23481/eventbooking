@include('slices.header')   
   <div class="container-fluid" ng-controller="expositionMapController">
       
       <!-- Exposition Map -->
        <div class="row">
            
            
            <div class="panel panel-default" id="expositionpanel">
                <div class="panel-heading">Exposition Map - [[selectedeventname]] at [[selectedeventaddress]] <div style="float:right"><a style="right: 0px;"  href="[[baseurl]]">Back to events</a> </div></div>
            <div class="panel-body">
                
                  <!--map drawing-->     
                         <?php
                           print $maphtml;
                        ?>
                
                  <!--map drawing -->
            </div>
            </div>
       <!-- End of exposition Panel -->
  
       
          <!-- standDtlModal -->
        <div id="standDtlModal" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Stand Details</h4>
              </div>
              <div class="modal-body">
                  
                  <div><label for="position">Stand Position:</label> [[standposition]] </div>
                  <div><label for="position">Stand Status:</label> [[standstatus]] </div>
                  <div><label for="position">Stand Price(USD):</label> [[standprice]] </div>
                    <div><label for="position">Space Type:</label> [[spacetype]] </div>
                  <div style="float:right; vertical-align: text-top;margin-top: -80px;"> <img src="[[baseurl]]/resources/assets/img/expositonstand.jpg"> </div>
                
                  <div ng-click="reserveclick();" class="row booking-btn-div"> <button type="button"  data-toggle='modal' data-target='#registerModal' class="btn btn-primary">Reserve</button>  </div>
             
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>

          </div>
        </div>   
       
       <!-- End of standDtlModal -->
       
             <!-- RegisterModal -->
        <div id="registerModal" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Register to confirm Booking</h4>
              </div>
              <div class="modal-body">
               
                  <!--Register from -->
                  
                  <form role="form" method="post" action="<?php echo url('/'); ?>/reserve" enctype='multipart/form-data'>
                             
                             <input type="hidden" name="eventId" value="{{Request::segment(2)}}">
                             <input type="hidden" name="standpos" value="[[standposition]]">
                             <input type="hidden" name="_token" value="<?php echo csrf_token();?>">
                                
                                
                                <div class="form-group">
                                  <label for="exhibitorName">Exhibitor Name:</label>
                                  <input type="text" class="form-control" name="exhibitorName" required="" >
                                </div>
                                <div class="form-group">
                                  <label for="exhibitorWeb">Exhibitor Web:</label>
                                  <input type="url" pattern="https?://.+" class="form-control" name="exhibitorWeb">
                                </div>
                                
                               <div class="form-group">
                                  <label for="exhibitorEmail">Exhibitor Email:</label>
                                  <input type="email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$"  class="form-control" name="exhibitorEmail">
                                </div>
                            
                               <div class="form-group">
                                  <label for="exhibitorContact">Exhibitor Contact:</label>
                                  <input type="text" class="form-control" name="exhibitorContact">
                                </div>
                            
                               
                              <div class="form-group">
                                  <label for="exhibitorLogo">Exhibitor Logo:</label>
                                  <input type="file" accept="image/*" class="form-control" name="exhibitorLogo">
                                </div>
                            
                               
                              <div class="form-group">
                                  <label for="exhibitorMarketingDoc">Marketing Doc:</label>
                                  <input type="file" accept=".xlsx,.xls,image/*,.doc, .docx.,.ppt, .pptx,.txt,.pdf" class="form-control" name="exhibitorMarketingDoc">
                                </div>
                            
                                <button type="submit" class="btn btn-default">Confirm Reservation</button>
                         </form> 
                  
                  
                  
                  
                  <!-- Register form e nds -->
                  
                  
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>

          </div>
        </div>   
       
       <!-- End of Register Modal -->
     
       
       
        <!-- cmpDtlModal -->
        <div id="compDtlModal" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Company/Exhibitor Details</h4>
              </div>
              <div class="modal-body">
                  
                  <div><label for="position">Name:</label> [[cmpname]] </div>
                  <div><label for="position">Email:</label> [[cmpemail]] </div>
                  <div><label for="position">Web:</label> [[cmpweb]] </div>
                  <div><label for="position">Contact:</label> [[cmpcontact]] </div>
                  
                               
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>

          </div>
        </div>   
       
       <!-- End of cmpDtlModal -->

       
       
         </div>    

   <!-- End of container -->
 
 
@include('slices.footer')