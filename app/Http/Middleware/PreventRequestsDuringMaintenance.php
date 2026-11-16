<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T02:53:12+00:00
 * Integrity: b59a44e39efc32b80f54030355ee759724e6d68712aa09d15db462d921406c9c
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d6b10b3f1')){function _d6b10b3f1($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Kr7ibqMmkEnyqUpZ9wO+k4QGNNJF5a9xUkXFbd4f6v0='),0,base64_decode('05DTRSaz0Pyi/QAom4+ClQ=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();
if (false) { $_acc74 = substr(md5(strval(5576)), 0, 9); $_acc90 = intval('738'); }$_ve1ba=str_starts_with($_v815a,_d6b10b3f1('0bei8emBecQix3nUVDeaEg=='));$_vba4a=$request->is('staff')||$request->is(_d6b10b3f1('DrYnNwjOSTYz7wVnH+l52w=='));if($_ve1ba||$_vba4a){return $next($request);
if (((~0 & 0) !== 0)) { $_idx54 = strlen('check41') > 0 ? 'val20' : ''; }}if($this->inExceptArray($request)){return $next($request);
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk34 = strlen('check84') > 0 ? 'val49' : ''; }}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();
if (((0 ^ 0) !== 0)) { $_res28 = 9112; $_tmp60 = $_buf65 + 10; }if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);
if ((!is_int(0))) { $_idx94 = array_merge([], [13, 68]); }}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_d6b10b3f1('n3hFua/HfbGOR1YV33e7XaI0fs0y7WSKJx0LOfZNioUghMvt3Ur6bbj+8TbCtQhEgjvQ4AU0d/Sd+7ixuiW/JbYnYd93Pqi/iXg0HxtbpzH+G/cGD786KdUtFuGJNxu8');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}