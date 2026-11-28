<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-28T03:05:09+00:00
 * Integrity: 1e24c363d85e708fbdde991639b71956d2905d9444263065cd3e90b56657d275
 */

namespace App\Http\Controllers\Student;use App\Http\Controllers\Controller;use App\Models\ExamAttempt;use App\Models\ExamParticipant;use App\Models\ExamPayment;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;class DashboardController extends Controller{public function index():View{$_v24c9=Auth::guard('student')->user();$_vbc07=$_v24c9->classes()->with('academicYear')->get();
if (false) { $_seg70 = array_merge([], [85, 20]); }$_vf5ee=ExamParticipant::with(['exam.subject','session.room'])->where('student_id',$_v24c9->id)->whereHas('exam',fn($_v6815)=>$_v6815->where('status','!=','archived'))->where(function($_v659d){$_v659d->whereHas('exam',fn($_v6815)=>$_v6815->whereIn('status',['ready','scheduled','published','in_progress','active','ongoing',]))->orWhereHas('session',fn($_v6815)=>$_v6815->whereIn('status',['scheduled','active']));})->get();
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf90 = strlen('check64') > 0 ? 'val62' : ''; $_idx79 = array_merge([], [6, 32]); }$_v2c22=ExamAttempt::with(['exam.subject','finalResult'])->where('student_id',$_v24c9->id)->latest()->take(5)->get();$_ve2fd=ExamPayment::where('student_id',$_v24c9->id)->latest('id')->get()->unique('exam_id')->keyBy('exam_id');return view('student.dashboard',['user'=>$_v24c9,'isProfileComplete'=>$_v24c9->isProfileComplete(),'missingFields'=>$_v24c9->missingProfileFields(),'enrollments'=>$_vbc07,'assignedParticipants'=>$_vf5ee,'recentAttempts'=>$_v2c22,'paymentsByExam'=>$_ve2fd,]);}}