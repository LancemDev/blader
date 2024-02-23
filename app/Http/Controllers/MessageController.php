<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function sendMessage(Request $request)
    {
        $message = $request->input('message');

        // Send the message to the server and get the response
        // $client = new \GuzzleHttp\Client();
        // $response = $client->request('POST', 'https://mksu-examflow.vercel.app/message', [
        //     'headers' => [
        //         'Content-Type' => 'application/json',
        //     ],
        //     'json' => [
        //         'message' => $message
        //     ]
        // ]);

        // $responseBody = json_decode($response->getBody(), true);

        // // Return the response
        // return response()->json($responseBody);

        dd($message);
    }
}
