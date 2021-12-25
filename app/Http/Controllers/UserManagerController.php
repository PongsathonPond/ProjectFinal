<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserManagerController extends Controller
{
    public function index()
    {

        $users = User::paginate(10);

        return view('Admin.UserManager.index', compact('users'));
    }
    public function edit($id)
    {

        $users = User::find($id);

        return view('Admin.UserManager.edit', compact('users'));
    }

    public function update(Request $request, $id)
    {

        //  dd($id,$request->role);
        $request->validate([

            'title_Name' => 'required',
            'first_Name' => 'required',
            'last_Name' => 'required',
            'phone_Number' => 'required',
            'email' => 'required',
            'role' => 'required',

        ],

            ['title_Name.required' => "กรุณาป้อนคำนำหน้า",

                'first_Name.required' => "กรุณาป้อนชื่อ",
                'last_Name.required' => "กรุณาป้อนนามสกุล",
                'phone_Number.required' => "กรุณาป้อนเบอร์โทร",
                'email.required' => "กรุณาป้อนอีเมล์",
                'role.required' => "กรุณาป้อนสถานะ",

            ]
        );
        User::find($id)->update([

            'title_Name' => $request->title_Name,
            'first_Name' => $request->first_Name,
            'last_Name' => $request->last_Name,

            'phone_Number' => $request->phone_Number,
            'email' => $request->email,
            'role' => $request->role,

        ]);

        return redirect()->back()->with('success', "อัพเดตข้อมูลเรียบร้อย");
        // return redirect()->route('usermanager')->with('success',"อัพเดตข้อมูลเรียบร้อย");
    }

    public function delete($id)
    {

        //ลบข้อมูล
        $delete = User::find($id)->delete();
        return redirect()->back()->with('success', "ลบเรียบร้อยแล้ว");

    }

}
