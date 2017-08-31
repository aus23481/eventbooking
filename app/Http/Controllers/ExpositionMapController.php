<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Events;
use App\Exhibitors;
use App\ExpositionStands;

class ExpositionMapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($eventId=3)
    {
       
        $seatsQuantity = $this->getEventSeatsQuantity($eventId);
        $maphtml = $this->drawExpositionMap($eventId,$seatsQuantity);
        return view('expositionmap')->with("seatsQuantity",$seatsQuantity)->with("maphtml",$maphtml);

    }

     
    
  public function getEventsList()
    {
        //
        
        
        try {
              //responds with all the events
              return Exhibitors::where("eventId",4)->get();
          }
          catch (\Exception $e) {
              return $e->getMessage();
          }
        //end of try
        
    }  
    
    
    /**
     * Retrieve seatsQuanity from events table
     * @param  eventId
     * @return seatsQuantity
     */
    public function getEventSeatsQuantity($eventId)
    {
        
        try {
            
              $event = Events::find($eventId);
              return $event->seatsQuantity;
          }
          catch (\Exception $e) {
              return $e->getMessage();
          }
        
       
    }
  
     /**
     * Retrieve seatsQuanity from events table
     * @param  eventId
     * @return seatsQuantity
     */
    public function drawExpositionMap($eventId,$seatsQuantity)
    {
        
        try {
            
              if($seatsQuantity){
                  
                  
                  
                 //if($standres)
                 // print $standres->standStatus."-". $standres->standName;
                  
                  $html = "<table class='table-bordered' id='tbl_grid_map'>";
                  $status = 0;
                  $spacetype = "Single";
                 
                  for($notd=1;$notd<=$seatsQuantity;){
                               
                        if($notd%3==0) $price = 0;
                        else $price = 200;
                       
                        if($price>0) $pricetext = "<br>$price USD";
                        else $pricetext = "<br>Free";
                        $exhibitorMarketingDoc = "";
                        $exhibitorLogo = "";
                        $bgcolor = "grey";
                        $statustext = "Click here to book";
                        $standres = ExpositionStands::where(array("eventId"=>$eventId,"standName"=>$notd))->first();
                        
                        if($standres){
                            $status = $standres->standStatus;
                            $spacetype = $standres->standType;
                            if($status) $statustext = "Booked";
                            $bgcolor = "green";
                         //retrieve company info
                            $compres = Exhibitors::where(array("eventId"=>$eventId,"exhibitorID"=>$standres->exhibitorId))->first();
                            $exhibitorLogo = $compres->exhibitorLogo;
                            $exhibitorMarketingDoc = $compres->exhibitorMarketingDoc;
                            
                            
                        }
                        
                        
                        
                        
                               $html .="<tr>";
                               if($status)
                                    $html .="<td id='ST".$notd."' class='$bgcolor' ng-click=\"setCompProp('".$compres->exhibitorName."','".$compres->exhibitorEmail."','".$compres->exhibitorWeb."','".$compres->exhibitorContact."')\" data-toggle='modal' data-target='#compDtlModal'>";
                               else $html .="<td id='ST".$notd."' class='$bgcolor' ng-click='setStandProp(".$notd.",".$price.",".$status.",".$spacetype.")' data-toggle='modal' data-target='#standDtlModal'>";
                                    $html .= "EXH# ".$notd++;
                                    $html .= "<br><span class='status'>$statustext</span>";
                                    $html .= "<span class='price'>".$pricetext."</span>";
                                if($status&&$exhibitorLogo&&$exhibitorMarketingDoc) $html .="<a><img class='cmplogo' src='".url("/")."/upload/logo/$exhibitorLogo' width=30 height=30></a> | <a href='".url("/")."/upload/marketing/$exhibitorMarketingDoc' target='_blank'> Marketing Doc </a>";   
                                    $html .="</td>";
                        $status = 0;      
                        $standres = ExpositionStands::where(array("eventId"=>$eventId,"standName"=>$notd))->first();
                        $bgcolor = "grey";
                        $exhibitorMarketingDoc = "";
                        $exhibitorLogo = "";
                        $statustext = "Click here to book";
                        if($standres){
                            $status = $standres->standStatus;
                            $spacetype = $standres->standType;
                            if($status) $statustext = "Booked";
                            $bgcolor = "green";
                            
                            $compres = Exhibitors::where(array("eventId"=>$eventId,"exhibitorID"=>$standres->exhibitorId))->first();
                            $exhibitorLogo = $compres->exhibitorLogo;
                            $exhibitorMarketingDoc = $compres->exhibitorMarketingDoc;
                        }       
                               
                        if($notd<=$seatsQuantity) {
                               
                               if($status)
                                    $html .="<td id='ST".$notd."' class='$bgcolor' ng-click='setCompProp(".$notd.",".$price.",".$status.",".$spacetype.")' data-toggle='modal' data-target='#compDtlModal'>";
                               else $html .="<td id='ST".$notd."' class='$bgcolor' ng-click='setStandProp(".$notd.",".$price.",".$status.",".$spacetype.")' data-toggle='modal' data-target='#standDtlModal'>";

                               $html .= "EXH# ".$notd++;
                               $html .= "<br><span class='status'>$statustext</span>";
                               $html .= "<br><span class='price'>".$pricetext."</span>";
                       if($status&&$exhibitorLogo&&$exhibitorMarketingDoc) 
                                $html .="<a><img class='cmplogo' src='".url("/")."/upload/logo/$exhibitorLogo' width=30 height=30></a> | <a href='".url("/")."/upload/marketing/$exhibitorMarketingDoc' target='_blank'> Marketing Doc </a>";   
        
                               $html .="</td>";
                        }  
                               $html .="</tr>";
                               
                               $status = 0;
                               
                    } //end of loop
                           
                           
                                $html .="</table>";
                  
                 return $html;    
                  
                } else return "";  
            
              
              
              
          }
          catch (\Exception $e) {
              return $e->getMessage();
          }
        
       
    }
    
     /**
     * reserve a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function reserve(Request $request)
    {
       
        
            try {

                    //data assign to exhibitor table fields
                    $exhibitor = new Exhibitors;
                    $exhibitor->exhibitorName =  $request->input('exhibitorName');
                    $exhibitor->exhibitorAddress =  $request->input('exhibitorAddress');
                    $exhibitor->exhibitorWeb =  $request->input('exhibitorWeb');
                    $exhibitor->exhibitorContact =  $request->input('exhibitorContact');
                    $exhibitor->exhibitorEmail =  $request->input('exhibitorEmail');
                    $exhibitor->eventId =  $request->input('eventId');
                    if($request->file('exhibitorLogo')) 
                    $exhibitor->exhibitorLogo = $request->file('exhibitorLogo')->getClientOriginalName();

                    if($request->file('exhibitorMarketingDoc')) 
                    $exhibitor->exhibitorMarketingDoc = $request->file('exhibitorMarketingDoc')->getClientOriginalName();

                    $exhibitor->registeredDate =  date("Y-m-d H:i:s");
                    //saving to exhibitor table
                    $exhibitor->save();


                    if($request->file('exhibitorLogo')) 
                    $request->file('exhibitorLogo')->move(base_path() . '/upload/logo/',  $exhibitor->exhibitorLogo);

                    if($request->file('exhibitorMarketingDoc')) 
                    $request->file('exhibitorMarketingDoc')->move(base_path() . '/upload/marketing/',  $exhibitor->exhibitorMarketingDoc);
                    
                   //data save to expositionstands
                    $ExpositionStand = new ExpositionStands;
                    
                    $ExpositionStand->eventId =  $request->input('eventId');
                    $ExpositionStand->exhibitorId =  $exhibitor->exhibitorID;
                    
                    $ExpositionStand->standName =  $request->input('standpos');
                    $ExpositionStand->standStatus =  1;
                    $ExpositionStand->standType =  "Single";
                    
                    $ExpositionStand->save();
                    
                    return redirect('booking/'.$request->input('eventId'));
                    
                    
                    
                }
              catch (\Exception $e) {
                  return $e->getMessage();
              }
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
