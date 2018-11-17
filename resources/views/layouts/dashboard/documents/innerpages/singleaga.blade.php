@extends('layouts.app')

@section('title', 'Documents Single Category')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h3 class="page-header">47TH AGA (2015)</h3>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-12">

        <div class="accordion aga-accordion" id="accordionExample">

            <a class="btn-aga" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <div class="mb-0 text-left">
                    <img src="{{URL::asset('/images/logo.png')}}" alt="" class="img-fluid col-md-2"> SPEECHES
                </div>
            </a>
        
            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <ul class="list-inline agalist">
                        <li class="dw-title">
                            <span>-</span> 
                            <span>SG 2017 WELCOME ADDRESS FRENCH</span>
                            <span>
                                <a href="#">
                                    <i class="fas fa-file-pdf"></i> 
                                    <span class="dw-link">Download</span>
                                </a>
                            </span>
                        </li>
                        <li class="dw-title mt-3">
                            <span>-</span> 
                            <span>SG 2017 WELCOME ADDRESS FRENCH</span>
                            <span>
                                <a href="#">
                                    <i class="fas fa-file-pdf"></i> 
                                    <span class="dw-link">Download</span>
                                </a>
                            </span>
                        </li>
                    </ul> 
                </div>
            </div>
            
            <div class="card">

                <a class="btn-aga" data-toggle="collapse" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <div class="mb-0 text-left">
                        <img src="{{URL::asset('/images/logo.png')}}" alt="" class="img-fluid col-md-2"> PRESENTATION
                    </div>
                </a>
                
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                        <ul class="list-inline agalist">
                            <li class="dw-title">
                                <span>-</span> 
                                <span>SG 2017 WELCOME ADDRESS FRENCH</span>
                                <span>
                                    <a href="#">
                                        <i class="fas fa-file-pdf"></i> 
                                        <span class="dw-link">Download</span>
                                    </a>
                                </span>
                            </li>
                            <li class="dw-title mt-3">
                                <span>-</span> 
                                <span>SG 2017 WELCOME ADDRESS FRENCH</span>
                                <span>
                                    <a href="#">
                                        <i class="fas fa-file-pdf"></i> 
                                        <span class="dw-link">Download</span>
                                    </a>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="card">

                <a class="btn-aga" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    <div class="mb-0 text-left">
                        <img src="{{URL::asset('/images/logo.png')}}" alt="" class="img-fluid col-md-2"> REPORTS
                    </div>
                </a>

                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                        <ul class="list-inline agalist">
                            <li class="dw-title">
                                <span>-</span> 
                                <span>SG 2017 WELCOME ADDRESS FRENCH</span>
                                <span>
                                    <a href="#">
                                        <i class="fas fa-file-pdf"></i> 
                                        <span class="dw-link">Download</span>
                                    </a>
                                </span>
                            </li>
                            <li class="dw-title mt-3">
                                <span>-</span> 
                                <span>SG 2017 WELCOME ADDRESS FRENCH</span>
                                <span>
                                    <a href="#">
                                        <i class="fas fa-file-pdf"></i> 
                                        <span class="dw-link">Download</span>
                                    </a>
                                </span>
                            </li>
                            <li class="dw-title mt-3">
                                <span>-</span> 
                                <span>SG 2017 WELCOME ADDRESS FRENCH</span>
                                <span>
                                    <a href="#">
                                        <i class="fas fa-file-pdf"></i> 
                                        <span class="dw-link">Download</span>
                                    </a>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

@endsection