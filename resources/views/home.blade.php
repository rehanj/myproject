@extends('layouts.app')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
<link href="{{ asset('css/card.css') }}" rel="stylesheet">
<style>
h1 {
    color: brown;
    font-style: italic;
    text-align: center;
    outline-style: solid;
    outline-color: brown;
    outline-width: 10px;
}
</style>

@section('header')

<section class="dorne-welcome-area bg-img bg-overlay" style="background-image:url(img/dashboard.jpg);width:100%;height:250%">
    <div class="row h-100 align-items-center justify-content-center">

        <div class="sidenav" style="opacity: 0.7;filter: alpha(opacity=70);margin-top:45px" >
            <h3 >Menu</h3>
                <hr>
                
                <a href="/event">Events</a>
                @role('p_member|or_fol|or_pm|supervising_officer|')
                    <a href="/meeting">Meetings</a>
                    <a href="/poll">Votes</a>
                @endrole
                @role('or_pm|supervising_officer|')
                    <a href="/createUser">Create User</a>
                    <a href="/assign">Assign Role</a>
                    <a href="/assignOrFol">Assign OR-FOL</a>
                @endrole 
                    <a href="/profile">Profile</a>
                   
        </div>
        <div class="col-md-9">
            <div class="card" style="width:100%;height:90%;opacity: 0.8;filter: alpha(opacity=80); margin-left:0.5%;margin-top:9%">
                <div class="card-header" style="font-size:27px;font-weight:bold">Dashboard</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        <h1>Welcome</h1><br>
                        <h4>Highest Voted Upcoming Events</h4><hr>

                        @foreach($data as $details)

                            <div class="column" >
                                <div class="w3-green w3-hover-shadow w3-center" >
                                    <div class="card-body" style="background-image: url(img/dashboardnew.jpg);height:20%;font-weight:bold">

                                        <h5 class="card-title"><b> Event Name : {{$details->eventName}} <b></h5>
                                        <br>
                                        <h6 class="card-subtitle mb-2 "> Reason : {{$details->reason}} </h6>
                                        <h6 class="card-subtitle mb-2 "> Region : {{$details->region}}</h6>
                                        <h6 class="card-subtitle mb-2 "> Budget : {{$details->budget}}</h6>
                                        <h6 class="card-subtitle mb-2 "> Start Date : {{$details->startDate}}</h6>
                                        <h6 class="card-subtitle mb-2 "> Start Time : {{$details->startTime}}h6>
                                    </div>
                                </div>
                            </div>

                        @endforeach

                        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

                        <h4>Upcoming Meetings</h4><hr>


                        @foreach($detail as $d)

                            <div class="column" >
                                <div class="w3-green w3-hover-shadow w3-center" >
                                    <div class="card-body" style="background-image: url(img/meetingnew.png);height:20%;font-weight:bold">

                                        <h5 class="card-title"><b> Meeting With : {{$d->name}} <b></h5>
                                        <br>
                                        <h6 class="card-subtitle mb-2 "> Email : {{$d->email}} </h6>
                                        <h6 class="card-subtitle mb-2 "> Date : {{$d->date}}</h6>
                                        <h6 class="card-subtitle mb-2 "> Start Time : {{$d->startTime}}</h6>
                                        <h6 class="card-subtitle mb-2 "> End Time : {{$d->endTime}}</h6>
                                        <h6 class="card-subtitle mb-2 "> Venue : {{$d->venue}}</h6>
                                        <h6 class="card-subtitle mb-2 "> Invitees : {{$d->invitees}}</h6>
                                        <h6 class="card-subtitle mb-2 "> Status : {{$d->status}}</h6>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection
