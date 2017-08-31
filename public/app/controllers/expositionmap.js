app.controller('expositionMapController', function($scope, $http,baseurl) {
   
  
   $scope.baseurl = baseurl;
   //init stand price and position
   $scope.standprice = "";
   $scope.standposition = "";
   $scope.standstaus = "";
   $scope.spacetype = "";
   
   //assign to $scope from localstorage to be displayed on blade
    $scope.selectedeventid = localStorage.selectedeventid ;
    $scope.selectedeventname = localStorage.selectedeventname ;
    $scope.selectedeventaddress = localStorage.selectedeventaddress;
   
   //stand property to standdetail popup
   $scope.setStandProp = function($id,$price,$staus,$spacetype){
       
      if($staus) $status = "Booked";
      else $status = "Available";
      
      if($spacetype==1) $spacetype = "Single";
      else $spacetype = "Dual";
      
       $scope.standprice = $price;
       $scope.standposition = $id;
       $scope.standstatus = $status; 
       $scope.spacetype = $spacetype;
   }
   
   //company property to companydetail popup
   $scope.setCompProp = function($name,$email,$web,$contact){
      
       $scope.cmpname = $name;
       $scope.cmpemail = $email;
       $scope.cmpweb = $web;
       $scope.cmpcontact = $contact;
   }
  
   //closing the Stand detail Popup while Resrve button is clicked 
   $scope.reserveclick = function(){
     jQuery('#standDtlModal').modal('hide');
   }
   
   
   

});
