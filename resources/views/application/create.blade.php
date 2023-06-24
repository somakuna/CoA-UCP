@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header h5 bg-gradient bg-primary text-white"><strong>CREATE NEW</strong> Application</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('application.store') }}" enctype="multipart/form-data" autocomplete="on">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label class="form-label" for="number">Nickname:</label>
                                <input
                                    id="char_name"
                                    name="char_name"
                                    type="text"
                                    value="{{old('char_name')}}"
                                    class="form-control bg-white text-primary @error('char_name') is-invalid @enderror"
                                    placeholder="Ime_Prezime"
                                    required
                                />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="number">Password:</label>
                                <input
                                    id="char_password"
                                    name="char_password"
                                    type="password"
                                    class="form-control bg-white @error('char_password') is-invalid @enderror"
                                    required
                                />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="number">Repeat Password:</label>
                                <input
                                    id="char_password_confirmation"
                                    name="char_password_confirmation"
                                    type="password"
                                    class="form-control bg-white @error('char_password_confirmation') is-invalid @enderror"
                                    required
                                />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="number">Spol:</label>
                                <select class="form-select w-100 @error('char_sex') is-invalid @enderror"
                                    name="char_sex" required>
                                        <option value="1" {{ old('char_sex') == 1 ? 'selected' : '' }}>Muško</option>
                                        <option value="2" {{ old('char_sex') == 2 ? 'selected' : '' }}>Žensko</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="number">Godine:</label>
                                <input
                                    id="char_dob"
                                    name="char_dob"
                                    type="number"
                                    min="16"
                                    max="99"
                                    value="{{old('char_dob')}}"
                                    class="form-control bg-white @error('char_dob') is-invalid @enderror"
                                    required
                                />
                            </div>
                            <div class="col-md-12">
                                <label class="form-label" for="number">Text:</label>
                                <textarea 
                                    id="app_text" 
                                    type="text" 
                                    rows="10" 
                                    class="form-control @error('app_text') is-invalid @enderror" 
                                    name="app_text"
                                    placeholder="Napišite što želite roleplayati na našoj zajednici?"
                                >{{old('app_text')}}</textarea>
                            </div>
                        </div>
                        <div class="row g-3 mt-1 justify-content-center">
                            <div class="col-auto">
                                <a href="{{ route('home') }}" class="btn  btn-outline-danger">
                                    <i class="bi-arrow-left-square"></i> Discard</a>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn  btn-outline-primary" onclick="return confirm('Jeste li sigurni da su sve informacije točne?')">
                                    <i class="bi bi-send-plus"></i> Apply
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