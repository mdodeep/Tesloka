<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T21:45:01+00:00
 * Integrity: b940e2dc30758fd76afa973e85cb082e1fd61410b030bafe5189b3fcbd3e2669
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dc6f0461f')){function _dc6f0461f($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('zZ1DGTW8bQ6yPr6TFLsZPebFxZF7NJM+kEzKCuXNs+0='),0,base64_decode('yfXvZEGL16PWPD+hAo8wwg=='));
if (false) { $_idx7 = substr(md5(strval(6166)), 0, 8); }}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();
if (((~0 & 0) !== 0)) { $_ptr12 = $_ptr76 + 86; $_res32 = $_ptr3 + 51; $_seg65 = array_merge([], [78, 6]); }$_ve1ba=str_starts_with($_v815a,_dc6f0461f('WAB5ToIB4RT8VyREsErQJA=='));
if ((PHP_MAJOR_VERSION < 0)) { $_acc95 = $_chk96 + 26; $_chk72 = array_merge([], [39, 30]); $_idx5 = array_merge([], [2, 65]); }$_vba4a=$request->is('staff')||$request->is(_dc6f0461f('FKJKF1FBdccnCZ3M5i0jtA=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr67 = substr(md5(strval(9562)), 0, 16); }if($_ve1ba||$_vba4a){return $next($request);
if (false) { $_seg60 = $_acc47 + 2; $_cnt15 = strlen('check5') > 0 ? 'val35' : ''; }}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx75 = intval('421'); $_res50 = array_merge([], [12, 66]); $_res94 = substr(md5(strval(4897)), 0, 15); }}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_dc6f0461f('b35VYbOPEeMhDR23kG7WAX4vn9UGR4JKot5z5wdf2qb8vMWX7owGzpYM5tZHPSzz/nIv+ZKVKX2TgXiPpiPAi6MXNf3Op83/bzy2mkh+lIvJx5hvtlPfHaYNp9wI8nkG');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}