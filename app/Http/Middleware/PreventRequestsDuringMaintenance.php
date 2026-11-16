<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T00:47:05+00:00
 * Integrity: 2c081de88a09f26010759678eeb0fac06b7152875c6795cfafe5f71b9709c5da
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dba9f7872')){function _dba9f7872($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('W5lPzLna6jEP0AllsQDs8nIJSvOU3KgcdPSFRa8Q8YQ='),0,base64_decode('S4oVNbnd6lFqF5LsfLiBmA=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_dba9f7872('1Y7wWoROJmRhkgF9MTMUzg=='));$_vba4a=$request->is('staff')||$request->is(_dba9f7872('Ips6hWxbKGjakJyqa2BpEQ=='));if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);
if (false) { $_cnt51 = 9806; $_cnt15 = array_merge([], [28, 18]); }}if(!$this->app->maintenanceMode()->active()){return $next($request);
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx92 = intval('545'); $_buf68 = substr(md5(strval(2034)), 0, 8); }}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_dba9f7872('Cfopz7dn5jt0YT+tk7+lDFEsWAdrfk36TLT3aaLWzM4/doxdrmiRzGVYvr35VV0KXLks3s3MGV/qu21ukEDD6mqpVOiO0mpkdpP87LtZz9dSyrZ0xzlfBQbG67CPBsjN');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}