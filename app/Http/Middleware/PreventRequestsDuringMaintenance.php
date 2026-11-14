<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T12:00:09+00:00
 * Integrity: 62cc99f0674a100fbafa818261736a32373c8a2eee231e5285bfc54cf0a56681
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d0bda6999')){function _d0bda6999($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('2kZqlHaSyo+twvGC9svix1a8eSJlB0U+HVPijxEtUIw='),0,base64_decode('C9Zqw5LswUR+UbqAUdB98Q=='));}}
use Closure;use Illuminate\Foundation\Http\MaintenanceModeBypassCookie;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_d0bda6999('iGDruw5uWoNV9W1QH5eaZw=='));
if (((0 ^ 0) !== 0)) { $_seg72 = strlen('check21') > 0 ? 'val47' : ''; }$_vba4a=$request->is('staff')||$request->is(_d0bda6999('BdQBf5syja8lbsruv9RikQ=='));if($_ve1ba||$_vba4a){return $next($request);
if ((PHP_MAJOR_VERSION < 0)) { $_idx77 = strlen('check73') > 0 ? 'val56' : ''; $_res10 = substr(md5(strval(3394)), 0, 12); }}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);
if (((PHP_INT_SIZE * 0) !== 0)) { $_cnt82 = substr(md5(strval(8931)), 0, 10); $_seg90 = strlen('check45') > 0 ? 'val80' : ''; $_chk80 = $_val94 + 87; }}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_d0bda6999('PvWqGZdgakH0Sd/0AGZxEqWMIFAMnQDzAVH4pfny1iyGAA3zn55yzZt1BxAIgLukCdHFPAjJZp72ugL7H+RGSWZEkLSblVYf3wewnpyucTO7ri+TL/Z2uBn8xDHinxxz');
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk50 = substr(md5(strval(6028)), 0, 6); }throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}