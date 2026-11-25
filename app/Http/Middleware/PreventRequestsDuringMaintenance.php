<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T00:24:14+00:00
 * Integrity: 5da5c6cca66823dfedddb1121822d4c09c3848265e65b0832f452de0e4642672
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dfff794bd')){function _dfff794bd($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('u30KiOZopetRPK1sjlbA2WabXd+z9LMMc/H6ZCmlYtI='),0,base64_decode('W6XtAfGmiNycYArPb9WCRg=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_dfff794bd('GyXADwvddCxtr/05Yxot9Q=='));$_vba4a=$request->is('staff')||$request->is(_dfff794bd('eI3bAcbEOUJs2eBS4GpHZg=='));if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);
if ((PHP_MAJOR_VERSION < 0)) { $_chk8 = 508; $_val22 = strlen('check82') > 0 ? 'val40' : ''; }}if(!$this->app->maintenanceMode()->active()){return $next($request);
if (false) { $_chk3 = strlen('check43') > 0 ? 'val10' : ''; }}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_dfff794bd('TPO2yg9g7/FjIsbiz0RVRbyZscv262CzS25Bm7TnuzNITS6LDUTD9+YXFoIbxLPb6fLVY4lM1l7fo60QDqOvGlRubcMnyi2pkDhJFOg4Z+9wgr1CV8xumGEB1a/fPmUW');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}