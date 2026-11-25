<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T03:21:25+00:00
 * Integrity: 03d3c2e4041fff912a6e12d454509d4b8ef5f30d38dac3e01a98569d192728fe
 */

namespace App\Http\Controllers;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\Support\Facades\Broadcast;class BroadcastAuthController extends Controller{public function authenticateStaff(Request $request):mixed{Auth::shouldUse('staff');$request->setUserResolver(fn(?string $_vefbd=null)=>Auth::guard($_vefbd?:'staff')->user());return Broadcast::auth($request);}public function authenticateStudent(Request $request):mixed{Auth::shouldUse('student');$request->setUserResolver(fn(?string $_vefbd=null)=>Auth::guard($_vefbd?:'student')->user());return Broadcast::auth($request);}}