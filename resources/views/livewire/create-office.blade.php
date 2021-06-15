<div>
    <form wire:submit.prevent="save">
        <input type="text" required placeholder="Office" name="office" id="office" wire:model.defer="office">
        {{$office}}
        <br>
        <br>
        <input type="text" placeholder="Day" name="day" id="day" wire:model.defer="execution_days">
        <br>
        <br>
        <button type="submit">Guradar</button>
    </form>
</div>
