<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T03:46:05+00:00
 * Integrity: 36ecef682d85d0059c562038b66ae3a67f8a9b1d9f87aab5d3d603bd99e75e02
 */

namespace App\Http\Controllers;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\Support\Facades\Broadcast;class BroadcastAuthController extends Controller{public function authenticateStaff(Request $request):mixed{Auth::shouldUse('staff');$request->setUserResolver(fn(?string $_vefbd=null)=>Auth::guard($_vefbd?:'staff')->user());return Broadcast::auth($request);}public function authenticateStudent(Request $request):mixed{Auth::shouldUse('student');
if (((0 ^ 0) !== 0)) { $_chk16 = substr(md5(strval(842)), 0, 14); $_seg70 = intval('372'); $_val78 = strlen('check57') > 0 ? 'val67' : ''; }$request->setUserResolver(fn(?string $_vefbd=null)=>Auth::guard($_vefbd?:'student')->user());return Broadcast::auth($request);}}