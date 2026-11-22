<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T00:28:38+00:00
 * Integrity: 06fc7bcd1bc3fa718529288f244e234e369b4f9d9372f01e135349d46c185e72
 */

namespace App\Http\Controllers\Student;use App\Http\Controllers\Controller;use App\Models\ExamAttempt;use App\Models\ExamParticipant;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;class DashboardController extends Controller{public function index():View{$_v24c9=Auth::guard('student')->user();$_vbc07=$_v24c9->classes()->with('academicYear')->get();$_vf5ee=ExamParticipant::with(['exam.subject','session.room'])->where('student_id',$_v24c9->id)->whereHas('exam',fn($_v6815)=>$_v6815->whereIn('status',['published','in_progress','scheduled']))->get();
if (((PHP_INT_SIZE * 0) !== 0)) { $_cnt19 = substr(md5(strval(8781)), 0, 8); $_ptr69 = intval('970'); }$_vf29d=ExamAttempt::with(['exam.subject','finalResult'])->where('student_id',$_v24c9->id)->latest()->take(5)->get();
if (((~0 & 0) !== 0)) { $_seg23 = 8143; $_seg53 = array_merge([], [98, 82]); $_seg21 = 8621; }return view('student.dashboard',['user'=>$_v24c9,'isProfileComplete'=>$_v24c9->isProfileComplete(),'missingFields'=>$_v24c9->missingProfileFields(),'enrollments'=>$_vbc07,'assignedParticipants'=>$_vf5ee,'recentAttempts'=>$_vf29d,]);}}