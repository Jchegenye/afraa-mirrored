@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')

@php
    //dd($user_by_id);

@endphp
<div class="row">
    @if (session('warning'))
        <div class="alert alert-warning">
            {{ session('warning') }}
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @php
        foreach ($user_by_id as $user){
            $user_id = $user->uid;
        }
    @endphp
</div>
<form enctype='multipart/form-data' class="shadow mt-5" method="post" action="{{action('Users\UsersController@update', $user_id)}}">
        @csrf
        <div class="p-5">
            <input name="_method" type="hidden" value="PATCH">

                <div class="row form-row pt-3 pb-4">
                    <p>Profile Picture:</p>
                    <input type="file" class="form-control" name="photo" value="{{$user->photo}}">
                </div>

                <div class="row form-row pt-3 pb-4">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" name="username" value="{{ old('username') ? old('username') : $user->username }}">
                </div>
                <div class="row form-row pt-3 pb-4">
                    <label for="fullname">Full Name</label>
                    <input type="text" class="form-control" name="fullname" value="{{$user->name}}">
                </div>
                <div class="row form-row pt-3 pb-4">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" value="{{$user->email}}">
                </div>
                <div class="row form-row pt-3 pb-4">
                    <label for="phone">Phone:</label>
                    <input type="phone" class="form-control" name="phone" value="{{$user->phone}}">
                </div>
                <div class="row form-row pt-3 pb-4">
                    <label for="bio">Bio:</label>
                    <textarea class="form-control" name="bio" rows="5">{{$user->bio}}</textarea>
                </div>
                <div class="row form-row pt-3 pb-4">
                    <label for="country">Country:</label>
                    <input type="text" class="form-control" name="country" value="{{$user->country}}">
                </div>


                <div class="row form-row pt-3 pb-4">
                    <label for="Company_Name">Company Name:</label>
                    <input type="text" class="form-control" name="Company_Name" value="@isset($user->Company_Name) {{ $user->Company_Name}} @endisset">
                </div>
                <div class="row form-row pt-3 pb-4">
                    <label for="your_title">Your Title:</label>
                    <input type="text" class="form-control" name="your_title" value="@isset($user->your_title) {{$user->your_title}} @endisset">
                </div>
                <div class="row form-row pt-3 pb-4">
                    <label for="Job_Title">Job Title:</label>
                    <input type="text" class="form-control" name="Job_Title" value="@isset($user->Job_Title) {{$user->Job_Title}} @endisset">
                </div>
                <div class="row form-row pt-3 pb-4">
                    <label for="Member_Airline">Member Airline:</label>
                    <input type="text" class="form-control" name="Member_Airline" value="@isset($user->Member_Airline) {{$user->Member_Airline}} @endisset">
                </div>
                <div class="row form-row pt-3 pb-4">
                    <label for="AFRAA_Partner">AFRAA_Partner:</label>
                    <input type="text" class="form-control" name="AFRAA_Partner" value="@isset($user->AFRAA_Partner) {{$user->AFRAA_Partner}} @endisset">
                </div>
                <div class="row form-row pt-3 pb-4">
                    <label for="other">other:</label>
                    <input type="text" class="form-control" name="other" value="@isset($user->other) {{$user->other}} @endisset">
                </div>
                <div class="row form-row pt-3 pb-4">
                    <label for="Passport_Number">Passport Number:</label>
                    <input type="text" class="form-control" name="Passport_Number" value="@isset($user->Passport_Number) {{$user->Passport_Number}} @endisset">
                </div>
                <div class="row form-row pt-3 pb-4">
                    <label for="Business_Address">Business Address:</label>
                    <input type="text" class="form-control" name="Business_Address" value="@isset($user->Business_Address) {{$user->Business_Address}} @endisset">
                </div>
                <div class="row form-row pt-3 pb-4">
                    <label for="documentation_language">Documentation Language:</label>
                    <input type="text" class="form-control" name="documentation_language" value="@isset($user->documentation_language) {{$user->documentation_language}} @endisset">
                </div>
                <div class="row form-row pt-3 pb-4">
                    <label for="Spouse_Name">Spouse Name:</label>
                    <input type="text" class="form-control" name="Spouse_Name" value="@isset($user->Spouse_Name) {{$user->Spouse_Name}} @endisset">
                </div>
                <div class="row form-row pt-3 pb-4">
                    <label for="Spouse_Nationality">Spouse Nationality:</label>
                    <input type="text" class="form-control" name="Spouse_Nationality" value="@isset($user->Spouse_Nationality) {{$user->Spouse_Nationality}} @endisset">
                </div>
                <div class="row form-row pt-3 pb-4">
                    <label for="Spouse_Passport_Number">Spouse Passport Number:</label>
                    <input type="text" class="form-control" name="Spouse_Passport_Number" value="@isset($user->Spouse_Passport_Number) {{$user->Spouse_Passport_Number}} @endisset">
                </div>
                <div class="row form-row pt-3 pb-4">
                    <label for="ArrivalDate">Arrival Date:</label>
                    <input type="text" class="form-control" name="ArrivalDate" value="@isset($user->ArrivalDate) {{$user->ArrivalDate}} @endisset">
                </div>
                <div class="row form-row pt-3 pb-4">
                    <label for="FlightNumber">Flight Number:</label>
                    <input type="text" class="form-control" name="FlightNumber" value="@isset($user->FlightNumber) {{$user->FlightNumber}} @endisset">
                </div>
                <div class="row form-row pt-3 pb-4">
                    <label for="ArrivalTime">Arrival Time:</label>
                    <input type="text" class="form-control" name="ArrivalTime" value="@isset($user->ArrivalTime) {{$user->ArrivalTime}} @endisset">
                </div>
                <div class="row form-row pt-3 pb-4">
                    <label for="DepartureDate">Departure Date:</label>
                    <input type="text" class="form-control" name="DepartureDate" value="@isset($user->DepartureDate) {{$user->DepartureDate}} @endisset">
                </div>
                <div class="row form-row pt-3 pb-4">
                    <label for="DepartureFlightNumber">Departure Flight Number:</label>
                    <input type="text" class="form-control" name="DepartureFlightNumber" value="@isset($user->DepartureFlightNumber) {{$user->DepartureFlightNumber}} @endisset">
                </div>
                <div class="row form-row pt-3 pb-4">
                    <label for="DepartureTime">Departure Time:</label>
                    <input type="text" class="form-control" name="DepartureTime" value="@isset($user->DepartureTime) {{$user->DepartureTime}} @endisset">
                </div>
                <div class="row form-row pt-3 pb-4">
                    <label for="Social_Functions">Social Functions:</label>
                    <input type="text" class="form-control" name="Social_Functions" value="@isset($user->Social_Functions) {{$user->Social_Functions}} @endisset">
                </div>


                <div class="row form-row pt-3 pb-4">
                    <label for="password">Current Password:</label>
                    <input type="password" class="form-control" name="password" value="">
                </div>
                <div class="row form-row pt-3 pb-4">
                    <label for="new_password">{{ __('New Password:') }}</label>
                    <input type="password" class="form-control" name="new_password" value="">
                </div>
                <div class="row form-row pt-3 pb-4">
                    <button type="submit" class="btn btn-success" style="margin-left:38px">Update</button>
                </div>
        </div>
    </form>

@endsection
