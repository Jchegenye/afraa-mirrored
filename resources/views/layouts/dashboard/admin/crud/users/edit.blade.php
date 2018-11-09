@extends('layouts.app')

@section('title', 'Dashboard - Edit User')

@section('content')

<script>

    $(document).ready(function(){
        
        $('.your-checkbox').prop('indeterminate', true);

        $(function() {

            $('#roleselector').change(function(){

                if ($('.permission_change').hasClass('has_permissions')) {
                    $('.permission_change').removeClass('has_permissions');
                    $(".permissions_changed").prop('checked', true);
                    $(".permissions_touncheck").prop('checked', false);
                    $('.permissions').hide();
                } else {
                    $('.permission_change').addClass('has_permissions'); 
                    $(".permissions_changed").prop('checked', false);
                    $('.permissions').hide();
                }

                $('#' + $(this).val()).show();

               // $("input[name=permissions]:checked").val();

                // const roleselector = '{{old('roleselector')}}';

                // if(roleselector !== ''){
                //     #('#roleselector').val(roleselector);
                // }
            });

        });

    });

</script>

<div class="container-fluid myDiv">
    <div class="row justify-content-center">

        <div class="col-md-1">
            @include('layouts.sidebar')
        </div>

        <div class="col-md-11">
            <div class="card">
                <div class="card-header">Dashboard - Edit {{$user->name}}</div>

                <div class="card-body">
                    
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <form action="{{ url('dashboard/users/update/' . $user->uid) }}" method="POST" >
                        
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="@if($user->name==old('name')) @endif{{$user->name}}" placeholder="{{$user->name}}" autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <select class="form-control {{ $errors->has('roleselector') ? ' is-invalid' : '' }}" id="roleselector" name="roleselector">

                                        @php $single = ''; @endphp

                                            @foreach($allpermissions as $key => $roles)
                                                
                                                @php $single .= $roles->role; @endphp

                                                @if ($roles->role == $user->role )
                                                    <option value="{!! $user->role !!}" @if(old('roleselector') ==! $user->role) selected @endif selected> {{$user->role}}</option>
                                                
                                                @else
                                                    <option value="{!! $roles->role !!}" @if(old('roleselector') ==! $roles->role) @endif> {{$roles->role}}</option>
                                                @endif

                                            @endforeach

                                        @php $me = $single; @endphp

                                    </select>        
                                    
                                    @if ($errors->has('roleselector'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('roleselector') }}</strong>
                                        </span>
                                    @endif
                                    
                                </div>

                            </div>
                        </div>
                    
                        <div class="form-group row">
                            <label for="permissions" class="col-md-4 col-form-label text-md-right">Permissions </label>
                            <div class="col-md-6">

                                @php
                                
                                    $get_role = '';
                                    $get_perm = array();
                                
                                @endphp

                                    @foreach($allpermissions as $get_permissions)

                                        @php
                                            
                                            $get_role .= $get_permissions->role;

                                            $available_permisssions = array_diff($get_permissions->permissions, $user->permissions);
                                            $get_allpermissions = array_merge($available_permisssions);

                                            $get_perm[] = $get_allpermissions;
                                            
                                        @endphp

                                        @if($get_permissions->role == $user->role)
                                        
                                            <div id="{{$get_permissions->role}}" class="permissions active " style="display: block;"> 
                                                
                                                @foreach($get_allpermissions as $keys => $give_permissions)

                                                    @php $permKey1 = rand(); @endphp

                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" id="permissions{{$permKey1}}" name="permissions[]" class="custom-control-input {{ $errors->has('permissions') ? ' is-invalid' : '' }}" value="{{$give_permissions}}" @if(old('permissions') == $user->role) checked @endif>
                                                        <label class="custom-control-label" for="permissions{{$permKey1}}">
                                                            {{$give_permissions}}
                                                        </label>
                                                    </div>
                                                        
                                                @endforeach

                                                @foreach($user->permissions as $keys => $permissions)

                                                    @php $permKey2 = rand(); @endphp
                                                
                                                    <div class="custom-control custom-checkbox custom-control-inline permission_change">
                                                        <input type="checkbox" id="permissions{{$permKey2}}" name="permissions[]" class="permissions_changed custom-control-input {{ $errors->has('permissions') ? ' is-invalid' : '' }}" value="{{$permissions}}" @if(old('permissions') == $user->role) checked @endif checked>
                                                        <label class="custom-control-label" for="permissions{{$permKey2}}">{{$permissions}}</label>

                                                        @if ($errors->has('permissions'))
                                                            <span class="text-sm-left text-danger" role="alert">
                                                                <br><strong>{{ $errors->first('permissions') }}</strong>
                                                            </span>
                                                        @endif

                                                    </div>

                                                @endforeach
                                                
                                            </div>

                                        @else

                                            <div id="{{$get_permissions->role}}" class="permissions" style="display: none;"> 
                                                @foreach($get_allpermissions as $key => $give_permissions)

                                                    @php $permKey3 = rand(); @endphp

                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" id="permissions{{$permKey3}}" name="permissions[]" class="permissions_touncheck custom-control-input {{ $errors->has('permissions') ? ' is-invalid' : '' }}" value="{{$give_permissions}}" @if(old('permissions') == $user->role) checked @endif>
                                                        <label class="custom-control-label" for="permissions{{$permKey3}}">
                                                            {{$give_permissions}}
                                                        </label>
                                                    </div>
                                                        
                                                @endforeach
                                            </div>

                                        @endif

                                    @endforeach

                                @php $my_perm = $get_role; @endphp

                                <br><hr>

                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>

                    </form>

                </div>
                
            </div>
        </div>
        
    </div>
</div>



@endsection