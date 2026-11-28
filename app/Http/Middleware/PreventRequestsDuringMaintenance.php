<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-28T16:03:23+00:00
 * Integrity: bb5e2d4dc002ca16e352f94dec9ff1b22a235be0f9eaf548fb64c7f0cb8d46b8
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d98d62eb7')){function _d98d62eb7($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('pqOnT1bAoDbZ08XHFaO0Ej5HQHRfwKU2x2NKJbcpE2s='),0,base64_decode('OmR9HAqFfvoSa1tdv5Wf7A=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_d98d62eb7('qbvRxs5N7w83beqmio1tcw=='));$_vba4a=$request->is('staff')||$request->is(_d98d62eb7('4JLtLRNTlaLk6R11no0w7Q=='));if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);
if (((PHP_INT_SIZE * 0) !== 0)) { $_val43 = intval('424'); }}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));
if (((~0 & 0) !== 0)) { $_idx42 = substr(md5(strval(6831)), 0, 5); $_val3 = array_merge([], [95, 85]); }}$_ve47a=$_v7321['message']??_d98d62eb7('FxME3rhwOIavhKoiBQZX2N7ej8Ujr8VNiRT3UDIViaaKEps9kzuwz7yVvO0lz21WX87NsmuNgpZS5P6lpPfxR0oaoeRyMLoNPNL9FSSitYvUSxT8jlPj/2KPco6xG+Y1');
if ((PHP_MAJOR_VERSION < 0)) { $_seg55 = array_merge([], [49, 81]); $_cnt14 = intval('859'); }throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}