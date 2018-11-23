@extends('layouts.app')

@section('title', 'Question & Answers')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h3 class="page-header">
                @if(Auth::user()->role == 'admin') Manage @endif
                Question & Answers</h3>
        </div>

        <div class="col-md-12">
            @if (\Session::has('success'))
                <div class="alert alert-success px-5">
                    {!! \Session::get('success') !!}
                </div>
            @endif
        </div>
    </div>

    @if(Auth::user()->role == 'admin')

        @include('layouts.dashboard.qna.inner.manage-qna')

    @elseif(Auth::user()->role == 'delegate')

        @include('layouts.dashboard.qna.inner.delegate-qna')

    @endif

@endsection
