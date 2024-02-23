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


        $this->loading = false;
    }

    public function render()
    {
        return view('livewire.chat');
    }
}
