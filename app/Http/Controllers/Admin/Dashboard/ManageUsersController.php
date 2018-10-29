<?php

namespace Afraa\Http\Controllers\Admin\Dashboard;

use Afraa\User;
use Afraa\Model\Admin\Dashboard\UserPermissions;
use Illuminate\Http\Request;
use Afraa\Http\Controllers\Controller;
use Afraa\Legibra\ReusableCodes\Dashboard\RetrieveModels;
use JavaScript;

class ManageUsersController extends Controller
{

    use RetrieveModels;
    
    /**
     * Create a new controller instance.
     * 
     * @author Jackson A. Chegenye
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the users dashboard.
     *
     * @author Jackson A. Chegenye
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = $this->RetrieveUsers();
        return view('layouts.dashboard.admin.users')->with($data);

    }

    /**
     * Show the form for creating a new resource.
     * 
     * @author Jackson A. Chegenye
     * @return \Illuminate\Http\Response
     */
    public function liveSearch(Request $request)
    { 
        //$search = request()->uid;
        $data = $this->RetrieveUsers();
        return view('layouts.dashboard.admin.livesearchajax')->with($data);

    }
}
