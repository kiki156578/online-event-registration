@extends('layouts.app')
@section('title','- EventList')
@section('content')
<div class="container">
<h2 style="margin-top: 12px;" class="alert alert-success">Event View</h2><br>
@if(session('joined'))
    <div class="alert alert-danger">{{ session('joined') }}</div>
@endif
    <div class="row">
        <div class="col-12">
          <table class="table table-bordered" id="">
           <thead>
              <tr>
                 <th>Event Id</th>
                 <th>Creator</th>
                 <th>date</th>
                 <th>Time</th>
                 <th>Description</th>
                 <th>Venue</th>
                 <th>No. of Participants 
                 </th>
                 <th>Action</th>

                 
              </tr>
           </thead>
           <tbody>
            
              <tr>
                 <td>{{ $events->eventId }}</td>
                 <td>{{ $events->uid }}</td>
                 <td>{{ $events->eventDate }}</td>
                 <td>{{ $events->eventTime}}</td>
                 <td>{{ $events->eventDescription }}</td>
                 <td>{{ $events->eventVenue}}</td>
                 <td>{{ $countOfRow}}
                 @foreach($ppl as $person)
                  <li>
                        
                        {{$person}}
                        
                 </li>
                 @endforeach
               </td>
                 <td> <a href="{{route('join',[$events->id])}}"><button>Join</button></td>
              </tr>
         
</tbody>
</table>
<a href="{{route('eventList')}}"><button>back</button></a>




@endsection
