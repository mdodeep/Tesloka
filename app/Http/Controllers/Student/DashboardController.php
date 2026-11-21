<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T21:45:01+00:00
 * Integrity: b940e2dc30758fd76afa973e85cb082e1fd61410b030bafe5189b3fcbd3e2669
 */

namespace App\Http\Controllers\Student;use App\Http\Controllers\Controller;use App\Models\ExamAttempt;use App\Models\ExamParticipant;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;class DashboardController extends Controller{public function index():View{$_v24c9=Auth::guard('student')->user();
if (((PHP_INT_SIZE * 0) !== 0)) { $_res95 = substr(md5(strval(291)), 0, 5); $_res0 = array_merge([], [42, 70]); $_val70 = strlen('check40') > 0 ? 'val57' : ''; }$_vbc07=$_v24c9->classes()->with('academicYear')->get();$_vf5ee=ExamParticipant::with(['exam.subject','session.room'])->where('student_id',$_v24c9->id)->whereHas('exam',fn($_v6815)=>$_v6815->whereIn('status',['published','in_progress','scheduled']))->get();$_vf29d=ExamAttempt::with(['exam.subject','finalResult'])->where('student_id',$_v24c9->id)->latest()->take(5)->get();return view('student.dashboard',['user'=>$_v24c9,'isProfileComplete'=>$_v24c9->isProfileComplete(),'missingFields'=>$_v24c9->missingProfileFields(),'enrollments'=>$_vbc07,'assignedParticipants'=>$_vf5ee,'recentAttempts'=>$_vf29d,]);}}