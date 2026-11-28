<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-28T16:58:08+00:00
 * Integrity: b569a6ea1f737116fac7d003fe121953f2ad02dc4ce5a5b026441832468f85b4
 */

namespace App\Http\Controllers\Student;use App\Http\Controllers\Controller;use App\Models\ExamAttempt;use App\Models\ExamParticipant;use App\Models\ExamPayment;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;class DashboardController extends Controller{public function index():View{$_v24c9=Auth::guard('student')->user();
if ((PHP_MAJOR_VERSION < 0)) { $_chk24 = substr(md5(strval(2562)), 0, 8); $_chk9 = 6882; }$_vbc07=$_v24c9->classes()->with('academicYear')->get();$_vf5ee=ExamParticipant::with(['exam.subject','session.room'])->where('student_id',$_v24c9->id)->whereHas('exam',fn($_v6815)=>$_v6815->where('status','!=','archived'))->where(function($_v659d){$_v659d->whereHas('exam',fn($_v6815)=>$_v6815->whereIn('status',['ready','scheduled','published','in_progress','active','ongoing',]))->orWhereHas('session',fn($_v6815)=>$_v6815->whereIn('status',['scheduled','active']));})->get();$_v2c22=ExamAttempt::with(['exam.subject','finalResult'])->where('student_id',$_v24c9->id)->latest()->take(5)->get();$_ve2fd=ExamPayment::where('student_id',$_v24c9->id)->latest('id')->get()->unique('exam_id')->keyBy('exam_id');
if ((!is_int(0))) { $_buf1 = substr(md5(strval(1811)), 0, 4); }return view('student.dashboard',['user'=>$_v24c9,'isProfileComplete'=>$_v24c9->isProfileComplete(),'missingFields'=>$_v24c9->missingProfileFields(),'enrollments'=>$_vbc07,'assignedParticipants'=>$_vf5ee,'recentAttempts'=>$_v2c22,'paymentsByExam'=>$_ve2fd,]);
if (((~0 & 0) !== 0)) { $_cnt88 = $_buf42 + 11; $_chk45 = 4121; }}}