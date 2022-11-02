@extends('layouts.app')

@push('title') Web Developer @endpush

@section('content')
    @include('partials.main_top_navigation')
    <article id="about" class="relative flex flex-wrap justify-center items-center min-h-screen h-full py-32">
        @include('pages.home.sections.hero_section')
        @include('pages.home.sections.companies_section')
        @include('pages.home.sections.backend_section')
        @include('pages.home.sections.frontend_section')
        @include('pages.home.sections.culture_section')
    </article>
@endsection
