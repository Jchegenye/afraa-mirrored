@extends('layouts.app')

@section('title', 'Documents')

@section('content')

@php
    $role = Auth::user()->role;
@endphp

<hr>

    <div class="row">
        <div class="col-md-12">
            <h3 class="page-header">
                @if (Auth::user()->role == "admin")
                    Uploads
                @else
                    Downloads
                @endif
            </h3>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12">

            @php
                $collection = $customizes->get();
            @endphp
            @if(!empty($collection))
                @foreach ($collection as $item)
                    @if($item->theme_type == 'aga')
                        <a href="{{url('dashboard/delegate/' . $item->theme_type)}}" class="aga ">
                            <img src="{{URL::asset('/images/settings/'. $item->photo_login)}}" alt="" class="img-fluid col-md-2">
                            <span class="col-md-10">ANNUAL GENERAL ASSEMBLY</span>
                        </a>

                    @elseif($item->theme_type == 'asc')

                        <a href="{{url('dashboard/delegate/' . $item->theme_type)}}" class="aga aviation mb-3">
                            <img src="{{URL::asset('/images/settings/' . $item->photo_login)}}" alt="" class="img-fluid col-md-2">
                            <span class="col-md-10">AVIATION STAKEHOLDERS CONVENTION</span>
                        </a>
                    @endif
                @endforeach
            @endif

        </div>
    </div>

@endsection
