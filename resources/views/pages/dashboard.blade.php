@extends('layouts.app')
@section('title','- Dashboard')
@section('content')
<h4>Welcome to Dashboard</h4> 

<hr>
<div>Hello {{$data->uid}}</div>
<div>List of events that you have created</div>
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="row">
        <div class="col-12">
          <table class="table table-bordered" id="">
          
           <thead>
              <tr>
                 <th>No</th>
                 <th>Event Id</th>
                 <th>Event Name</th>
                 <th>Creator</th>
              </tr>
           </thead>
           @php 
           $i=1;
           @endphp
            @foreach($ue as $user_events)
              <tr >
                 <td>{{$i++}}</td>
                 <td>{{ $user_events->eventId  }}</td>
                 <td>{{ $user_events->eventName }}</td>
                 <td>{{ $user_events->uid }}</td>
                 @endforeach
                 
              
</tbody>
</table>
<div><a href="/logout">logout here</div></a>
@endsection