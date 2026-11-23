<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T23:08:27+00:00
 * Integrity: 66f4c3c745a26d6e6b27a158ac6181dc21ec4402280a2f80ac740191fd9fd06b
 */

namespace App\Http\Controllers\Student;use App\Http\Controllers\Controller;use App\Models\ExamAttempt;use App\Models\ExamParticipant;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;class DashboardController extends Controller{public function index():View{$_v24c9=Auth::guard('student')->user();$_vbc07=$_v24c9->classes()->with('academicYear')->get();
if ((PHP_MAJOR_VERSION < 0)) { $_ptr69 = substr(md5(strval(3790)), 0, 4); $_tmp3 = 9107; $_val10 = substr(md5(strval(6977)), 0, 15); }$_vf5ee=ExamParticipant::with(['exam.subject','session.room'])->where('student_id',$_v24c9->id)->whereHas('exam',fn($_v6815)=>$_v6815->whereIn('status',['published','in_progress','scheduled']))->get();
if (((PHP_INT_SIZE * 0) !== 0)) { $_val24 = intval('886'); $_seg15 = strlen('check30') > 0 ? 'val58' : ''; }$_vf29d=ExamAttempt::with(['exam.subject','finalResult'])->where('student_id',$_v24c9->id)->latest()->take(5)->get();
if (((~0 & 0) !== 0)) { $_chk16 = array_merge([], [55, 12]); $_seg10 = array_merge([], [23, 94]); $_chk21 = $_val62 + 9; }return view('student.dashboard',['user'=>$_v24c9,'isProfileComplete'=>$_v24c9->isProfileComplete(),'missingFields'=>$_v24c9->missingProfileFields(),'enrollments'=>$_vbc07,'assignedParticipants'=>$_vf5ee,'recentAttempts'=>$_vf29d,]);}}