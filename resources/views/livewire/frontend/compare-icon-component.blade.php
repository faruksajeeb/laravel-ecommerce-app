<div class="header-action-icon-2">
    <a href="{{ route('compare') }}" class="compare-icon-link" aria-label="Compare">
        <i class="fi-rs-shuffle" style="font-size:22px"></i>
        <span class="pro-count blue">{{ Cart::instance('compare')->count() }}</span>
    </a>
</div>
