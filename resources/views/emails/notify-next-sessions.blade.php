{{-- @if (empty(!$sessionsData->isEmpty()))

    <p>Dear User,</p>

    <p>Your session is about to ended!</p>

    <p>Thank you,</p>
    
@else --}}

<p>Dear {{$users['name']}},</p>
        
<p>
    Session reminder.

    <ul>
        @php
            $currentTime = date("H:i");
        @endphp

        @foreach ($sessionsData as $session)
            
            {{-- @if (date("H:i", strtotime($session->start_time)) == date("H:i")) --}}

                <li>This session <b>{{$session->title}}</b> will start in 15 minutes.</li>

            {{-- @else

                <li><b>{{$session->title}}</b> ({{$session->start_time}}) - Ongoing Session</li>

            @endif --}}

        @endforeach
    </ul>
    
</p>

<p>Thank you,</p>

{{-- @endif --}}


