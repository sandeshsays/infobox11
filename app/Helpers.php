<?php

// for chat

use App\Models\AppClient;
use App\Models\ClientSetting;
use App\Models\District;
use App\Models\LocalBody;
use App\Models\MasterFiscalYear;
use App\Models\Menu;
use App\Models\Province;
use App\Models\Role;
use App\Models\SystemSetting;
use App\Models\User;
use App\Models\UserRole;
use Carbon\Carbon;
use Hashids\Hashids;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

// allow add button
function allowAdd()
{
    return helperPermission()['isAdd'];
}

// allow edit button
function allowEdit()
{
    return helperPermission()['isEdit'];
}

// allow edit button
function allowDelete()
{
    return helperPermission()['isDelete'];
}

// allow index
function allowIndex()
{
    return helperPermission()['isIndex'];
}

// allow view button
function allowShow()
{
    return helperPermission()['isShow'];
}

function dataStatus(): array
{
    return [
        1 => trans('message.button.active'),
        0 => trans('message.button.inactive'),
    ];
}

// get device information
function device_info(): string
{
    $agentValue = new Agent();
    $browser = $agentValue->browser();
    $version = $agentValue->version($browser);
    $device = '';
    $platform = $agentValue->platform();
    if ($agentValue->isDesktop()) {
        $device = 'Desktop';
    } elseif ($agentValue->isMobile()) {
        $device = 'Mobile';
    } elseif ($agentValue->isPhone()) {
        $device = 'Phone';
    } elseif ($agentValue->isTablet()) {
        $device = 'Tablet';
    } elseif ($agentValue->isRobot()) {
        $device = 'Robot';
    }

    return $browser.' '.$version.' '.$platform.' '.$device;
}

/* CRUD Permission for blade file */
function helperPermission(): array
{
    // get Controller Name
    // get the access from database
    // set variable for add/edit/delete

    $action = app('request')->route()->getAction();

    /*
     * Splits the controller and store in array
     */
    $controllers = explode('@', class_basename($action['controller']));
    /*
     * Checks the existence of controller and method
     */

    $controller_name = $controllers[0] ?? '';

    $permission = [
        'isIndex' => false,
        'isAdd' => false,
        'isEdit' => false,
        'isShow' => false,
        'isDelete' => false,
    ];

    $value = Menu::join('user_roles', 'menus.id', '=', 'user_roles.menu_id')
        ->select('user_roles.*', 'menus.*')
        ->where([
            ['role_id', '=', userInfo()->role_id],
            ['menu_controller', '=', $controller_name],
        ])
        ->first();

    if ($value != null || userInfo()->role_id == 1) {
        /* access for super admin */
        if (userInfo()->role_id == 1) {
            $isIndex = true;
            $isAdd = true;
            $isEdit = true;
            $isDelete = true;
            $isShow = true;
        } else {
            $isIndex = $value->allow_index;
            $isAdd = $value->allow_add;
            $isEdit = $value->allow_edit;
            $isDelete = $value->allow_delete;
            $isShow = $value->allow_show;
        }
        $permission = [
            'isIndex' => $isIndex,
            'isAdd' => $isAdd,
            'isEdit' => $isEdit,
            'isDelete' => $isDelete,
            'isShow' => $isShow,
        ];
    }

    return $permission;
}

function moduleAction($code = null): array|string
{
    $value = '';
    if ($code != null) {
        switch ($code) {
            case '1':
                $value = 'Create';
                break;
            case '2':
                $value = 'Update';
                break;
            case '3':
                $value = 'View';
                break;
            case '4':
                $value = 'Delete';
                break;
            case '5':
                $value = 'Status Active';
                break;
            case '6':
                $value = 'Status Inactive';
                break;
            case '7':
                $value = 'User Unblock';
                break;
            case '8':
                $value = 'IP Unblock';
                break;
            case '9':
                $value = 'Update Password';
                break;
            case '10':
                $value = 'Update Profile';
                break;
        }
    } else {
        $value = [
            '1' => 'Create',
            '2' => 'Update',
            '3' => 'View',
            '4' => 'Delete',
            '5' => 'Status Active',
            '6' => 'Status Inactive',
            '7' => 'User Unblock',
            '8' => 'IP Unblock',
            '9' => 'Update Password',
            '10' => 'Update Profile',
        ];
    }

    return $value;
}

/*
 * Random Password Generate Function
 */
function rand_string($length): string
{
    $chars = 'ABC123abc$%456#*EFGHIJ789efghijklmn!mnopqrstKLMNOPQRSTuvwxyzUVWX(YZ)';

    return substr(str_shuffle($chars), 0, $length);
}

/* get all system setting */
function systemSetting()
{
    if (Schema::hasTable('system_settings')) {
        return SystemSetting::whereNull('client_id')->first();
    }
}

/* get logged in user info */
function userInfo(): ?Illuminate\Contracts\Auth\Authenticatable
{
    return Auth::user();
}

function userDetailInfo($userId = null)
{
    $designationId = null;
    $userInfo = User::query()->where('id', $userId)->first();
    if ($userInfo) {
        if ($userInfo->is_employee_user) {
            $employeeInfo = Employee::query()->where('id', userInfo()->employee_id)->firts();
            if ($employeeInfo) {
                $designationInfo = \App\Models\BasicDetails\HrDesiElectedPersongnation::query()->where('id', $employeeInfo->hr_designation_id)->first();
                $designationId = $designationInfo ?? 1;
            }
            if ($userInfo->is_branch_user) {
                return [
                    'branch_id' => $userInfo->branch_id,
                    'ward_no' => null,
                    'designation_id' => $designationId,
                ];
            } else {
                return [
                    'branch_id' => null,
                    'ward_no' => $userInfo->ward_no,
                    'designation_id' => $designationId,
                ];
            }
        } else {
            $electedPersonInfo = ElectedPerson::query()->where('id', userInfo()->elected_id)->firts();
            if ($electedPersonInfo) {
                $designationInfo = \App\Models\OA\MemberType::query()->where('id', $electedPersonInfo->hr_designation_id)->first();

                return [
                    'branch_id' => null,
                    'ward_no' => null,
                    'designation_id' => $designationId,
                ];
            }
        }
    }
}

