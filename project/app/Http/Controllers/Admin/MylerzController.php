<?php

namespace App\Http\Controllers\Admin;

use App\Classes\GeniusMailer;
use App\Http\Controllers\Controller;
use App\Models\Generalsetting;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use Validator;
use App\Imports\OrdersImport;
use Maatwebsite\Excel\Facades\Excel;

class MylerzController extends Controller
{
   
   
    public  $b;
    
    public function __construct()
    {
        
     $this->middleware('auth:admin');
     
     $this->b= Generalsetting::findOrFail(1);
       
                       $client = new Client([
                           
                        'headers' => ['Content-Type' =>'application/x-www-form-urlencoded']
                      
                      ]);
                
                          $response = $client->post('http://41.33.122.61:58639/Token',  
                         
                           ['form_params' => [ 
                              
                                "grant_type"=>"password",
                                "username"=>$this->b->mylerz_username,
                                "password"=>$this->b->mylerz_password,
                                
                                ],
                            ]); 
                                  
                       $m = json_decode($response->getBody(), true);
                       
                       $this->access_token= $m['access_token'];               
    
              }

    
                  public function   Awb($id){
    
                         $abs=array(
                     
                            "Barcode"=>$id
                        
                            );
                        
                      $d=$abs;
                      $data = json_encode($d) ;
                      $client = new Client([
                      'headers' => ['Content-Type' =>'application/json','Authorization'=>'Bearer vRdyx_qITd2Qmi3NTGEoiuKntJenM3K9gRBqqtC12-PbrnCSchjvlwkmULWGUmoLJcR-nty70WWe5UqqOoFT0zLdv6aUghu2bf_Sqo1xwsWcN-P5--0AzjQ-SJEa0_guh_uPqXNQsbP01MYAFmHuwPSrdXLXdk9Lo6nOtNeIvJv2ZSVbZG_VthXQ91EMJCZ85Ywtb4kJdSHbHM4iT2dCfev21UDQ3Ver85fLuGupgAh4MbmtS33pfqeFC74O_w_BcpmDBxmHVyaj7rz-EhdXm9G2GABRyvAJZZ7peFsg6l1svJKBosNfs4t-xRnGxrxiNd1UbHBchkk5HFh3oZPYjLvSL9rGUC7E9Sr_wWwk68Jw6iXlgwpTHhajSZVGG2dDPyV2aEgyeWECxeH6lHa2qTTQ2A2ItnkZSnh426jtcEkGxcH0oOVVN8laeYw-uOwIqTs7DvcbJvMrx-o5PUiYriNK_lKK042ztLc5n8pmAattEBzYP2kolmr6eb1DV6HKbGBFiPmXwEHA3bZMC1dUcg']
                     ]);
                
                     $response = $client->post('http://41.33.122.61:58639/api/packages/GetAWB',
                
                          ['body' =>$data]
                     
                     );
                    
                    $m = json_decode($response->getBody(), true);
                    
                    
                    $awbpdf= base64_decode($m['Value']);
                    
                    
                       return response()->make($awbpdf, 200, [
                           
                                'Content-type'        => 'application/pdf',
                                'Content-Disposition' => 'attachment; filename="awb.pdf"',
                                'Content-Transfer-Encoding'=>'binary',
                                'Accept-Ranges'=>'bytes'
                            ]);
                      }
                                
                  
             public function   shipmentstatus($id){
      
                 $client = new Client([
                     
                   'headers' => ['Content-Type' =>'application/json','Authorization'=>'Bearer vRdyx_qITd2Qmi3NTGEoiuKntJenM3K9gRBqqtC12-PbrnCSchjvlwkmULWGUmoLJcR-nty70WWe5UqqOoFT0zLdv6aUghu2bf_Sqo1xwsWcN-P5--0AzjQ-SJEa0_guh_uPqXNQsbP01MYAFmHuwPSrdXLXdk9Lo6nOtNeIvJv2ZSVbZG_VthXQ91EMJCZ85Ywtb4kJdSHbHM4iT2dCfev21UDQ3Ver85fLuGupgAh4MbmtS33pfqeFC74O_w_BcpmDBxmHVyaj7rz-EhdXm9G2GABRyvAJZZ7peFsg6l1svJKBosNfs4t-xRnGxrxiNd1UbHBchkk5HFh3oZPYjLvSL9rGUC7E9Sr_wWwk68Jw6iXlgwpTHhajSZVGG2dDPyV2aEgyeWECxeH6lHa2qTTQ2A2ItnkZSnh426jtcEkGxcH0oOVVN8laeYw-uOwIqTs7DvcbJvMrx-o5PUiYriNK_lKK042ztLc5n8pmAattEBzYP2kolmr6eb1DV6HKbGBFiPmXwEHA3bZMC1dUcg' ]
                 ]);
                
                  $response = $client->get('http://41.33.122.61:58639/api/packages/GetPackageDetails?AWB='.$id.'');
                  
                   $m = json_decode($response->getBody(), true);
                   
                   return view('admin.order.mylerzshow',compact('m'));  
                   
         }

}