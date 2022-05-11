@extends('layouts.master')

@section('title')
Input Data Perjalanan
@endsection

@section('content')
<div class="col-12 col-md-6 col-lg-12" >
 <div class="card" >
   <div class="card-header">
     <h4>Input Data Perjalanan</h4>
   </div>
   <div class="card-body">
    <form method="POST" action="/simpanPerjalanan" class="needs-validation" novalidate="">
      {{ csrf_field() }}
     <div class="form-group">
       <label for="email">Tanggal</label>
       <input id="email" type="date" class="form-control" name="tanggal" tabindex="1" required autofocus>
       <div class="invalid-feedback">
         Tanggal wajib diisi
     </div>

     <div class="form-group">
      <label for="email">Jam</label>
      <input id="email" type="time" class="form-control" name="jam" tabindex="1" required autofocus>
      <div class="invalid-feedback">
        Jam wajib diisi
     </div>

     <div class="form-group">
      <label for="email">Lokasi</label>
      <input id="email" type="text" class="form-control" name="lokasi" tabindex="1" required autofocus>
      <div class="invalid-feedback">
        Lokasi wajib diisi
     </div>

     <div class="form-group">
       <label for="email">Suhu</label>
       <input id="email" type="number" class="form-control" name="suhu" tabindex="1" required autofocus>
       <div class="invalid-feedback">
         Suhu wajib diisi
     </div>

     <div class="card-footer text-right">

      <button class="btn btn-primary mr-1" type="submit">Submit</button>

     </div>
@endsection
