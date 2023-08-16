@extends('layouts.app')

@section('content')

<div class="container-fluid py-3">
<div class="row g-2">
    <div class="col-sm-12">
      <div class="p-3 bg-white shadow">
      <p class="fs-1">Regular users</p>
        <div class="table-responsive">
          <table 
              class="table table-sm table-striped table-bordered text-center align-middle" 
              style="white-space:nowrap"
          >
              <thead>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Forum name</th>
                  <th>Forum ID</th>
                  <th>IP</th>
                  <th>Chars</th>
                  <th style="width:8%;">Action</th>
              </thead>
              <tbody>
                  @foreach ($users as $user)
                  <tr>
                      <td>{{ $user->id }}</td>
                      <td><a href="{{route('user.show', $user)}}">{{ $user->name }}</td>
                      <td>{{ $user->forum_name }}</td>
                      <td>{{ $user->forum_id }}</td>
                      <td>{{ $user->ip }}</td>
                      <td>
                      @foreach ($user->applications as $application)
                        {{ $application->char_name }} |
                      @endforeach
                      </td>
                      <td>
                        <a href="{{ route('user.show', $user) }}" title="Show" class="text-primary"><i class="bi bi-box-arrow-in-right"></i></a>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
          {{ $users->links() }}
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="p-3 bg-white shadow">
      <p class="fs-1">Moderators</p>
        <div class="table-responsive">
          <table 
              class="table table-sm table-striped table-bordered text-center align-middle" 
              style="white-space:nowrap"
          >
              <thead>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Forum name</th>
                  <th>Forum ID</th>
                  <th>Chars</th>
                  <th style="width:8%;">Action</th>
              </thead>
              <tbody>
                  @foreach ($moderators as $user)
                  <tr>
                      <td>{{ $user->id }}</td>
                      <td><a href="{{route('user.show', $user)}}">{{ $user->name }}</td>
                      <td>{{ $user->forum_name }}</td>
                      <td>{{ $user->forum_id }}</td>
                      <td>
                        @foreach ($user->applications as $application)
                          {{ $application->char_name }} |
                        @endforeach
                      </td>
                      <td>
                        <a href="{{ route('user.show', $user) }}" title="Show" class="text-primary"><i class="bi bi-box-arrow-in-right"></i></a>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
          {{ $moderators->links() }}
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="p-3 bg-white shadow">
        <p class="fs-1">Administrators</p>
        <div class="table-responsive">
          <table 
              class="table table-sm table-striped table-bordered text-center align-middle" 
              style="white-space:nowrap"
          >
              <thead>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Forum name</th>
                  <th>Forum ID</th>
                  <th>Chars</th>
                  <th style="width:8%;">Action</th>
              </thead>
              <tbody>
                  @foreach ($administrators as $user)
                  <tr>
                      <td>{{ $user->id }}</td>
                      <td><a href="{{route('user.show', $user)}}">{{ $user->name }}</td>
                      <td>{{ $user->forum_name }}</td>
                      <td>{{ $user->forum_id }}</td>
                      <td>
                        @foreach ($user->applications as $application)
                          {{ $application->char_name }} |
                        @endforeach
                      </td>
                      <td>
                        <a href="{{ route('user.show', $user) }}" title="Show" class="text-primary"><i class="bi bi-box-arrow-in-right"></i></a>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
          {{ $administrators->links() }}
        </div>  
      </div>
    </div>
</div>
@endsection
