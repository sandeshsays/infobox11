<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Exception;
use Hashids\Hashids;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;

class MenuManagementController extends Controller
{
    public function index()
    {
        $data['route'] = 'menumanagement';

        $data['menus'] = Menu::with('children')->where('parent_id', 0)->orderBy('menu_order')->get();
        return view('menu.index', $data);
    }

    public function store(Request $request)
    {
        try {

            DB::beginTransaction();
            $data = $request->validate([
                'parent_id' => 'nullable|integer',
                'menu_name' => 'required|string|max:255',
                'menu_name_np' => 'required|string|max:255',
                'menu_controller' => 'required|string|max:255',
                'menu_link' => 'required|string|max:255',
                'menu_icon' => 'required|string|max:255',
                'menu_status' => 'required|boolean',
                'menu_order' => 'required|integer',
            ]);
            $parentId = $request->parent_id;
            if ($parentId == null) {
                $data['parent_id'] = 0;
            }
            $data['created_by'] = userInfo()->id;


            Menu::create($data);
            DB::commit();
            return back()->with(['alert-type' => 'success', 'message' => Lang::get('menu.menu_insert_message')]);

        } catch (Exception $e) {
            dd($e);
            DB::rollBack();
            return redirect()->back()->with(['alert-type' => 'error', 'message' => Lang::get('message.commons.technicalError')]);

        }
    }

    public function edit(Request $request, $id)
    {
        try {
            $hashId = new Hashids('', hashIdLen());
            $data['page_title'] = getLan() == 'np' ? 'मेनु व्यवस्थापन' : 'Menu Management';

            $data['prev_page_url'] = 'menumanagement';
            $data['page_route'] = 'menumanagement';

            $hashIdValue = $hashId->decode($id);
            if ($hashIdValue) {
                $menuId = $hashIdValue[0];
                $data['menu'] = Menu::findOrFail($menuId);
                $data['request'] = $request;
                $data['load_js'] = [];
                
                $data['index_page_url'] = 'menumanagement';
                $data['script_js'] = "$(function(){

                });";

                $data['load_css'] = [];


                return view('menu.edit', $data);
            } else {
                return redirect()->back()->with(['alert-type' => 'error', 'message' => Lang::get('message.commons.technicalError')]);
            }
        } catch (\Exception $e) {
            dd($e);
            Session::flash('server_error', Lang::get('message.commons.technicalError'));
            return back();
        }
    }

    public function update(Request $request, $menuId)
    {
        try {
            DB::beginTransaction();
            $data = $request->validate([
                'parent_id' => 'nullable|integer',
                'menu_name' => 'required|string|max:255',
                'menu_name_np' => 'required|string|max:255',
                'menu_controller' => 'required|string|max:255',
                'menu_link' => 'required|string|max:255',
                'menu_icon' => 'required|string|max:255',
                'menu_status' => 'required|boolean',
                'menu_order' => 'required|integer',
            ]);
            $data['updated_by'] = userInfo()->id;
            $parentId = $request->parent_id;
            if ($parentId == null) {
                $data['parent_id'] = 0;
            }
            $menu = Menu::find($menuId);
            if ($menu) {
                $menu->update($data);
            }

            DB::commit();
            return redirect(url('menumanagement'))->with(['alert-type' => 'success', 'message' => trans('menu.menu_update_message')]);
        } catch (Exception $e) {
            dd($e);
            DB::rollBack();
            return redirect()->back()->with(['alert-type' => 'error', 'message' => Lang::get('message.commons.technicalError')]);
        }
    }
    public function destroy(int $id)
    {
        try {
            $data['page_route'] = 'menumanagement';

            $value = Menu::find($id);

            if ($value) {

                DB::beginTransaction();
                $data['deleted_by'] = auth()->user()->id;
                $data['status'] = false;
                $value->delete();

                DB::commit();
            } else {
                session()->flash('error', Lang::get('message.flash_messages.warningMessage'));
            }

            return redirect(url('menumanagement'))->with(['alert-type' => 'success', 'message' => Lang::get('menu.menu_delete_message')]);
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            return redirect()->back()->with(['alert-type' => 'error', 'message' => Lang::get('message.commons.technicalError')]);

        }
    }
    public function updateOrder(Request $request)
    {
        $data = $request->validate([
            'menu_order' => 'required|array',
        ]);

        foreach ($data['menu_order'] as $order => $id) {
            Menu::where('id', $id)->update(['menu_order' => $order]);
        }

        return response()->json(['status' => 'success']);
    }

    public function postSaveMenu(Request $request)
    {
        $post = $request->menus;
        $post = json_decode($post, true);
        $i = 1;
        foreach ($post[0] as $ro) {
            $pid = $ro['id'];
            if (@$ro['children'][0]) {
                $ci = 1;
                foreach ($ro['children'][0] as $c) {
                    $id = $c['id'];
                    DB::table('menus')->where('id', $id)->update(['menu_order' => $ci, 'parent_id' => $pid]);
                    $ci++;
                }
            }
            DB::table('menus')->where('id', $pid)->update(['menu_order' => $i, 'parent_id' => 0]);
            $i++;
        }

        return response()->json(['alert-type' => 'success', 'success' => true, 'message' => 'Menu Updated Successfully']);
    }
}
