@extends('layouts.app')

@section('content')

  @include('partials.navbar')

  <main class="main">

    @include('home.hero')

    @include('home.beranda')

    @include('home.keunggulan')

    @include('home.tentang')

    @include('home.layanan')

    @include('home.proyek')

    @include('home.legalitas') 

    @include('home.client')

    @include('home.faq')

    @include('home.contact')

  </main>

  @include('partials.footer')

  @include('partials.scripts')

@endsection