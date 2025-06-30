<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class ManageController extends Controller
{
    public function welcome()
    {
        $member = Member::all();
        return view('welcome', compact('member'));
    }

    // รายละเอียดสมาชิก detail
    public function detailMember($id)
    {
        $member = Member::where('id', $id)->first();
        if (!$member) {
            abort(404, 'ไม่พบข้อมูลสมาชิก');
        }
        return view('detailMember', compact('member'));
    }

    // แก้ไขข้อมูลส่วนตัวของ detail 
    public function updateMember(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:10',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'profile_image' => 'nullable|image|max:2048',
        ]);
        $member = Member::find($id);
        if (!$member) {
            abort(404, 'ไม่พบข้อมูลสมาชิก');
        }
        //
        if ($request->hasFile('profile_image')) {
            $profileImagePath = $request->file('profile_image')->store('profile_images', 'public');
            $member->profile_image = $profileImagePath;
        }
        // อัพเดต
        $member->title = $request->input('title');
        $member->first_name = $request->input('first_name');
        $member->last_name = $request->input('last_name');
        $member->birth_date = $request->input('birth_date');
        $member->save();
        return redirect()->back()->with('success', 'แก้ไขข้อมูลสมาชิกเรียบร้อยแล้ว');
    }


    // ลบ
    public function deleteMember($id)
    {
        $member = Member::find($id);
        if (!$member) {
            abort(404, 'ไม่พบข้อมูล');
        }
        $member->delete();
        return redirect()->back()->with('success', 'ลบข้อมูลสมาชิกสำเร็จแล้ว');
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
