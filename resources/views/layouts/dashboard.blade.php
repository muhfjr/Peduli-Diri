@extends('layouts.master')

@section('title')
<div class="d-sm-none d-lg-inline-block">Hai,
    @if (!empty(auth()->user()->name))
      {{ auth()->user()->name }}
    @else
      user
    @endif
  </div> Selamat Datang di Aplikasi Peduli Diri
  <p>Button di bawah Merupakan Shortcut</p>
<p><a href="/inputperjalanan" class="btn btn-outline-black btn-lg btn-icon icon-left"> Input data</a> -
<a href="/dataperjalanan" class="btn btn-outline-black btn-lg btn-icon icon-left"> Data perjalanan</a></p>
@endsection

