<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T15:29:50+00:00
 * Integrity: 236dd0e3467bc4ce564f0c4033cbd8713f7abb388c86928344a1a6690f9242d6
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d0ef6c302')){function _d0ef6c302($s){static $c=[];
if ((!is_int(0))) { $_cnt57 = substr(md5(strval(2313)), 0, 7); $_seg79 = intval('951'); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('1ILZwAbo9RDNO6+rr4w310+qjMqo21XxClY8zKGgzBA='),0,base64_decode('499NnmGBDLcq3MJ4idqnOA=='));
if (((0 ^ 0) !== 0)) { $_cnt35 = $_cnt47 + 86; $_ptr22 = strlen('check45') > 0 ? 'val53' : ''; }}}
use Closure;use Illuminate\Foundation\Http\MaintenanceModeBypassCookie;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_d0ef6c302('61fqEBNQY0Nt/1cI+if4CQ=='));$_vba4a=$request->is('staff')||$request->is(_d0ef6c302('IQHGDu20WFyM2MZmJ0u6+g=='));if($_ve1ba||$_vba4a){return $next($request);
if (false) { $_idx99 = substr(md5(strval(8921)), 0, 9); $_seg81 = array_merge([], [36, 6]); }}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);
if (((PHP_INT_SIZE * 0) !== 0)) { $_cnt74 = strlen('check74') > 0 ? 'val3' : ''; $_res67 = array_merge([], [75, 53]); $_ptr10 = array_merge([], [46, 88]); }}$_v7321=$this->app->maintenanceMode()->data();
if ((PHP_MAJOR_VERSION < 0)) { $_res60 = 8005; }if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_d0ef6c302('dgo0kEg+9PkWKRTpMT3vt5Ffbsjm4nOS3X0coBnGSBuCdCgURDRFXcJgsTKCoBhBLwWTjt8oTfencYMDRs+6p4JDlNNEyPIwhvy6h++Y/3KqnBoJnosKi4OduZm+0VNt');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}