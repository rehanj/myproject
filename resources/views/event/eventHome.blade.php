@extends('layouts.event')
<link href="{{ asset('css/card.css') }}" rel="stylesheet">

@section('content')

<div class="eventbody">
    you log in as
    @role('p_member')
     pmember
    @endrole
    @role('or_fol')
     orfol
    @endrole
    @role('or_pm')
     orpm
    @endrole
    @role('or_pm|supervising_officer')
    supervising officer
    @endrole

                

    <br><br><br><br><br><br>
    <p style="color:white;font-size:18px;margin-left:50px;"> 
        <i class="fa fa-bar-chart" style="font-size:40px;color:#1FD912;"></i>  
        <i>Give your vote and see success of the Events..<br>
        
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        
        Look for Voting Results...</i>
        <a href='{{ url('poll') }}'><i style="font-size:17px;color:#1FD912;">Click Here.<i></a>
    </p>


    @role('or_pm|supervising_officer')
        <div class="ecreate"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Create an Event &nbsp;&nbsp;&nbsp;</button></div>
    @endrole
 
    <br>

    <a href="{{ route('register') }}"></a>

    <div class="col-md-12">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('message'))
            <div class="flash-message">
                <div class="alert alert-success">
                    <strong>
                        {{ session('message') }}
                    </strong>
                </div>
            </div>
        @endif

         @if (session('error'))
             <div class="flash-message">
                <div class="alert alert-danger">
                    <strong>
                        {{ session('error') }}
                    </strong>
                </div>
            </div>
         @endif

 
        <a href="{{ route('register') }}"></a>

        <div class="col-md-12">
                        
            @foreach($event as $eventData)
                <div class="column">
                    <div class="card">
                        <div class="card-body" >

                                <h5 class="card-title">{{$eventData->id}}. {{$eventData->eventName}}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Reason : {{$eventData->reason}}</h6>
                                <h6 class="card-subtitle mb-2 text-muted">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Region : {{$eventData->region}}</h6>
                                <h6 class="card-subtitle mb-2 text-muted">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Budget : {{$eventData->budget}}</h6>
                                <h6 class="card-subtitle mb-2 text-muted">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Start date : {{$eventData->startDate}}</h6>
                                <h6 class="card-subtitle mb-2 text-muted">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Start time : {{$eventData->startTime}}</h6>
                                <h6 class="card-subtitle mb-2 text-muted">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;End time : {{$eventData->endTime}}</h6><br>&nbsp;&nbsp;&nbsp;&nbsp;

                                @role('or_pm|supervising_officer')
                                <a onclick="return confirm('Are you sure to update this event details?')" href="{{route('event.update',['id' => $eventData->id]) }}" class="btn btn-warning btn-sm">Update</a>
                                <a onclick="return confirm('Are you sure to delete this event?')" href="{{route('event.delete',['id' => $eventData->id]) }}" class="btn btn-danger btn-sm">Delete</a>
    
                                @endrole
                                <p>&nbsp;&nbsp;&nbsp;(if you like this event please vote below)</p>
                            <div class="vote">
                                <button type="button" onclick="location.href='{{ route('voteAdd',['eventid' => $eventData->id] ) }}'" class="btn btn-success btn-sm">Vote</button>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="abc" style="margin-top:800px;margin-left:600px">
            {{ $event->links() }}
        </div>
    </div>
</div>
@endsection

@section('footer')
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
    
            <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
    
                      <h4 class="modal-title">Create Your Event Here..</h4>
    
                    </div>
                        <form method="post" action="/eventSave">
                            {{csrf_field()}}
    
                            <div class="modal-body">
                                <div class="col-md-12 ">
    
                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                    <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                    </ul>
                                    </div>
                                    @endif
    
                                    <div class="form-group">
                                        <label for="usr">Event Name:</label>
                                        <input type="text" class="form-control" name="eventName" placeholder="Enter here" id="usr">
                                    </div>
    
                                    <div class="form-group">
                                        <label for="usr">Reason:</label>
                                        <input type="text" class="form-control" name="reason" placeholder="Enter here" id="usr">
                                     </div>
    
                                     <div class="form-group">
                                        <label for="usr">Region:</label>
                                        <input type="text" class="form-control" name="region" placeholder="Enter here" id="usr">
                                    </div>
    
                                    <div class="form-group">
                                        <label for="usr">Budget:</label>
                                        <input type="number" class="form-control" name="budget" placeholder="Enter here" id="usr">
                                    </div>
    
                                    <div class="form-group">
                                        <label for="usr">Start date:</label>
                                        <input type="date" class="form-control" name="startDate" placeholder="Enter here" id="usr">
                                    </div>
    
                                    <div class="form-group">
                                        <label for="usr">Start time:</label>
                                        <input type="time" class="form-control" name="startTime" placeholder="Enter here" id="usr">
                                    </div>
    
                                    <div class="form-group">
                                        <label for="usr">End time: </label>
                                        <input type="time" class="form-control" name="endTime" placeholder="Enter here" id="usr">
                                    </div>
    
                                    <div class="form-group">
                                        <label for="usr"><h4> Event creating by {{Auth::user()->name}}</h4> </label>
                                    </div>
    
                                    <div>
                                        <input type="submit" class="btn btn-primary" value="save">
                                        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                                    </div>
    
                                </div>
    
                            </div>
    
                        </form>
                            <div class="modal-footer">
                           If you want you can update event later
    
                            </div>

                </div>
    
            </div>
        </div>
    
    </div>

@endsection