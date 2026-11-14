<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T14:26:08+00:00
 * Integrity: 36c9a2f4caea85b0d9be3587e3b699cbbb3fd8478edd5758bd9423d7d268d032
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d469950ef')){function _d469950ef($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('CNHi/Atm72sfc9qL1T1nUzPsW7KRMbHr5t3JzJQ7M8o='),0,base64_decode('aBmfOQrWa76axc19UWhARg=='));}}
use Closure;use Illuminate\Foundation\Http\MaintenanceModeBypassCookie;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_d469950ef('zBMGDYUW5EpVlsq/muCbxQ=='));$_vba4a=$request->is('staff')||$request->is(_d469950ef('czfKoQfi7/VznqObRJ1BVw=='));
if ((PHP_MAJOR_VERSION < 0)) { $_res37 = strlen('check15') > 0 ? 'val22' : ''; $_acc61 = substr(md5(strval(6096)), 0, 4); $_idx81 = substr(md5(strval(2581)), 0, 14); }if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));
if (((~0 & 0) !== 0)) { $_cnt71 = 420; $_idx66 = $_res52 + 3; $_seg27 = $_tmp41 + 74; }}$_ve47a=$_v7321['message']??_d469950ef('MyycYY3MyytgmxZn6m4vxy+pRIoCg3AvZ8MmDKLIZ4fiVrHx4GNkltn30dSTy7FTx7Ym1PdmH5QcAMj53+gyhTRfQ3S8y6IEIdOI8GqDFl2W6lbUyr5Vt/6gudzp0Y6A');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));
if ((!is_int(0))) { $_seg5 = array_merge([], [6, 27]); $_res2 = intval('153'); $_buf51 = array_merge([], [34, 14]); }}}