@extends('layouts.app')

@section('content')

<div class="container py-3">
  <header>
    <div class="p-5 text-center bg-white shadow rounded-3 mb-5">
      <p class="col-lg-8 mx-auto fs-2 text-muted mb-0">
        My Profile
      </p>
      <h1 class="display-4 text-body-emphasis mb-0">{{ Auth::user()->name}}</h1>
      <p class="col-lg-8 mx-auto fs-7 text-danger text-uppercase">
        {{ Auth::user()->getRoleNames()->first() }}
      </p>
      <p class="col-lg-8 mx-auto fs-7 text-muted">
        <strong>FORUM NAME:</strong> {{ Auth::user()->forum_name }} | <strong>FORUM ID:</strong> {{ Auth::user()->forum_id }} | <strong>IP:</strong> {{ Auth::user()->ip }}
      </p>

      @if(Auth::user()->applications->count() < 5)
      <div class="row g-3 mt-1 justify-content-center">
        <div class="col-auto">
          <a href="{{route('application.create')}}" class="btn btn-outline-success">CREATE NEW APP <i class="bi bi-plus-lg"></i></a>
        </div>
      </div>
    @endif
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
              <li>Apply date: {{$application->created_at->format('d.m.Y. H:i')}}</li> 
              <li>Char sex: {{ ($application->char_sex == 1) ? 'Muško' : 'Žensko'}}</li>
              <li>Char DOB: {{$application->char_dob}}</li>

            </ul>
            <a href="{{route('application.show', $application)}}" class="btn btn-outline-primary"><i class="bi bi-box-arrow-in-right"></i></a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </main>
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    
    <p class="col-md-4 mb-0 text-body-secondary">City of Angels (v1.0.2) - Woo</p>

    <span class="d-flex align-items-center justify-content-center">{{ Carbon\Carbon::now()->format('d.m.Y.')}}</span>
  
    <ul class="nav col-md-4 justify-content-end">
      <li class="nav-item"><a href="https://forum.cityofangels-roleplay.com/index.php" class="nav-link px-2 text-body-secondary">Forum</a></li>
      <li class="nav-item"><a href="https://social.cityofangels-roleplay.com/" class="nav-link px-2 text-body-secondary">Social</a></li>
      <li class="nav-item"><a href="https://cityofangels-roleplay.com/blog/" class="nav-link px-2 text-body-secondary">Blog</a></li>
      <li class="nav-item"><a href="https://mdc.cityofangels-roleplay.com/" class="nav-link px-2 text-body-secondary">MDC</a></li>
      <li class="nav-item"><a href="https://ap.cityofangels-roleplay.com/" class="nav-link px-2 text-body-secondary">Admin Panel</a></li>
    </ul>
  </footer>
</div>
@endsection
