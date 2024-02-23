<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Chat extends Component
{
    public $message;
    public $loading = false;

    public function sendMessage()
    {
        $this->loading = true;
    
        // Here you can send the message to the server and get the response
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'https://mksu-examflow.vercel.app/message', [
            'form_params' => [
                'message' => $this->message
            ]
        ]);
    
        $responseBody = json_decode($response->getBody(), true);
    
        // Set the response to the message variable
        $this->message = $responseBody['message'];
    
        $this->loading = false;
    }

    public function closeModal()
    {
        //
    }

    public function render()
    {
        return view('livewire.chat');
    }
}