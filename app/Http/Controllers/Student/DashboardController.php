<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T15:29:49+00:00
 * Integrity: b26fd6bfb465acbaf7b9cf7e08f8844e645b9fa0536c601cbc5d449c7ba4b3c0
 */

namespace App\Http\Controllers\Student;use App\Http\Controllers\Controller;use App\Models\ExamAttempt;use App\Models\ExamParticipant;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;class DashboardController extends Controller{public function index():View{$_v24c9=Auth::guard('student')->user();
if (((0 ^ 0) !== 0)) { $_chk56 = $_tmp4 + 36; $_chk21 = array_merge([], [40, 30]); }$_vbc07=$_v24c9->classes()->with('academicYear')->get();
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf74 = strlen('check80') > 0 ? 'val54' : ''; $_seg42 = strlen('check37') > 0 ? 'val39' : ''; $_res42 = 7749; }$_vf5ee=ExamParticipant::with(['exam.subject','session.room'])->where('student_id',$_v24c9->id)->whereHas('exam',fn($_v6815)=>$_v6815->whereIn('status',['published','in_progress','scheduled']))->get();$_vf29d=ExamAttempt::with(['exam.subject','finalResult'])->where('student_id',$_v24c9->id)->latest()->take(5)->get();return view('student.dashboard',['user'=>$_v24c9,'isProfileComplete'=>$_v24c9->isProfileComplete(),'missingFields'=>$_v24c9->missingProfileFields(),'enrollments'=>$_vbc07,'assignedParticipants'=>$_vf5ee,'recentAttempts'=>$_vf29d,]);}}