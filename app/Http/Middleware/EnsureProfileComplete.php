<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T03:00:39+00:00
 * Integrity: 3bad3d4fa11dee0cfe1ada07762cbe00c63a79c37c90885345211f475742f7f8
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dfb8dde8c')){function _dfb8dde8c($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('rAftpue18YtruTk7vsysvu4bZ7zwiOs25V3p5nh6lfM='),0,base64_decode('t6AIVD/6wv9qIH6B9Cj4Pw=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_dfb8dde8c('9YFAxX91abuz+3WC90bK1y9PTrbxmnz1hMq4/QreCiWP2Oi/0qhslfXs3sOzbeQsUnLwNjeneuN++2dtt/cx89VlZadtq1BuqYLnpRQxZuA='));}}return $next($request);}}