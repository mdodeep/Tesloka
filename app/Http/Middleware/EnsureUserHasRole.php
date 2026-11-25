<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T00:24:14+00:00
 * Integrity: 5da5c6cca66823dfedddb1121822d4c09c3848265e65b0832f452de0e4642672
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dc6f651d4')){function _dc6f651d4($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('ojeiZ175bOHD2a3J2EbEkKEz6tvR2VwkspoFTuQGqdA='),0,base64_decode('Uf9aEs2B1Ui7dcQsaJtNIA=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();
if (((PHP_INT_SIZE * 0) !== 0)) { $_cnt51 = strlen('check52') > 0 ? 'val28' : ''; $_chk2 = $_seg69 + 70; $_res37 = $_cnt75 + 37; }if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_dc6f651d4('vYwwp26LSUnlDbF+SKkav2CMZZgKDmPfmwE2+1r7uEVDwEDrxt2abzfKYZF67a/EdRp+Rc7YS6P8OutTy9DbR267FJtkfTSOxQEk8Me0C7s=')],403);}abort(403,_dc6f651d4('SJQHWH22gNPw9k4+9vBcoWn8UTllUIH4zDkZ2Y+zwWODQZWtgZ/30r5+IVGSmCrCbxpFhLam993g2wWdb/DCJjpbFnIGjFzI8hi4OSxyI65by+G2npdCtivWlNm2xN+G'));}return $next($request);}}