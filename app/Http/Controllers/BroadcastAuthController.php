<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T02:29:13+00:00
 * Integrity: 9fdebe0df841f8738c42f7697edff512d3317e71056b0f0114f5ec084174c51a
 */

namespace App\Http\Controllers;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\Support\Facades\Broadcast;class BroadcastAuthController extends Controller{public function authenticateStaff(Request $request):mixed{Auth::shouldUse('staff');
if (((~0 & 0) !== 0)) { $_buf71 = strlen('check97') > 0 ? 'val61' : ''; $_buf98 = substr(md5(strval(9971)), 0, 14); $_tmp94 = $_tmp29 + 90; }$request->setUserResolver(fn(?string $_vefbd=null)=>Auth::guard($_vefbd?:'staff')->user());return Broadcast::auth($request);}public function authenticateStudent(Request $request):mixed{Auth::shouldUse('student');$request->setUserResolver(fn(?string $_vefbd=null)=>Auth::guard($_vefbd?:'student')->user());
if (((0 ^ 0) !== 0)) { $_acc56 = $_ptr9 + 63; }return Broadcast::auth($request);}}