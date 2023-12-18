<?php

namespace App\Http\Controllers;




use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

   public function __construct()
    {
        $this->middleware('permission:user.store', ['only' => ['store']]);
        $this->middleware('permission:user.update', ['only' => ['update']]);
        $this->middleware('permission:user.destroy', ['only' => ['destroy']]);
        $this->middleware('permission:user.report_of_user', ['only' => ['report_of_user']]);

    }

    public function index()
    {
        $users=User::all();
        $roles = Role::pluck('name','name')->all();
        return view('users.index',compact('users','roles'));
    }

    public function store(Request $request)
    {
        $data=$request->except(['role','_token','password_confirmation']);
          $user= User::create([
              ...$data,
              ]);
        $user->assignRole($request->input('role'));
        return redirect()->back();
    }

    public function update(Request $request ,$id)
    {
        $user = User::find($id);
        User::where('id',$user->id)->update($request->except(['role','_token','password_confirmation','_method']));
        $user->syncRoles($request->get('role'));
        return redirect()->back();
    }

    public function destroy($id)
    {
        User::where('id',$id)->delete();
        return redirect()->back();
    }

}
