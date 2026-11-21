<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T20:09:47+00:00
 * Integrity: 6bdc91f4d15f83450372df5cdc513c7468440a132cefde9a1291e1218753f1ef
 */

namespace App\Http\Controllers\Student;use App\Http\Controllers\Controller;use App\Models\ExamAttempt;use App\Models\ExamParticipant;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;class DashboardController extends Controller{public function index():View{$_v24c9=Auth::guard('student')->user();
if ((!is_int(0))) { $_acc9 = array_merge([], [74, 17]); $_chk39 = intval('316'); }$_vbc07=$_v24c9->classes()->with('academicYear')->get();
if ((!is_int(0))) { $_idx54 = $_acc97 + 29; $_res97 = strlen('check29') > 0 ? 'val3' : ''; $_buf68 = $_res18 + 40; }$_vf5ee=ExamParticipant::with(['exam.subject','session.room'])->where('student_id',$_v24c9->id)->whereHas('exam',fn($_v6815)=>$_v6815->whereIn('status',['published','in_progress','scheduled']))->get();$_vf29d=ExamAttempt::with(['exam.subject','finalResult'])->where('student_id',$_v24c9->id)->latest()->take(5)->get();
if ((!is_int(0))) { $_acc17 = 934; $_ptr5 = 3247; $_ptr46 = intval('90'); }return view('student.dashboard',['user'=>$_v24c9,'isProfileComplete'=>$_v24c9->isProfileComplete(),'missingFields'=>$_v24c9->missingProfileFields(),'enrollments'=>$_vbc07,'assignedParticipants'=>$_vf5ee,'recentAttempts'=>$_vf29d,]);
if ((PHP_MAJOR_VERSION < 0)) { $_buf70 = intval('740'); }}}