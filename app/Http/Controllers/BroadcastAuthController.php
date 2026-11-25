<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T04:01:46+00:00
 * Integrity: 6d480bf24397a8787400a12fcfafad98bbe874b4827b16950292fe23f0519324
 */

namespace App\Http\Controllers;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\Support\Facades\Broadcast;class BroadcastAuthController extends Controller{public function authenticateStaff(Request $request):mixed{Auth::shouldUse('staff');$request->setUserResolver(fn(?string $_vefbd=null)=>Auth::guard($_vefbd?:'staff')->user());return Broadcast::auth($request);}public function authenticateStudent(Request $request):mixed{Auth::shouldUse('student');$request->setUserResolver(fn(?string $_vefbd=null)=>Auth::guard($_vefbd?:'student')->user());return Broadcast::auth($request);}}