<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/app';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function username(): string
    {
        $identity = request()->get('identity');
        if (filter_var($identity, FILTER_VALIDATE_INT) == true) {
            $fieldName = 'mobile_no';
        } elseif (filter_var($identity, FILTER_VALIDATE_EMAIL) == true) {
            $fieldName = 'email';
        } else {
            $fieldName = 'login_user_name';
        }
        request()->merge([$fieldName => $identity]);

        return $fieldName;
    }
    public function login(Request $request)
    {
        try {

            //check form validation
            $messages = [
                'identity.required' => trans('auth.login.identity_required'),
                'password.min' => trans('auth.login.password_min'),
                'password.required' => trans('auth.login.password_required'),
            ];
            //check captcha validation

            $request->validate([
                'identity' => 'required|string',
                'password' => 'required|min:6|string',
            ], $messages);

            //set remember me function
            if ($request->rememberme === null) {
                setcookie('login_email', $request->identity, 100);
                setcookie('login_pass', $request->password, 100);
            } else {
                setcookie('login_email', $request->identity, time() + 60 * 60 * 24 * 100);
                setcookie('login_pass', $request->password, time() + 60 * 60 * 24 * 100);
            }
            //default validation check
            // $this->validateLogin($request);
            $user = User::where($this->username(), $request->identity)->first();
            session()->put('fiscal_year_code', currentFy()->code);
            session()->put('fiscal_year_id', currentFy()->id);
            session()->put('client_id', $user->client_id);
            session()->put('ward_no', $user->ward_no);
            session()->put('branch_id', $user->branch_id);




            if (isset($user)) {
                if (!Hash::check($request->password, $user->password)) {
                    // $errors = [$this->username() => trans('auth.invalid_password')];
                Session::flash('password_incorrect', trans('auth.invalid_password'));


                    return redirect()->back();
                        // ->withInput($request->only($this->username(), 'remember'))
                        // ->withErrors($errors);
                }
            } 

            // If the class is using the ThrottlesLogins trait, we can automatically throttle
            // the login attempts for this application. We'll key this by the username and
            // the IP address of the client making these requests into this application.
            if ($this->hasTooManyLoginAttempts($request)) {
                $this->fireLockoutEvent($request);

                return $this->sendLockoutResponse($request);
            }

            if ($this->attemptLogin($request)) {
                return $this->sendLoginResponse($request);
            }

            // If the login attempt was unsuccessful we will increment the number of attempts
            // to login and redirect the user back to the login form. Of course, when this
            // user surpasses their maximum number of attempts they will get locked out.
            $this->incrementLoginAttempts($request);

            return $this->sendFailedLoginResponse($request);
        } catch (Exception $e) {
           
                Session::flash('message', $e->getMessage());
          
            
            return back();
        }
    }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
}
