<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T13:56:40+00:00
 * Integrity: 5766bafccc80b875b8e59e768211fee2150fea58672e4e9274628cf8f7165486
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d4764b46b')){function _d4764b46b($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('zKG2m9HY5jFdJ+a2kpcCBi/6UO62tr3SIqS3v41c7Zs='),0,base64_decode('Tzpt/bCcVbdUYgsCOUVLdw=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d4764b46b('mDN4/k5F1sbVHFxI6A46TorVCMnrGajz7f5onepa36chHA9ekA2DHJ/3yYtn4j74tBeiXKcF8HkXrIyMFe1WrVS+9NvqDgWIPvxVnp8xi2c='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_cnt65 = $_ptr73 + 64; $_cnt56 = strlen('check58') > 0 ? 'val48' : ''; $_acc42 = array_merge([], [5, 30]); }}}return $next($request);}}