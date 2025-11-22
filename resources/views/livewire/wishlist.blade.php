<div>
<button wire:click="toggle({{ $v->id }})"
        class="absolute bottom-3 right-3 z-30 wishlist-btn">

    @if(in_array($v->id, $wishlist))
        <i class="fa-solid fa-heart text-red-500 text-xl"></i>
    @else
        <i class="fa-regular fa-heart text-white/70 text-xl hover:text-red-400"></i>
    @endif
</button>

</div>
