<?php

namespace App\Http\Controllers;

use App\BuyFromAny;
use App\SellToAny;
use Illuminate\Http\Request;
use App\Mail\MailUtil;
use App\SMSUtil;
use Mail;

class BuyFromAnyController extends Controller
{

    /**
     * Validation rule for the Class BuyFromAnyController
     *
     */
    private $rules=[
        'definition_id'=>'required',
        'notification_email_id'=>'required',
        'transaction_type'=>'required',
        'category'=>'required',
        'quantity'=>'required',
        'product_or_service'=>'required',
        'parameter1'=>'required',
        'parameter2'=>'required',
        'parameter3'=>'required',
        'parameter4'=>'required',

        'parameter5'=>'required',
        'parameter6'=>'required',
        'parameter7'=>'required',
        'buyer_price'=>'required',

    ];


    /**
     * Matching function which will be called on each insert request.
     *
     * @param BuyFromAny Object
     *
     * @return boolean true/false
     */
    private function match($buyFromAny){
        $sellToAnies=SellToAny::where('matched','=',false)->get();
        foreach($sellToAnies as $sellToAny){
            if(
                $buyFromAny->category==$sellToAny->category
                and $buyFromAny->product_or_service==$sellToAny->product_or_service
                and $buyFromAny->parameter1==$sellToAny->parameter1
                and $buyFromAny->parameter2==$sellToAny->parameter2
                and $buyFromAny->parameter3==$sellToAny->parameter3
                and $buyFromAny->parameter4==$sellToAny->parameter4
                and $buyFromAny->parameter5==$sellToAny->parameter5
                and $buyFromAny->parameter6==$sellToAny->parameter6
                and $buyFromAny->parameter7==$sellToAny->parameter7
                and $buyFromAny->buyer_price<=$sellToAny->seller_price

            ){

                //set the matched to true;
                $sellToAny->matched=true;
                $sellToAny->save();

                $subject="Demo Subject";
                $body='Matched with:<br>'
                    .$buyFromAny->category.'=='.$sellToAny->category
                    .$buyFromAny->product_or_service.'=='.$sellToAny->product_or_service
                    .$buyFromAny->parameter1.'=='.$sellToAny->parameter1
                    .$buyFromAny->parameter2.'=='.$sellToAny->parameter2
                    .$buyFromAny->parameter3.'=='.$sellToAny->parameter3
                    .$buyFromAny->parameter4.'=='.$sellToAny->parameter4
                    .$buyFromAny->parameter5.'=='.$sellToAny->parameter5
                    .$buyFromAny->parameter6.'=='.$sellToAny->parameter6
                    .$buyFromAny->parameter7.'=='.$sellToAny->parameter7
                    .$buyFromAny->buyer_price.'<='.$sellToAny->seller_price;
                $body=$body."<br>";
                Mail::to($buyFromAny->notification_email_id)->queue(new MailUtil($subject,$body));
                Mail::to($sellToAny->notification_email_id)->queue(new MailUtil($subject,$body));

                #$smsutil=new SMSUtil();
                #$json=$smsutil->sendMSG($msg,$mobile);


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
        return view('BuyFromAny.create');
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
        $buyFromAny=new BuyFromAny();
        $buyFromAny->definition_id=request('definition_id');
        $buyFromAny->api_password=request('api_password');
        $buyFromAny->notification_email_id=request('notification_email_id');
        $buyFromAny->transaction_type=request('transaction_type');

        $buyFromAny->category=request('category');
        $buyFromAny->quantity=request('quantity');
        $buyFromAny->product_or_service=request('product_or_service');
        $buyFromAny->parameter1=request('parameter1');
        $buyFromAny->parameter2=request('parameter2');
        $buyFromAny->parameter3=request('parameter3');
        $buyFromAny->parameter4=request('parameter4');
        $buyFromAny->parameter5=request('parameter5');
        $buyFromAny->parameter6=request('parameter6');
        $buyFromAny->parameter7=request('parameter7');
        $buyFromAny->buyer_price=request('buyer_price');

        if($this->match($buyFromAny)==true){
            $buyFromAny->matched=true;
        }
        $buyFromAny->save();
        #return '{"success":"success"}';
        $message='success';
        return view('BuyFromAny.create',compact("message"));


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BuyFromAny  $buyFromAny
     * @return \Illuminate\Http\Response
     */
    public function show(BuyFromAny $buyFromAny)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BuyFromAny  $buyFromAny
     * @return \Illuminate\Http\Response
     */
    public function edit(BuyFromAny $buyFromAny)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BuyFromAny  $buyFromAny
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BuyFromAny $buyFromAny)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BuyFromAny  $buyFromAny
     * @return \Illuminate\Http\Response
     */
    public function destroy(BuyFromAny $buyFromAny)
    {
        //
    }
}
