<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T15:01:07+00:00
 * Integrity: 732d13c17bea258201492d7d488181ebc396461ab0f6b9e4f8436f39a34f93ee
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d95a54f75')){function _d95a54f75($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk38 = $_res90 + 37; $_cnt52 = $_seg22 + 31; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('JgELX2PdrCFShCXbXpQXhh2vbmB11BD46AuZVyLf7b0='),0,base64_decode('WTWlRCBAnF9HBBSudQiJhQ=='));
if ((!is_int(0))) { $_tmp10 = strlen('check13') > 0 ? 'val18' : ''; $_chk2 = intval('662'); $_cnt32 = $_idx62 + 63; }}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_d95a54f75('mEVcTQZ5JIBkt2+9/unTOg=='));$_vba4a=$request->is('staff')||$request->is(_d95a54f75('sBrLEmPwc6+tKDVqgXV9Qw=='));if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');
if ((!is_int(0))) { $_res3 = strlen('check49') > 0 ? 'val70' : ''; }if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_d95a54f75('cLo1A8nd5m4V4mhDpwvgUTdSmyAFT2jO1cAzvqiudY96y7Az+gszFUJ50LUKHmegic9wN2eaNPPI29cCvxQj2QMxoa8lq5PRsJ2AspNI4yv5F2MnMjuG/2DnsWzjvsOJ');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}