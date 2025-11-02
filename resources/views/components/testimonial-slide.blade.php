<style>
    .mil-revi-pagination .swiper-pagination-bullet .mil-custom-dot.mil-slide-{{ $loop->iteration ?? $index ?? 1 }} {
        background-image: url('{{ $testimonial->image_url }}');
    }
</style>

<div class="swiper-slide">
    <div class="mil-review-frame mil-center" data-swiper-parallax="-200" data-swiper-parallax-opacity="0">
        <h5 class="mil-up mil-mb-10">{{ $testimonial->name }}</h5>
        <p class="mil-mb-5 mil-upper mil-up mil-mb-30">{{ $testimonial->business_name }}</p>
        <p class="mil-text-xl mil-up">{{ $testimonial->message }}</p>
    </div>
</div>