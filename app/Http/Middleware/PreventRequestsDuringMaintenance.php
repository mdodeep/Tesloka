<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T23:08:28+00:00
 * Integrity: 5c94317afd2613abd4cac910af081de6044c3184fbb4b7b29ec81b4dba5e2cee
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_defa9ba9e')){function _defa9ba9e($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_buf69 = $_acc35 + 3; $_tmp71 = 327; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Jgr2UYtKYhfpoTbY8A07S2dOiP0ryE+Gf9Ci3tOeh/M='),0,base64_decode('20nXWVo3ekL9MErosTofCw=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();
if ((!is_int(0))) { $_cnt72 = 2843; $_seg90 = intval('229'); $_res60 = 9002; }$_ve1ba=str_starts_with($_v815a,_defa9ba9e('KWHwVpwTjU4MVVc1DAQjLg=='));$_vba4a=$request->is('staff')||$request->is(_defa9ba9e('3cDvwjhAg9AWxuYZUWnQAA=='));if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();
if (false) { $_ptr4 = intval('145'); $_val67 = array_merge([], [15, 26]); }if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg34 = intval('270'); }}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_defa9ba9e('/DIu0EH/vBEKiVmMqQ+pMwA5hbCQH2UJ89fZX7hlcrIK0iRGgtWRhD46XI2wYQ97wm/Msy4yzznqQehtWBrUJPLBY2ZaXz0DTteYbcqbJsnNoNK9cLPlSPghBR3MoIlm');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}