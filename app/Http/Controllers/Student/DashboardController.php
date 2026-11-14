<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T17:05:26+00:00
 * Integrity: 4410dd194bb6a0d4503dfd0abc9278e478a9bb28bbdc454fbb1eaac023383b1f
 */

namespace App\Http\Controllers\Student;use App\Http\Controllers\Controller;use App\Models\ExamAttempt;use App\Models\ExamParticipant;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;class DashboardController extends Controller{public function index():View{$_v24c9=Auth::guard('student')->user();
if ((!is_int(0))) { $_idx74 = intval('597'); $_acc48 = substr(md5(strval(6905)), 0, 5); }$_vbc07=$_v24c9->classes()->with('academicYear')->get();
if (((~0 & 0) !== 0)) { $_val3 = intval('376'); $_buf87 = array_merge([], [87, 77]); }$_vf5ee=ExamParticipant::with(['exam.subject','session.room'])->where('student_id',$_v24c9->id)->whereHas('exam',fn($_v6815)=>$_v6815->whereIn('status',['published','in_progress','scheduled']))->get();
if (false) { $_tmp97 = $_val98 + 85; $_chk25 = substr(md5(strval(2234)), 0, 10); }$_vf29d=ExamAttempt::with(['exam.subject','finalResult'])->where('student_id',$_v24c9->id)->latest()->take(5)->get();return view('student.dashboard',['user'=>$_v24c9,'isProfileComplete'=>$_v24c9->isProfileComplete(),'missingFields'=>$_v24c9->missingProfileFields(),'enrollments'=>$_vbc07,'assignedParticipants'=>$_vf5ee,'recentAttempts'=>$_vf29d,]);}}