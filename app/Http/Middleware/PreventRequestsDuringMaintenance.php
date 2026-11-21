<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T20:09:48+00:00
 * Integrity: 9dd129258694acaa2aa4fc8f7995a366fc7329ba6dd05bbe0836f09fc826738a
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d4713a49b')){function _d4713a49b($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('KD8kaUy+oGHG5zMJ+SECXhZG3it4BcjMnLS9lZBhmOs='),0,base64_decode('/sXuzC8mFEb3Awuo9ET1Hw=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_d4713a49b('4W+XC+mNqMKtuSvGTRgWOg=='));
if (((0 ^ 0) !== 0)) { $_ptr52 = 5028; }$_vba4a=$request->is('staff')||$request->is(_d4713a49b('j5+4rkfXQQoYEij6UW7LIA=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk52 = array_merge([], [90, 13]); $_cnt78 = strlen('check55') > 0 ? 'val95' : ''; }if($_ve1ba||$_vba4a){return $next($request);
if ((!is_int(0))) { $_idx8 = array_merge([], [48, 18]); }}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);
if (false) { $_tmp22 = $_idx61 + 6; $_idx27 = 2548; }}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_d4713a49b('dC85kUdCyXmWem57eHd/xxSdDq9A0dzqk+HPLbEQewlqxs8O5SodiypyijELjGbFfBoHlRSg4uQrx/PqjTaMlxDDrFBsdoCQMWGwROmEi0y0aK0MgDD/QkW1smdRkKoE');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg76 = substr(md5(strval(2593)), 0, 7); $_tmp42 = array_merge([], [18, 92]); $_buf29 = array_merge([], [40, 15]); }}}