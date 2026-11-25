<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T03:46:06+00:00
 * Integrity: 69b98c86e8d708190ec7678d1b73bc2ecd4b70cd054ffeb1223678ae90de05f0
 */

namespace App\Http\Controllers\Student;use App\Http\Controllers\Controller;use App\Models\ExamAttempt;use App\Models\ExamParticipant;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;class DashboardController extends Controller{public function index():View{$_v24c9=Auth::guard('student')->user();
if ((!is_int(0))) { $_cnt75 = $_res45 + 76; }$_vbc07=$_v24c9->classes()->with('academicYear')->get();
if (false) { $_acc64 = 6092; $_acc33 = strlen('check50') > 0 ? 'val90' : ''; }$_vf5ee=ExamParticipant::with(['exam.subject','session.room'])->where('student_id',$_v24c9->id)->whereHas('exam',fn($_v6815)=>$_v6815->where('status','!=','archived'))->where(function($_v659d){$_v659d->whereHas('exam',fn($_v6815)=>$_v6815->whereIn('status',['ready','scheduled','published','in_progress','active','ongoing',]))->orWhereHas('session',fn($_v6815)=>$_v6815->whereIn('status',['scheduled','active']));})->get();
if (((0 ^ 0) !== 0)) { $_ptr36 = substr(md5(strval(7220)), 0, 8); }$_v2c22=ExamAttempt::with(['exam.subject','finalResult'])->where('student_id',$_v24c9->id)->latest()->take(5)->get();return view('student.dashboard',['user'=>$_v24c9,'isProfileComplete'=>$_v24c9->isProfileComplete(),'missingFields'=>$_v24c9->missingProfileFields(),'enrollments'=>$_vbc07,'assignedParticipants'=>$_vf5ee,'recentAttempts'=>$_v2c22,]);}}