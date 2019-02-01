<?php

namespace Afraa\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Afraa\Http\Controllers\Controller;
use Afraa\Legibra\ReusableCodes\Dashboard\OneOnOneMeetings;
use App\ProgrammeSession;
use Afraa\Model\Users;
use Afraa\Model\Admin\Admin;
use Afraa\Http\Controllers\Controller\Programme\ProgrammeController;

class AdminController extends Controller
{

    use OneOnOneMeetings;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application (Delegate) dashboard.
     *
     * @author Jackson A. Chegenye
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $session = \Afraa\ProgrammeSession::all();

        $stats = new Admin();
        $statistics = $stats->getAllStats();

        $get_users = new Users();

        $users = $get_users->getAllUsers();

        $user_by_id = $get_users->getUserById(1);

        $oneonones = $this->retrieveOneOnOneMeetings();

        return view('dashboard/admin',compact('session','users','user_by_id','statistics', 'oneonones'));
    }

}
