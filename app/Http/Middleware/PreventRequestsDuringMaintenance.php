<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T21:20:40+00:00
 * Integrity: af6d3acfb2e194b7af06fc05cdfb21508ed4daac2fc61ce37d8c71b27cfd6906
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d9dba0f4c')){function _d9dba0f4c($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('D5j9c9dd0aarb/REjjcdhDrVJmWYxM/RBWTWgeol+e0='),0,base64_decode('csdjyjhinJzF8D4GR4zhSg=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_d9dba0f4c('SPxTIzvaxZYqe1eReK5VFg=='));$_vba4a=$request->is('staff')||$request->is(_d9dba0f4c('2+EjM1VqcYr1Ez4qFX/I9Q=='));
if (((~0 & 0) !== 0)) { $_idx20 = strlen('check27') > 0 ? 'val68' : ''; $_seg61 = strlen('check14') > 0 ? 'val74' : ''; }if($_ve1ba||$_vba4a){return $next($request);
if (false) { $_val92 = substr(md5(strval(9920)), 0, 5); $_chk17 = 6091; }}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_d9dba0f4c('u78UqWgQ3V4nTMtLMePbJxsyFxEg/XVn4a0NgDPTvpfA5VXlFS1ZKI8zkZ8YMcjCeLWx4C5xAydC0WsOGTTX8UypzPGC89mvUTf+4bEtMCSoBu/+sCABS3WX8ZC7tG5u');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}