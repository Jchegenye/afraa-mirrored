<?php

namespace Afraa;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class FeaturedSession extends Model
{
    //
    public function getLatest(){

        $latest = DB::table('featured_sessions')
                ->join('programme_sessions', function ($join){

                    $join->on('programme_sessions.id', '=', 'featured_sessions.session_id');
                })
                ->take(1)
                ->get();

        return $latest;
    }
}
