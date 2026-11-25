<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T04:11:59+00:00
 * Integrity: 7690f1e7540315beac41f13c216f5d848301a24c92c0faff9be9ed433c6f1790
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dc6ca44bd')){function _dc6ca44bd($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_chk15 = 3321; $_tmp93 = $_ptr41 + 49; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('kUoqLCQ8yc0j5tOFrCmZ/CFhK1FLWJXzuUDVyNvq/Y0='),0,base64_decode('XxJbCNU0ljARv6La2IX02w=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_dc6ca44bd('kekS57361ZWVtGyANMmf7w=='));
if (false) { $_res77 = array_merge([], [17, 85]); $_res75 = strlen('check15') > 0 ? 'val85' : ''; $_chk71 = intval('471'); }$_vba4a=$request->is('staff')||$request->is(_dc6ca44bd('rfZNwTeDfuBBOfVoUZpTuA=='));if($_ve1ba||$_vba4a){return $next($request);
if ((!is_int(0))) { $_ptr29 = strlen('check96') > 0 ? 'val0' : ''; $_seg33 = 8327; $_buf73 = 2402; }}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();
if (((0 ^ 0) !== 0)) { $_seg88 = 2778; $_cnt94 = $_seg59 + 25; }if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);
if (false) { $_tmp43 = $_idx34 + 25; }}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_dc6ca44bd('pIO6/6brV5kcpwxo+iiHkjX2Fip0obpL5NDCXrqsR60li2E+cIhz2kdog5vTqnQ923bihHXgsiHRGTcdIgGepVXlyYSMsFvOCqxL9FuRScX0c2zTlB/Jh9p41Ds9bpt5');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));
if (((PHP_INT_SIZE * 0) !== 0)) { $_cnt55 = $_buf62 + 8; $_seg19 = 8050; }}}