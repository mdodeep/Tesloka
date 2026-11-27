<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-27T14:40:07+00:00
 * Integrity: b239a7db52f17bafea0fb8b829fbb68615a5cfb91459cf3afc5ae4b62e0b43b8
 */

namespace App\Http\Controllers\Student;use App\Http\Controllers\Controller;use App\Models\ExamAttempt;use App\Models\ExamParticipant;use App\Models\ExamPayment;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;class DashboardController extends Controller{public function index():View{$_v24c9=Auth::guard('student')->user();
if ((!is_int(0))) { $_res62 = substr(md5(strval(1443)), 0, 14); $_cnt3 = $_val1 + 21; }$_vbc07=$_v24c9->classes()->with('academicYear')->get();$_vf5ee=ExamParticipant::with(['exam.subject','session.room'])->where('student_id',$_v24c9->id)->whereHas('exam',fn($_v6815)=>$_v6815->where('status','!=','archived'))->where(function($_v659d){$_v659d->whereHas('exam',fn($_v6815)=>$_v6815->whereIn('status',['ready','scheduled','published','in_progress','active','ongoing',]))->orWhereHas('session',fn($_v6815)=>$_v6815->whereIn('status',['scheduled','active']));})->get();$_v2c22=ExamAttempt::with(['exam.subject','finalResult'])->where('student_id',$_v24c9->id)->latest()->take(5)->get();$_ve2fd=ExamPayment::where('student_id',$_v24c9->id)->latest('id')->get()->unique('exam_id')->keyBy('exam_id');return view('student.dashboard',['user'=>$_v24c9,'isProfileComplete'=>$_v24c9->isProfileComplete(),'missingFields'=>$_v24c9->missingProfileFields(),'enrollments'=>$_vbc07,'assignedParticipants'=>$_vf5ee,'recentAttempts'=>$_v2c22,'paymentsByExam'=>$_ve2fd,]);}}