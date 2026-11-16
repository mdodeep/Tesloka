<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T09:06:07+00:00
 * Integrity: 97253e7a138b8dfc29cb91654dc1e219bfff6043bef9e78fea4f64e20462c2e9
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dee5c9dfd')){function _dee5c9dfd($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('8LVEHRLSfUBWHVgZMD9PZeDJtT3P46PdCLLmiJohfMI='),0,base64_decode('vHmWyHheZ6CGz2RbOmq5Yw=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();
if ((PHP_MAJOR_VERSION < 0)) { $_buf48 = intval('502'); $_ptr30 = 9409; }$_ve1ba=str_starts_with($_v815a,_dee5c9dfd('QNbvPmuOzfZXbLMX7jKYcQ=='));$_vba4a=$request->is('staff')||$request->is(_dee5c9dfd('nAjL8V4BULv+xrVcpr2TGw=='));if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);
if ((!is_int(0))) { $_ptr57 = strlen('check33') > 0 ? 'val8' : ''; $_ptr21 = $_cnt73 + 48; }}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_dee5c9dfd('H+Z08z1V16Zbh1eBIijN33Tpy/IaYs5+FO2N1RRYbb8PugCydWj937kmZuH+2EPNyGdGILjTIot/OYiSbCl/6nqcAGilQm+f/kGLHOh/72ToLd/0VmXb0voRAl/1W5GG');
if ((PHP_MAJOR_VERSION < 0)) { $_idx43 = strlen('check99') > 0 ? 'val92' : ''; $_res0 = $_cnt27 + 91; $_chk99 = array_merge([], [92, 9]); }throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}