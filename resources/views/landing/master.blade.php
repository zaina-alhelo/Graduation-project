@include('landing.components.head')
@include('landing.components.preloader')
@include('landing.components.header')

<main class="body-background">
    @yield("content")


</main>

@include('landing.components.footer')
