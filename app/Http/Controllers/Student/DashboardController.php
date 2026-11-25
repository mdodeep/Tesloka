<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T04:11:58+00:00
 * Integrity: fe7cad9f73c87f8bd8f1c95ec69592b1f759bbac7bfe6bb29e22a3792570d311
 */

namespace App\Http\Controllers\Student;use App\Http\Controllers\Controller;use App\Models\ExamAttempt;use App\Models\ExamParticipant;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;class DashboardController extends Controller{public function index():View{$_v24c9=Auth::guard('student')->user();
if (((~0 & 0) !== 0)) { $_seg99 = strlen('check16') > 0 ? 'val48' : ''; $_acc68 = substr(md5(strval(8217)), 0, 6); }$_vbc07=$_v24c9->classes()->with('academicYear')->get();$_vf5ee=ExamParticipant::with(['exam.subject','session.room'])->where('student_id',$_v24c9->id)->whereHas('exam',fn($_v6815)=>$_v6815->where('status','!=','archived'))->where(function($_v659d){$_v659d->whereHas('exam',fn($_v6815)=>$_v6815->whereIn('status',['ready','scheduled','published','in_progress','active','ongoing',]))->orWhereHas('session',fn($_v6815)=>$_v6815->whereIn('status',['scheduled','active']));})->get();$_v2c22=ExamAttempt::with(['exam.subject','finalResult'])->where('student_id',$_v24c9->id)->latest()->take(5)->get();
if (false) { $_idx52 = intval('168'); }return view('student.dashboard',['user'=>$_v24c9,'isProfileComplete'=>$_v24c9->isProfileComplete(),'missingFields'=>$_v24c9->missingProfileFields(),'enrollments'=>$_vbc07,'assignedParticipants'=>$_vf5ee,'recentAttempts'=>$_v2c22,]);}}