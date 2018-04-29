<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Aloha\Twilio\Twilio;
class SMSUtil extends Model
{
    public function sendMSG($phone,$message)
    {
        $twilio = new Twilio(getenv('TWILIO_SID'), getenv('TWILIO_TOKEN'), getenv('TWILIO_FROM'));
        $response=$twilio->message($phone, $message);

        return $response;
    }
}