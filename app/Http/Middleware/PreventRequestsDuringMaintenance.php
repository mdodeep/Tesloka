<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T05:39:17+00:00
 * Integrity: 33665508b4ec9a26290e522f48c3ed0f715601104515c80adb5c5f76034527de
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d3fdd9add')){function _d3fdd9add($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('QfC2bRtHz6y5LoBfMFB7X31LY0+X6C8P8oBQzhn9/wI='),0,base64_decode('VLKdavFh37o4Tq7U4/e9cQ=='));
if ((!is_int(0))) { $_idx85 = intval('482'); $_cnt68 = array_merge([], [4, 96]); $_seg70 = substr(md5(strval(2303)), 0, 15); }}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();
if (((~0 & 0) !== 0)) { $_ptr6 = $_cnt42 + 32; }$_ve1ba=str_starts_with($_v815a,_d3fdd9add('mkcrSIAbj7pSuQ36v9ssUg=='));$_vba4a=$request->is('staff')||$request->is(_d3fdd9add('1BTAhOtl7dqJ/Iu2GmV8/w=='));if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);
if ((PHP_MAJOR_VERSION < 0)) { $_cnt33 = $_val66 + 43; $_val0 = substr(md5(strval(9537)), 0, 12); }}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);
if (((~0 & 0) !== 0)) { $_ptr68 = array_merge([], [46, 1]); $_ptr57 = $_cnt90 + 82; $_res17 = $_idx25 + 79; }}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_d3fdd9add('boE8K4X/FiEk4KrFfhWL4fVpLxMFzTXnWeCUDoBDUse1PoJVQAN67YchsaB8TzwO4r4pny+yRuGskypZOMeo77BkRlzycze4/qq14kQ3qhIkw1gpfEUIz1/9WWEynf+C');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}