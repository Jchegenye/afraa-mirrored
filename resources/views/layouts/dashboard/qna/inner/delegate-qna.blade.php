<div class="row mt-5 myqna" id="dashtabs">

        <nav class="col-md-12">
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-1-tab" data-toggle="tab" href="#nav-1" role="tab" aria-controls="nav-home" aria-selected="true">Sunday, 12th May 2019</a>
                <a class="nav-item nav-link" id="nav-2-tab" data-toggle="tab" href="#nav-2" role="tab" aria-controls="nav-profile" aria-selected="false">Monday, 13th May 2019</a>
                <a class="nav-item nav-link" id="nav-3-tab" data-toggle="tab" href="#nav-3" role="tab" aria-controls="nav-contact" aria-selected="false">Tuesday, 14th May 2019</a>
            </div>
        </nav>

    <div class="col-md-12">

        <div class="tab-content mt-3" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-1" role="tabpanel" aria-labelledby="nav-1-tab">

                <div class="accordion aga-accordion" id="accod-1">

                    @foreach($session as $sessions)

                        @php

                            $date = date("j", strtotime($sessions->date));

                            $start = date("h:i", strtotime($sessions->start_time));

                            $stop = date("h:i", strtotime($sessions->end_time));

                        @endphp

                        @if ($date==12)

                            <div class="qna">

                                <a class="btn-aga bg-white" data-toggle="collapse" data-toggle="collapse" data-target="#{{$sessions->title}}_12" aria-expanded="false" aria-controls="collapseTwo">
                                    <div class="mb-0 text-left qa">
                                        <span class="bg-gray afraa-red-text">{{$start}} - {{$stop}}</span>
                                        <span class="pl-4">{{$sessions->title}}</span>
                                    </div>
                                </a>

                                <div id="{{$sessions->title}}_12" class="collapse show" aria-labelledby="headingTwo" data-parent="#accod-1">
                                    <div class="card-body">
                                        <ul class="list-inline agalist">

                                            @php

                                                $questions = $sessions->questions;

                                            @endphp

                                            @foreach ($questions as $key => $question)

                                                <li class="dw-title text-capitalize mb-3">
                                                    <span>{{$key+1}} </span>
                                                    <span>{{$question->text}}</span>
                                                </li>

                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                            </div>

                        @endif

                    @endforeach

                </div>

            </div>
            <div class="tab-pane fade" id="nav-2" role="tabpanel" aria-labelledby="nav-2-tab">

                    <div class="accordion aga-accordion" id="accod-1">

                        @foreach($session as $sessions)

                            @php

                                $date = date("j", strtotime($sessions->date));

                                $start = date("h:i", strtotime($sessions->start_time));

                                $stop = date("h:i", strtotime($sessions->end_time));

                            @endphp

                            @if ($date==13)

                                <div class="qna">

                                    <a class="btn-aga bg-white" data-toggle="collapse" data-toggle="collapse" data-target="#{{$sessions->title}}_13" aria-expanded="false" aria-controls="collapseTwo">
                                        <div class="mb-0 text-left qa">
                                            <span class="bg-gray afraa-red-text">{{$start}} - {{$stop}}</span>
                                            <span class="pl-4">{{$sessions->title}}</span>
                                        </div>
                                    </a>

                                    <div id="{{$sessions->title}}_13" class="collapse show" aria-labelledby="headingTwo" data-parent="#accod-1">
                                        <div class="card-body">
                                            <ul class="list-inline agalist">

                                                @php

                                                    $questions = $sessions->questions;

                                                @endphp

                                                @foreach ($questions as $key => $question)

                                                    <li class="dw-title text-capitalize mb-3">
                                                        <span>{{$key+1}} </span>
                                                        <span>{{$question->text}}</span>
                                                    </li>

                                                @endforeach

                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            @endif

                        @endforeach

                    </div>

            </div>
            <div class="tab-pane fade" id="nav-3" role="tabpanel" aria-labelledby="nav-3-tab">

                    <div class="accordion aga-accordion" id="accod-1">

                        @foreach($session as $sessions)

                            @php

                                $date = date("j", strtotime($sessions->date));

                                $start = date("h:i", strtotime($sessions->start_time));

                                $stop = date("h:i", strtotime($sessions->end_time));

                            @endphp

                            @if ($date==14)

                                <div class="qna">

                                    <a class="btn-aga bg-white" data-toggle="collapse" data-toggle="collapse" data-target="#{{$sessions->title}}_14" aria-expanded="false" aria-controls="collapseTwo">
                                        <div class="mb-0 text-left qa">
                                            <span class="bg-gray afraa-red-text">{{$start}} - {{$stop}}</span>
                                            <span class="pl-4">{{$sessions->title}}</span>
                                        </div>
                                    </a>

                                    <div id="{{$sessions->title}}_14" class="collapse show" aria-labelledby="headingTwo" data-parent="#accod-1">
                                        <div class="card-body">
                                            <ul class="list-inline agalist">

                                                @php

                                                    $questions = $sessions->questions;

                                                @endphp

                                                @foreach ($questions as $key => $question)

                                                    <li class="dw-title text-capitalize mb-3">
                                                        <span>{{$key+1}} </span>
                                                        <span>{{$question->text}}</span>
                                                    </li>

                                                @endforeach

                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            @endif

                        @endforeach

                    </div>

            </div>
        </div>
    </div>

</div>
