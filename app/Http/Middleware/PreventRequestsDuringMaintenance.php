<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T08:25:42+00:00
 * Integrity: bdf411897d6e92d2c062c00df8c8159ae397421da420a7f909e77fb6460130be
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dddb8a121')){function _dddb8a121($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('0Sc1asLtufEDeBSLz6ss/A3ID55XBrxfhsf0jz8XBeA='),0,base64_decode('tY7lF7Acovd0NQ4t9p2lug=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_dddb8a121('fM51JSm+EWwge01OhjaupA=='));$_vba4a=$request->is('staff')||$request->is(_dddb8a121('6OaVohc/v8bbajzX1IQo6Q=='));if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);
if (((~0 & 0) !== 0)) { $_ptr74 = substr(md5(strval(154)), 0, 11); $_buf47 = strlen('check29') > 0 ? 'val30' : ''; }}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);
if (false) { $_seg1 = array_merge([], [77, 9]); $_res13 = strlen('check30') > 0 ? 'val19' : ''; $_acc84 = intval('717'); }}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);
if (((~0 & 0) !== 0)) { $_ptr20 = array_merge([], [25, 71]); $_val7 = strlen('check75') > 0 ? 'val11' : ''; }}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_dddb8a121('0HHI+fmoXxXcjTRKQZp0BUfVesf0jGOICbtVPkY2ifQamWHzRhkjMdiRV9saD0SBJspApRSM7HcJ5GEPdGg5cEJrAn6zB69OL/QrgComWO2eSXm/6n/qMPgReU5sEsmJ');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}