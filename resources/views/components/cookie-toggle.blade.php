<div class="flex items-center justify-between p-4 bg-[#2D2D2D] rounded-lg">
    <div class="flex-1">
        <h3 class="font-bold mb-1">{{ $label }}</h3>
        <p class="text-sm text-[#BFBFBF]">{{ $description }}</p>
    </div>

    <label class="cookie-toggle relative inline-block w-14 h-7">
        <input
            type="checkbox"
            id="{{ $id }}"
            @if($disabled ?? false) disabled @endif
            @if($checked ?? false) checked @endif
        >
        <span class="cookie-slider absolute cursor-pointer inset-0 bg-[#444] rounded-full"></span>
    </label>
</div>
