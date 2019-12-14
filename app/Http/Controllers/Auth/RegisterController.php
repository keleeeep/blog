<?php
namespace App\Http\Controllers\Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Rules\Uppercase;
use Session;
use mysql_xdevapi\Exception;

class RegisterController extends Controller
{
    use RegistersUsers;
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';
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
            'npm' => ['required','string','max:8','alpha_num','regex:/[5]\w[4]\w{5}/i',new Uppercase],
            'email' => ['required', 'string', 'max:255', 'unique:users','regex:/(\W|^)[\w.+\-]*@student\.gunadarma\.ac\.id(\W|$)/'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $npm = $data['npm'];
        $email = $data['email'];

        $email = strtok($email, '@');

        $ch = curl_init("http://".$npm.".student.gunadarma.ac.id/");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        curl_close($ch);

        $re1 = '/^(: \w.+\s[?=[@\]])/m';

        $re = '/(?<=<td>).*?(?=<\/td>)/';
        preg_match_all($re, $response ,$matches);

        $enc = json_decode(json_encode($matches));
        preg_match($re1, $enc[0][9], $result);

        $name = ucwords(strtolower(trim($enc[0][5],":")));

        $user = "";
        if(array_key_exists(0,$result)) {
            $user = trim(substr(strtok($result[0], '['),2));
        }

        if ($email == $user) {
            $user = User::create([
                'npm' => $data['npm'],
                'name' => $name,
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
            return $user;
        }
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        if ($user != null) {
            $this->guard()->login($user);
            return $this->registered($request, $user)
                ?: redirect($this->redirectPath());
        }

        Session::flash('error','Email and NPM doesnt match!');

        return redirect()->back();
    }
}
