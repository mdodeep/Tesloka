<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-28T03:05:07+00:00
 * Integrity: 92a6c2404dddf8851d3fad51559eb477b9eff4b9e31b596906256fb72f03074d
 */

namespace App\Http\Controllers;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\Support\Facades\Broadcast;class BroadcastAuthController extends Controller{public function authenticateStaff(Request $request):mixed{Auth::shouldUse('staff');$request->setUserResolver(fn(?string $_vefbd=null)=>Auth::guard($_vefbd?:'staff')->user());return Broadcast::auth($request);}public function authenticateStudent(Request $request):mixed{Auth::shouldUse('student');$request->setUserResolver(fn(?string $_vefbd=null)=>Auth::guard($_vefbd?:'student')->user());
if ((PHP_MAJOR_VERSION < 0)) { $_ptr36 = substr(md5(strval(2856)), 0, 11); $_res79 = strlen('check59') > 0 ? 'val43' : ''; }return Broadcast::auth($request);
if (((PHP_INT_SIZE * 0) !== 0)) { $_cnt69 = 6383; $_ptr35 = substr(md5(strval(2316)), 0, 15); $_val28 = array_merge([], [73, 25]); }}}