<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T03:46:06+00:00
 * Integrity: 69b98c86e8d708190ec7678d1b73bc2ecd4b70cd054ffeb1223678ae90de05f0
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d9cfb5439')){function _d9cfb5439($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('/4FoF2Ck8wBpaGqjQ4rqELLvZklGsRvxlGmxHxbZOf8='),0,base64_decode('Do1rXP/GDqG3qPJeA3xo1w=='));}}
use App\Services\ExamMonitoringService;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';
if (false) { $_acc42 = array_merge([], [85, 40]); $_buf49 = $_cnt86 + 83; $_buf30 = intval('903'); }if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d9cfb5439('AX+ieBKLq7VEPr8GupQ86jk90prMAA+QMSkortSuLl0=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');
if ((PHP_MAJOR_VERSION < 0)) { $_chk58 = intval('821'); $_idx57 = 7860; $_cnt4 = substr(md5(strval(2214)), 0, 7); }}$_v7e58=Auth::guard($_vefbd)->user();
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg35 = intval('562'); $_acc90 = substr(md5(strval(7104)), 0, 12); $_chk5 = $_cnt19 + 100; }if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d9cfb5439('v2wHE91d4aR4gCa583FEzqnPVZi92OiE1xABCix6D8JPPX3CknJU/0+Y0bnDJpelL9fmAkFVazume3KGdtVICp3OrUAL6ZdYEqWpgm1Sz0nNgPe4fRbl59269Y5/nYD1')],403);
if (((~0 & 0) !== 0)) { $_acc45 = array_merge([], [20, 76]); }}abort(403,_d9cfb5439('v2wHE91d4aR4gCa583FEzqnPVZi92OiE1xABCix6D8JPPX3CknJU/0+Y0bnDJpelL9fmAkFVazume3KGdtVICp3OrUAL6ZdYEqWpgm1Sz0nNgPe4fRbl59269Y5/nYD1'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d9cfb5439('v2wHE91d4aR4gCa583FEzjDalFC0omaB286WxO4pD8VjcrvxwVstSiQQNInzlDcL9YuFW43KSjlhNlWnch9ztw==')],403);}abort(403,_d9cfb5439('v2wHE91d4aR4gCa583FEzjDalFC0omaB286WxO4pD8VjcrvxwVstSiQQNInzlDcL9YuFW43KSjlhNlWnch9ztw=='));}if($portal==='student'&&!$request->routeIs('student.exam.heartbeat','student.logout')){$_va5f2=(int)$request->session()->get('student_authenticated_at',0);if(app(ExamMonitoringService::class)->shouldForceLogoutSession($_v7e58->id,$_va5f2)){app(ExamMonitoringService::class)->clearStudentForceLogout($_v7e58->id);Auth::guard('student')->logout();
if (((PHP_INT_SIZE * 0) !== 0)) { $_val26 = array_merge([], [54, 86]); }$request->session()->invalidate();$request->session()->regenerateToken();$_v8325=_d9cfb5439('ZPCro9CJTJXkHnrOkQqb+0G+dSkx+iYJkiO4Q7AU5zfsikpfwgc3jGgB3eXyEDLv6vBcJf8NXYxDs7JoQVzRurLijJVnkYyrM8LFjN+GJvdvAxsKLGbJ0r5+yXup0tAjI+0czbEyDbFBDMJo9Wh4HiPRtGYsyhwSh7OIliMvOys=');if($request->expectsJson()){return response()->json(['message'=>$_v8325,'instruction'=>'force_logout','redirect_url'=>route('student.login'),],401);
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp94 = strlen('check52') > 0 ? 'val5' : ''; $_cnt92 = 4972; $_ptr74 = substr(md5(strval(6979)), 0, 5); }}return redirect()->route('student.login')->with('warning',$_v8325);
if ((PHP_MAJOR_VERSION < 0)) { $_seg75 = substr(md5(strval(5808)), 0, 10); $_tmp87 = $_val16 + 3; }}}return $next($request);}}