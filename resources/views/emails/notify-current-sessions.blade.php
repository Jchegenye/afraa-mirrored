@if (empty(!$sessionsData->isEmpty()))

    <p>Dear User,</p>

    <p>There is no active session at the moment!</p>

    <p>Thank you,</p>
    
@else

    <p>Dear user,</p>
        
        <p>
            The following session is currently on going:-
            <br>
            @foreach ($sessionsData as $session)
                <b>{{$session->title}}</b>
            @endforeach
            
        </p>

    <p>Thank you,</p>
    
@endif


