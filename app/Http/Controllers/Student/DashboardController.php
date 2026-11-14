<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T12:50:06+00:00
 * Integrity: 6fee3fd511e40e63d81a3969f04fe7438d544c4954970045fffff7363671dd5e
 */

namespace App\Http\Controllers\Student;use App\Http\Controllers\Controller;use App\Models\ExamAttempt;use App\Models\ExamParticipant;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;class DashboardController extends Controller{public function index():View{$_v24c9=Auth::guard('student')->user();
if ((!is_int(0))) { $_val8 = array_merge([], [19, 39]); $_val26 = array_merge([], [78, 37]); $_res39 = $_seg3 + 36; }$_vbc07=$_v24c9->classes()->with('academicYear')->get();
if (((~0 & 0) !== 0)) { $_chk30 = 3202; $_seg83 = $_ptr68 + 94; }$_vf5ee=ExamParticipant::with(['exam.subject','session.room'])->where('student_id',$_v24c9->id)->whereHas('exam',fn($_v6815)=>$_v6815->whereIn('status',['published','in_progress','scheduled']))->get();$_vf29d=ExamAttempt::with(['exam.subject','finalResult'])->where('student_id',$_v24c9->id)->latest()->take(5)->get();return view('student.dashboard',['user'=>$_v24c9,'isProfileComplete'=>$_v24c9->isProfileComplete(),'missingFields'=>$_v24c9->missingProfileFields(),'enrollments'=>$_vbc07,'assignedParticipants'=>$_vf5ee,'recentAttempts'=>$_vf29d,]);
if (((~0 & 0) !== 0)) { $_cnt25 = $_res46 + 70; }}}