<?php

namespace App\Http\Controllers;

use App\SellerDeal;
use App\VisitorOffer;
use Illuminate\Http\Request;
use App\SMSUtil;
use function MongoDB\BSON\toJSON;

class VisitorOfferController extends Controller
{

    /**
     * Validation rule for the Class VisitorOfferController
     *
     */
    private $rules=[
        'definition_id'=>'required',
        'api_password'=>'required',
        'notification_tel'=>'required',
        'transaction_type'=>'required',
        'product_title'=>'required',
        'category'=>'required',
        'quantity'=>'required',
        'product_url'=>'required',
        'product_id'=>'required',
        'variant'=>'required',
        'offer_price'=>'required'

    ];

    /**
     * Matching function which will be called on each insert request.
     *
     * @param VisitorOffer Object
     *
     * @return boolean true/false
     */

    private function match($visitorOffer){
        $sellerDeals=SellerDeal::where('matched','=',false)->get();
        foreach($sellerDeals as $sellerDeal){
            if(
                 $sellerDeal->quantity>=$visitorOffer->quantity
                and $sellerDeal->product_id==$visitorOffer->product_id
                and $sellerDeal->variant==$visitorOffer->variant
                and $sellerDeal->deal_price<=$visitorOffer->offer_price

            ){
                //set the matched to true for the matched transaction
                $sellerDeal->matched=true;
                $sellerDeal->save();
                //mail subject
                $subject="Demo Subject";
                $body="MATCHED WITH:<br>"
                    .$sellerDeal->quantity.'>='.$visitorOffer->quantity
                    .$sellerDeal->product_id.'=='.$visitorOffer->product_id
                    .$sellerDeal->variant.'=='.$visitorOffer->variant
                    .$sellerDeal->deal_price.'<='.$visitorOffer->offer_price;


                #Mail::to($sellerDeal->notification_email_id)->queue(new MailUtil($subject,$body));
                #Mail::to($visitorOffer->notification_email_id)->queue(new MailUtil($subject,$body));

                $smsutil=new SMSUtil();
                $json=$smsutil->sendMSG($body,$sellerDeal->notification_tel);
                $json=$smsutil->sendMSG($body,$visitorOffer->notification_tel);


                return true;
            }
            return false;
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('VisitorOffer.create');
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

        $this->validate(request(),$this->rules);
        $data=request()->all();
        $visitorOffer=new VisitorOffer();
        $visitorOffer->definition_id=request('definition_id');
        $visitorOffer->api_password=request('api_password');
        $visitorOffer->notification_tel=request('notification_tel');
        $visitorOffer->transaction_type=request('transaction_type');
        $visitorOffer->product_title=request('product_title');
        $visitorOffer->category=request('category');
        $visitorOffer->quantity=request('quantity');
        $visitorOffer->product_url=request('product_url');
        $visitorOffer->product_id=request('product_id');
        $visitorOffer->variant=request('variant');
        $visitorOffer->offer_price=request('offer_price');


        $matched=$this->match($visitorOffer);
        if($matched==true){
            $visitorOffer->matched=true;
        }
        $visitorOffer->save();
        #return json_decode("{success:'success'}");
        #return response()->json(json_encode('{"success":"success"}'));
        $message='success';
        return view('VisitorOffer.create',compact("message"));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VisitorOffer  $visitorOffer
     * @return \Illuminate\Http\Response
     */
    public function show(VisitorOffer $visitorOffer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VisitorOffer  $visitorOffer
     * @return \Illuminate\Http\Response
     */
    public function edit(VisitorOffer $visitorOffer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VisitorOffer  $visitorOffer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VisitorOffer $visitorOffer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VisitorOffer  $visitorOffer
     * @return \Illuminate\Http\Response
     */
    public function destroy(VisitorOffer $visitorOffer)
    {
        //
    }
}
