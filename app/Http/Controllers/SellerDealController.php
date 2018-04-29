<?php

namespace App\Http\Controllers;

use App\SellerDeal;
use App\VisitorOffer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\SMSUtil;

class SellerDealController extends Controller
{


    /**
     * Validation rule for the Class SellerDealController
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
        'deal_price'=>'required'

    ];


    /**
     * Matching function which will be called on each insert request.
     *
     * @param SellerDeal Object
     *
     * @return boolean true/false
     */

    private function match($sellerDeal){
        $visitorOffers=VisitorOffer::where('matched','=',false)->get();
        foreach($visitorOffers as $visitorOffer){
            if(
                $sellerDeal->quantity>=$visitorOffer->quantity
                and $sellerDeal->product_id==$visitorOffer->product_id
                and $sellerDeal->variant==$visitorOffer->variant
                and $sellerDeal->deal_price<=$visitorOffer->offer_price

            ){

                //set the matched to true;
                $visitorOffer->matched=true;
                $visitorOffer->save();
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


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('SellerDeal.create');
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
        $sellerDeal=new SellerDeal();
        $sellerDeal->definition_id=request('definition_id');
        $sellerDeal->api_password=request('api_password');
        $sellerDeal->notification_tel=request('notification_tel');
        $sellerDeal->transaction_type=request('transaction_type');
        $sellerDeal->product_title=request('product_title');
        $sellerDeal->category=request('category');
        $sellerDeal->quantity=request('quantity');
        $sellerDeal->product_url=request('product_url');
        $sellerDeal->product_id=request('product_id');
        $sellerDeal->variant=request('variant');
        $sellerDeal->deal_price=request('deal_price');
        $sellerDeal->save();

        #return json_decode("{success:'success'}");
        #return "{'success':'success'}";
        $message='success';
        return view('SellerDeal.create',compact("message"));


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SellerDeal  $sellerDeal
     * @return \Illuminate\Http\Response
     */
    public function show(SellerDeal $sellerDeal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SellerDeal  $sellerDeal
     * @return \Illuminate\Http\Response
     */
    public function edit(SellerDeal $sellerDeal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SellerDeal  $sellerDeal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SellerDeal $sellerDeal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SellerDeal  $sellerDeal
     * @return \Illuminate\Http\Response
     */
    public function destroy(SellerDeal $sellerDeal)
    {
        //
    }
}
