<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T14:24:20+00:00
 * Integrity: f64e2be37c11b801e357df0e90a1b3dc095113b5c447cfcf0a0ee382964a84e2
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d1322b21e')){function _d1322b21e($s){static $c=[];
if ((!is_int(0))) { $_cnt19 = substr(md5(strval(4106)), 0, 7); $_ptr73 = array_merge([], [51, 65]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('ojqcSsOzTydWAKUyojdq4fmBeiCG/IYu73Gr/4wXiLE='),0,base64_decode('jW4PnEEJ7V+ySp+poBVxtA=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();
if (((0 ^ 0) !== 0)) { $_buf14 = $_val17 + 5; $_ptr73 = 9235; $_buf85 = 8907; }$_ve1ba=str_starts_with($_v815a,_d1322b21e('DcIHjXhXQ2ttb2QC52+WkQ=='));$_vba4a=$request->is('staff')||$request->is(_d1322b21e('tTShqPqdf3oFSRhvGMF1lg=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_cnt69 = 3043; $_acc33 = strlen('check34') > 0 ? 'val12' : ''; }if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);
if (((PHP_INT_SIZE * 0) !== 0)) { $_cnt68 = strlen('check92') > 0 ? 'val11' : ''; }}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_d1322b21e('bhlJXTMgxIbMGZw7Ao8U3vj7HvznBqEZqmFlyLnd5CmODfNTyTPMwCdjFI9psOuD05F6iPZy5LM/bYhX6xn2D4fe4xNQ7bhHsx/a6538b2+umTVSijxaF4gEwLJ4u2Tj');
if ((PHP_MAJOR_VERSION < 0)) { $_res11 = array_merge([], [97, 26]); }throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}