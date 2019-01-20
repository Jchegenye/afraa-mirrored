<?php

namespace Afraa\Http\Controllers;

use Illuminate\Http\Request;
use Afraa\Legibra\ReusableCodes\Dashboard\RetrieveSessions;

class NotificationSessionsController extends Controller
{

    use RetrieveSessions; 

    public function getNotifications()
    {

        $current_sessions = $this->getCurrentSessions();
        $next_sessions = $this->getNextSessions();

        $notification_sessions = array(
            'current_sessions' => $current_sessions,
            'next_sessions' => $next_sessions
        );
    
        return $notification_sessions;
    }
}
