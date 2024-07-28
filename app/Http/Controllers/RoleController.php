<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Models\Menu;
use App\Models\Role;
use App\Models\UserRole;
use Exception;
use Illuminate\Http\Request;
use Hashids\Hashids;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;

class RoleController extends Controller
{
    // public function __construct()
    // {
    //     // Ensure that only superadmins (role_id 1) can access these methods
    //     $this->middleware(function ($request, $next) {
    //         if (auth()->user()->role_id != 1) {
    //             return redirect('/')->with('error', 'Unauthorized access');
    //         }
    //         return $next($request);
    //     });
    // }

    public function index()
    {

        $data['roles'] = Role::get();
        $data['route'] = 'roles';
        $data['page_title'] = getLan() == 'np' ? 'भूमिका' : 'Roles';


        return view('roles.index', $data);
    }

    public function create()
    {
        try {

            $data['page_url'] = 'roles';
            $data['prev_page_url'] = 'roles';
            $data['page_route'] = 'roles';
            $data['index_page_url'] = 'roles';
            $data['add_more_button'] = true;
            // $query = Role::query()
            //     ->get(['code'])
            //     ->pluck('code')
            //     ->map(function ($item) {
            //         return (int) $item;
            //     })
            //     ->max();
            // $data['code'] = isset($query) ? (int) $query + 1 : 1;

            $data['load_css'] = [
                'plugins/select2/css/select2.css',
                'plugins/datepicker/nepali/css/nepali.datepicker.v3.2.min.css',
                'plugins/datepicker/english/english-datepicker.css',

            ];

            $data['load_js'] = [];

            if (Session::has('addMore')) {
                $data['script_js'] = "$(function(){
                     $(document).ready(function() {
                        $('#addModal').modal('show');
                    });
                })";
            }

            $name = getLan() == 'np' ? 'name_np' : 'name_en';

            $data['page_title'] = getLan() == 'np' ? 'भूमिका' : 'Roles';
            // if (systemAdmin()) {
            //     $data['department'] = MstDepartment::select('id', DB::raw("CONCAT(name_np, '-', name_en) AS name"))
            //         ->get();
            // } else {
            //     $data['department'] = MstDepartment::where('client_id', userInfo()->client_id)
            //         ->select('id', DB::raw("CONCAT(name_np, '-', name_en) AS name"))
            //         ->get();
            // }


