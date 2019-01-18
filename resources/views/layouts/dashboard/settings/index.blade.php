@extends('layouts.app')

@section('title', 'Settings')

@section('content')

<div class="row">
    <div class="col-md-12 heading">
        <h1 class="page-header">Settings</h1>
        <p></p>
    </div>
</div>

    <div id="accordion">

        {{-- @if ($customize->theme_type == 'asc')

            {{$customize->theme_type}}

        @else

            {{$customize->theme_type}}
            
        @endif --}}

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
                    
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

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

                                    <ul class="list-inline agalist card-header mb-3 mt-5">
                                        <li class="dw-title text-capitalize">
                                            <span class="text-primary">- Login Page</span>
                                        </li>
                                    </ul>

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

                            <div class="row ">
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

        {{-- <div class="card">
          <div class="card-header" id="headingTwo">
            <h5 class="mb-0">
              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Collapsible Group Item #2
              </button>
            </h5>
          </div>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body">
              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingThree">
            <h5 class="mb-0">
              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Collapsible Group Item #3
              </button>
            </h5>
          </div>
          <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
            <div class="card-body">
              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
            </div>
          </div>
        </div> --}}

@endsection
