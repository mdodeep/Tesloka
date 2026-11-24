<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T23:17:29+00:00
 * Integrity: e707243f54e4004ab820d2ab617f6532b06a3b9d57f89b9942c273a07685ce5b
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dc22d094c')){function _dc22d094c($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('s9MR+uA3JK1oh4obVcLExQYKzOolVwLcP6Y3B8iNj3Y='),0,base64_decode('uwIb462H7f6LP++/raYPmg=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();
if (false) { $_buf52 = array_merge([], [79, 66]); $_seg62 = strlen('check5') > 0 ? 'val87' : ''; $_tmp19 = 9141; }if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_dc22d094c('Wc0J9u+yy5PE9OdtZElnL0sLeweNe5dxxhqYbu2/xCNwfVndLQueGsGDJ/Y0xzsGm7giAB4mICqLn0MLwPdoeIjb8qRffyDmbIbwbILxJUk='));}}return $next($request);}}