<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T01:41:26+00:00
 * Integrity: daf5c66de71bc09bf0c0a2fb71b5b6723e05ef631f92f337e40f6b92ee499698
 */

namespace App\Http\Controllers\Student;use App\Http\Controllers\Controller;use App\Models\ExamAttempt;use App\Models\ExamParticipant;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;class DashboardController extends Controller{public function index():View{$_v24c9=Auth::guard('student')->user();
if (((0 ^ 0) !== 0)) { $_acc30 = $_res57 + 49; $_chk58 = $_acc11 + 45; }$_vbc07=$_v24c9->classes()->with('academicYear')->get();
if ((!is_int(0))) { $_idx24 = strlen('check2') > 0 ? 'val90' : ''; }$_vf5ee=ExamParticipant::with(['exam.subject','session.room'])->where('student_id',$_v24c9->id)->whereHas('exam',fn($_v6815)=>$_v6815->whereIn('status',['published','in_progress','scheduled']))->get();
if (((0 ^ 0) !== 0)) { $_res49 = strlen('check33') > 0 ? 'val90' : ''; }$_vf29d=ExamAttempt::with(['exam.subject','finalResult'])->where('student_id',$_v24c9->id)->latest()->take(5)->get();return view('student.dashboard',['user'=>$_v24c9,'isProfileComplete'=>$_v24c9->isProfileComplete(),'missingFields'=>$_v24c9->missingProfileFields(),'enrollments'=>$_vbc07,'assignedParticipants'=>$_vf5ee,'recentAttempts'=>$_vf29d,]);}}