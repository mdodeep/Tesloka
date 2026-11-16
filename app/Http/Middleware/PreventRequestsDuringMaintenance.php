<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T09:50:57+00:00
 * Integrity: 5cf67b61e0674535d9f6749ad9e5aaf61ba8ad764de9e4f520e54a95d11dbfd3
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dce60a533')){function _dce60a533($s){static $c=[];
if (false) { $_buf40 = $_buf45 + 67; $_val26 = strlen('check35') > 0 ? 'val81' : ''; $_buf48 = 1873; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('bNCXMWq/YLOhjtMkyRFPihgHjfrg5q1sQzc1CqIA9FQ='),0,base64_decode('rttDHO88+ofabdqHLQpmqA=='));
if (((~0 & 0) !== 0)) { $_ptr37 = intval('36'); }}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_dce60a533('/7Z60XAmvEKA8w+Q1+UBWA=='));$_vba4a=$request->is('staff')||$request->is(_dce60a533('TNYonpYA16WyZDgLNu3Aig=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc68 = substr(md5(strval(2649)), 0, 15); $_chk78 = 9011; $_seg35 = strlen('check82') > 0 ? 'val90' : ''; }if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);
if (((0 ^ 0) !== 0)) { $_cnt68 = strlen('check71') > 0 ? 'val2' : ''; }}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();
if (((0 ^ 0) !== 0)) { $_chk87 = intval('238'); $_buf79 = 1374; }if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_dce60a533('RQy0dTACD1fE0Vwkee/+fzIaQOwrcP9SoCgfLrKSRrvs1gsVVItArMSujb43dy0uXYJf1bxjbzV1Ef61xmrfKRbQPEc/xZfRoHEnydSzh8l8cBwPv6E49wDeD72wMYab');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}