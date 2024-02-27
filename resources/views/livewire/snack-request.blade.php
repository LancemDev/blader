<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <form wire:submit="save">
        <input type="text" wire:model="form.type" placeholder="type" class="bg-gray-900 text-black"/>
        <input type="text" wire:model="form.time" placeholder="time" class="bg-gray-900 text-black" />
        <button type="submit" class="btn-success bg-green-800 hover:bg-green-900" >Submit</button>
    </form>
</div>
