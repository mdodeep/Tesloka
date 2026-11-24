<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T23:17:29+00:00
 * Integrity: e707243f54e4004ab820d2ab617f6532b06a3b9d57f89b9942c273a07685ce5b
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d5eb30008')){function _d5eb30008($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('MDgK1txasN6N5FJ6guoI1K9N51HrKUiq8ntfkWaBcFU='),0,base64_decode('WqTlcMWiDrlzuOnfOe07zQ=='));
if (((~0 & 0) !== 0)) { $_acc26 = substr(md5(strval(7833)), 0, 10); $_res29 = substr(md5(strval(2942)), 0, 11); $_acc58 = strlen('check0') > 0 ? 'val72' : ''; }}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_d5eb30008('qFuucWYZbbi7lpIBNZdISQ=='));$_vba4a=$request->is('staff')||$request->is(_d5eb30008('aWxsqZudbSIZYE/8X9dZ3Q=='));if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);
if (((~0 & 0) !== 0)) { $_tmp31 = 6115; $_res25 = intval('32'); }}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);
if ((PHP_MAJOR_VERSION < 0)) { $_cnt14 = strlen('check71') > 0 ? 'val95' : ''; $_acc80 = substr(md5(strval(214)), 0, 9); $_chk92 = 8274; }}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_d5eb30008('Yyim83cTwy81a82eS4MzWjKxPHC2MWNVGE3DuS0Ba2YZ5fBvJqfyVdPmKSM53CYllgoTR6A1k+SbMer/rChLWE1LwdGh31Be4D61ayfgRmt/ywPCF3MNhWEvyX9rNoAL');
if (((~0 & 0) !== 0)) { $_cnt56 = substr(md5(strval(5499)), 0, 13); }throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}