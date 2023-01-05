@include ('/master-templates/partials/header')

@stack('styles')

{{--@extends('master-templates.partials.header');--}}
<main>
@yield('page-content')
</main>
@include ('/master-templates/partials/footer')
