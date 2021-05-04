<?php

namespace App\Modules\User\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        # parent::__construct();
    }

    public function search(Request $request)
    {

        $validated = $request->validate(
            [
                'user_cd' => 'required',
            ],
            [
                'required' => 'Không được để trống'
            ]
        );

        $libValNmJ = 'auth_role_div';
        $libValNmJs = 'incumbent_div';

        $user_cd = $_POST['user_cd'];
        $user_nm_j = $_POST['user_nm_j'];
        $user_nm_e = $_POST['user_nm_e'];

            $data = DB::table('m_user as m')
                ->where('user_cd', 'LIKE', "%" . $user_cd . "%")
                ->where('user_nm_j', 'LIKE', '%' . $user_nm_j . '%')
                ->where('user_nm_e', 'LIKE', '%' . $user_nm_e . '%')
                ->leftJoin('s_lib_val as s',  function ($join) use ($libValNmJ) {
                    $join->on('s.lib_val_cd', '=', 'm.auth_role_div')
                        ->where('s.lib_cd', '=', $libValNmJ);
                })
                ->leftJoin('s_lib_val as d', function ($join) use ($libValNmJs) {
                    $join->on('d.lib_val_cd', '=', 'm.incumbent_div')
                        ->where('d.lib_cd', '=', $libValNmJs);
                })
                ->select('m.user_cd', 'm.user_nm_j', 'm.user_ab_j', 'm.user_nm_e', 'm.user_ab_e', 's.lib_val_nm_j', 'd.lib_val_nm_j as lib_val_nm_js')
                ->get();
        return Response()->json($data);
    }



    public function index(Request $request)
    {
        DB::enableQueryLog();

        $libValNmJ = 'auth_role_div';
        $libValNmJs = 'incumbent_div';

        $mUser = DB::table('m_user as m')
            ->leftJoin('s_lib_val as s',  function ($join) use ($libValNmJ) {
                $join->on('s.lib_val_cd', '=', 'm.auth_role_div')
                    ->where('s.lib_cd', '=', $libValNmJ);
            })
            ->leftJoin('s_lib_val as d', function ($join) use ($libValNmJs) {
                $join->on('d.lib_val_cd', '=', 'm.incumbent_div')
                    ->where('d.lib_cd', '=', $libValNmJs);
            })
            ->select('m.user_cd', 'm.user_nm_j', 'm.user_ab_j', 'm.user_nm_e', 'm.user_ab_e', 's.lib_val_nm_j', 'd.lib_val_nm_j as lib_val_nm_js')
            ->paginate(10);

        // dd(DB::getQueryLog());
        return view('User::index', compact(['mUser']));
    }

    function fetch_data(Request $request)
    {
        $libValNmJ = 'auth_role_div';
        $libValNmJs = 'incumbent_div';

        if ($request->ajax()) {
            $mUser = DB::table('m_user as m')
                ->leftJoin('s_lib_val as s',  function ($join) use ($libValNmJ) {
                    $join->on('s.lib_val_cd', '=', 'm.auth_role_div')
                        ->where('s.lib_cd', '=', $libValNmJ);
                })
                ->leftJoin('s_lib_val as d', function ($join) use ($libValNmJs) {
                    $join->on('d.lib_val_cd', '=', 'm.incumbent_div')
                        ->where('d.lib_cd', '=', $libValNmJs);
                })
                ->select('m.user_cd', 'm.user_nm_j', 'm.user_ab_j', 'm.user_nm_e', 'm.user_ab_e', 's.lib_val_nm_j', 'd.lib_val_nm_j as lib_val_nm_js')
                ->paginate(10);
            return view('User::index', compact('mUser'))->render();
        }
    }
}
