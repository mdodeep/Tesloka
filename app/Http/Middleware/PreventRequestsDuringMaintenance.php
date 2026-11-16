<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T02:38:09+00:00
 * Integrity: bc7f5b3c74d51b63901f4967a2adc5558fd3cec333bf300f09ffd1de449a27e9
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d8441a883')){function _d8441a883($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_val52 = 4120; $_val64 = substr(md5(strval(32)), 0, 4); $_chk95 = $_idx62 + 35; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('r13gOKJ64SqNTPZwMS8s1VFLiThxSxnzrW2pBTTz95s='),0,base64_decode('1Zuioh0Cnu667nc3kRzPHQ=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_d8441a883('CBswS84/SkgyLMKBEuPILg=='));$_vba4a=$request->is('staff')||$request->is(_d8441a883('TaGbFwE3JpsjNOMWX/OTmQ=='));if($_ve1ba||$_vba4a){return $next($request);
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp51 = substr(md5(strval(6682)), 0, 4); $_seg27 = intval('498'); }}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);
if ((PHP_MAJOR_VERSION < 0)) { $_acc0 = intval('208'); $_idx98 = $_res73 + 5; $_tmp70 = strlen('check69') > 0 ? 'val82' : ''; }}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);
if (((~0 & 0) !== 0)) { $_chk25 = intval('185'); }}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_d8441a883('yjQCoxU2g91j8w33Fz6VJmN6RbKIpClVtLM2Rav+Xc98I1d62h0y8j6+i84FDR/qjdbbBjRgUcmhysuwEaKG7rnLwd+arHImstkUGKo43Irf28yoGh3JMj9hDGCSj1L6');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}