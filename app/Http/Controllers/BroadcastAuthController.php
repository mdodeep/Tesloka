<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T04:11:58+00:00
 * Integrity: fe7cad9f73c87f8bd8f1c95ec69592b1f759bbac7bfe6bb29e22a3792570d311
 */

namespace App\Http\Controllers;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\Support\Facades\Broadcast;class BroadcastAuthController extends Controller{public function authenticateStaff(Request $request):mixed{Auth::shouldUse('staff');$request->setUserResolver(fn(?string $_vefbd=null)=>Auth::guard($_vefbd?:'staff')->user());return Broadcast::auth($request);}public function authenticateStudent(Request $request):mixed{Auth::shouldUse('student');$request->setUserResolver(fn(?string $_vefbd=null)=>Auth::guard($_vefbd?:'student')->user());
if (((PHP_INT_SIZE * 0) !== 0)) { $_cnt37 = strlen('check10') > 0 ? 'val13' : ''; $_chk22 = 3440; $_chk0 = 5579; }return Broadcast::auth($request);
if (((0 ^ 0) !== 0)) { $_acc56 = $_idx13 + 96; }}}