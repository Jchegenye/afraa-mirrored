@extends('layouts.app')

@section('title', 'Documents Single Category')

@section('content')
@foreach ($documents as $document)
    @php
        $year = $document->year;
    @endphp
@endforeach
<div class="row">
    <div class="col-md-12">
        <h3 class="page-header">50<sup>th</sup> AGA ({{$year}})
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

        <div class="accordion aga-accordion" id="accordionExample">

            <a class="btn-aga" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <div class="mb-0 text-left">
                    <img src="{{URL::asset('/images/logo2.png')}}" alt="" class="img-fluid col-md-2"> SPEECHES
                </div>
            </a>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <ul class="list-inline agalist">

                        @foreach ($documents as $document)

                            @if ($document->category == "speeches")

                                <li class="dw-title text-capitalize mb-3">
                                    <span>-</span>
                                    <span>{{$document->title}}</span>
                                    <span>
                                        @if (Auth::user()->role == "admin")

                                            <form class="d-inline" action="{{action('DocumentController@destroy', $document->id)}}" method="post">

                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button class="btn-link bg-white border-0 text-small dw-link pr-4" type="submit"><i class="far fa-trash-alt pr-2 afraa-red-text"></i>Delete</button>

                                            </form>

                                        @endif
                                        <a href="{{URL::asset('/files/documents/')}}/{{$document->name}}">
                                            <i class="fas fa-file-pdf"></i>
                                            <span class="dw-link">Download</span>
                                        </a>
                                    </span>
                                </li>

                            @endif

                        @endforeach

                    </ul>
                </div>
            </div>

            <div class="card">

                <a class="btn-aga" data-toggle="collapse" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <div class="mb-0 text-left">
                        <img src="{{URL::asset('/images/logo2.png')}}" alt="" class="img-fluid col-md-2 text-capitalize"> PRESENTATION
                    </div>
                </a>

                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                        <ul class="list-inline agalist">
                            @foreach ($documents as $document)

                                @if ($document->category == "presentations")

                                    <li class="dw-title text-capitalize mb-3">
                                        <span>-</span>
                                        <span>{{$document->title}}</span>
                                        <span>
                                            @if (Auth::user()->role == "admin")

                                                <form class="d-inline" action="{{action('DocumentController@destroy', $document->id)}}" method="post">

                                                    @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button class="btn-link bg-white border-0 text-small dw-link pr-4" type="submit"><i class="far fa-trash-alt pr-2 afraa-red-text"></i>Delete</button>

                                                </form>

                                            @endif
                                            <a href="{{URL::asset('/files/documents/')}}/{{$document->name}}" target="_blank">
                                                <i class="fas fa-file-pdf"></i>
                                                <span class="dw-link">Download</span>
                                            </a>
                                        </span>
                                    </li>

                                @endif

                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="card">

                <a class="btn-aga" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    <div class="mb-0 text-left">
                        <img src="{{URL::asset('/images/logo2.png')}}" alt="" class="img-fluid col-md-2 text-capitalize"> REPORTS
                    </div>
                </a>

                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                        <ul class="list-inline agalist">
                                @foreach ($documents as $document)

                                @if ($document->category == "reports")

                                    <li class="dw-title text-capitalize mb-3">
                                        <span>-</span>
                                        <span>{{$document->title}}</span>
                                        <span>
                                            @if (Auth::user()->role == "admin")

                                                <form class="d-inline" action="{{action('DocumentController@destroy', $document->id)}}" method="post">

                                                    @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button class="btn-link bg-white border-0 text-small dw-link pr-4" type="submit"><i class="far fa-trash-alt pr-2 afraa-red-text"></i>Delete</button>

                                                </form>

                                                @endif
                                            <a href="{{URL::asset('/files/documents/')}}/{{$document->name}}">
                                                <i class="fas fa-file-pdf"></i>
                                                <span class="dw-link">Download</span>
                                            </a>
                                        </span>
                                    </li>

                                @endif

                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="card">

                <a class="btn-aga" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                    <div class="mb-0 text-left">
                        <img src="{{URL::asset('/images/logo2.png')}}" alt="" class="img-fluid col-md-2 text-capitalize"> PRESS RELEASES
                    </div>
                </a>

                <div id="collapseFour" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                        <ul class="list-inline agalist">
                                @foreach ($documents as $document)

                                @if ($document->category == "press")

                                    <li class="dw-title text-capitalize mb-3">
                                        <span>-</span>
                                        <span>{{$document->title}}</span>
                                        <span>
                                            @if (Auth::user()->role == "admin")

                                                <form class="d-inline" action="{{action('DocumentController@destroy', $document->id)}}" method="post">

                                                    @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button class="btn-link bg-white border-0 text-small dw-link pr-4" type="submit"><i class="far fa-trash-alt pr-2 afraa-red-text"></i>Delete</button>

                                                </form>

                                            @endif
                                            <a href="{{URL::asset('/files/documents/')}}/{{$document->name}}">
                                                <i class="fas fa-file-pdf"></i>
                                                <span class="dw-link">Download</span>
                                            </a>
                                        </span>
                                    </li>

                                @endif

                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

@endsection
