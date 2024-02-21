<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <h1>{{ $count }}</h1>

    <x-mary-button label="Nope" icon="o-x-circle" wire:click="decrement" />

    <x-mary-button label="Right" icon="o-check" wire:click="increment" />
</div>
