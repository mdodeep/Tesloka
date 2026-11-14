<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T01:32:37+00:00
 * Integrity: c26470604a903a6a7d4184ad215ef4f7d5a13de5765ed4d43f1e4a1476352b4e
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dc9ad7290')){function _dc9ad7290($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('wVLu771lo3Sv33BKVoWu5zkn075c892k8E1fDxoqJeM='),0,base64_decode('gvwGY1nymBHMHRKJ9uyEsA=='));}}
use Closure;use Illuminate\Foundation\Http\MaintenanceModeBypassCookie;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_dc9ad7290('A4cDNUWnESgvgnVktlhmfQ=='));$_vba4a=$request->is('staff')||$request->is(_dc9ad7290('Y2KmzJeKQzGut6oo8FWiQA=='));if($_ve1ba||$_vba4a){return $next($request);
if (false) { $_res53 = substr(md5(strval(5064)), 0, 10); $_res33 = strlen('check65') > 0 ? 'val4' : ''; $_acc79 = strlen('check25') > 0 ? 'val73' : ''; }}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();
if (false) { $_seg84 = substr(md5(strval(7065)), 0, 14); }if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);
if ((!is_int(0))) { $_val47 = substr(md5(strval(8866)), 0, 12); }}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));
if (((~0 & 0) !== 0)) { $_chk13 = intval('523'); }}$_ve47a=$_v7321['message']??_dc9ad7290('/s0oM2lyrJLm2/v22RPLoViWihiBK+nhyvlk2ACRyJPJnjyDFtAOgy3QbvsEaRK9yGnztXjFRgwhR1Yt/KJNgFYNbzHJgGa6rrfE0WnsqYjuj/mrUNaqiolRStVa3UFq');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}