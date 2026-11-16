<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T00:12:03+00:00
 * Integrity: 827550dfee9bb5c5eb345a2beaa3a4c0ec71eb2e8d7fe8a9ed3961444bdfc0f5
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_db2487f2f')){function _db2487f2f($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('l+eNk8MAImV0HNhuC/xzMNHJoqAtyyuxvbSQ/PEfWjA='),0,base64_decode('/o+n5W/nUbpbCL29j/Ge1A=='));
if (((0 ^ 0) !== 0)) { $_buf49 = intval('163'); $_idx29 = array_merge([], [75, 29]); }}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_db2487f2f('ieO5ioDXKK5IlOI2IJ1zKw=='));$_vba4a=$request->is('staff')||$request->is(_db2487f2f('3JySN83BKdx9ex+ae5h+3w=='));if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();
if (((0 ^ 0) !== 0)) { $_tmp45 = substr(md5(strval(6561)), 0, 12); $_tmp99 = 2982; }if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);
if ((PHP_MAJOR_VERSION < 0)) { $_buf84 = array_merge([], [84, 71]); }}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');
if (((~0 & 0) !== 0)) { $_buf45 = intval('551'); $_val19 = strlen('check8') > 0 ? 'val44' : ''; $_cnt20 = strlen('check54') > 0 ? 'val37' : ''; }if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));
if (((~0 & 0) !== 0)) { $_ptr23 = 8272; }}$_ve47a=$_v7321['message']??_db2487f2f('qIs7pZzBNKBK4qkOOA1FJMMAGsxm/FWiGKF3QOCazBCKqH9cooJJS/wuSWO6rzWhhYvzhZbA/JOFDm/vmb2/GsMrn8RefJ9xtg4ovHdIK+K0wvIjjaYjD4sYY0QDsgFf');
if (false) { $_cnt2 = 7987; }throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}