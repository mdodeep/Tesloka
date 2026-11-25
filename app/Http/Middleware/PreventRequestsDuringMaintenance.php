<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T02:29:15+00:00
 * Integrity: bf398720bd9a3bd753e409fc55455db0d0d24680c20966a4ff9c3742bc0133a1
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dbb8931a1')){function _dbb8931a1($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('auSZTE55PHI9Swee3Jb3XP7cI3tsk8htk+S5Htpp5Xw='),0,base64_decode('My97yL7oXYGLlkqh/q+4zw=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf15 = 9182; $_idx18 = substr(md5(strval(9650)), 0, 12); }}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_dbb8931a1('wANdDdFUK29+Ot9ZoeJv6g=='));
if (false) { $_acc70 = 5008; $_acc31 = array_merge([], [79, 26]); $_chk23 = substr(md5(strval(1130)), 0, 13); }$_vba4a=$request->is('staff')||$request->is(_dbb8931a1('xfXUrT5PA/DjWdBeBDZTIg=='));if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');
if ((!is_int(0))) { $_acc48 = 4646; $_res41 = array_merge([], [77, 33]); $_chk37 = $_val5 + 52; }if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_dbb8931a1('GvYJ74gYvTtKg2MPpOqkGwNVpaJOElsruBwhNOQE4dxLn5Qzyf6WCJ0U8M+/kBqh5dheu6hbCVF9eI3jmT2j7lKEMtxhNkOcqWmMaHwxc4zf/xXAO4GcZyt7XhVNe5/X');
if ((!is_int(0))) { $_val27 = strlen('check65') > 0 ? 'val19' : ''; $_tmp88 = $_chk81 + 71; }throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}