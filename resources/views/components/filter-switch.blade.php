@props(['showAll'])

<form action="{{ route('home') }}" method="GET" class="bg-dark p-3 rounded border border-secondary mb-4">
    <div class="form-check form-switch text-light">
        <input class="form-check-input" type="checkbox" name="all" value="1" id="filterSwitch" 
            {{ $showAll ? 'checked' : '' }} onchange="this.form.submit()">
        <label class="form-check-label ms-2" for="filterSwitch" style="font-family: 'Share Tech Mono', monospace;">
            {{ $showAll ? 'Mostra tutti i treni' : 'Solo partenze imminenti' }}
        </label>
    </div>
</form>