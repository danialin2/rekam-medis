<!DOCTYPE html>
<html lang="en">
@include('layouts.head')

<body class="bg-light overflow-hidden">
    <main class="d-flex w-100 h-100">
        <div class="container-fluid">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                        class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <h2>Selamat Datang</h2>
                    <form action="/register" method="POST">
                        @csrf
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <label for="email" class="form-label">Nama</label>
                            <input class="form-control form-control-lg @error('name') is-invalid @enderror" type="text"
                                name="name" id="name" value="{{old('name')}}" autofocus
                                placeholder="Masukkan nama Anda" />
                            @error('name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <!-- Email input -->
                        <div class="form-outline mb-3">
                            <label for="password" class="form-label">Email</label>
                            <input class="form-control form-control-lg @error('email') is-invalid @enderror"
                                type="email" name="email" id="email" value="{{old('email')}}"
                                placeholder="Masukkan email Anda" />
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input class="form-control form-control-lg @error('password') is-invalid @enderror"
                                type="password" name="password" id="password" placeholder="Masukkan kata kunci" />
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <!-- Checkbox -->
                            <div class="form-check mb-0">
                                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                                <label class="form-check-label" for="form2Example3">
                                    Remember me
                                </label>
                            </div>
                            <a href="#!" class="text-body">Forgot password?</a>
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn btn-primary btn-lg"
                                style="padding-left: 2.5rem; padding-right: 2.5rem;">Register</button>
                            <a href="/" class="btn btn-success btn-lg"
                                style="padding-left: 2.5rem; padding-right: 2.5rem;">Kembali</a>
                            <p class=" fw-bold mt-2 pt-1 mb-0">You have an account? <a href="/login"
                                    class="link-danger">Login</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <div class="text-white py-4 px-4 px-xl-5 bg-primary text-center">
        <!-- Copyright -->
        <div>
            Copyright © 2020. All rights reserved.
        </div>
    </div>
    @include('layouts.script')
</body>

</html>