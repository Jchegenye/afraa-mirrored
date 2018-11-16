@extends('layouts.app')

@section('title', 'Dashboard - Add User(s)')

@section('head')
    <script src='https://www.google.com/recaptcha/api.js'></script>
@endsection

@section('content')

<style>

.custom-file-input ~ .custom-file-label::after {
    content: "Upload";
}
.custom-file-input{
    cursor: pointer;
}
</style>

<div class="container-fluid">

    <div id="adminTable">
        <div class="table_header "><!-- table header -->
            <div class="row ">
                <div class="col-md-4">
                    <div class="mx-auto mt-2 intro1">
                        <h6 class="text-capitalize">Add
                        @if ($user_type)
                            {{$user_type}}(s)
                        @else
                            User(s)
                        @endif</h6>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <a href="{{url('/dashboard/users/')}}" class="btn btn-afraa tb-sm-text">
                                <i class="fas fa-users"></i> View Users
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="table_body ">

            <form method="POST" action="{{ url('dashboard/users/store') }}" enctype="multipart/form-data">
                @csrf

                <div class="row">

                    <div class="col-md-6 form-group">
                        <label for="name" class="col-form-label text-md-left">{{ __('Company/Person Name') }}</label>

                        <input id="name" name="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" autofocus>
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col-md-6 form-group">
                        <label for="email" class="col-form-label text-md-right">{{ __('E-Mail') }}</label>

                        <input id="email" name="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col-md-6 form-group">
                        <label for="role" class="col-form-label text-md-right">{{ __('Role') }}</label>
                        <select class="form-control {{ $errors->has('roleselector') ? ' is-invalid' : '' }}" id="roleselector" name="roleselector">
                            @foreach($allpermissions as $key => $roles)
                                @if ($roles->role == old('roleselector'))
                                    <option value="{!! $roles->role !!}" @if(old('roleselector') ==! $roles->role) selected @endif selected> {{$roles->role}}</option>
                                @else
                                    <option value="{!! $roles->role !!}" @if(old('roleselector') ==! $roles->role) @endif> {{$roles->role}}</option>
                                @endif
                            @endforeach
                        </select>

                        @if ($errors->has('roleselector'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('roleselector') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col-md-6 form-group">
                        <label for="phone" class="col-form-label text-md-right">{{ __('Phone') }}</label>
                        <div class="input-group">
                            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}">
                            @if ($errors->has('phone'))
                                <span class="invalid-feedback1 pl-2 pt-2 text-danger" role="alert">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6 form-group">
                        <label for="bio" class="col-form-label text-md-right">{{ __('Bio/Description') }}</label>
                        <textarea class="form-control {{ $errors->has('bio') ? ' is-invalid' : '' }}" id="bio" name="bio" value="{{ old('bio') }}" rows="3"></textarea>
                        @if ($errors->has('bio'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('bio') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col-md-6 form-group">
                        <label for="bio" class="col-form-label text-md-right">{{ __('Upload Photo') }}</label>
                        <div class="custom-file" id="customFile" lang="es">
                            <input type="file" class="form-control custom-file-input {{ $errors->has('photo') ? ' is-invalid' : '' }}" id="photo" name="photo" value="{{ old('photo') }}" aria-describedby="fileHelp">
                            <label class="custom-file-label" for="photo">
                                Choose photo i.e logo...
                            </label>

                            @if ($errors->has('photo'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('photo') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="name" class="col-form-label text-md-right">{{ __('Country') }}</label>
                        <select class="form-control selectpicker countrypicker {{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" value="{{ old('country') }}"
                                data-live-search="true"
                                data-default="Kenya"
                                data-flag="true">
                        </select>

                        @if ($errors->has('country'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('country') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-md-6 form-group mt-5">
                        <button type="submit" class="btn btn-afraa-full-2">
                            {{ __('Add') }}
                        </button>
                    </div>

                </div>

            </form>

        </div>
    </div>

    {{-- <!-- <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">

                <div class="card-header">

                    <div class="row">

                        <div class="col-md-4 ">
                            <div class="mx-auto mt-2">
                            Dashboard - Add User(s)
                            </div>
                        </div>

                        <div class="col-md-8 ">
                            <div class="row">
                                <div class="col-md-2 offset-md-10">
                                    <a href="{{url('/dashboard/users/create/')}}" class="btn btn-primary">Add User</a>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="card-body">

                    <div class="container">
                        <div class="col-md-12">

                            <form method="POST" action="{{ url('dashboard/users/store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Company/Person Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" name="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" autofocus>

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" name="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}">

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

                                    <div class="col-md-6">

                                        <select class="form-control {{ $errors->has('roleselector') ? ' is-invalid' : '' }}" id="roleselector" name="roleselector">

                                            @foreach($allpermissions as $key => $roles)

                                                @if ($roles->role == old('roleselector'))
                                                    <option value="{!! $roles->role !!}" @if(old('roleselector') ==! $roles->role) selected @endif selected> {{$roles->role}}</option>

                                                @else
                                                    <option value="{!! $roles->role !!}" @if(old('roleselector') ==! $roles->role) @endif> {{$roles->role}}</option>
                                                @endif

                                            @endforeach

                                        </select>

                                        @if ($errors->has('roleselector'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('roleselector') }}</strong>
                                            </span>
                                        @endif

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}">
                                            @if ($errors->has('phone'))
                                                <span class="invalid-feedback1 pl-2 pt-2 text-danger" role="alert">
                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="bio" class="col-md-4 col-form-label text-md-right">{{ __('Bio/Description') }}</label>

                                    <div class="col-md-6">
                                        <textarea class="form-control {{ $errors->has('bio') ? ' is-invalid' : '' }}" id="bio" name="bio" value="{{ old('bio') }}" rows="3"></textarea>
                                        @if ($errors->has('bio'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('bio') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="custom-file" id="customFile" lang="es">
                                            <input type="file" class="custom-file-input {{ $errors->has('photo') ? ' is-invalid' : '' }}" id="photo" name="photo" value="{{ old('photo') }}" aria-describedby="fileHelp">
                                            <label class="custom-file-label" for="photo">
                                                Choose photo i.e logo...
                                            </label>

                                            @if ($errors->has('photo'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('photo') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">

                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                                    <div class="col-md-6">
                                        <select class="selectpicker countrypicker {{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" value="{{ old('country') }}"
                                                data-live-search="true"
                                                data-default="Kenya"
                                                data-flag="true">
                                        </select>

                                        @if ($errors->has('country'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('country') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Add') }}
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div> --> --}}

</div>

@endsection
