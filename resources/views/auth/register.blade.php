@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <h4 class="alert-heading">Dobrodošao!</h4>
                <p>Za kreiranje server računa, potrebno je registrirati se na CoA User Control Panel.<br>Maksimalan broj server računa je 5. <br>Potrebno je ispuniti sve podatke za uspješnu registraciju.</p>
                <hr>
                <p class="mb-0"><strong>Želimo Vam ugodnu zabavu!</strong></p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('User name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="forum_name" class="col-md-4 col-form-label text-md-end">{{ __('Forum name') }}</label>

                            <div class="col-md-6">
                                <input id="forum_name" type="text" class="form-control @error('forum_name') is-invalid @enderror"  name="forum_name" value="{{ old('forum_name') }}" required autocomplete="forum_name">

                                @error('forum_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="forum_id" class="col-md-4 col-form-label text-md-end">
                                {{ __('Forum ID') }}
                            </label>

                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Gdje mogu vidjeti svoj forum ID?</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="alert alert-warning" role="alert">
                                            <h4 class="alert-heading"></h4>
                                            <p>Forum ime i ID možete pronaći u URL-u kada se prijavite na naš forum i odete na svoj profil.</p>
                                            <p class="mb-0">Primjer: https://forum.cityofangels-roleplay.com/index.php?members/<strong>woo.1/</strong></p>
                                            <p class="mb-0">Forum name: <strong>woo</strong> | Forum ID: <strong>1</strong></p>
                                          </div>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Ok</button>
                                    </div>
                                </div>
                                </div>
                            </div>
  

                            <div class="col-md-5">
                                <input id="forum_id" type="number" class="form-control @error('forum_id') is-invalid @enderror"  name="forum_id" value="{{ old('forum_id') }}" required autocomplete="forum_id">

                                @error('forum_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    ?
                                </button>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
