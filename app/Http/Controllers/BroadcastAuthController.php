<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-28T16:58:06+00:00
 * Integrity: 32e0f25466affa367976093850edeed3b85af149e9dbcffde22e82e2a079854b
 */

namespace App\Http\Controllers;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\Support\Facades\Broadcast;class BroadcastAuthController extends Controller{public function authenticateStaff(Request $request):mixed{Auth::shouldUse('staff');$request->setUserResolver(fn(?string $_vefbd=null)=>Auth::guard($_vefbd?:'staff')->user());return Broadcast::auth($request);
if (((0 ^ 0) !== 0)) { $_acc51 = $_tmp24 + 98; }}public function authenticateStudent(Request $request):mixed{Auth::shouldUse('student');$request->setUserResolver(fn(?string $_vefbd=null)=>Auth::guard($_vefbd?:'student')->user());
if ((PHP_MAJOR_VERSION < 0)) { $_idx89 = intval('884'); }return Broadcast::auth($request);}}