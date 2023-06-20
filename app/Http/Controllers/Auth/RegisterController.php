<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\Mailer;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Mail;
use Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
     */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'terms' => ['accepted'],
        ],
            $messages = [
                'firstname.required' => '姓は必須項目です。',
                'lastname.required' => '名は必須項目です。',
                'email.required' => 'メールアドレスは必須項目です。',
                'email.email' => 'メールアドレスの形式が正しくありません。',
                'email.unique' => '入力したメールアドレスは既に使用されています。',
                'password.required' => 'パスワードは必須項目です。',
                'password.min' => 'パスワードは8文字以上で入力してください。',
                'password.confirmed' => 'パスワードとパスワード確認が一致しません。',
                'terms.accepted' => '登録するには利用規約に同意する必要があります。',
            ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data): \Illuminate\View\View
    {
        $user = User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        // event(new Registered($user));

        // $user->notify(new VerifyEmail);

        Auth::login($user);

        return view('auth.verify');
    }

    public function register(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'terms' => ['accepted'],
        ],
            $messages = [
                'email.required' => 'メールアドレスは必須項目です。',
                'email.email' => 'メールアドレスの形式が正しくありません。',
                'email.unique' => '入力したメールアドレスは既に使用されています。',
                'password.required' => 'パスワードは必須項目です。',
                'password.min' => 'パスワードは8文字以上で入力してください。',
                'password.confirmed' => 'パスワードとパスワード確認が一致しません。',
                'terms.accepted' => '登録するには利用規約に同意する必要があります。',
            ]);

        // $user = User::create([
        //     'firstname' => $request->firstname,
        //     'lastname' => $request->lastname,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        //     'remember_token' => "wer"
        // ]);

        $user = new User();
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->remember_token = Str::random(64);
        $user->save();

        Mail::to($user->email)->send(new Mailer($user));

        return view('sent_verify');
    }
}
