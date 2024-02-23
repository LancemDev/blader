<?php

namespace App\Livewire;

use Livewire\Component;

class Chatty extends Component
{
    public $message;
    public $loading = false;

    public function sendMessage()
    {
        $this->loading = true;
    
        // Prepare the HTTP request
        $opts = [
            'http' => [
                'method'  => 'POST',
                'header'  => 'Content-type: application/json', // Set content type to JSON
                'content' => json_encode(['message' => $this->message]), // Encode message as JSON
            ]
        ];
    
        // Create a stream context
        $context  = stream_context_create($opts);
    
        // Send the request and get the response
        $response = file_get_contents('https://mksu-examflow.vercel.app/message', false, $context);
    
        // Decode the response
        $responseBody = json_decode($response, true);
    
        // Set the response to the message variable
        $this->message = $responseBody['response'];
        // dd($responseBody['response']);
    
        $this->loading = false;
    }
    public function render()
    {
        return view('livewire.chatty');
    }
}
