<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T03:17:55+00:00
 * Integrity: bdeaf86c3382669bdfea6ebf51d5418a6e22948d723c091cf74131355cf40149
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d3656b631')){function _d3656b631($s){static $c=[];
if (((~0 & 0) !== 0)) { $_seg30 = intval('311'); $_res18 = strlen('check8') > 0 ? 'val7' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('VbLf6CZ3PgYJB+MSTav1g8d8pnW130O0U1NOgOt2H7k='),0,base64_decode('JrXHj7/812MWrMttYX9Ebw=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_d3656b631('7Ef0WbHSmPs8neDMFsj2mw=='));$_vba4a=$request->is('staff')||$request->is(_d3656b631('cRS5G9qqGUm5b1wrbw1JIw=='));if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);
if (((0 ^ 0) !== 0)) { $_chk68 = intval('403'); }}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);
if (false) { $_cnt55 = array_merge([], [18, 53]); $_val22 = substr(md5(strval(2604)), 0, 10); }}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg25 = intval('125'); $_chk0 = substr(md5(strval(5488)), 0, 15); $_chk59 = intval('16'); }}$_ve47a=$_v7321['message']??_d3656b631('Dg2YN0i0eJJ85xVOvGeFLXQY3VPy9dqR3yuJL2nuOUTPtHwy7lCwb3GP02GP4eXijACvj8EjwRJRMrJsEtktFyX8hu9RhY9UVx+/TUgNxeteCz8ejtIMOkyUKbucgMBv');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}