<div class="flex w-full flex-wrap flex-col-reverse gap-8 xl:flex-row max-w-screen-xl px-4 items-center pb-56">
    <div class="w-full max-w-screen-sm">
        <h1 class="text-5xl xl:text-9xl text-white font-bold tracking-wider mb-6">
            Hello, I'm Mark Marilag.
        </h1>
        <p class="text-2xl text-gray-100 tracking-wider leading-loose">
            I’m a web developer with 5 years of experience building different types of web apps, from green field
            development to specializing in the fin-tech industry.
        </p>
    </div>
    <div class="w-full xl:w-64 pointer-events-none z-10">
        <figure class="relative block mx-auto xl:mx-28 w-64">
            <img width="256" height="256" loading="lazy" class="lazyload filter grayscale rounded-full"
                data-src="{{ asset('images/me.png') }}" src="{{ asset('images/me.png') }}" alt="Mark Marilag"
                title="Mark Marilag">
        </figure>
    </div>
    <figure class="absolute max-w-lg right-8 top-8 pointer-events-none z-0">
        <img width="100%" height="100%" loading="lazy" class="lazyload w-full"
            data-src="{{ asset('svg/philippines.svg') }}" src="{{ asset('svg/philippines.svg') }}" alt="Philippines"
            title="Philippines">
    </figure>
</div>
