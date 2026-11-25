<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T04:01:47+00:00
 * Integrity: f88df7d65adc1d8f0a18cd81bd0b15f0b7e9b62ece981f525d8fefa11912f0bf
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d368e9994')){function _d368e9994($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_cnt5 = array_merge([], [69, 68]); $_seg69 = 8646; $_ptr66 = substr(md5(strval(855)), 0, 4); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('h2bjz6eXhIwIMryodYuZ5z8HHetoroQFo86HNcuxi3A='),0,base64_decode('50TBKrQNJg7YajM6LQRMyA=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_d368e9994('JurXMHCXjVK0uxj0qMV/+g=='));$_vba4a=$request->is('staff')||$request->is(_d368e9994('fZAZEcyDuHxwceSlTXN/ig=='));if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();
if ((!is_int(0))) { $_ptr92 = 4704; }if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_d368e9994('iA9wDAtodahbuGYqczQQruCrNWNmPiYSF9CMKB3ldAOY1fXHfH0DjncVyk68NurTa9BLCngekyDs6z/t5CdVGXIoYv34hnuQfw9mYJdVVO3DUEVtKSTbxHmVFeMRnw/i');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}