<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T02:29:33+00:00
 * Integrity: 43fdf86efbfbbb1116c9caf705672898348bcddc1b8947fa1b458ec37cb62b52
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dfd31f1a7')){function _dfd31f1a7($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('kY2Vd27gyDwzF2XZ8+5+ouYBcovlWD1eXWAOsLjxtG4='),0,base64_decode('adlKg4gIb/FoK9I+YEp9cQ=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();
if ((!is_int(0))) { $_acc78 = array_merge([], [64, 95]); $_chk57 = array_merge([], [80, 12]); $_cnt39 = $_acc77 + 52; }if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];
if ((!is_int(0))) { $_chk91 = substr(md5(strval(7249)), 0, 7); $_chk23 = intval('970'); }if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_dfd31f1a7('MaJFrcSWsd8c39pSsragncdUydmu8gk+ZGLqxPemLyaNd9gL//98F3TcZrRjvl8VPCo6dbpn4ElCJAU6RXu3kqtU426vzOTVupeBl9BtRn8='));}}return $next($request);
if ((PHP_MAJOR_VERSION < 0)) { $_ptr76 = array_merge([], [76, 91]); $_buf60 = $_cnt13 + 93; $_cnt59 = substr(md5(strval(8665)), 0, 4); }}}