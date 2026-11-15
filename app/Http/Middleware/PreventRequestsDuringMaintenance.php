<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T01:48:53+00:00
 * Integrity: 2b02e96a3b668b5091b70acb55324e853532ac96032889cccec9afa6dfd25cd0
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dcc9131d6')){function _dcc9131d6($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('srnXbsHOzBNCExY46s/ZRWnK8ztxWomxQhw4QP1gwGU='),0,base64_decode('qb3ZWQr5uC6Qq/G8dAnRRg=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_dcc9131d6('YZ+VROovoCS/yV+anX3EZg=='));$_vba4a=$request->is('staff')||$request->is(_dcc9131d6('1QGlk/RY+8poKlg3CDWPAQ=='));if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);
if ((!is_int(0))) { $_buf54 = intval('305'); $_acc60 = 9137; }}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));
if (false) { $_tmp22 = 4050; $_res64 = substr(md5(strval(2421)), 0, 5); $_idx64 = 6186; }}$_ve47a=$_v7321['message']??_dcc9131d6('huL8qZewOQrElnAp6Pg9uyHjTciUPjKz7J7ZI1Ez/ZGHVCHG8gBhXyaPAYLXGLgF2EkKUTK+Q9E0sPRPrvISF66aSjpYbtn+K+iQ9iC0NQLbBS0msUtt6lbR2yL5s3FR');
if (((0 ^ 0) !== 0)) { $_res29 = intval('266'); $_cnt47 = array_merge([], [23, 68]); }throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}