<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class ManageController extends Controller
{
    public function welcome(Request $request)
    {
        $query = Member::query();
        // ค้นหาตามชื่อ
        if ($request->filled('first_name')) {
            $query->where('first_name', 'like', '%' . $request->first_name . '%');
        }
        // ค้นหาตามนามสกุล
        if ($request->filled('last_name')) {
            $query->where('last_name', 'like', '%' . $request->last_name . '%');
        }
        // อายุน้อยไปมาก
        if ($request->age_order === 'asc') {
            $query->orderBy('birth_date', 'desc');
            // อายุมากไปน้อย
        } elseif ($request->age_order === 'desc') {

            $query->orderBy('birth_date', 'asc');
        }
        $members = $query->get();
        return view('welcome', compact('members'));
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


    public function report()
    {
        $data = Member::all();

        // ส่วนที่1รายงานจำนวนสมาชิกตามอายุ
        $list = [];
        foreach ($data as $item) {
            // คำนวณอายุ
            $age = \Carbon\Carbon::parse($item->birth_date)->age;
            // ถ้า key อายุนี้มีอยู่แล้ว + 1 เข้าไป เพื่อเพิ่มจำนวนคน
            if (array_key_exists($age, $list)) {
                $list[$age] += 1;
            } else {
                // ถ้าไม่มีเพิ่มและ เพิ่ม1คนเข้าไปนะ 
                $list[$age] = 1;
            }
        }
        ksort($list);
        // ส่วนที่2คือเราใช้ chart.js เข้ามาช่วย จัดรูแบบบตาม chart js 
        $labels = array_keys($list);    //แก้นx  
        $totals = array_values($list);  //แกนy 
        return view('report', compact('list', 'labels', 'totals'));
    }


    // แบบทดสอบที่ 2 
    public function examTwo() {
        return view('examtwo') ; 
    }



}
