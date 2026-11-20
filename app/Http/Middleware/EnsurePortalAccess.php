<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T21:25:48+00:00
 * Integrity: bc2d19b46f670e638cfa7703c51ce0f13b713389932df83ebe3e8b3858e1fabd
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d07012723')){function _d07012723($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('VFF+m8ao/K+u9BoP8BgrW1BGkJhILrpdPNtkOoNx8IA='),0,base64_decode('GPf2JcCcOkurCWip3/AOqw=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d07012723('KCvRdETSXbihqIoCTZVyAgv2P5jWoAAuNSb8SmYBBLc=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d07012723('L18q+gF6QZUNZPSwdiN0wb6iWBLz+tXNZ3AZUveM2wJTYOIxs5vqMRT4Sv8dS1EZroPVvmeir/aFZu1YfV0KwVlLMiHPoIe2jJ8MN0o/VK0xcvdqHtOtOmHxAK+FsAhe')],403);}abort(403,_d07012723('L18q+gF6QZUNZPSwdiN0wb6iWBLz+tXNZ3AZUveM2wJTYOIxs5vqMRT4Sv8dS1EZroPVvmeir/aFZu1YfV0KwVlLMiHPoIe2jJ8MN0o/VK0xcvdqHtOtOmHxAK+FsAhe'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d07012723('L18q+gF6QZUNZPSwdiN0wVz+Malcl/fi3bkCqb82/cnuccLq/KlZNvi8X7cYQgDCGWPOuRVjPi1a+qjAGaa8RQ==')],403);}abort(403,_d07012723('L18q+gF6QZUNZPSwdiN0wVz+Malcl/fi3bkCqb82/cnuccLq/KlZNvi8X7cYQgDCGWPOuRVjPi1a+qjAGaa8RQ=='));}return $next($request);}}