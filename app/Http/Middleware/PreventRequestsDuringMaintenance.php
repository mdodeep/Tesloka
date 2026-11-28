<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-28T16:58:08+00:00
 * Integrity: b569a6ea1f737116fac7d003fe121953f2ad02dc4ce5a5b026441832468f85b4
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_daf5a03a0')){function _daf5a03a0($s){static $c=[];
if (((~0 & 0) !== 0)) { $_acc4 = $_cnt19 + 75; $_chk22 = array_merge([], [16, 14]); $_buf76 = substr(md5(strval(8534)), 0, 4); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('vvZBrZz6FL1K4n7DMV3GkpHJJCal2ygQMvyx9/7WaGo='),0,base64_decode('lm0bmuHEj2S24PmlL6c1hQ=='));
if ((PHP_MAJOR_VERSION < 0)) { $_val21 = intval('531'); $_val81 = $_res71 + 42; }}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();
if ((PHP_MAJOR_VERSION < 0)) { $_idx15 = array_merge([], [74, 68]); $_chk12 = array_merge([], [65, 34]); }$_ve1ba=str_starts_with($_v815a,_daf5a03a0('GwWf41PlEJOQjFVBMTBggw=='));$_vba4a=$request->is('staff')||$request->is(_daf5a03a0('ilQ+y5++bfhnazWanaehvg=='));if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_daf5a03a0('YVemP7767tdSJs80OxSeYdlk0GCntGlE2tCBjlcvC96WjDkSfUo8YETjDHJnqmFiaCGjJ73qylEgX/BRW0Uot3WaenveixFZCucK/GZv4aNNOJZp+5E5RfMunkwZ6Bi0');
if (((~0 & 0) !== 0)) { $_ptr97 = substr(md5(strval(7167)), 0, 4); $_acc52 = substr(md5(strval(3796)), 0, 11); }throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}