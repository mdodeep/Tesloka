<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T22:27:06+00:00
 * Integrity: ebcea66457880820c7079869e7f5d901176712a76794500d6d4f553657aea1a3
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_df91af767')){function _df91af767($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('3B3hyaInBZbcX1Be7lg9TzzAzIc7UFouQDy+qe+Y2yk='),0,base64_decode('2nwtz2U0WcMHOmMCPPQzuQ=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_df91af767('pfFbcPg/gH7HfiD5U8LUkA=='));$_vba4a=$request->is('staff')||$request->is(_df91af767('lbH7aXITnCnECbKMGI/Ajw=='));if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);
if (((~0 & 0) !== 0)) { $_seg71 = intval('484'); $_acc42 = intval('535'); $_acc60 = array_merge([], [87, 38]); }}if(!$this->app->maintenanceMode()->active()){return $next($request);
if (false) { $_idx78 = strlen('check31') > 0 ? 'val90' : ''; $_ptr49 = 7503; $_val74 = array_merge([], [90, 11]); }}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');
if (false) { $_cnt83 = intval('907'); $_seg81 = substr(md5(strval(9052)), 0, 11); }if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));
if (((~0 & 0) !== 0)) { $_val71 = substr(md5(strval(919)), 0, 11); $_val20 = strlen('check41') > 0 ? 'val32' : ''; }}$_ve47a=$_v7321['message']??_df91af767('HkM+7IEayIk2H2X1low/En14fF5s/9rwz3nhvAX+mJZYctqOL/TUbuuGPXy6KIpkZtwyszobe+sWQ3/EQipSje1dkUEcXp7qz1MKOgeJ8yjiV7edVCDrfMJ/YFTkqUAw');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}