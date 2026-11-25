<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T02:50:41+00:00
 * Integrity: 64771d9a235275694c09940543fe8d77b77bec728e537f3a96b21b98180dc397
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_db7e326c6')){function _db7e326c6($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('BH0i6WrH5up7StkiBYeLabRBrUXg2XI1KMbPGuycKy0='),0,base64_decode('AbPfUHukN5dh6pFfUuQXIA=='));
if ((PHP_MAJOR_VERSION < 0)) { $_ptr5 = 5019; }}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_db7e326c6('k6kLr6aLR2IMUCFIi3uqVw=='));$_vba4a=$request->is('staff')||$request->is(_db7e326c6('OWPemoA+/4pmgh/M7NKEzA=='));if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);
if (((PHP_INT_SIZE * 0) !== 0)) { $_cnt6 = intval('65'); }}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);
if ((PHP_MAJOR_VERSION < 0)) { $_res90 = 8237; $_res62 = intval('508'); $_buf31 = intval('91'); }}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_db7e326c6('6qpHExuZpikNdgeGBMsuDffMnL87aUwpMByXViNTPcxX209/vo04YpTlsaBtRIMf77pWmRgSBkuEeNEXqKyvlfKBa4OSZIzLYXC7jAd8E5n0CtPB+gVrtaFkXNS56+Qw');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}