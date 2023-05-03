@extends('layouts.app')
@section('title','- EventList')
@section('content')
<div class="container">
<h2 style="margin-top: 12px;">Event List</h2><br>
@if(Session::has('success'))
            <div class="alert alert-succuess">{{Session('success')}}</div>
            @endif
            @if(Session::has('fail'))
            <div class="alert alert-danger">{{Session::get('fail')}}</div>
            @endif
<a href="/eventCreate"><button>
   Create New Event
</button></a>

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
              @foreach($events as $e_info)
              <tr >
                 <td>{{$i++}}</td>
                 <td>{{ $e_info->eventId  }}</td>
                 <td><a href="{{route('view',$e_info->id)}}">{{ $e_info->eventName }}</td>
                 <td>{{ $e_info->uid }}</td>
                 
              @endforeach
</tbody>
</table>





@endsection