function desgId($userId = null, $isRequiredName = 0)
{
    $designationId = null;
    $userInfo = $userId ? User::query()->where('id', $userId)->first() : userInfo();
    if ($userInfo->employee_id != null) {
        $employeeInfo = Employee::query()->where('id', $userInfo->employee_id)->first();
        if ($employeeInfo) {
            $designationInfo = \App\Models\BasicDetails\HrDesignation::query()->where('id', $employeeInfo->hr_designation_id)->first();
            $designationId = $designationInfo->id ?? 1;
            if ($isRequiredName == 1) {
                return getLan() == 'np' ? $designationInfo->name_np : $designationInfo->name_en;
            }
        }
    } else {
        $electedPersonInfo = ElectedPerson::query()->where('id', $userInfo->elected_id)->first();
        if ($electedPersonInfo) {
            $designationInfo = \App\Models\OA\MemberType::query()->where('id', $electedPersonInfo->hr_designation_id)->first();
            if ($isRequiredName == 1) {
                return getLan() == 'np' ? $designationInfo->name_np : $designationInfo->name_en;
            }
            $designationId = $designationInfo->id ?? 1;
        }
    }

    return $designationId;
}

function setFont(): string
{
    if (session()->get('locale') == 'en') {
        return 'f-arial';
    } else {
        return 'f-kalimati';
    }
}

function setDatePicker(): array
{
    if (getLan() == 'np') {
        return [
            'from_date' => 'from_date_np',
            'to_date' => 'to_date_np',
            'dateClass' => 'nepaliDatePicker',
        ];

        function setDatePicker(): array
        {
            if (getLan() == 'np') {
                return [
                    'from_date' => 'from_date_np',
                    'to_date' => 'to_date_np',
                    'dateClass' => 'nepaliDatePicker',
                ];
            } else {
                return [
                    'from_date' => 'from_date_en',
                    'to_date' => 'to_date_en',
                    'dateClass' => 'englishDatePicker',
                ];
            }
        }
    } else {
        return [
            'from_date' => 'from_date_en',
            'to_date' => 'to_date_en',
            'dateClass' => 'englishDatePicker',
        ];
    }
}

function getLan(): string
{
    if (session()->get('locale') == 'en') {
        return 'en';
    } else {
        return 'np';
    }
}

function setName(): string
{
    if (session()->get('locale') == 'en') {
        return 'name_en';
    } else {
        return 'name_np';
    }
}

function short_hash($value, $length)
{
    return substr(md5($value), 0, $length);
}

function userProfilePath()
{
    return \App\Models\User::USER_PROFILE_PATH.'/';
}

function currentFy()
{
    return MasterFiscalYear::where('status', 1)->first();
}

function isInvite(): array
{
    return [
        1 => trans('message.button.yes'),
        0 => trans('message.button.no'),
    ];
}

function smsSetting($client_id = null)
{
    if (Schema::hasTable('sms_settings')) {
        $value = SmsSetting::where(['client_id' => $client_id, 'status' => true])->first();
        if (isset($value)) {
            $data = $value;
        } else {
            $data = SmsSetting::whereNull('client_id')->where(['status' => true])->first();
        }

        return $data;
    }
}

function mailSetting($client_id = null)
{
    if (Schema::hasTable('mail_settings')) {
        // Check if $client_id is provided, and if not, use a default value or handle the null case appropriately.
        $client_id = $client_id ?? (clientInfo() ? clientInfo()->id : null);
        if ($client_id) {
            return MailSetting::where(['client_id' => $client_id, 'status' => true])->first();
        } else {
            return MailSetting::whereNull('client_id')->first();
        }
    }
}

function appClientList()
{
    if (Schema::hasTable('app_client')) {
        return AppClient::leftJoin('local_bodies as lb', 'lb.id', '=', 'app_client.local_body_mapping_id')
            ->leftJoin('districts as d', 'd.code', '=', 'lb.district_code')
            ->leftJoin('provinces', 'provinces.code', '=', 'd.province_code')
            ->leftJoin('local_body_types as lbt', 'lbt.id', '=', 'lb.local_body_type_id')
            ->leftJoin('client_module_access as cma', 'cma.client_id', '=', 'app_client.id')
            ->select(
                'app_client.id',
                DB::raw(
                    "CONCAT(lb.name_np, '-', lb.name_en,'-',
                    CASE 
                        WHEN cma.access_all_module='0' AND  cma.is_office_automation='1' AND cma.is_meeting_management='1' AND cma.is_dcc='1' THEN 'कार्यालय स्वचालन बैठक व्यवस्थापन नागरिक बडापत्र '
                        WHEN cma.is_complaint_suggestion='1' AND cma.access_all_module='0' THEN 'गुनासो तथा सुझाव'
                        WHEN cma.is_office_automation='1' AND cma.access_all_module='0' THEN 'कार्यालय स्वचालन'
                        WHEN cma.is_dcc='1' AND cma.access_all_module='0' THEN 'नागरिक बडापत्र'
                        WHEN cma.is_meeting_management='1' AND cma.access_all_module='0' THEN 'बैठक व्यवस्थापन'
                        ELSE 'सबै'
                    END) AS name"
                ),
                'lb.code',
                'app_client.web_url',
                'lbt.id as local_body_type_id',
            )
            ->orderBy('app_client.id', 'desc')
            ->get();
    }
}

function clientInfo($clientId = null)
{
    if (Schema::hasTable('app_clients')) {
        $clientId = config('client.client_id');
        if (is_null($clientId)) {
            $clientUrl = \Request::getHost();
            $clientDetail = AppClient::where('web_url', $clientUrl)->first();
            if ($clientDetail) {
                $clientId = $clientDetail->id;
            } else {
                $clientId = 1;
            }
        }
        // dd($clientId);

        $name = getLan() == 'np' ? 'lb.name_np' : 'lb.name_en';
        $provinceName = getLan() == 'np' ? 'provinces.name_np' : 'provinces.name_en';
        $districtName = getLan() == 'np' ? 'd.name_np' : 'd.name_en';
        if (Schema::hasTable('app_clients')) {
            $clientInfo = AppClient::leftJoin('local_bodies as lb', 'lb.id', '=', 'app_clients.local_body_mapping_id')
                ->leftJoin('districts as d', 'd.code', '=', 'lb.district_code')
                ->leftJoin('provinces', 'provinces.code', '=', 'd.province_code')
                ->leftJoin('local_body_types as lbt', 'lbt.id', '=', 'lb.local_body_type_id')
                ->where('app_clients.id', $clientId)
                ->select(
                    'app_clients.id',
                    $name.' as name',
                    'lb.code',
                    'app_clients.web_url',
                    'app_clients.is_client_logo',
                    'app_clients.client_logo',
                    'app_clients.client_slogan',
                    'app_clients.is_client_slogan_logo',
                    'app_clients.client_slogan_logo',
                    'app_clients.api_web_url',
                    $provinceName.' as province_name',
                    $districtName.' as district_name',
                    'lbt.id as local_body_type_id',
                    'app_clients.local_body_mapping_id as mapping_client_id',
                )->first();
            if ($clientInfo) {
                return $clientInfo;
            } else {
                return AppClient::leftJoin('local_bodies as lb', 'lb.id', '=', 'app_clients.local_body_mapping_id')
                    ->leftJoin('districts as d', 'd.code', '=', 'lb.district_code')
                    ->leftJoin('provinces', 'provinces.code', '=', 'd.province_code')
                    ->leftJoin('local_body_types as lbt', 'lbt.id', '=', 'lb.local_body_type_id')
                    ->where('app_clients.id', 1)->select(
                        'app_clients.id',
                        $name.' as name',
                        'app_clients.web_url',
                        'lb.code',
                        'app_clients.is_client_logo',
                        'app_clients.client_logo',
                        'app_clients.client_slogan',
                        'app_clients.is_client_slogan_logo',
                        'app_clients.client_slogan_logo',
                        'app_clients.api_web_url',
                        $provinceName.' as province_name',
                        $districtName.' as district_name',
                        'lbt.id as local_body_type_id',
                        'app_clients.local_body_mapping_id as mapping_client_id',
                    )->first();
            }
        }
    }
}

