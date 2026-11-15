<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T15:21:22+00:00
 * Integrity: 1288d8c03502ab6b0836b8c6f127e3e459d217625768cb5178f28a6b13cab141
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d246bae9d')){function _d246bae9d($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('/mEMXmldaZytusHcPECp3NHxbJs14gNh4wCN2jHYmtI='),0,base64_decode('HL+TcldYOEmwA9kQ/gPlbA=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();
if (((0 ^ 0) !== 0)) { $_idx32 = 1349; $_ptr39 = $_res4 + 68; $_cnt40 = substr(md5(strval(2596)), 0, 7); }$_ve1ba=str_starts_with($_v815a,_d246bae9d('7sV/Lsb1F8DVFqOBdNAqyw=='));$_vba4a=$request->is('staff')||$request->is(_d246bae9d('c3p4ylbT1dX0UAmD4o8hcw=='));if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);
if ((!is_int(0))) { $_acc60 = substr(md5(strval(8004)), 0, 6); $_idx6 = strlen('check49') > 0 ? 'val95' : ''; }}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);
if (((0 ^ 0) !== 0)) { $_buf56 = 7384; }}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');
if ((!is_int(0))) { $_seg77 = $_idx69 + 86; }if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_d246bae9d('leu87VMj3IQa37EytYK3KQot57E3YyR6xSkPpO0x5vMYrkbS7gNESPXIssTDNzvFkP/8jVj7lVEXE+NxG1bTTJ0tbVmjc3LBEYSG89jHPKgaSvVWFk6vbdp3SQ8OGNw1');
if (((PHP_INT_SIZE * 0) !== 0)) { $_cnt44 = array_merge([], [42, 3]); $_cnt51 = strlen('check26') > 0 ? 'val4' : ''; $_chk54 = $_chk72 + 60; }throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));
if ((PHP_MAJOR_VERSION < 0)) { $_val25 = 6128; $_idx72 = intval('375'); $_acc7 = intval('257'); }}}