<?php

namespace App\Http\Controllers;

use App\BuyFromAny;
use App\SellToAny;
use App\SMSUtil;
use Illuminate\Http\Request;
use function MongoDB\BSON\toJSON;
use Mail;
use App\Mail\MailUtil;

class SellToAnyController extends Controller
{


    /**
     * Validation rule for the Class SellToAnyController
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
        'seller_price'=>'required',

    ];

    /**
     * Matching function which will be called on each insert request.
     *
     * @param SellToAny Object
     *
     * @return boolean true/false
     */
    private function match($sellToAny){
        $buyFromAnies=BuyFromAny::where('matched','=',false)->get();
        foreach($buyFromAnies  as $buyFromAny){
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
                $buyFromAny->matched=true;

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
                $buyFromAny->save();
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
        return view('SellToAny.create');
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
        $sellToAny=new SellToAny();
        $sellToAny->definition_id=request('definition_id');
        $sellToAny->api_password=request('api_password');
        $sellToAny->notification_email_id=request('notification_email_id');
        $sellToAny->transaction_type=request('transaction_type');

        $sellToAny->category=request('category');
        $sellToAny->quantity=request('quantity');
        $sellToAny->product_or_service=request('product_or_service');
        $sellToAny->parameter1=request('parameter1');
        $sellToAny->parameter2=request('parameter2');
        $sellToAny->parameter3=request('parameter3');
        $sellToAny->parameter4=request('parameter4');
        $sellToAny->parameter5=request('parameter5');
        $sellToAny->parameter6=request('parameter6');
        $sellToAny->parameter7=request('parameter7');
        $sellToAny->seller_price=request('seller_price');

        if($this->match($sellToAny)==true){
            $sellToAny->matched=true;
        }

        $sellToAny->save();
        #return '{"success":"success"}';
        $message='success';
        return view('SellToAny.create',compact("message"));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SellToAny  $sellToAny
     * @return \Illuminate\Http\Response
     */
    public function show(SellToAny $sellToAny)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SellToAny  $sellToAny
     * @return \Illuminate\Http\Response
     */
    public function edit(SellToAny $sellToAny)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SellToAny  $sellToAny
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SellToAny $sellToAny)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SellToAny  $sellToAny
     * @return \Illuminate\Http\Response
     */
    public function destroy(SellToAny $sellToAny)
    {
        //
    }
}
