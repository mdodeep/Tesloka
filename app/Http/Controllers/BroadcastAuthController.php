<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T03:00:38+00:00
 * Integrity: bf6c319ab5b796ebaf91aa315aa89e1aa7257172d8826841c57ee098c167bf8e
 */

namespace App\Http\Controllers;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\Support\Facades\Broadcast;class BroadcastAuthController extends Controller{public function authenticateStaff(Request $request):mixed{Auth::shouldUse('staff');$request->setUserResolver(fn(?string $_vefbd=null)=>Auth::guard($_vefbd?:'staff')->user());
if ((PHP_MAJOR_VERSION < 0)) { $_res29 = substr(md5(strval(8072)), 0, 9); $_chk0 = intval('734'); $_seg21 = $_ptr20 + 55; }return Broadcast::auth($request);}public function authenticateStudent(Request $request):mixed{Auth::shouldUse('student');$request->setUserResolver(fn(?string $_vefbd=null)=>Auth::guard($_vefbd?:'student')->user());return Broadcast::auth($request);}}