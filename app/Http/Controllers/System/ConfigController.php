<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use Validator;
use App\User;
use Auth;
use Hash;
use DB;
use App\Http\Requests;
use App\Models\System;

class ConfigController extends CommonController
{

    public function __construct()
    {
        parent::__construct();
        view()->share(['_set' => 'am-in']);
    }

    public function index()
    {
        $system = System::find(1);
        return view('admin.config.index')->with('system',$system);
    }

    public function update(Request $request)
    {
        $system = System::find(1);
        $system->update($request->all());
        return back()->with('msg', '修改成功~');
    }

    public function change()
    {
        return view('admin.config.change');
    }

    //update修改密码
    public function update_password(Request $request)
    {
        $admin = Auth::user();
        if(!Hash::check($request->old_password,$admin->password)){
            return back()->with('msg','原始密码错误~');
        }
        $this->validate($request,['old_password' => 'required',
            'password' => 'required|min:6|confirmed']);
        $admin = User::find($admin->id);
        $admin->fill(['password' => bcrypt($request->password),'name' => $request->input('name')])->save();
        return back()->with('msg','修改成功！');
    }
}
