@extends('layouts.app')

@section('content')

  @include('partials.navbar')

  <main class="main">

    @include('home.hero')

    @include('home.beranda')

    @include('home.keunggulan')

    @include('home.tentang')

    @include('home.client')

    @include('home.layanan')

    @include('home.contact')

  </main>

  @include('partials.footer')

  @include('partials.scripts')

@endsection