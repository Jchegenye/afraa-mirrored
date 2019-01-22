@extends('layouts.app')

@section('title', 'Settings')

@section('content')

    <div class="row">
        <div class="col-md-12 heading">
            <h1 class="page-header">Settings</h1>
            <p></p>
        </div>
    </div>
                        
    @include('myflashalert::message')

    <div id="accordion">

        @php
            $customize0 = empty($customize[0]['status']);
            $customize1 = empty($customize[1]['status']);
        @endphp

        <div class="card">
            <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <h6>General Settings</h6>
                    </button>
                </h5>
            </div>
    
            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">

                    @foreach($customize as $customized)
                        @if ($customized->status == 1)
                            <small class="text-info">{{ "Current Theme: " . $customized->theme_type}}</small>  
                        @endif
                    @endforeach

                    @if($customize[0]['status']  == "0" AND $customize[1]['status'] == "0")
                        <small class="text-warning">{{ "Current Theme: Default" }} </small>
                    @endif

                    <form enctype='multipart/form-data' class="bg-white" method="post" action="{{ route('customize.store') }}">
                        @csrf

                        <input type="hidden" name="update" class="form-check-input" value="update">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <hr>
                                    <select name="theme_type_activate" id="theme_type_activate" class="form-control">
                                        <option selected value="">Choose a theme</option>
                                        @foreach($customize as $key => $name)
                                            {{-- @if ($name->status == 0) --}}
                                                <option value="{{$name->theme_type}}" {{ old('theme_type_activate')==$name->theme_type ? 'selected' : ''  }}>
                                                    {{$name->theme_type}}
                                                </option>
                                            {{-- @endif --}}
                                        @endforeach
                                    </select>
                                    <small class="error text-danger">{{$errors->first('theme_type_activate')}}</small>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                
                                @foreach($customize as $customized)
                                    
                                    @if($customized->status == 1)

                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="status_activate" class="form-check-input" value="1"> Activate
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="status_activate" class="form-check-input" value="0"> Deactivate
                                            </label>
                                        </div>

                                    @endif

                                @endforeach

                                @if($customize[0]['status']  == "0" AND $customize[1]['status'] == "0")
                                    
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="status_activate" class="form-check-input" value="1"> Activate
                                        </label>
                                    </div>
                                        
                                @endif
                                <small class="error text-danger">{{$errors->first('status_activate')}}</small>
                                
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-group align-self-end mt-3">
                                <button type="submit" class="btn btn-afraa-full-2 mb-2">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>

        <div class="card mt-5">
            <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <h6>OTHER SETTINGS</h6>
                    </button>
                </h5>
            </div>

            <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">

                <ul class="list-inline agalist card-header">
                    <li class="dw-title text-capitalize">
                    <span class="text-primary">- Login Page</span>
                    </li>
                </ul>

                <div class="card-body">

                    <form enctype='multipart/form-data' class="bg-white" method="post" action="{{ route('customize.store') }}">
                        @csrf

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <select name="theme_type" id="theme_type " class="form-control">
                                        <option selected value="">Choose a Theme</option>
                                        <option value="asc" {{ old('theme_type')=='asc' ? 'selected' : ''  }}>ASC</option>
                                        <option value="aga" {{ old('theme_type')=='aga' ? 'selected' : ''  }}>AGA</option>
                                    </select>
                                    <small class="error text-danger">{{$errors->first('theme_type')}}</small>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="title_login" value="{{ old('title_login') }}" placeholder="Title">
                                    <small class="error text-danger">{{$errors->first('title_login')}}</small>
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Description:') }}</label>
                                    <textarea class="form-control" name="desc_login" rows="5">{{ old('desc_login') }}</textarea>
                                    <small class="error text-danger">{{$errors->first('desc_login')}}</small>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="custom-file" id="customFile" lang="es">
                                        <input type="file" class="form-control custom-file-input {{ $errors->has('photo_login') ? ' is-invalid' : '' }}" id="photo_login" name="photo_login" value="{{ old('photo_login') }}" aria-describedby="filePhoto">
                                        <label class="custom-file-label" for="photo_login">
                                            Upload logo...
                                        </label>
                                    </div>
                                    <small class="error text-danger">{{$errors->first('photo_login')}}</small>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="custom-file" id="customFile" lang="es">
                                        <input type="file" class="form-control custom-file-input {{ $errors->has('bg_photo_login') ? ' is-invalid' : '' }}" id="bg_photo_login" name="bg_photo_login" value="{{ old('bg_photo_login') }}" aria-describedby="filePhoto">
                                        <label class="custom-file-label" for="bg_photo_login">
                                            Upload background image...
                                        </label>
                                    </div>
                                    <small class="error text-danger">{{$errors->first('bg_photo_login')}}</small>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6 form-group align-self-end mt-3">
                                <button type="submit" class="btn btn-afraa-full-2 mb-2">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>

                    </form>

                </div>

            </div>
        </div>

    </div>

@endsection
