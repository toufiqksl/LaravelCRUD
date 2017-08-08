<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use View;

class UserController extends Controller
{

    //
    public function index()
    {
        $users = User::all();
        return View::make("list_user")->with(array(
            'users' => $users
        ));
    }

    public function preRegister()
    {
        return view('register');
    }

    public function postRegister(Request $request)
    {
        // Insert into DB
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->email;
        $user->password = $request->password;
        
        $user->save();
        
        return $this->index();
    }

    public function edit($id)
    {
        $user = User::find($id);
        return View::make("edit")->with(array(
            'user' => $user
        ));
    }

    public function update(Request $request)
    {
        // Update into DB
        $user = new User();
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        
        $user->save();
        
        return $this->index();
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if ($user != null) {
            $user->delete();
            return $this->index(); // can redirect with a view with success message
        }
    }
}
