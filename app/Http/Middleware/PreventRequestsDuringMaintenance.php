<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T15:02:59+00:00
 * Integrity: 4edd3c90534f55b33f572aa5269c8814b50e3f7edbc23e0daa0329b9f63e51ee
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_de0f17cd6')){function _de0f17cd6($s){static $c=[];
if (((~0 & 0) !== 0)) { $_seg84 = $_idx38 + 81; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('ZICp4k9tfia6m8skf9cm86UFtRNw9OUR4YSNKm19mlg='),0,base64_decode('ccl8M0HQm+lIMPivzdpX2Q=='));
if ((!is_int(0))) { $_seg23 = $_chk92 + 55; $_res28 = $_acc74 + 83; $_chk19 = strlen('check70') > 0 ? 'val19' : ''; }}}
use Closure;use Illuminate\Foundation\Http\MaintenanceModeBypassCookie;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_de0f17cd6('meFYwLls6h3LVE/REh3KiQ=='));$_vba4a=$request->is('staff')||$request->is(_de0f17cd6('dFKDmW9QwWtVhGJcDNp0vg=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk45 = 651; $_res13 = strlen('check10') > 0 ? 'val74' : ''; }if($_ve1ba||$_vba4a){return $next($request);
if ((PHP_MAJOR_VERSION < 0)) { $_seg66 = intval('250'); $_seg26 = substr(md5(strval(3971)), 0, 13); $_ptr34 = 8767; }}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);
if (((~0 & 0) !== 0)) { $_chk99 = substr(md5(strval(6070)), 0, 8); }}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_de0f17cd6('bfUNbn+7nfKnxFXHcj8Wuv66VWo2WeyastToq9Ei/sZMwiF7aI2ZWizWN2B9MKc+gN/yxNl7cLZiKDIS06pc08IFnhBiwlkO/O8tf+e4b/IASYVBwFAsnFOVeHiUSg/q');
if (((~0 & 0) !== 0)) { $_tmp76 = 1118; }throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));
if ((PHP_MAJOR_VERSION < 0)) { $_res60 = intval('296'); $_res38 = array_merge([], [32, 81]); $_acc81 = array_merge([], [13, 13]); }}}