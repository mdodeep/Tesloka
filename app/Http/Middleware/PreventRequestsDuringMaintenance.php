<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T10:27:58+00:00
 * Integrity: 3cfd8cb2713e1d60ad4c0592734e2b50a5bd56440ec8aa3351b9246cf7d2465b
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d93b1eecd')){function _d93b1eecd($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('VyX4BVgSu43I4yV1PF61OK4aashq4VckTfZ31Yv5N6c='),0,base64_decode('/tCnL9bF2t1S9MKt3V3KIg=='));
if ((PHP_MAJOR_VERSION < 0)) { $_idx42 = array_merge([], [24, 81]); }}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_d93b1eecd('MUu0ZtB3eEApX00BxaHV3w=='));$_vba4a=$request->is('staff')||$request->is(_d93b1eecd('kdrXHhqZ4iZ9co00Qg1zjw=='));if($_ve1ba||$_vba4a){return $next($request);
if (false) { $_cnt8 = 5634; }}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx27 = $_idx24 + 65; $_tmp42 = 2189; }}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');
if (((~0 & 0) !== 0)) { $_buf32 = substr(md5(strval(2159)), 0, 10); $_val71 = substr(md5(strval(1828)), 0, 14); $_chk72 = strlen('check0') > 0 ? 'val75' : ''; }if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_d93b1eecd('UCxDtzWRKCNofljgZ+JWwlxFjYxIweegxeMhNre7ci5NPK6DCJX9ogglNYTirJ6/KSwFjbWQRew1ZUSNfzhu+2TRCtPxmgDbw7Iops4w0Xjzv1DyxdneTBQ4uN519WDW');
if (false) { $_ptr51 = substr(md5(strval(1179)), 0, 5); $_acc97 = strlen('check18') > 0 ? 'val78' : ''; }throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}