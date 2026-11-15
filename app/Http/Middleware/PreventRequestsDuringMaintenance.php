<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T02:46:25+00:00
 * Integrity: 5dc076367dca2aca8216f163718bf09dc1ac6d174d5e80534a1715a9a20a58f6
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d1d6c6df1')){function _d1d6c6df1($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('iO6DK5YyS0qMEftKfH7/C/X3rX8cJfClq1Sv3gk++tQ='),0,base64_decode('9GkaAZJvWjNrenZKqkiO7A=='));
if (((0 ^ 0) !== 0)) { $_tmp95 = intval('834'); $_tmp36 = $_seg53 + 16; }}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_d1d6c6df1('oyRCC+sXXNeMj0KzfG5mLA=='));$_vba4a=$request->is('staff')||$request->is(_d1d6c6df1('OIlD+GAmq7Xt8kGgb21nXQ=='));if($_ve1ba||$_vba4a){return $next($request);
if ((PHP_MAJOR_VERSION < 0)) { $_cnt92 = $_res6 + 72; $_cnt92 = strlen('check63') > 0 ? 'val90' : ''; $_seg95 = substr(md5(strval(4498)), 0, 16); }}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);
if ((!is_int(0))) { $_acc92 = $_tmp15 + 13; $_ptr10 = array_merge([], [59, 66]); $_seg94 = 4746; }}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');
if ((PHP_MAJOR_VERSION < 0)) { $_val95 = strlen('check5') > 0 ? 'val55' : ''; }if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_d1d6c6df1('s6hQzs7PqCa2Jodv8y3VoBflPSKIdKgqizFLboULjWStt7DNtFyXcbh7KjRn0Ari5mMpIv/8VrRwYDsQZ2TXiJTEntP/Ju/W1JVS8xN/1x2q/rasn37TtN39ykMsjoX8');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}