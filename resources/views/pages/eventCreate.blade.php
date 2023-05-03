<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Event Registration - Event Create</title>
    <link rel="stylesheet" nonce="{{ csp_nonce() }}" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script nonce="{{ csp_nonce() }}"
			  src="https://code.jquery.com/jquery-3.6.3.js"
			  integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
			  crossorigin="anonymous"></script>
<script nonce="{{ csp_nonce() }}" src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script nonce="{{ csp_nonce() }}" src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link nonce="{{ csp_nonce() }}" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css" rel="stylesheet">
<link nonce="{{ csp_nonce() }}" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
<link nonce="{{ csp_nonce() }}" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script nonce="{{ csp_nonce() }}" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<link nonce="{{ csp_nonce() }}" rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link nonce="{{ csp_nonce() }}" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link nonce="{{ csp_nonce() }}" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script nonce="{{ csp_nonce() }}" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script nonce="{{ csp_nonce() }}" src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script nonce="{{ csp_nonce() }}" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <link nonce="{{ csp_nonce() }}" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="{{url('/')}}">3117</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{url('/dashboard')}}">Dashboard <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/eventList')}}">Event</a>
      </li>
      
      @if(Session()->has('loginId'))
      <li class="nav-item">
        <a class="nav-link" href="{{url('/logout')}}">Logout</a>
      </li>
      @endif
    </ul>
   
  </div>
</nav>
<main>
<div class="col-md-4 col-md-offset-4" style="margin-top:20px;">
        <h4>Event Form</h4>
        <hr>
        <form action="{{route('event-handler')}}" method="post">
            @if(Session::has('success'))
            <div class="alert alert-succuess">{{Session::get('success')}}</div>
            @endif
            @if(Session::has('fail'))
            <div class="alert alert-danger">{{Session::get('fail')}}</div>
            @endif
        @csrf

            <div class="form-group">
                <label for="text">Event </label>
                <input type="text" class="form-control" placeholder="Enter Name of the event"
                name="eventName" value="{{old('eventName')}}">
                <span class="text-danger">@error('eventName') {{$message}}@enderror </span>
            </div>

            <div class="form-group">
                <label for="eventDescription">Event Description</label>
                <input type="text" class="form-control" placeholder="Description"
                name="eventDescription" value=""><span class="text-danger">@error('eventDescription') {{$message}}@enderror</span>
          
                <div class="form-group">
                <label for="date">Date</label>
                    <div class="input-group date" id="datepicker">
                        <input type="text" class="form-control" name="eventDate" value="{{old('eventDate')}}">
                        <span class="input-group-append">
                            <span class="input-group-text bg-white">
                                <i class="fa fa-calendar"></i>
                            </span>
                        </span>
                    </div>
                </div>
            </div>
            <span class="text-danger">@error('eventDate') {{$message}}@enderror</span>

            <div class="form-group">
                <label for="time">Time</label>
                    <div class="input-group time" id="timepicker">
                        <input type="text" class="form-control" placeholder="format is hh:mm:ss" onchange="validateHhMm(this);" name="eventTime" value="">
                        <span class="input-group-append">
                            <span class="input-group-text bg-white">
                                <i class="fa fa-calendar"></i>
                            </span>
                        </span>
                    </div>
                </div>
                <span class="text-danger">@error('eventTime') {{$message}}@enderror</span>


            <div class="form-group">
                <label for="eventVenue">Event Venue</label>
                <input type="text" class="form-control" placeholder="Enter the venue"
                name="eventVenue" value="">
            </div>
            <span class="text-danger">@error('eventVenue') {{$message}}@enderror</span>

      
            <div class="form-group">
                <button class="btn btn-block btn-primary" type="submit">Submit</button>
            </div>
        </form>
</div>

<script nonce="{{ csp_nonce() }}" type="text/javascript">
        $(function() {
            $('#datepicker').datepicker({
                startDate:'today',
                format: 'yyyy-mm-dd',
                
                
            });
        });
    </script>
<script nonce="{{ csp_nonce() }}" type="text/javascript">


function validateHhMm(timepicker) {
    var isValid = ^([0-1][0-9]|2[0-3]):([0-5][0-9])$/.test(timepicker.value);

    if (isValid) {
      inputField.style.backgroundColor = '#bfa';
    } else {
      inputField.style.backgroundColor = '#fba';
    }

    return isValid;
  }

    </script>
</main>

<script nonce="{{ csp_nonce() }}" src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
</body>
</html>
