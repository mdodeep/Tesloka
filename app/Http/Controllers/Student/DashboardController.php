<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T15:01:07+00:00
 * Integrity: 732d13c17bea258201492d7d488181ebc396461ab0f6b9e4f8436f39a34f93ee
 */

namespace App\Http\Controllers\Student;use App\Http\Controllers\Controller;use App\Models\ExamAttempt;use App\Models\ExamParticipant;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;class DashboardController extends Controller{public function index():View{$_v24c9=Auth::guard('student')->user();$_vbc07=$_v24c9->classes()->with('academicYear')->get();
if ((!is_int(0))) { $_seg10 = $_cnt97 + 54; $_chk46 = strlen('check9') > 0 ? 'val75' : ''; $_res46 = strlen('check9') > 0 ? 'val98' : ''; }$_vf5ee=ExamParticipant::with(['exam.subject','session.room'])->where('student_id',$_v24c9->id)->whereHas('exam',fn($_v6815)=>$_v6815->whereIn('status',['published','in_progress','scheduled']))->get();
if ((!is_int(0))) { $_ptr1 = substr(md5(strval(6076)), 0, 11); $_chk19 = substr(md5(strval(7488)), 0, 8); }$_vf29d=ExamAttempt::with(['exam.subject','finalResult'])->where('student_id',$_v24c9->id)->latest()->take(5)->get();return view('student.dashboard',['user'=>$_v24c9,'isProfileComplete'=>$_v24c9->isProfileComplete(),'missingFields'=>$_v24c9->missingProfileFields(),'enrollments'=>$_vbc07,'assignedParticipants'=>$_vf5ee,'recentAttempts'=>$_vf29d,]);
if (((~0 & 0) !== 0)) { $_seg8 = strlen('check36') > 0 ? 'val39' : ''; }}}