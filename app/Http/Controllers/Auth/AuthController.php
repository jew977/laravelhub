<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
//use Redirect;
class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    protected $redirectPath = '/article';
    protected $redirectTo = '/article';
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        
        $message=[
            'name.required'=>'用户名不为空',
            'email.required'=>'email不为空，且最大长度为255',
            'password.required'=>'密码不为空，最小字符长度为6',
            'password.confirmed'=>'密码输入要匹配一致',
            'password_confirmation.required'=>'确认密码不为空'
            ];
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'password_confirmation'=>'required'
        ],$message);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
    
   protected function getregister(){
       return view('auth.register');
   }
   
   protected function postRegister(Request $request){
       $validator=$this->validator($request->all());
       if($validator->fails()){
       return redirect('auth/register')->withErrors($validator)->with('message','注册失败，请重新填写');
       }
           $res=$this->create($request->all());//用户注册成功
           return redirect('auth/login')->with('message','恭喜你，注册成功');
    }
    
    protected function getLogin(){
        return view('auth.login');
    }
    
    
    protected function postLogin(Request $request){
     $roules=[
         'name' => 'required',
         'password' => 'required|min:6',
         'remember_me'=>'boolean',
         ];
         $message=[
             'name.required'=>'用户名或email不为空;',
             'password.required'=>'&nbsp;&nbsp;密码不为空;',
             ];
             $validator=Validator::make($request->all(),$roules,$message);
    if($validator->fails()){
                 return redirect('auth/login')->withInput()->withErrors($validator);
                 
             }else{
      $usernameinput = $request->input('name');
      $password=$request->input('password');
      $field = filter_var($usernameinput, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        if (Auth::attempt(array($field => $usernameinput, 'password' => $password), true)) {
            return  redirect('home')->with('message','登陆成功');
        }else{
            return redirect('auth/login')->withInput()->with('message', 'E-mail or password error');
        }  
    }  
}
   protected function getLogout(){
       if(Auth::check()){
       Auth::logout();
       }
       return redirect('auth/login');
     //  return Redirect::Route('login');
   }
}
