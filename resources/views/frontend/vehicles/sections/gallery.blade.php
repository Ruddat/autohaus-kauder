<section class="container mx-auto px-4 pb-8">
    <div class="image-gallery grid grid-cols-2 md:grid-cols-3 gap-4 mb-8">
        @foreach ([1,2,3,4] as $i)
        <div class="bg-[#1E1E1E] rounded-xl h-24 flex items-center justify-center cursor-pointer border-2 border-transparent hover:border-[#BFBFBF] transition">
            <i class="fas fa-car text-2xl text-[#BFBFBF]"></i>
        </div>
        @endforeach
    </div>
</section>
