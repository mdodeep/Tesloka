<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-13T16:55:49+00:00
 * Integrity: cdb3cae4b3710d8d8cfe9f4685f40879093b2b1a050e3aad5b955c10b1974307
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_df55b04ee')){function _df55b04ee($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('rb9umLcuGEpEBZIunH2u4797YFPcqiTIc85hKk5uvcI='),0,base64_decode('oorZF2wS0hQ8L6ud/g0jLQ=='));}}
use Closure;use Illuminate\Foundation\Http\MaintenanceModeBypassCookie;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_df55b04ee('LWCYksr1jfzO1+a0r62NPw=='));$_vba4a=$request->is('staff')||$request->is(_df55b04ee('MNMaz4R88TSXoelTBhbVtw=='));if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();
if (false) { $_buf23 = strlen('check51') > 0 ? 'val0' : ''; }if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);
if ((PHP_MAJOR_VERSION < 0)) { $_seg5 = substr(md5(strval(2882)), 0, 10); $_buf49 = $_acc86 + 31; }}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);
if (((0 ^ 0) !== 0)) { $_acc76 = $_acc2 + 33; $_acc70 = substr(md5(strval(410)), 0, 14); }}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_df55b04ee('8hyEdscRG8gGfUBR/PMxtmqHzVTHURNCgGYHdcio576YaJKS73mfEcewj4d9o0Rt/hu05rYPLP2HoI8HkZ5H/Gh+Xv306Bej4tndqpJDVBi+gXZ8mq6rPFaTXRjs0R3c');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}