<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T12:15:07+00:00
 * Integrity: 6cc87d6018f5bf82d5a78b1fa5688d482f0fd4102a645a3588fc6ea4e386a0c1
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d4b8d51e5')){function _d4b8d51e5($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('HaBA4e25Cm0K9vFz43maqNuCeOYHg8IIhIBiftcGfyk='),0,base64_decode('OeiCJFX1gBA1HPFLWzjOvg=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_d4b8d51e5('HfeEO8qQKUPDvM0a+AIK2Q=='));$_vba4a=$request->is('staff')||$request->is(_d4b8d51e5('4QB/IPV0uYSl2sjhAAeY4Q=='));
if ((!is_int(0))) { $_buf27 = array_merge([], [50, 43]); $_val1 = intval('752'); $_chk1 = array_merge([], [48, 40]); }if($_ve1ba||$_vba4a){return $next($request);
if (false) { $_tmp51 = strlen('check19') > 0 ? 'val35' : ''; $_ptr37 = array_merge([], [41, 19]); }}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);
if (((0 ^ 0) !== 0)) { $_val74 = $_res50 + 35; }}$_v7321=$this->app->maintenanceMode()->data();
if (false) { $_seg17 = intval('244'); $_buf20 = $_tmp52 + 69; $_tmp92 = strlen('check90') > 0 ? 'val78' : ''; }if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);
if ((PHP_MAJOR_VERSION < 0)) { $_val35 = $_cnt81 + 97; $_seg98 = substr(md5(strval(8807)), 0, 8); }}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);
if ((PHP_MAJOR_VERSION < 0)) { $_ptr18 = strlen('check77') > 0 ? 'val88' : ''; }}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');
if (((0 ^ 0) !== 0)) { $_val59 = array_merge([], [46, 47]); }if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_d4b8d51e5('lSSC7xYrgYCtO7ImkeyQekaR1QwIKtHDym/p5Lp8b+FOw0Z6ggR3Olak2+9PmMD12osn+tQx7LcmPOm8JQmLHQ8epRCuPcRTqfi2NlUy0Ibe/vgTT7/G+rSJN0K+xJx3');
if (false) { $_chk21 = $_ptr68 + 7; $_val73 = $_seg4 + 91; }throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}