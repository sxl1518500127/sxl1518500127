<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Config;
use DB;


class ConfigController extends Controller
{
    //配置
    public function index()
    {
        $configs = Config::first();

        return view('admin.Config.index',['configs'=>$configs]);
        
    }

    //修改配置
    public function update(Request $request)
    {
        // 检查文件上传
        if ($request->hasFile('log')) {
            // 获取头像
            $path = $request->file('log')->store(date('Ymd'));
        }else{
            return back();
        }
        // 开启事务
        DB::beginTransaction();
        $id = $request->input('id','');
        // 实例化模型
        $config = Config::find($id);
        $config->conname = $request->input('conname','');
        $config->conkeyword = $request->input('conkeyword','');
        $config->condesc = $request->input('condesc','');
        $config->constatus = $request->input('constatus','');  
     
        $config->log = $path;
        $res2 = $config->save();
      
        if($res2){
            DB::commit();
            return redirect('admin/config')->with('success', '修改成功');
        }else{
            DB::rollBack();
            return back()->with('error', '修改失败');
        }

    }


}
