<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T16:16:51+00:00
 * Integrity: b673b20a2930094cebc22ad245023decb7a42598d258d4d6d8c4c6cb6524651e
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d13aec6d0')){function _d13aec6d0($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('IEmmMrOOQYoaaKow+QsdgJxeG1xIB28wfcZGNhXtrno='),0,base64_decode('qK5+s1ai1jAvQ7GNUmLzwQ=='));
if (((~0 & 0) !== 0)) { $_tmp12 = 4426; $_ptr13 = substr(md5(strval(2619)), 0, 8); }}}
use Closure;use Illuminate\Foundation\Http\MaintenanceModeBypassCookie;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_d13aec6d0('91noMXC4GHVniYhFT2BTxg=='));$_vba4a=$request->is('staff')||$request->is(_d13aec6d0('HkViSkZXYhGj3yxtff6wFw=='));
if ((PHP_MAJOR_VERSION < 0)) { $_res49 = $_seg17 + 57; $_tmp63 = strlen('check3') > 0 ? 'val57' : ''; $_ptr61 = intval('891'); }if($_ve1ba||$_vba4a){return $next($request);
if (((~0 & 0) !== 0)) { $_cnt64 = $_chk56 + 96; $_acc71 = array_merge([], [42, 5]); $_tmp24 = intval('198'); }}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);
if (((~0 & 0) !== 0)) { $_ptr76 = $_cnt41 + 95; }}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_d13aec6d0('Zav+xJIImSvFpgqO0YDh/K8CToLqM3eyglBjb65jA8LxKEOFnoa5YDSx5q2f6LaQSOGyyZxY2Cv9E4kHoq6qpYaqPvvnU4syPcd26jJXAyvYYnpOt2B8WCancjDo+9w2');
if (((0 ^ 0) !== 0)) { $_val66 = 6835; }throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));
if ((PHP_MAJOR_VERSION < 0)) { $_ptr94 = intval('559'); $_cnt76 = array_merge([], [8, 59]); }}}