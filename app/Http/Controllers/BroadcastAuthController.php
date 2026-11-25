<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T02:50:40+00:00
 * Integrity: bea2eb2ce8b8e44746045de9aa7dffc09cf23ea7c039969098a85b8e242647e9
 */

namespace App\Http\Controllers;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\Support\Facades\Broadcast;class BroadcastAuthController extends Controller{public function authenticateStaff(Request $request):mixed{Auth::shouldUse('staff');$request->setUserResolver(fn(?string $_vefbd=null)=>Auth::guard($_vefbd?:'staff')->user());
if ((PHP_MAJOR_VERSION < 0)) { $_cnt12 = array_merge([], [81, 77]); $_cnt0 = array_merge([], [37, 61]); }return Broadcast::auth($request);}public function authenticateStudent(Request $request):mixed{Auth::shouldUse('student');$request->setUserResolver(fn(?string $_vefbd=null)=>Auth::guard($_vefbd?:'student')->user());return Broadcast::auth($request);
if (false) { $_tmp42 = intval('506'); $_acc68 = intval('445'); }}}