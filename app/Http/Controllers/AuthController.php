<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class AuthController extends Controller
{

    public function profile(){
        return view('profile');
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function dashboard(Request $request) {

        if(!Auth::guard('admin')->check()) {
            return redirect('/admin-login');
        }

        $search = $request->input('search');
    
        $query = User::query();
    
        if ($search) {
            $query->where(function($query) use ($search) {
                $query->where(DB::raw("CONCAT(firstname, ' ', lastname)"), 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%");
            });
        }
    
        $users = $query->get();
    
        return view('dashboard', ['users' => $users, 'search' => $search]);
    }

    public function register(Request $request){
        try {

            $request->validate([
                'firstname' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'birth_date' => 'required|date',
                'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'gender' => 'required|in:0,1',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8',
                'confirm_password' => 'required|min:8',
            ]);
            
            if ($request->password !== $request->confirm_password) {
                throw new Exception("Passwords do not match");
            }

            $image = Storage::putFile('public/images', $request->file('cover_image'));
            $image = basename($image);

            $socials = "";
            if(!empty($request->social)){
                $socials = explode(",", $request->social);
            }

            $user = new User();
            $user->firstname = $request->firstname;
            $user->lastname = $request->lastname;
            $user->birth_date = $request->birth_date;
            $user->cover_image = $image;
            $user->gender = $request->gender;
            $user->social = $socials;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            $export['success'] = true;
        } catch (Exception $th) {
            $export['success'] = false;
            $export['msg'] = $th->getMessage();
            // $export['line'] = $th->getLine();
        }

        return response()->json($export);
    }
    public function login(Request $request){
        try {

            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if (!Auth::attempt([
                'email' => $request->email,
                'password' => $request->password,
            ])){
                throw new Exception("Invalid email or password");
            }
            
            $export['success'] = true;
        } catch (Exception $th) {
            $export['success'] = false;
            $export['msg'] = $th->getMessage();
        }

        return response()->json($export);
    }

    public function adminLogin(Request $request){
        try {

            $credentials = $request->only('username', 'password');

            if (!Auth::guard('admin')->attempt($credentials)) {
                throw new Exception("Invalid username or password");
            }
            
            $export['success'] = true;
        } catch (Exception $th) {
            $export['success'] = false;
            $export['msg'] = $th->getMessage();
        }

        return response()->json($export);
    }
}
