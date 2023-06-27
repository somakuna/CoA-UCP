@extends('layouts.app')

@section('content')

<div class="container py-3">
  <header>
    <div class="p-5 text-center bg-white shadow rounded-3 mb-5">
      <p class="col-lg-8 mx-auto fs-2 text-muted mb-0">
        Profile
      </p>
      <h1 class="display-4 text-body-emphasis mb-0">{{ $user->name}}</h1>
      <p class="col-lg-8 mx-auto fs-7 text-danger text-uppercase">
        {{ $user->getRoleNames()->first() }}
      </p>
      <p class="col-lg-8 mx-auto fs-7 text-muted">
        <strong>FORUM NAME:</strong> {{ $user->forum_name }} | <strong>FORUM ID:</strong> {{ $user->forum_id }} | <strong>User ID:</strong> {{ $user->id }} | <strong>IP:</strong> {{ $user->ip }}
      </p>
      
    @role('administrator')
    <div class="row g-3 mt-1 justify-content-center">
      <div class="col-auto">
          <a href="{{route('user.edit', $user)}}" class="btn btn-outline-primary">
            <i class="bi bi-pen"></i> Edit
          </a>
      </div>
    </div>
    @endrole  
    </div>
  </header>

  <main>
    <div class="row mb-3 text-center">
      @foreach ($applications as $application)
      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm">
          <div class="card-header py-3">
            <h4 class="my-0 fw-normal">
              @if($application->account_id)
              <a href="{{route('account.show', $application->account_id)}}">{{$application->char_name}}</a>
              @else
              {{$application->char_name}}
              @endif
            </h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">
              @switch($application->status)
                  @case('Pending')
                    <i class="bi bi-hourglass" title="Pending"></i>
                    @break
                  @case('Rejected')
                    <i class="bi bi-x-lg text-danger" title="Rejected"></i>
                    @break
                  @case('Accepted')
                    <i class="bi bi-check2-circle text-success" title="Accepted"></i>
              @endswitch
            </h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li class="text-muted">Apply date</li> 
              <li>{{$application->created_at->format('d.m.Y. H:i')}}</li> 
              <li class="text-muted">Sex & DOB</li> 
              <li>{{ ($application->char_sex == 1) ? 'Muško' : 'Žensko'}} - {{$application->char_dob}} y/o</li>

            </ul>
            <a href="{{route('application.show', $application)}}" class="btn btn-outline-primary"><i class="bi bi-box-arrow-in-right"></i></a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </main>
</div>
@endsection
