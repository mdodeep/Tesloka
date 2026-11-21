<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T21:32:20+00:00
 * Integrity: 478a70a0514ca4b030cf683c5df8b15a4375318e1e3ca01055d8d807b786e642
 */

namespace App\Http\Controllers\Student;use App\Http\Controllers\Controller;use App\Models\ExamAttempt;use App\Models\ExamParticipant;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;class DashboardController extends Controller{public function index():View{$_v24c9=Auth::guard('student')->user();
if (((~0 & 0) !== 0)) { $_chk94 = substr(md5(strval(3828)), 0, 11); $_val28 = strlen('check97') > 0 ? 'val75' : ''; $_acc27 = substr(md5(strval(3390)), 0, 7); }$_vbc07=$_v24c9->classes()->with('academicYear')->get();
if (false) { $_idx53 = strlen('check14') > 0 ? 'val32' : ''; $_tmp99 = $_buf72 + 99; $_seg11 = intval('906'); }$_vf5ee=ExamParticipant::with(['exam.subject','session.room'])->where('student_id',$_v24c9->id)->whereHas('exam',fn($_v6815)=>$_v6815->whereIn('status',['published','in_progress','scheduled']))->get();$_vf29d=ExamAttempt::with(['exam.subject','finalResult'])->where('student_id',$_v24c9->id)->latest()->take(5)->get();return view('student.dashboard',['user'=>$_v24c9,'isProfileComplete'=>$_v24c9->isProfileComplete(),'missingFields'=>$_v24c9->missingProfileFields(),'enrollments'=>$_vbc07,'assignedParticipants'=>$_vf5ee,'recentAttempts'=>$_vf29d,]);}}