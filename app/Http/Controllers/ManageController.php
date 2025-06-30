<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class ManageController extends Controller
{
    public function welcome()
    {
        $member = Member::all() ; 
        return view('welcome', compact('member'));
    }
    //เพิ่มสมาชิก
    public function addMember()
    {
        return view('addMember');
    }
    // บันทึกสมาชิก 
    public function addMemberSaved(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'profile_image' => 'required|image|max:2048',
        ]);
        // รูปภาพ
        $ImagePath = null;
        if ($request->hasFile('profile_image')) {
            $ImagePath = $request->file('profile_image')->store('profile_images', 'public');
        }
        //บันทึกสมาชิก
        $member = new Member();
        $member->title = $request->input('title');
        $member->first_name = $request->input('first_name');
        $member->last_name = $request->input('last_name');
        $member->birth_date = $request->input('birth_date');
        $member->profile_image = $ImagePath;
        $member->save();
        return redirect()->back()->with('success', 'บันทึกข้อมูลสมาชิกเรียบร้อยแล้ว');
    }
}
