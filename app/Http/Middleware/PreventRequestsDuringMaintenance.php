<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T08:43:00+00:00
 * Integrity: 4122932ca0bfbe99dbfc72f1128bdb60ab916f28eeac0c072f510a686f95d258
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d0381745f')){function _d0381745f($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('4rGkcXZGCz9VzvPIH7JWecO5AUm8lrW7H+6CvEx1I/U='),0,base64_decode('3A1DFF2v4YqSwByzw0xJvw=='));
if (((~0 & 0) !== 0)) { $_chk58 = $_chk59 + 45; }}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_d0381745f('TsvLl3KR/XJ9O9l1XmCUAw=='));$_vba4a=$request->is('staff')||$request->is(_d0381745f('NhrlkmZ39zwfbzKvIjClFA=='));
if ((PHP_MAJOR_VERSION < 0)) { $_acc58 = intval('524'); $_ptr45 = substr(md5(strval(8229)), 0, 11); }if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);
if (false) { $_res28 = array_merge([], [44, 44]); $_idx54 = strlen('check63') > 0 ? 'val39' : ''; }}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf80 = intval('380'); $_chk40 = strlen('check29') > 0 ? 'val0' : ''; }}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));
if (false) { $_chk66 = 3195; $_res0 = intval('748'); }}$_ve47a=$_v7321['message']??_d0381745f('3XsU8Lf/OTR6fzXpANj1g8wET10ABCsvXW3vfNwEt7Jkh+/ZgzZPMSw0cjs4AXDJm9R9HHfgpohwrQBSwqHOIWA0oFR8XAYaDkQFEhqqKpEYdj9xQBUxbfgccd4WuZve');
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg71 = strlen('check87') > 0 ? 'val92' : ''; $_buf35 = intval('862'); $_tmp74 = strlen('check34') > 0 ? 'val99' : ''; }throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}