function hashIdGenerate($id)
{
    $hashids = new Hashids('', hashIdLen(), 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890');

    return $hashids->encode($id);
}

function hashIdLen(): int
{
    return 8;
}

function userModule($module_name = null)
{
    $value = '';
    if ($module_name != null) {
        switch ($module_name) {
            case 'system_admin':
                $value = getLan() == 'np' ? 'प्रणाली प्रशासक' : 'System Admin';
                break;
            case 'client_admin':
                $value = getLan() == 'np' ? 'Client प्रशासक' : 'Client Admin';
                break;
            case 'oa':
                $value = getLan() == 'np' ? 'कार्यालय स्वचालन' : 'Office Automation';
                break;
            case 'ghs':
                $value = getLan() == 'np' ? 'गुनासो तथा सुझाव' : 'Complaint & Suggestion';
                break;
            case 'mm':
                $value = getLan() == 'np' ? 'बैठक व्यवस्थापन' : 'Meeting Management';
                break;
            case 'cc':
                $value = getLan() == 'np' ? 'नागरिक बडापत्र' : 'Citizen Character';
                break;
            case 'app':
                $value = getLan() == 'np' ? 'भेटघाट' : 'Appointment';
                break;
            case 'chat':
                $value = getLan() == 'np' ? 'च्याट' : 'Chat';
                break;
        }
    } else {
        if (userInfo()->role_id > 1) {
            $value = [
                'client_admin' => getLan() == 'np' ? 'Client प्रशासक' : 'Client Admin',
                'oa' => getLan() == 'np' ? 'कार्यालय स्वचालन' : 'Office Automation',
                'ghs' => getLan() == 'np' ? 'गुनासो तथा सुझाव' : 'Complaint & Suggestion',
                'mm' => getLan() == 'np' ? 'बैठक व्यवस्थापन' : 'Meeting management',
                'cc' => getLan() == 'np' ? 'नागरिक बडापत्र' : 'Citizen Character',
                'app' => getLan() == 'np' ? 'भेटघाट' : 'Appointment',
                'chat' => getLan() == 'np' ? 'च्याट' : 'Chat',
            ];
        } else {
            $value = [
                'system_admin' => getLan() == 'np' ? 'प्रणाली प्रशासक' : 'System Admin',
                'client_admin' => getLan() == 'np' ? 'Client प्रशासक' : 'Client Admin',
                'oa' => getLan() == 'np' ? 'कार्यालय स्वचालन' : 'Office Automation',
                'ghs' => getLan() == 'np' ? 'गुनासो तथा सुझाव' : 'Complaint & Suggestion',
                'mm' => getLan() == 'np' ? 'बैठक व्यवस्थापन' : 'Meeting management',
                'cc' => getLan() == 'np' ? 'नागरिक बडापत्र' : 'Citizen Character',
                'app' => getLan() == 'np' ? 'भेटघाट' : 'Appointment',
                'chat' => getLan() == 'np' ? 'च्याट' : 'Chat',
            ];
        }
    }

    return $value;
}

// check  hole system admin access
function systemAdmin()
{
    if (userInfo()->user_module == 'system_admin' && is_null(userInfo()->client_id)) {
        return true;
    } else {
        return false;
    }
}

// check  hole system admin access
function checkClientAdmin()
{
    if (userInfo()->user_module == 'client_admin' && userInfo()->client_id != null) {
        return true;
    } else {
        return false;
    }
}

function clientAdmin()
{
    if (userInfo()->user_module == 'client_admin' && userInfo()->client_id != null && userInfo()->is_karyapalika_user == false) {
        return true;
    } else {
        return false;
    }
}

function moduleAdmin()
{
    if (userInfo()->client_id != null && (userInfo()->role_id == 4 || userInfo()->role_id == 5
        || userInfo()->role_id == 6 || userInfo()->role_id == 7 || userInfo()->role_id == 8 || userInfo()->role_id == 10)) {
        return true;
    } else {
        return false;
    }
}

function branchUser()
{
    if (userInfo()->branch_id != null && userInfo()->is_branch_user == true) {
        return true;
    } else {
        return false;
    }
}

function wardUser()
{
    if (userInfo()->ward_no != null && userInfo()->is_ward_user == true) {
        return true;
    } else {
        return false;
    }
}

function karayapalikaUser()
{
    if (userInfo()->elected_id != null && userInfo()->is_karyapalika_user == true) {
        return true;
    } else {
        return false;
    }
}

// check  hole system admin access
function checkUserModule()
{
    return userInfo()->user_module;
}

function setClientId($request = null)
{
    if (systemAdmin() == false) {
        return userInfo()->client_id;
    } else {
        return $request->client_id ? $request->client_id : clientInfo()->id;
    }
}

// check  sms service provider
function smsServiceProvider()
{
    return [
        'DOIT' => 'DOIT',
        'SPARROW' => 'SPARROW',
        'OTHER' => 'OTHER',
    ];
}

// ott channel link

function settingInfo($setting_code = null)
{
    $data = ClientSetting::query()->where(['client_id' => clientInfo()->id, 'setting_code' => $setting_code, 'status' => true])->first();

    if (isset($data)) {
        return $data->value;
    }

    return null;
}

function settingStatusInfo($setting_code = null)
{
    if (clientInfo() != null) {
        $data = ClientSetting::query()
            ->where(['client_id' => clientInfo()->id, 'setting_code' => $setting_code])
            ->first();

        if (isset($data)) {
            return $data->status == 1;
        }
    }

    return 0;
}

function moduleName($module_name = null): array|string
{
    $value = '';
    if ($module_name != null) {
        switch ($module_name) {
            case 'oa':
                $value = getLan() == 'np' ? 'कार्यालय स्वचालन' : 'Office Automation';
                break;
            case 'ghs':
                $value = getLan() == 'np' ? 'गुनासो तथा सुझाव' : 'Complaint & Suggestion';
                break;
            case 'mm':
                $value = getLan() == 'np' ? 'बैठक व्यवस्थापन' : 'Meeting Management';
                break;
            case 'cc':
                $value = getLan() == 'np' ? 'नागरिक बडापत्र' : 'Citizen Character';
                break;
        }
    } else {
        $value = [
            'oa' => getLan() == 'np' ? 'कार्यालय स्वचालन' : 'Office Automation',
            'ghs' => getLan() == 'np' ? 'गुनासो तथा सुझाव' : 'Complaint & Suggestion',
            'mm' => getLan() == 'np' ? 'बैठक व्यवस्थापन' : 'Meeting management',
            'cc' => getLan() == 'np' ? 'नागरिक बडापत्र' : 'Citizen Character',
        ];
    }

    return $value;
}

function moduleServiceName($module_name = null): array|string
{
    $value = '';
    if ($module_name != null) {
        switch ($module_name) {
            case 'dispatch_book':
                $value = getLan() == 'np' ? 'चलानी किताब' : 'Dispatch Book';
                break;
            case 'register_book':
                $value = getLan() == 'np' ? 'दर्ता किताब' : 'Register Book';
                break;
            case 'complaint':
                $value = getLan() == 'np' ? 'गुनासो' : 'Complaint';
                break;
            case 'meeting':
                $value = getLan() == 'np' ? 'बैठक' : 'Meeting';
                break;
            case 'appointment':
                $value = getLan() == 'np' ? 'भेटघाट' : 'Appointment';
                break;
            case 'sifaris':
                $value = getLan() == 'np' ? 'सिफारिस' : 'Sifaris';
                break;
        }
    } else {
        $value = [
            'dispatch_book' => getLan() == 'np' ? 'चलानी किताब' : 'Dispatch Book',
            'register_book' => getLan() == 'np' ? 'दर्ता किताब' : 'Register Book',
            'complaint' => getLan() == 'np' ? 'गुनासो' : 'Complaint',
            'meeting' => getLan() == 'np' ? 'बैठक' : 'Meeting',
            'sifaris' => getLan() == 'np' ? 'सिफारिस' : 'Sifaris',
        ];
    }

    return $value;
}

function paginate($items, $perPage = 10, $page = null, $options = [])
{
    $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
    $items = $items instanceof Collection ? $items : Collection::make($items);

    return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
}

function appVersion()
{
    return AppVersion::query()->orderBy('id', 'desc')->latest()->first();
}

function provinceList($data = null): Illuminate\Database\Eloquent\Collection|array
{
    $result = Province::query();

    return $result
        ->select('id', 'code', DB::raw("CONCAT(name_np,  '-' ,name_en) AS name"))
        ->where('status', true)
        ->get();
}

function provinceListByCode($code): Illuminate\Database\Eloquent\Collection|array
{
    $result = Province::query();

    return $result
        ->select('id', 'code', DB::raw("CONCAT(name_np,  '-' ,name_en) AS name"))
        ->where(['code' => $code, 'status' => true])
        ->get();
}

function districtList(): Illuminate\Database\Eloquent\Collection|array
{
    $result = District::query();

    return $result
        ->select('id', 'code', DB::raw("CONCAT(name_np,  '-' ,name_en) AS name"))
        ->where('status', true)
        ->get();
}

function districtListByCode($code): Illuminate\Database\Eloquent\Collection|array
{
    return District::query()
        ->select('id', 'code', DB::raw("CONCAT(name_np,  '-' ,name_en) AS name"))
        ->where(['province_code' => $code, 'status' => true])
        ->get();
}

function localBodyList(): Illuminate\Database\Eloquent\Collection|array
{
    $result = LocalBody::query();

    return $result
        ->select('id', 'code', DB::raw("CONCAT(name_np,  '-' ,name_en) AS name"))
        ->where('status', true)
        ->get();
}

function localBodyListByCode($code): Illuminate\Database\Eloquent\Collection|array
{
    return LocalBody::query()
        ->select('id', 'code', DB::raw("CONCAT(name_np,  '-' ,name_en) AS name"))
        ->where(['district_code' => $code, 'status' => true])
        ->get();
}

function getWardListByLocalBodyCode($code): array
{
    $value = LocalBody::query()
        ->where(['code' => $code, 'status' => true])
        ->first();
    $wardList = range(1, $value ? $value->total_ward : 0);
    $wardNumbers = [];

    $wardList = range(1, $value ? $value->total_ward : 0);
    $wardValueList = [];

    foreach ($wardList as $wardNumber) {
        $wardValueList[] = $wardNumber;
    }

    // Reindex the array starting from 1
    return array_combine(range(1, count($wardValueList)), array_values($wardValueList));
}

function appointmentDepartment($department = null): array|string
{
    $value = '';
    if ($department != null) {
        switch ($department) {
            case 'km':
                $value = getLan() == 'np' ? 'जन-प्रतिनिधि ' : 'Elected Person';
                break;
            case 'om':
                $value = getLan() == 'np' ? 'कर्मचारी' : 'Office Staff';
                break;
        }
    } else {
        $value = [
            'km' => getLan() == 'np' ? 'जन-प्रतिनिधि ' : 'Elected Person',
            'om' => getLan() == 'np' ? 'कर्मचारी' : 'Office Staff',
        ];
    }

    return $value;
}

// check appointment access user info

function fiscalYearList()
{
    return MasterFiscalYear::query()->orderBy('id', 'desc')->get();
}

function apiKeyExpireTimeSetting(): int
{
    $data = AppSetting::first();
    if ($data->api_key_expire_time) {
        $expire_time = $data->api_key_expire_time;
    } else {
        $expire_time = 24;
    }

    return $expire_time;
}

// not used only for reference
function otpSetting($client_id = null)
{
    if (Schema::hasTable('otp_settings')) {
        $value = \App\Models\SystemSetting\OtpSetting::where(['client_id' => $client_id, 'status' => true])->first();
        if (isset($value)) {
            $data = $value;
        } else {
            $data = \App\Models\SystemSetting\OtpSetting::whereNull('client_id')->first();
        }

        return $data;
    }
}

function userLevelType($levelType = null)
{
    $value = '';
    if ($levelType == 'bw') {
        $value = [
            'b' => getLan() == 'np' ? 'शाखा' : 'Branch',
            'w' => getLan() == 'np' ? 'वार्ड' : 'Ward',
        ];

        return $value;
    }
    if ($levelType != null) {
        if (systemAdmin() == true || clientAdmin() == true || oaAdmin() == true) {
            switch ($levelType) {
                case 'b':
                    $value = getLan() == 'np' ? 'शाखा' : 'Branch';
                    break;
                case 'w':
                    $value = getLan() == 'np' ? 'वार्ड' : 'Ward';
                    break;
                case 'e':
                    $value = getLan() == 'np' ? 'जन-प्रतिनिधि' : 'Elected Person';
                    break;
            }
        } else {
            switch ($levelType) {
                case 'b':
                    $value = getLan() == 'np' ? 'शाखा' : 'Branch';
                    break;
                case 'w':
                    $value = getLan() == 'np' ? 'वार्ड' : 'Ward';
                    break;
            }
        }
    } else {
        if (systemAdmin() == true || clientAdmin() == true || oaAdmin() == true) {
            $value = [
                'b' => getLan() == 'np' ? 'शाखा' : 'Branch',
                'w' => getLan() == 'np' ? 'वार्ड' : 'Ward',
                'e' => getLan() == 'np' ? 'जन-प्रतिनिधि' : 'Elected Person',
            ];
        } else {
            $value = [
                'b' => getLan() == 'np' ? 'शाखा' : 'Branch',
                'w' => getLan() == 'np' ? 'वार्ड' : 'Ward',
            ];
        }
    }

    return $value;
}

function roleModule($module_name = null): array|string
{
    $value = '';
    if ($module_name != null) {
        switch ($module_name) {
            case 'all':
                $value = getLan() == 'np' ? 'सबै' : 'All';
                break;
            case 'oa':
                $value = getLan() == 'np' ? 'कार्यालय स्वचालन' : 'Office Automation';
                break;
            case 'ghs':
                $value = getLan() == 'np' ? 'गुनासो तथा सुझाव' : 'Complaint & Suggestion';
                break;
            case 'mm':
                $value = getLan() == 'np' ? 'बैठक व्यवस्थापन' : 'Meeting Management';
                break;
            case 'cc':
                $value = getLan() == 'np' ? 'नागरिक बडापत्र' : 'Citizen Character';
                break;
            case 'app':
                $value = getLan() == 'np' ? 'भेटघाट' : 'Appointment';
                break;
        }
    } else {
        $value = [
            'all' => getLan() == 'np' ? 'सबै' : 'All',
            'oa' => getLan() == 'np' ? 'कार्यालय स्वचालन' : 'Office Automation',
            'ghs' => getLan() == 'np' ? 'गुनासो तथा सुझाव' : 'Complaint & Suggestion',
            'mm' => getLan() == 'np' ? 'बैठक व्यवस्थापन' : 'Meeting management',
            'cc' => getLan() == 'np' ? 'नागरिक बडापत्र' : 'Citizen Character',
            'app' => getLan() == 'np' ? 'भेटघाट' : 'Appointment',
        ];
    }

    return $value;
}

function clientLogoPath()
{
    return 'uploads/clientLogo/';
}

function clientSloganPath()
{
    return 'uploads/clientSlogan/';
}

// For Chat

/**
 * @return string[]
 */

/**
 * @return HigherOrderBuilderProxy|mixed
 */
function getCurrentLanguageName()
{
    static $language;

    if (!empty($language)) {
        return $language;
    }

    // return User::whereId(Auth::id())->first()->language;
    return $language;
}

/**
 * @return User
 */
function getLoggedInUser()
{
    return Auth::user();
}

function isValidURL($url)
{
    return filter_var($url, FILTER_VALIDATE_URL);
}

function getDefaultAvatar()
{
    return asset('assets/images/avatar.png');
}

/**
 * return random color.
 *
 * @param int $userId
 *
 * @return string
 */
function getRandomColor($userId)
{
    $colors = ['329af0', 'fc6369', 'ffaa2e', '42c9af', '7d68f0'];
    $index = $userId % 5;

    return $colors[$index];
}

/**
 * return avatar url.
 *
 * @return string
 */
function getAvatarUrl()
{
    return 'https://ui-avatars.com/api/';
}

/**
 * return avatar full url.
 *
 * @param int    $userId
 * @param string $name
 *
 * @return string
 */
function getUserImageInitial($userId, $name)
{
    return getAvatarUrl()."?name=$name&size=100&rounded=true&color=fff&background=".getRandomColor($userId);
}

/**
 * @return array
 */

/**
 * @return mixed|string
 */

/**
 * @return mixed|string
 */

/**
 * @return string
 */
function getLogoUrl()
{
    static $logoURL;

    if (!empty($logoURL)) {
        return $logoURL;
    }

    $setting = Setting::where('key', '=', 'logo_url')->first();

    return (!empty($setting) && !empty($setting->value)) ? app(Setting::class)->getLogoUrl($setting->value) : asset('assets/images/logo.png');
}

/**
 * @return string
 */

/**
 * @return string
 */
function getFaviconUrl()
{
    $setting = ChatSetting::where('key', '=', 'favicon_url')->first();
    $favicon = (!empty($setting) && !empty($setting->value)) ? $setting->value : asset('assets/images/favicon/favicon-16x16.ico');

    return url('/uploads').'/'.$favicon;
}

/**
 * @return int|mixed
 */

/**
 * @return int|mixed
 */

/**
 * @return bool
 */
function checkUserStatusForGroupMember($userStatus)
{
    return ($userStatus != null) ? true : false;
}

/**
 * @param int $gender
 *
 * @return string
 */
function getGender($gender)
{
    if ($gender == 1) {
        return 'male';
    }
    if ($gender == 2) {
        return 'female';
    }

    return '';
}

/**
 * @param int $status
 *
 * @return string
 */
function getOnOffClass($status)
{
    if ($status == 1) {
        return 'online';
    }

    return 'offline';
}

function getTimeZone(): array
{
    return DateTimeZone::listIdentifiers();
}

/**
 * @return Application|UrlGenerator|string
 */

/**
 * @return string
 */
function getCurrentVersion()
{
    $composerFile = file_get_contents('../composer.json');
    $composerData = json_decode($composerFile, true);

    return $composerData['version'];
}

/**
 * @return bool|HigherOrderBuilderProxy|mixed
 */
function version()
{
    $composerFile = file_get_contents('../composer.json');
    $composerData = json_decode($composerFile, true);

    return $composerData['version'];
}

function localBodyCode()
{
    // check client info
    $clientInfo = AppClient::query()->where('id', clientInfo()->id)->first();
    $value = LocalBody::query()
        ->where('id', $clientInfo->local_body_mapping_id)
        ->first();

    return $value->code;
}

function branchInfo($branchId = null)
{
    return \App\Models\BasicDetails\MstDepartment::query()->where('id', $branchId ?? userInfo()->branch_id)
        ->first();
}

function branchDeptype($type = null)
{
    $value = '';
    if ($type != null) {
        switch ($type) {
            case 'department':
                $value = getLan() == 'np' ? 'विभाग' : 'Department';
                break;
            case 'branch':
                $value = getLan() == 'np' ? 'शाखा' : 'Branch';
                break;
            case 'main_branch':
                $value = getLan() == 'np' ? 'महा शाखा' : 'Main Branch';
                break;
            case 'ward':
                $value = getLan() == 'np' ? 'वार्ड' : 'Ward';
                break;
        }
    } else {
        $value = [
            'department' => getLan() == 'np' ? 'विभाग' : 'Department',
            'branch' => getLan() == 'np' ? 'शाखा' : 'Branch',
            'main_branch' => getLan() == 'np' ? 'महा शाखा' : 'Main Branch',
            'ward' => getLan() == 'np' ? 'वार्ड' : 'Ward',
        ];
    }

    return $value;
}

function employeeType($type = null)
{
    $value = '';
    if ($type != null) {
        switch ($type) {
            case 'branch':
                $value = getLan() == 'np' ? 'शाखा/महा शाखा/विभाग' : 'Branch/Main Branch/Department';
                break;
            case 'ward':
                $value = getLan() == 'np' ? 'वार्ड' : 'Ward';
                break;
        }
    } else {
        $value = [
            'branch' => getLan() == 'np' ? 'शाखा/महा शाखा/विभाग' : 'Branch/Main Branch/Department',
            'ward' => getLan() == 'np' ? 'वार्ड' : 'Ward',
        ];
    }

    return $value;
}

function oaAdmin()
{
    if (userInfo()->client_id != null && userInfo()->user_module == 'oa' && userInfo()->role_id == 4 && !userInfo()->is_branch_user && !userInfo()->is_ward_user) {
        return true;
    } else {
        return false;
    }
}

function ghsAdmin()
{
    if (userInfo()->client_id != null && userInfo()->user_module == 'ghs' && userInfo()->role_id == 5) {
        return true;
    } else {
        return false;
    }
}

function ccAdmin()
{
    if (userInfo()->client_id != null && userInfo()->user_module == 'cc' && userInfo()->role_id == 6) {
        return true;
    } else {
        return false;
    }
}

function mmAdmin()
{
    if (userInfo()->client_id != null && userInfo()->user_module == 'mm' && userInfo()->role_id == 7) {
        return true;
    } else {
        return false;
    }
}

// Suchkrit helper function

if (!function_exists('maritalStatusOptions')) {
    function maritalStatusOptions()
    {
        return [
            1 => 'Single',
            2 => 'Married',
            3 => 'Divorced',
            // Add more options as needed
        ];
    }
}

if (!function_exists('genderOptions')) {
    function genderOptions()
    {
        return [
            1 => 'Male',
            2 => 'Female',
            3 => 'Other',
            // Add more options as needed
        ];
    }
}

if (!function_exists('languageOptions')) {
    function languageOptions()
    {
        return [
            1 => 'English',
            2 => 'Nepali',
            3 => 'Spanish',
            // Add more options as needed
        ];
    }
}

if (!function_exists('religionOptions')) {
    function religionOptions()
    {
        return [
            1 => 'Hindu',
            2 => 'Buddhist',
            3 => 'Christian',
            // Add more options as needed
        ];
    }
}

function signatureFilePath()
{
    return 'uploads/files/signature_files';
}

function currentNepaliDate()
{
    return (new \App\Helpers\DateConverter())->eng_to_nep(Carbon::now()->toDateString());
}

function currentEnglishDate()
{
    return Carbon::now()->toDateString();
}

function userList()
{
    if (branchUser() == true) {
        return User::query()
            ->where(['client_id' => userInfo()->client_id, 'branch_id' => userInfo()->branch_id])
            ->select(
                'id',
                DB::raw("CONCAT(full_name_np,'-' ,full_name) AS full_name")
            );
    } elseif (wardUser() == true) {
        return User::query()
            ->where(['client_id' => userInfo()->client_id, 'ward_no' => userInfo()->ward_no])
            ->select(
                'id',
                DB::raw("CONCAT(full_name_np,'-' ,full_name) AS full_name")
            );
    } elseif (systemAdmin() == false) {
        return User::query()
            ->where('client_id', userInfo()->client_id)
            ->select(
                'id',
                DB::raw("CONCAT(full_name_np,'-' ,full_name) AS full_name")
            );
    } else {
        return User::query()
            ->select(
                'id',
                DB::raw("CONCAT(full_name_np,'-' ,full_name) AS full_name")
            );
    }
}

function checkUserSwitch()
{
    if (userInfo()->is_user_switch_role) {
        return true;
    } else {
        return false;
    }
}

function dataSource($type = null): array|string
{
    $value = '';
    if ($type != null) {
        switch ($type) {
            case 'web':
                $value = getLan() == 'np' ? 'वेबसाइट' : 'Website';
                break;
            case 'mobile_app':
                $value = getLan() == 'np' ? 'एप' : 'App';
                break;
        }
    } else {
        $value = [
            'web' => getLan() == 'np' ? 'वेबसाइट' : 'Website',
            'mobile_app' => getLan() == 'np' ? 'एप' : 'App',
        ];
    }

    return $value;
}

function userDetails($userId)
{
    $userInfo = User::query()->where('id', $userId)->first();
    if ($userInfo->is_branch_user) {
        $user = User::query()
            ->leftJoin('mst_department as d', 'd.id', 'users.branch_id')
            ->leftJoin('hr_employee as e', 'e.id', 'users.employee_id')
            ->leftJoin('hr_designation as hr', 'hr.id', 'e.hr_designation_id')
            ->where('users.id', $userInfo->id)
            ->select(
                'users.full_name_np as name_np',
                'full_name as name_en',
                'd.name_np as branch_name_np',
                'd.name_en as branch_name_en',
                'hr.name_np as designation_name_np',
                'hr.name_en as designation_name_en'
            )->first();
    } else {
        $user = null;
    }

    return $user;
}

function nepalSambatDate($date = null)
{
    $year = explode('-', $date)[0];
    $month = explode('-', $date)[1];
    $day = explode('-', $date)[2];
    $fullDate = $month.'-'.$day.'-'.$year;
    $query = \App\Models\MasterSettings\NepalSambat::query()->where('bs_date', $fullDate)->first();
    if ($query) {
        return $query->full_date;
    } else {
        return null;
    }
}

function getEmployeeDetail($userId)
{
    $userInfo = User::query()->where('id', $userId)->first();

    return Employee::query()
        ->leftJoin('hr_designation as hrd', 'hrd.id', 'hr_employee.hr_designation_id')
        ->leftJoin('mst_department as md', 'md.id', 'hr_employee.branch_id')
        ->where('hr_employee.id', $userInfo->employee_id)
        ->select(
            'hrd.name_np as designation_np',
            'hrd.name_en as designation_en',
            'md.name_np as branch_np',
            'md.name_en as branch_en',
            DB::raw("CONCAT(hr_employee.first_name_np,' ' ,hr_employee.middle_name_np,' ',hr_employee.last_name_np) AS full_name_np"),
            DB::raw("CONCAT(hr_employee.first_name_en,' ' ,hr_employee.middle_name_en,' ',hr_employee.last_name_en) AS full_name_en"),
            'hr_employee.signature_file',
        )
        ->first();
}
function getElectedDetail($userId)
{
    $userInfo = User::query()->where('id', $userId)->first();

    return ElectedPerson::query()
        ->leftJoin('member_types as hrd', 'hrd.id', 'elected_persons.hr_designation_id')
        ->where('elected_persons.id', $userInfo->elected_id)
        ->select(
            'hrd.name_np as designation_np',
            'hrd.name_en as designation_en',
            'elected_persons.name_np as full_name_np',
            'elected_persons.name_en as full_name_en',
            'elected_persons.email',
            'elected_persons.signature_file',
        )
        ->first();
}

function getUserDetail($userId)
{
    return User::query()->where('id', $userId)->first();
}

function getServiceDocumentName($docId)
{
    if ($docId) {
        $response = ServiceRelatedDocumentType::where('id', $docId)->first();

        return getLan() == 'np' ? $response->name_np : $response->name_en;
    }
}

function getDesignationFromId($designationId)
{
    if ($designationId) {
        $response = HrDesignation::where('id', $designationId)->first();

        return getLan() == 'np' ? $response->name_np : $response->name_en;
    }
}

function getElectedPersonPosition($designationId)
{
    if ($designationId) {
        $response = MemberType::where('id', $designationId)->first();

        return getLan() == 'np' ? $response->name_np : $response->name_en;
    }
}

function getUserName($userId)
{
    if ($userId) {
        $response = User::where('id', $userId)->first();

        return getLan() == 'np' ? $response->full_name_np : $response->full_name;
    }
}

function userRoleLevelName(): string
{
    $roleName = '';
    if (isSuperAdmin()) {
        $roleName = getLan() == 'np' ? 'सुपर प्रशासक' : 'Super Admin';
    } elseif (isCentralAdmin()) {
        $roleName = getLan() == 'np' ? 'प्रशासक  प्रयोगकर्ता' : 'Admin  User';
    } elseif (clientAdmin()) {
        $roleName = getLan() == 'np' ? 'स्थानीय तह प्रशासक  प्रयोगकर्ता' : 'Local Body Admin  User';
    } elseif (ghsAdmin()) {
        $roleName = getLan() == 'np' ? ' गुनासो तथा सुझाव प्रशासक प्रयोगकर्ता' : 'GHS Admin User';
    } elseif (ccAdmin()) {
        $roleName = getLan() == 'np' ? ' नागरिक बडापत्र प्रशासक प्रयोगकर्ता' : 'DCC Admin User';
    } elseif (mmAdmin()) {
        $roleName = getLan() == 'np' ? 'बैठक प्रशासक प्रयोगकर्ता' : 'Meeting User';
    } elseif (oaAdmin()) {
        $roleName = getLan() == 'np' ? 'कार्यालय स्वचालन प्रशासक  प्रयोगकर्ता' : 'OA Admin  User';
    } elseif (branchUser() && isEmployeeUser()) {
        $roleName = getLan() == 'np' ? 'शाखा/विभाग प्रयोगकर्ता' : 'Branch/Department User';
    } elseif (wardUser() && isEmployeeUser()) {
        $roleName = getLan() == 'np' ? 'वडा  प्रयोगकर्ता' : 'Ward  User';
    } elseif (isKaryapalikaUser()) {
        $roleName = getLan() == 'np' ? 'जनप्रतिनिधि  प्रयोगकर्ता' : 'Elected  User';
    }

    return $roleName;
}

function isSuperAdmin(): bool
{
    return userInfo()->role_id == 1 ? true : false;
}

function isCentralAdmin(): bool
{
    return userInfo()->role_id == 2 ? true : false;
}

function isEmployeeUser(): bool
{
    return userInfo()->is_employee_user == 1 ? true : false;
}

function isKaryapalikaUser(): bool
{
    return userInfo()->is_karyapalika_user == 1 ? true : false;
}

// get assigned user info
function getAssignedUserInfo($userId)
{
    $userInfo = User::query()
        ->where('id', $userId)
        ->first();
    if (isset($userInfo)) {
        if ($userInfo->elected_id != null) {
            return ElectedPerson::query()
                ->leftJoin('member_types as hrd', 'hrd.id', 'elected_persons.hr_designation_id')
                ->where('elected_persons.id', $userInfo->elected_id)
                ->select(
                    'hrd.name_np as designation_np',
                    'hrd.name_en as designation_en',
                    'elected_persons.name_np as full_name_np',
                    'elected_persons.name_en as full_name_en',
                    'elected_persons.email',
                )
                ->first();
        } else {
            return Employee::query()
                ->leftJoin('hr_designation as hrd', 'hrd.id', 'hr_employee.hr_designation_id')
                ->leftJoin('mst_department as md', 'md.id', 'hr_employee.branch_id')
                ->where('hr_employee.id', $userInfo->employee_id)
                ->select(
                    'hrd.name_np as designation_np',
                    'hrd.name_en as designation_en',
                    'hr_employee.email',
                    'md.name_np as branch_np',
                    'md.name_en as branch_en',
                    'hr_employee.ward_no',
                    'hrd.code as emp_desg_code',
                    DB::raw("CONCAT(hr_employee.first_name_np,' ' ,hr_employee.middle_name_np,' ',hr_employee.last_name_np) AS full_name_np"),
                    DB::raw("CONCAT(hr_employee.first_name_en,' ' ,hr_employee.middle_name_en,' ',hr_employee.last_name_en) AS full_name_en"),
                )
                ->first();
        }
    }
}

// check access module
// allow front end module
function allowFrontEnd(): bool
{
    return settingStatusInfo('AFE') || env('ALLOW_FRONTEND');
}

// allow app allow address
function allowAppAddress(): bool
{
    return settingStatusInfo('AAA') || env('ALLOW_APP_ADDRESS');
}

// allo office automation module
function allowOAModule(): bool
{
    return settingStatusInfo('OAMA') || env('ALLOW_OA_MODULE');
}

// allo meeting management module
function allowMMModule(): bool
{
    return settingStatusInfo('MMMA') || env('ALLOW_MM_MODULE');
}

// allo meeting management module
function allowCCModule(): bool
{
    return settingStatusInfo('CCMA') || env('ALLOW_CC_MODULE');
}

function allowGHSModule(): bool
{
    return settingStatusInfo('GHSMA') || env('ALLOW_GHS_MODULE');
}

// local body mapping id
function checkClientMappingId($q)
{
    return $q->whereHas('client', function ($q) {
        $q->where('local_body_mapping_id', clientInfo()->mapping_client_id);
    });
    // return $q->where('client_id', clientInfo()->id);
}

// check top 3 layer user type (  palaika pramukha , palika upa pramukha , palika main officer , palika assistant officeer )

/*
 * check tippani action  date  show */

function actionDatePicker(): array
{
    if (getLan() == 'np') {
        return [
            'action_from_date' => 'action_from_date_np',
            'action_to_date' => 'action_to_date_np',
            'dateClass' => 'nepaliDatePicker',
        ];
    } else {
        return [
            'action_from_date' => 'action_from_date_en',
            'action_to_date' => 'action_to_date_en',
            'dateClass' => 'englishDatePicker',
        ];
    }
}

function appName()
{
    // $appInfo = SystemSetting::query()->where('client_id', clientInfo()->id)->first();
    // if ($appInfo) {
    //     return getLan() == 'np' ? $appInfo->app_name_np : $appInfo->app_name;
    // }

    return null;
}

function getEmployeeDetailById($id)
{
    if ($id) {
        $response =
            Employee::query()
            ->leftJoin('hr_designation as hrd', 'hrd.id', 'hr_employee.hr_designation_id')
            ->leftJoin('mst_department as md', 'md.id', 'hr_employee.branch_id')
            ->where('hr_employee.id', $id)
            ->select(
                'hrd.name_np as designation_np',
                'hrd.name_en as designation_en',
                'md.name_np as branch_np',
                'md.name_en as branch_en',
                DB::raw("CONCAT(hr_employee.first_name_np,' ' ,hr_employee.middle_name_np,' ',hr_employee.last_name_np) AS full_name_np"),
                DB::raw("CONCAT(hr_employee.first_name_en,' ' ,hr_employee.middle_name_en,' ',hr_employee.last_name_en) AS full_name_en"),
            )
            ->first();

        return getLan() == 'np' ? $response->full_name_np : $response->full_name_en;
    }
}

function branchDetail($branchId = null)
{
    if ($branchId) {
        $branchInfo = MstDepartment::query()->where('id', $branchId)
            ->first();

        return getLan() == 'np' ? $branchInfo->name_np : $branchInfo->name_en;
    }
}

function getLetterHeadDetails($wardNo = null, $branchId = null)
{
    $clientId = clientInfo()->id;

    if ($wardNo && $branchId) {
        return null;
    }

    if ($wardNo) {
        $response = LetterHead::where([
            'client_id' => $clientId, 'ward_no' => $wardNo,
        ])->first();
    }

    if ($branchId) {
        $response = LetterHead::where([
            'client_id' => $clientId, 'branch_id' => $branchId,
        ])->first();
    }
    if ($response) {
        return getLan() == 'np' ? $response->header_content_np : $response->header_content_en;
    }

    return null;
}

function getLetterFooterDetails($wardNo = null, $branchId = null)
{
    $clientId = clientInfo()->id;

    if ($wardNo && $branchId) {
        return null;
    }

    if ($wardNo) {
        $response = LetterHead::where([
            'client_id' => $clientId, 'ward_no' => $wardNo,
        ])->first();
    }

    if ($branchId) {
        $response = LetterHead::where([
            'client_id' => $clientId, 'branch_id' => $branchId,
        ])->first();
    }
    if ($response) {
        return getLan() == 'np' ? $response->footer_content_np : $response->footer_content_en;
    }

    return null;
}

/**
 * Returns a success response.
 *
 * @param string|null $msg
 */

/**
 * Returns an error response.
 */
function errorResponse(string $msg, int $responseCode = 404): JsonResponse
{
    $response = [
        'responseCode' => $responseCode,
        'success' => false,
        'errors' => [
            ['message' => $msg],
        ],
    ];

    return response()->json($response, $responseCode);
}

/**
 * Returns an validation  response.
 */
function validationResponse($errors): Response
{
    throw new HttpResponseException(response()->json(['responseCode' => 422, 'success' => false, 'message' => trans('validation.validation_errors'), 'errors' => $errors], 422));
}

/**
 * Returns default pagination value.
 */
function pagination(): int
{
    return 20;
}

/**
 * Returns default default ordering.
 */
function direction(): string
{
    return 'desc';
}

if (!function_exists('renderMenu')) {
    function renderMenu($menus, $user)
    {
        $html = '';

        foreach ($menus as $menu) {
            // Check if the user is a superadmin
            if (@$user->role->role_level == 'system_admin') {
                // Superadmin logic: show all menus
                $html .= renderMenuItem($menu, $user);
            } else {
                // Non-superadmin logic: check permissions
                $userRole = UserRole::where('role_id', $user->role_id)
                    ->where('menu_id', $menu->id)
                    ->where('allow_index', true)
                    ->first();

                if ($userRole) {
                    $html .= renderMenuItem($menu, $user);
                }
            }
        }

        return $html;
    }
}

if (!function_exists('renderMenuItem')) {
    function renderMenuItem($menu, $user)
    {
        $name = getLan() == 'np' ? 'menu_name_np' : 'menu_name';
        $html = '<li class="nav-item'.($menu->children->isNotEmpty() ? ' has-treeview' : '').'">';
        $html .= '<a href="'.($menu->menu_link ?? '#').'" class="nav-link">';
        $html .= '<i class="'.$menu->menu_icon.' nav-icon"></i>';
        $html .= '<p>'.$menu->$name.($menu->children->isNotEmpty() ? ' <i class="right fas fa-angle-left"></i>' : '').'</p>';
        $html .= '</a>';

        if ($menu->children->isNotEmpty()) {
            $html .= '<ul class="nav nav-treeview">';
            $html .= renderMenu($menu->children, $user);
            $html .= '</ul>';
        }

        $html .= '</li>';

        return $html;
    }
}

if (!function_exists('getModules')) {
    function getModules()
    {
        $language = getLan();

        return [
            'all' => $language == 'np' ? 'सबै' : 'All',
            'idcard' => $language == 'np' ? 'परिचय पत्र' : 'ID Card',
            'sifarish' => $language == 'np' ? 'सिफारिस' : 'Recommendation',
        ];
    }
}

if (!function_exists('getParentMenus')) {
    function getParentMenus(): Collection
    {
        $menus = Menu::where('parent_id', 0)->get();
        if (sizeof($menus) > 0) {
            return $menus;
        }

        return null;
    }
}

function roleName($roleId): string
{
    $language = getLan();

    $role = Role::find($roleId);
    if ($role) {
        return $language == 'np' ? $role->name_np : $role->name_en;
    }

    return null;
}
