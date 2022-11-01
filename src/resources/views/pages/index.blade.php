@extends('layouts.app')

{{-- title --}}
@push('title') Web Developer @endpush

@section('content')
    @include('partials.main_top_navigation')
    <article id="about" class="relative flex flex-wrap justify-center items-center min-h-screen h-full py-32">
        <div class="flex w-full flex-wrap flex-col-reverse gap-8 xl:flex-row max-w-screen-xl px-4 items-center pb-56">
            <div class="w-full max-w-screen-sm">
                <h1 class="text-5xl xl:text-9xl text-white font-bold tracking-wider mb-6">
                    Hello, I'm Mark Marilag.
                </h1>
                <p class="text-2xl text-gray-100 tracking-wider leading-loose">
                    I’m a web developer with 5 years of experience building different types of web apps, from green field development to specializing in the fin-tech industry.
                </p>
            </div>
            <div class="w-full xl:w-64 pointer-events-none z-10">
                <figure class="relative block mx-auto xl:mx-28 w-64">
                <img
                    width="256"
                    height="256"
                    loading="lazy"
                    class="lazyload filter grayscale rounded-full"
                    data-src="{{ asset('images/me.png') }}"
                    src="{{ asset('images/me.png') }}"
                    alt="Mark Marilag"
                    title="Mark Marilag"
                >
                </figure>
            </div>
            <figure class="absolute max-w-lg right-8 top-8 pointer-events-none z-0">
                <img
                    width="100%"
                    height="100%"
                    loading="lazy"
                    class="lazyload w-full"
                    data-src="{{ asset('svg/philippines.svg') }}"
                    src="{{ asset('svg/philippines.svg') }}"
                    alt="Philippines"
                    title="Philippines"
                >
            </figure>
        </div>

        <div class="relative w-full flex flex-wrap max-w-screen-xl justify-center items-center xl:py-24 px-4">
            <h2 class="text-3xl md:text-4xl xl:text-5xl font-bold text-white leading-snug">
                I contribute to start-up companies that turn client’s ideas into reality.
            </h2>
            <div class="flex w-full py-8 justify-center gap-4 xl:gap-12 flex-wrap">
                <div class="flex-grow md:flex-1 bg-white py-4 px-6 shadow rounded">
                    <figure class="relative">
                    <img
                        width="200"
                        height="80"
                        loading="lazy"
                        class="lazyload mx-auto pointer-events-none"
                        data-src="{{ asset('images/cell5.png') }}"
                        src="{{ asset('images/cell5.png') }}"
                        alt="Cell 5"
                        title="Cell 5"
                    >
                    </figure>
                </div>
                <div class="flex-grow md:flex-1 bg-white py-4 px-6 shadow rounded">
                    <figure class="relative">
                    <img
                        width="200"
                        height="80"
                        loading="lazy"
                        class="lazyload mx-auto pointer-events-none"
                        data-src="{{ asset('images/appetiser-apps.png') }}"
                        src="{{ asset('images/appetiser-apps.png') }}"
                        alt="Appetiser Apps"
                        title="Appetiser Apps"
                    >
                    </figure>
                </div>
                <div class="flex-grow md:flex-1 bg-white py-4 px-6 shadow rounded">
                    <figure class="relative">
                    <img
                        width="200"
                        height="80"
                        loading="lazy"
                        class="lazyload mx-auto pointer-events-none"
                        data-src="{{ asset('images/metadatauae.png') }}"
                        src="{{ asset('images/metadatauae.png') }}"
                        alt="Metadata Computer Systems"
                        title="Metadata Computer Systems"
                    >
                    </figure>
                </div>
            </div>
        </div>

        <div class="relative flex w-full flex-wrap max-w-screen-xl py-24 px-4">
            <div class="flex-grow flex flex-wrap">
                <h3 class="xl:flex-1 text-3xl font-bold text-white">
                    Working as Back End Developer
                </h3>
                <div class="xl:flex-1">
                    <p class="xl:text-xl text-white tracking-wider leading-loose pb-12">
                        I strive to write robust features while I love writing tests whenever It’s feature or unit testing especially when debugging for a bug fix and refactoring.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <div class="w-full md:flex-1">
                            <h3 class="text-white font-bold uppercase text-sm mb-1">Skills</h3>
                            <ul class="list-disc leading-loose text-sm">
                                <li class="text-gray-200 ml-4">SQL</li>
                                <li class="text-gray-200 ml-4">Multitenancy</li>
                                <li class="text-gray-200 ml-4">Restful API</li>
                                <li class="text-gray-200 ml-4">Server management</li>
                                <li class="text-gray-200 ml-4">Debugging</li>
                                <li class="text-gray-200 ml-4">Event-Driven</li>
                                <li class="text-gray-200 ml-4">Feature and Unit Testing</li>
                                <li class="text-gray-200 ml-4">Test driven development</li>
                            </ul>
                        </div>
                        <div class="w-full md:flex-1">
                            <h3 class="text-white font-bold uppercase text-sm mb-1">Tools</h3>
                            <ul class="list-disc leading-loose text-sm">
                                <li class="text-gray-200 ml-4">VSCode</li>
                                <li class="text-gray-200 ml-4">Docker</li>
                                <li class="text-gray-200 ml-4">Postman</li>
                                <li class="text-gray-200 ml-4">Terminal</li>
                            </ul>
                        </div>
                        <div class="w-full md:flex-1">
                            <h3 class="text-white font-bold uppercase text-sm mb-1">Technologies</h3>
                            <ul class="list-disc leading-loose text-sm">
                                <li class="text-gray-200 ml-4">PHP</li>
                                <li class="text-gray-200 ml-4">Laravel & It's Ecosystem</li>
                                <li class="text-gray-200 ml-4">MySQL</li>
                                <li class="text-gray-200 ml-4">Familiar with PostgreSQL</li>
                                <li class="text-gray-200 ml-4">Ubuntu (Linux)</li>
                                <li class="text-gray-200 ml-4">Redis</li>
                                <li class="text-gray-200 ml-4">Nginx</li>
                                <li class="text-gray-200 ml-4">AWS</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="relative flex w-full flex-wrap max-w-screen-xl py-24 px-4">
            <div class="flex-grow flex flex-wrap">
                <h3 class="xl:flex-1 text-3xl font-bold text-white">
                    Working as Front End Developer
                </h3>
                <div class="xl:flex-1">
                    <p class="xl:text-xl text-white tracking-wider leading-loose pb-12">
                        I love to create elegant UI by collaborating with UI/UX designer to make sure It’s consistent to the brand and build well-performing web sites and web applications.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <div class="w-full md:flex-1">
                            <h3 class="text-white font-bold uppercase text-sm mb-1">Skills</h3>
                            <ul class="list-disc leading-loose text-sm">
                                <li class="text-gray-200 ml-4">SQL</li>
                                <li class="text-gray-200 ml-4">Multitenancy</li>
                                <li class="text-gray-200 ml-4">Restful API</li>
                                <li class="text-gray-200 ml-4">Server management</li>
                                <li class="text-gray-200 ml-4">Debugging</li>
                                <li class="text-gray-200 ml-4">Event-Driven</li>
                                <li class="text-gray-200 ml-4">Feature and Unit Testing</li>
                                <li class="text-gray-200 ml-4">Test driven development</li>
                            </ul>
                        </div>
                        <div class="w-full md:flex-1">
                            <h3 class="text-white font-bold uppercase text-sm mb-1">Tools</h3>
                            <ul class="list-disc leading-loose text-sm">
                                <li class="text-gray-200 ml-4">VSCode</li>
                                <li class="text-gray-200 ml-4">Docker</li>
                                <li class="text-gray-200 ml-4">Postman</li>
                                <li class="text-gray-200 ml-4">Terminal</li>
                            </ul>
                        </div>
                        <div class="w-full md:flex-1">
                            <h3 class="text-white font-bold uppercase text-sm mb-1">Technologies</h3>
                            <ul class="list-disc leading-loose text-sm">
                                <li class="text-gray-200 ml-4">PHP</li>
                                <li class="text-gray-200 ml-4">Laravel & It's Ecosystem</li>
                                <li class="text-gray-200 ml-4">MySQL</li>
                                <li class="text-gray-200 ml-4">Familiar with PostgreSQL</li>
                                <li class="text-gray-200 ml-4">Ubuntu (Linux)</li>
                                <li class="text-gray-200 ml-4">Redis</li>
                                <li class="text-gray-200 ml-4">Nginx</li>
                                <li class="text-gray-200 ml-4">AWS</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="relative flex w-full flex-wrap max-w-screen-xl py-24 px-4">
            <div class="flex-grow flex flex-wrap">
                <h3 class="xl:flex-1 text-3xl font-bold text-white">
                    What I Like The Most
                </h3>
                <div class="xl:flex-1">
                    <p class="xl:text-xl text-white tracking-wider leading-loose pb-12">
                        I value a non-toxic working environment and blameless culture. Instead of pointing fingers to each other I rather provide a solution to the issues or problems and pull each other to the finish line.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <div class="w-full md:flex-1">
                            <h3 class="text-white font-bold uppercase text-sm mb-1">Skills</h3>
                            <ul class="list-disc leading-loose text-sm">
                                <li class="text-gray-200 ml-4">SQL</li>
                                <li class="text-gray-200 ml-4">Multitenancy</li>
                                <li class="text-gray-200 ml-4">Restful API</li>
                                <li class="text-gray-200 ml-4">Server management</li>
                                <li class="text-gray-200 ml-4">Debugging</li>
                                <li class="text-gray-200 ml-4">Event-Driven</li>
                                <li class="text-gray-200 ml-4">Feature and Unit Testing</li>
                                <li class="text-gray-200 ml-4">Test driven development</li>
                            </ul>
                        </div>
                        <div class="w-full md:flex-1">
                            <h3 class="text-white font-bold uppercase text-sm mb-1">Tools</h3>
                            <ul class="list-disc leading-loose text-sm">
                                <li class="text-gray-200 ml-4">VSCode</li>
                                <li class="text-gray-200 ml-4">Docker</li>
                                <li class="text-gray-200 ml-4">Postman</li>
                                <li class="text-gray-200 ml-4">Terminal</li>
                            </ul>
                        </div>
                        <div class="w-full md:flex-1">
                            <h3 class="text-white font-bold uppercase text-sm mb-1">Technologies</h3>
                            <ul class="list-disc leading-loose text-sm">
                                <li class="text-gray-200 ml-4">PHP</li>
                                <li class="text-gray-200 ml-4">Laravel & It's Ecosystem</li>
                                <li class="text-gray-200 ml-4">MySQL</li>
                                <li class="text-gray-200 ml-4">Familiar with PostgreSQL</li>
                                <li class="text-gray-200 ml-4">Ubuntu (Linux)</li>
                                <li class="text-gray-200 ml-4">Redis</li>
                                <li class="text-gray-200 ml-4">Nginx</li>
                                <li class="text-gray-200 ml-4">AWS</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </article>
@endsection
