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
              data-toggle="table"
              data-search="true"
              data-pagination="true"
              data-search-align="left"
              data-search-highlight="true"
              data-page-size="8"
              data-show-extended-pagination="true"
          >
              <thead>
                  <th data-field="id">ID</th>
                  <th data-field="name">Name</th>
                  <th data-field="forum_name">Forum name</th>
                  <th data-sortable="forum_id" data-field="created_at">Forum ID</th>
                  <th data-field="ip">IP</th>
                  <th data-field="chars">Chars</th>
                  <th data-field="action" style="width:8%;">Action</th>
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
              data-toggle="table"
              data-search="true"
              data-pagination="true"
              data-search-align="left"
              data-search-highlight="true"
              data-page-size="8"
              data-show-extended-pagination="true"
          >
              <thead>
                  <th data-field="id">ID</th>
                  <th data-field="name">Name</th>
                  <th data-field="forum_name">Forum name</th>
                  <th data-sortable="forum_id" data-field="created_at">Forum ID</th>
                  <th data-field="chars">Chars</th>
                  <th data-field="action" style="width:8%;">Action</th>
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
              data-toggle="table"
              data-search="true"
              data-pagination="true"
              data-search-align="left"
              data-search-highlight="true"
              data-page-size="8"
              data-show-extended-pagination="true"
          >
              <thead>
                  <th data-field="id">ID</th>
                  <th data-field="name">Name</th>
                  <th data-field="forum_name">Forum name</th>
                  <th data-sortable="forum_id" data-field="created_at">Forum ID</th>
                  <th data-field="chars">Chars</th>
                  <th data-field="action" style="width:8%;">Action</th>
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
        </div>  
      </div>
    </div>
</div>
@endsection
