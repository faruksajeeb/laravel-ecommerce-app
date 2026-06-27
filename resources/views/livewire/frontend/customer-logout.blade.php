<div>
    <span>{{ Auth::guard('customer')->user()->name }}</span>
    <a class="" href="#" wire:click.prevent='customerLogout'>
    {{ __('Logout') }}
</a>

</div>
