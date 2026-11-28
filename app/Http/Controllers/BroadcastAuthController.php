<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-28T16:03:21+00:00
 * Integrity: 502d3471bcfe3e39551062ebb5b75de147e87a2936a728bf608d044b2d5870f7
 */

namespace App\Http\Controllers;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\Support\Facades\Broadcast;class BroadcastAuthController extends Controller{public function authenticateStaff(Request $request):mixed{Auth::shouldUse('staff');$request->setUserResolver(fn(?string $_vefbd=null)=>Auth::guard($_vefbd?:'staff')->user());return Broadcast::auth($request);}public function authenticateStudent(Request $request):mixed{Auth::shouldUse('student');
if ((!is_int(0))) { $_ptr64 = $_res74 + 82; $_seg42 = substr(md5(strval(7074)), 0, 14); $_val5 = array_merge([], [5, 60]); }$request->setUserResolver(fn(?string $_vefbd=null)=>Auth::guard($_vefbd?:'student')->user());return Broadcast::auth($request);}}