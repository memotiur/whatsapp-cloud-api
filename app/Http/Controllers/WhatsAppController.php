<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class WhatsAppController extends Controller
{


    public function messageSend(Request $request)
    {

        $message = $request['message'];
        $to = $request['phone'];
        $type = $request['type'];
        $client_id = env('CLIENT_ID');
        $accessToken = env('WA_ACCESS_TOKEN');
        $url = 'https://graph.facebook.com/v16.0/' . $client_id . '/messages';

        if ($type == 1) {
            //Send Template Message

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $accessToken,
                'Content-Type' => 'application/json',
            ])->post($url, [
                'messaging_product' => 'whatsapp',
                'to' => $to,
                'type' => 'template',
                'template' => [
                    'name' => 'hello_world',
                    'language' => [
                        'code' => 'en_US'
                    ]
                ]
            ]);
        } else {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $accessToken,
                'Content-Type' => 'application/json',
            ])->post($url, [
                'messaging_product' => 'whatsapp',
                'recipient_type' => 'individual',
                'to' => $to,
                'type' => 'text',
                'text' => [
                    'preview_url' => false,
                    'body' => $message,
                ]
            ]);
        }
        $statusCode = $response->status();
        $responseData = $response->json();
       /* return [
            'status' => $statusCode,
            'data' => $responseData,
        ];*/


        return Redirect::to('/')->with('success', 'Message Sent Successfully');

    }

    public function templateMessage(Request $request)
    {
        $to = $request['to'];
        $client_id = env('CLIENT_ID');
        $accessToken = env('WA_ACCESS_TOKEN');
        $url = 'https://graph.facebook.com/v16.0/' . $client_id . '/messages';

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
            'Content-Type' => 'application/json',
        ])->post($url, [
            'messaging_product' => 'whatsapp',
            'to' => $to,
            'type' => 'template',
            'template' => [
                'name' => 'hello_world',
                'language' => [
                    'code' => 'en_US'
                ]
            ]
        ]);

        $statusCode = $response->status();
        $responseData = $response->json();
        return [
            'status' => $statusCode,
            'data' => $responseData
        ];

    }

    public function customMessage(Request $request)
    {
        $to = $request['to'];
        $client_id = env('CLIENT_ID');
        $accessToken = env('WA_ACCESS_TOKEN');
        //return "ddd";
        $url = 'https://graph.facebook.com/v16.0/' . $client_id . '/messages';
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
            'Content-Type' => 'application/json',
        ])->post($url, [
            'messaging_product' => 'whatsapp',
            'recipient_type' => 'individual',
            'to' => $to,
            'type' => 'text',
            'text' => [
                'preview_url' => false,
                'body' => 'Hello, World!',
            ]
        ]);


        $statusCode = $response->status();
        $responseData = $response->json();
        return [
            'status' => $statusCode,
            'data' => $responseData,
        ];
    }

}