            return view('roles.add', $data);
        } catch (\Exception $e) {
            return redirect()->back()->with(['alert-type' => 'error', 'message' => Lang::get('message.commons.technicalError')]);
        }
    }

    public function store(RoleRequest $request): RedirectResponse
    {
        try {
            DB::beginTransaction();
            $data = $request->all();
            $data['client_id'] = $request->client_id ? $request->client_id : userInfo()->client_id;

            $data['created_by'] = userInfo()->id;

            $create = Role::create($data);

            DB::commit();
            $message = Lang::get('message.flash_messages.insertMessage');
            session()->flash('success', $message);

            if ($request->submit == 'addMore') {
                return back();
            }
            return redirect(url('roles'))->with(['alert-type' => 'success', 'message' => Lang::get('roles.role_insert_message')]);
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            return redirect()->back()->with(['alert-type' => 'error', 'message' => Lang::get('message.commons.technicalError')]);
        }
           
    }

    public function update(RoleRequest $request, $roleId)
    {
        try {
            DB::beginTransaction();
            $data = [
                'name_np' => $request->name_np,
                'name_en' => $request->name_en,
            ];
            $role = Role::find($roleId);
            if ($role) {
                $role->update($data);
            }


            // Validate request if needed

            // Get the submitted permissions
            $permissions = $request->input('permissions', []);

            // Iterate over each menu's permissions
            foreach ($permissions as $menuId => $permission) {
                UserRole::updateOrCreate(
                    ['menu_id' => $menuId, 'role_id' => $roleId],
                    [
                        'allow_index' => $permission['allow_index'] ?? 0,
                        'allow_add' => $permission['allow_add'] ?? 0,
                        'allow_edit' => $permission['allow_edit'] ?? 0,
                        'allow_delete' => $permission['allow_delete'] ?? 0,
                        'allow_show' => $permission['allow_show'] ?? 0,
                    ]
                );
            }
            DB::commit();
            return redirect()->route('roles.index')->with(['alert-type' => 'success', 'message' => trans('roles.role_update_message')]);
        } catch (Exception $e) {
            dd($e);
            DB::rollBack();
            return redirect()->back()->with(['alert-type' => 'error', 'message' => trans('roles.role_update_failed_message')]);
        }
    }

    public function edit(Request $request, $id)
    {
        try {
            $hashId = new Hashids('', hashIdLen());
            $data['page_title'] = getLan() == 'np' ? 'भूमिका' : 'Roles';

            $data['prev_page_url'] = '';
            $data['page_route'] = 'roles';

            $hashIdValue = $hashId->decode($id);
            if ($hashIdValue) {
                $roleId = $hashIdValue[0];
                $data['role'] = Role::findOrFail($roleId);

                // Get all menus
                $data['menus'] = Menu::orderBy('menu_order')->get();

                // Fetch permissions for each menu and role combination
                $data['permissions'] = UserRole::where('role_id', $roleId)->get()->keyBy('menu_id');


                $data['page_url'] = 'roles';
                $data['page_route'] = 'roles';
                $data['request'] = $request;
                $data['load_js'] = [];
                $data['show_button'] = true;
                $data['cancel_button'] = true;
                $data['index_page_url'] = 'roles';
                $data['script_js'] = "$(function(){

                });";

                $data['load_css'] = [];


                return view('roles.edit', $data);
            } else {
                Session::flash('error', Lang::get('message.flash_messages.dataNotFoundMessage'));

                return redirect('roles');
            }
        } catch (\Exception $e) {
            dd($e);
            Session::flash('server_error', Lang::get('message.commons.technicalError'));
            return back();
        }
    }

    public function show($id, Request $request)
    {

        try {
            $hashId = new Hashids('', hashIdLen());
            $hashIdValue = $hashId->decode($id);
            if ($hashIdValue) {
                $data['value'] = $value = ReligiousTourism::query()->find($hashIdValue[0]);

                if ($value) {
                    $data['client_id'] = userInfo()->client_id;
                    $data['page_title'] = getLan() == 'np' ? 'धार्मिक/पर्यटकीय स्थल ' : 'Religious/Tourism Places';
                    $data['page_url'] = 'religious';
                    $data['page_route'] = 'religious';
                    $data['load_css'] = [];
                    $data['load_js'] = [
                        'js/printQr.js',
                    ];

                    $data['filePath'] = ReligiousTourism::FILE_PATH;

                    return view('backend.dcc.religiousTourismPlaces.show', $data);
                }
            } else {
                Session::flash('error', Lang::get('message.flash_messages.dataNotFoundMessage'));

                return redirect('religious');
            }
        } catch (\Exception $e) {
            Session::flash('server_error', Lang::get('message.commons.technicalError'));

            return back();
        }
    }

    public function destroy(int $id)
    {
        try {
            $value = Role::find($id);

            if ($value) {

                DB::beginTransaction();
                $data['deleted_by'] = auth()->user()->id;
                $data['status'] = false;
                $value->delete();

                DB::commit();
            } else {
                session()->flash('error', Lang::get('message.flash_messages.warningMessage'));
            }

            return redirect(url('roles'))->with(['alert-type' => 'success', 'message' => Lang::get('roles.role_delete_message')]);
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            return redirect()->back()->with(['alert-type' => 'error', 'message' => Lang::get('message.commons.technicalError')]);

        }
    }



    public function managePermissions()
    {
        // Get all roles except superadmin (role_id = 1)
        $roles = Role::where('role_level', '!=', 'system_admin')->get();

        // Get all menus
        $menus = Menu::with('children')->orderBy('menu_order')->get();

        // Get all permissions
        $permissions = UserRole::all();

        return view('manage_permission', compact('roles', 'menus', 'permissions'));
    }

    // In your controller, e.g., MenuController

    public function updatePermissions(Request $request)
    {
        $permissions = $request->input('permissions', []);

        foreach ($permissions as $role_id => $menus) {
            foreach ($menus as $menu_id => $permission) {
                UserRole::updateOrCreate(
                    ['role_id' => $role_id, 'menu_id' => $menu_id],
                    [
                        'allow_index' => isset($permission['allow_index']),
                        'allow_add' => isset($permission['allow_add']),
                        'allow_edit' => isset($permission['allow_edit']),
                        'allow_delete' => isset($permission['allow_delete']),
                        'allow_show' => isset($permission['allow_show'])
                    ]
                );
            }
        }

        return redirect()->back()->with('success', 'Permissions updated successfully.');
    }
}
