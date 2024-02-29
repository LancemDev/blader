<div>
    <x-mary-modal id="modal20" title="Chat with maryAI" class="p-5">
        <div>
            <h2 class="text-2xl font-bold">Chat with maryAI:</h2>
            <h3 class="text-lg font-bold">Your blader virtual AI assistant</h3>
        </div>
        <x-slot:actions>
            <x-mary-button label="Close" onclick="modal20.close()" class="btn-ghost" />
        </x-slot:actions>
        <div>
            <div>{{ $message }}</div>
            <x-mary-input label="Message" placeholder="Type your message here" wire:model="message" />
            <br />
            <x-mary-button label="Send" wire:click="sendMessage" class="btn-primary" />
            @if($loading)
                <div>Loading...</div>
            @endif
        </div>

    </x-mary-modal>
</div>