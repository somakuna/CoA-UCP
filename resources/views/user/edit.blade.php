@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header h5 bg-gradient bg-primary text-white"><strong>EDIT</strong> User</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('user.update', $user) }}" enctype="multipart/form-data" autocomplete="on">
                    @csrf
                    @method('PUT')
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label" for="number">UCP Name:</label>
                                <input
                                    id="name"
                                    name="name"
                                    type="text"
                                    value="{{ old('name', $user->name) }}"
                                    class="form-control bg-white @error('name') is-invalid @enderror"
                                    required
                                />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="number">Role:</label>
                                <select class="form-select w-100 @error('role') is-invalid @enderror"
                                    name="role" required>
                                        <option value="user" {{ old('role', $user->getRoleNames()->first()) == 'user' ? 'selected' : '' }}>User</option>
                                        <option value="moderator" {{ old('role', $user->getRoleNames()->first()) == 'moderator' ? 'selected' : '' }}>Moderator</option>
                                        <option value="administrator" {{ old('role', $user->getRoleNames()->first()) == 'administrator' ? 'selected' : '' }}>Administrator</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="number">Forum name:</label>
                                <input
                                    id="forum_name"
                                    name="forum_name"
                                    type="text"
                                    value="{{ old('forum_name', $user->forum_name) }}"
                                    class="form-control bg-white @error('forum_name') is-invalid @enderror"
                                    required
                                />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="number">Forum ID:</label>
                                <input
                                    id="forum_id"
                                    name="forum_id"
                                    type="number"
                                    value="{{ old('forum_id', $user->forum_id) }}"
                                    class="form-control bg-white @error('forum_id') is-invalid @enderror"
                                    required
                                />
                            </div>
                            <div class="col-md-12">
                                <label class="form-label" for="number">E-mail:</label>
                                <input
                                    id="email"
                                    name="email"
                                    type="email"
                                    value="{{ old('email', $user->email) }}"
                                    class="form-control bg-white @error('email') is-invalid @enderror"
                                    required
                                />
                            </div>
                        </div>
                        <div class="row g-3 mt-1 justify-content-center">
                            <div class="col-auto">
                                <button type="submit" class="btn  btn-outline-primary">
                                    <i class="bi-save"></i> Apply</a>
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