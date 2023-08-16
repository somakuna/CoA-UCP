@extends('layouts.app')

@section('content')
<div class="container-fluid py-3">
  <div class="row g-2">
    <div class="col-sm-6">
      <div class="p-3 bg-white shadow">
      <p class="fs-1">Apps waiting for response ({{$pendingApplications->count()}})</p>
        <div class="table-responsive">
          <table 
              class="table table-sm table-striped table-bordered text-center align-middle" 
          >
              <thead>
                  <th data-field="id">ID</th>
                  <th data-field="user_od">User</th>
                  <th data-field="char_name">Character name</th>
                  <th data-sortable="true" data-field="created_at">Date applied</th>
                  <th data-field="action" style="width:8%;">Action</th>
              </thead>
              <tbody>
                  @foreach ($pendingApplications as $pendingApplication)
                  <tr>
                      <td>{{ $pendingApplication->id }}</td>
                      <td><a href="{{route('user.show', $pendingApplication->user_id)}}">{{ $pendingApplication->user->name }}</a></td>
                      <td>{{ $pendingApplication->char_name }}</td>
                      <td>{{ $pendingApplication->created_at->format('d.m.Y. H:i') }}</td>
                      <td>
                        <a href="{{ route('application.show', $pendingApplication) }}" title="Show" class="text-primary"><i class="bi bi-box-arrow-in-right"></i></a>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="p-3 bg-white shadow">
      <p class="fs-1">Latest apps</p>
        <div class="table-responsive">
          <table 
              class="table table-sm table-striped table-bordered text-center align-middle" 
              style="white-space:nowrap"
          >
              <thead>
                  <th>ID</th>
                  <th>User</th>
                  <th>Character name</th>
                  <th>Date applied</th>
                  <th>Status</th>
                  <th style="width:8%;">Action</th>
              </thead>
              <tbody>
                  @foreach ($applications as $application)
                  <tr>
                      <td>{{ $application->id }}</td>
                      <td>
                        <a href="{{route('user.show', $application->user)}}">{{$application->user->name}}</a> 
                      </td>
                      <td>
                        @if($application->account_id)
                        <a href="{{route('account.show', $application->account_id)}}">{{$application->char_name}}</a> 
                        @else
                        {{$application->char_name}}
                        @endif
                      </td>
                      <td>{{ $application->created_at->format('d.m.Y. H:i') }}</td>
                      <td>{{ $application->status }}</td>
                      <td>
                        <a href="{{ route('application.show', $application) }}" title="Show" class="text-primary"><i class="bi bi-box-arrow-in-right"></i></a>
                      </td>
                  </tr>
                  @endforeach
              </tbody> 
          </table>
          {{ $applications->links() }}
        </div>
      </div>
    </div>
    <div class="col-sm-12">
      <div class="p-3 bg-white shadow">
        <p class="fs-1">Logs</p>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Who</th>
              <th scope="col">Action</th>
              <th scope="col">Datetime</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($activities as $activity)
            <tr>
              <td>{{$activity->causer->name}}</td>
              <td>{{$activity->description}}</td>
              <td>{{$activity->created_at->format('d.m.Y. H:i')}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{ $activities->links() }}
      </div>
    </div>
  </div>
</div>
@endsection
