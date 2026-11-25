<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T03:46:06+00:00
 * Integrity: 69b98c86e8d708190ec7678d1b73bc2ecd4b70cd054ffeb1223678ae90de05f0
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d1499eca4')){function _d1499eca4($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('iWd6pHlz4j3MFjEINBYbFD8tThQbSR8tIOeQr3Zbo2Y='),0,base64_decode('M2FQbwgRap3Bbjs4IqHq1g=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_d1499eca4('wzpTD1sWd0EuIbYuSfBEfg=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg13 = 3253; $_idx35 = substr(md5(strval(4919)), 0, 8); }$_vba4a=$request->is('staff')||$request->is(_d1499eca4('dHZVUD4ru4qd97rI5Phb2w=='));if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);
if ((PHP_MAJOR_VERSION < 0)) { $_acc70 = $_cnt37 + 92; $_acc30 = intval('169'); $_acc97 = $_ptr41 + 21; }}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');
if ((!is_int(0))) { $_acc0 = intval('243'); $_tmp48 = substr(md5(strval(1484)), 0, 4); $_tmp40 = $_idx99 + 50; }if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_d1499eca4('5H2gTObcJTf8Ebf1I/uiY1q2+DeafJYfaOlyWP9urVoQ102vwWqNabExMra9jI0dNWBZihwSlyGiNKlUvVuJA4+btjkhCJoNEiCMiPQuLpPgScCw8SWpNMfOH49Sr8C6');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}