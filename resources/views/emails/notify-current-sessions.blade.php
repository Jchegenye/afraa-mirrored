{{-- @if (empty(!$sessionsData->isEmpty()))

    <p>Dear User,</p>

    <p>Your session is about to ended!</p>

    <p>Thank you,</p>
    
@else --}}

    <p>Dear user,</p>
        
        <p>
            Session(s) reminder.
            <ul>
                @php
                    $currentTime = date("H:i");
                @endphp

                @foreach ($sessionsData as $session)
                    
                    @if (date("H:i", strtotime($session->start_time)) == date("H:i"))

                        <li><b>{{$session->title}}</b> ({{$session->start_time}}) - New session about to start</li>

                    @else

                        <li><b>{{$session->title}}</b> ({{$session->start_time}}) - Ongoing Session</li>

                    @endif

                @endforeach
            </ul>
            
        </p>

    <p>Thank you,</p>
    
{{-- @endif --}}


