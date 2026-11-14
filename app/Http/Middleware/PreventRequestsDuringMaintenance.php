<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T14:33:03+00:00
 * Integrity: 5825c4b58f1782521538e33f3b1d0d4d3ae088ba26ed6da8509eef8d6ee93945
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d0942980f')){function _d0942980f($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('EBWlbh1XcKFKHUS2MIRRnrUosvabmgbpuVgiDuveAog='),0,base64_decode('eaPYNRrv1jdO1tchTIZdxA=='));}}
use Closure;use Illuminate\Foundation\Http\MaintenanceModeBypassCookie;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_d0942980f('p0OiFHIJHthxETM2RehGjA=='));
if ((!is_int(0))) { $_res65 = array_merge([], [2, 65]); }$_vba4a=$request->is('staff')||$request->is(_d0942980f('3DmbZrogBXamLg/v6CuYPg=='));if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);
if ((PHP_MAJOR_VERSION < 0)) { $_tmp52 = $_val27 + 35; $_tmp78 = strlen('check46') > 0 ? 'val30' : ''; $_cnt50 = $_buf86 + 68; }}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);
if ((PHP_MAJOR_VERSION < 0)) { $_buf27 = intval('702'); }}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');
if (((~0 & 0) !== 0)) { $_chk24 = intval('253'); $_seg44 = 8878; $_cnt7 = substr(md5(strval(9674)), 0, 6); }if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_d0942980f('2+oh+ar2lF9Ot8rpyeSpjiPZsjsPeiZDtPD8DCscGs36BzeISpyp6+tU0lufnZlupnaiBTo2CIr8weS8jQDzb5noIXYm3g/lrvpgcxdz75YEPsFtkuqwclmWu9A3+/tQ');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}