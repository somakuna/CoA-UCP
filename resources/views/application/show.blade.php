@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row g-3 justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header h5 bg-gradient bg-primary text-white"><strong>{{$application->char_name}}</strong> Application [ID: {{$application->id}}]</div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>Status:</strong>  
                                    @switch($application->status)
                                        @case('Pending')
                                                <span class="text-muted">Pending</span> <i class="bi bi-hourglass text-muted" title="Pending"></i>
                                            @break
                                        @case('Rejected')
                                        <span class="text-danger">Rejected</span> <i class="bi bi-x-lg text-danger" title="Rejected"></i> 
                                            @break
                                        @case('Accepted')
                                                <span class="text-success">Accepted</span> <i class="bi bi-check2-circle text-success" title="Accepted"></i>
                                                @break
                                    @endswitch
                                </li>
                                <li class="list-group-item"><strong>Apply date:</strong>  {{$application->created_at->format('d.m.Y. H:i')}}</li>
                                <li class="list-group-item"><strong>Character nickname:</strong>  {{$application->char_name}}</li>
                                <li class="list-group-item"><strong>Character sex:</strong>  {{ ($application->char_sex == 1) ? 'Muško' : 'Žensko'}}</li>
                                <li class="list-group-item"><strong>Character age:</strong>  {{$application->char_dob}}</li>
                                <li class="list-group-item"><strong>Application text:</strong> <br>{{$application->app_text}}</li>
                                @if($application->account_id)
                                <li class="list-group-item"><strong>Account ID:</strong>  {{$application->account_id}}</li>
                                @endif
                                </ul>
                        </div>
                        <div class="col-md-12">
                            @switch($application->status)
                                @case('Pending')
                                    <div class="alert alert-secondary" role="alert">
                                        <h4 class="alert-heading">Waiting</h4>
                                        <p>Please wait for your application to be reviewed by moderators.</p>
                                    </div>
                                    @break
                                @case('Rejected')
                                    <div class="alert alert-danger" role="alert">
                                        <h4 class="alert-heading">Moderator note:</h4>
                                        <p>{{$application->response_text}}</p>
                                    </div>
                                    @break
                                @case('Accepted')
                                    <div class="alert alert-success" role="alert">
                                        <h4 class="alert-heading">Moderator note:</h4>
                                        <p>{{$application->response_text}}</p>
                                    </div>
                                    @break
                            @endswitch
                        </div>
                    </div>
                    <div class="row g-3 mt-1 justify-content-center">
                        @unlessrole('moderator')
                        @if($application->status == 'Rejected')
                        <div class="col-auto">
                            <a href="{{ route('application.destroy', $application) }}" class="btn  btn-outline-danger">
                                <i class="bi-trash"></i> Delete</a>
                        </div>
                        @endif
                        @endunlessrole
                    </div>  
                </div>
            </div>
        </div>
        @role('administrator|moderator')
        @if($application->status == 'Pending')
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header h5 bg-gradient bg-warning"><strong>MODERATOR</strong> Response</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('application.update', $application) }}" enctype="multipart/form-data" autocomplete="on">
                    @csrf
                    @method('PUT')
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label" >Choose your decision:</label>
                            <select class="form-select w-100 @error('status') is-invalid @enderror" name="status" required>
                                    <option class="fw-bold text-success" value="Accepted" {{ old('status') == 'Accepted' ? 'selected' : '' }}>Accept</option>
                                    <option class="fw-bold text-danger" value="Rejected" {{ old('status') == 'Rejected' ? 'selected' : '' }}>Reject</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label class="form-label" >Response text:</label>
                                    <textarea id="response_text" type="text" rows="10" class="form-control @error('response_text') is-invalid @enderror" name="response_text">{{old('response_text')}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3 mt-1 justify-content-center">
                        <div class="col-auto">
                            <button type="submit" class="btn  btn-outline-warning" onclick="return confirm('Jeste li sigurni?')">
                                <i class="bi bi-arrow-return-left"></i> Respond
                            </button>
                        </div>
                    </div>  
                </form>
                </div>
            </div>
        </div>
        @endif
        @endrole
    </div>
</div>
@endsection