@extends('style.style')

@section('title', 'Register')
<div id="app" class="bg-white" >
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand" >
                <div class="login-brand">
                    <img src="../assets/img/Logo.png" alt="logo" width="170">
                  </div>
            </div>


            <div class="card card-primary">
              <div class="card-header"><h4>Register</h4></div>

              <div class="card-body" >
                <form method="POST" action="/simpanUser" class="needs-validation" novalidate="">
                    {{ csrf_field() }}
                  <div class="form-group" >
                    <label for="email">NIK</label>
                    <input id="nik" type="text" class="form-control" name="nik" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      NIK wajib diisi
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="name">Nama Lengkap</label>
                    <input id="name" type="text" class="form-control" name="name" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Nama Lengkap wajib diisi
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Register
                    </button>
                  </div>

                  <div class="mt-5 text-muted text-center">
                    Already have an account ? <a href="/">Login</a>
                  </div>

                  @include('sweetalert::alert')

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
