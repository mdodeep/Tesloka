<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T00:08:20+00:00
 * Integrity: 7e97075b0c1d11d33345a82032b32d9a6731eec33cb5702f74d22d41762357b3
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d7c0ba07c')){function _d7c0ba07c($s){static $c=[];
if ((!is_int(0))) { $_tmp56 = intval('592'); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('tJLzjoW0xaTmKmdb+T0i1urIiNWndsL1Hwss+UkLv2w='),0,base64_decode('Q46R9Z2QIiirp8yrkaqbQQ=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_d7c0ba07c('OrNGJ1imQNMwPYqcihNsDQ=='));$_vba4a=$request->is('staff')||$request->is(_d7c0ba07c('+59th09hnzIliSj/D6K6mg=='));if($_ve1ba||$_vba4a){return $next($request);
if ((!is_int(0))) { $_chk44 = $_tmp78 + 53; $_val65 = intval('414'); }}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();
if (((0 ^ 0) !== 0)) { $_res73 = 1578; $_val23 = array_merge([], [27, 3]); $_val18 = $_tmp49 + 17; }if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_d7c0ba07c('Ix74sUimybwM/4jWs3zNRtu4PtiaordXXZnhcBYb50b3g1Wnc/cDtmiz0VA8tFxZhE9pz/pHMK4NgQsUnCyWRjgTF/SHxsiG1AGev2k1NaUPx/zPvfeMVsE9zE5RYKKi');
if (false) { $_res63 = $_cnt96 + 23; $_chk25 = 706; $_res96 = array_merge([], [29, 87]); }throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));
if ((PHP_MAJOR_VERSION < 0)) { $_ptr22 = array_merge([], [59, 92]); $_tmp8 = 6758; $_chk43 = array_merge([], [45, 8]); }}}