{{-- @if (empty(!$sessionsData->isEmpty()))

    <p>Dear User,</p>

    <p>There is no active session at the moment!</p>

    <p>Thank you,</p>
    
@else --}}

    <p>Dear user,</p>
        
        <p>
            The following session is currently on going:-
            <br>
            <ul>
            @foreach ($sessionsData as $session)
                <li><b>{{$session->title}}</b></li>
            @endforeach
        </ul>
            
        </p>

    <p>Thank you,</p>
    
{{-- @endif --}}


