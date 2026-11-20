<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T10:38:08+00:00
 * Integrity: e0a0fe45f10cedfd3d38986dcf8f696755325a946c7fff414a65b8f3292980ee
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_de68984a6')){function _de68984a6($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('fCGVQCZYwithvS5CdIkjZE/IgB8963+d550sKL7umVY='),0,base64_decode('R0Qh7i7BFAgyKqzg6/jzRw=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_de68984a6('3aG8ZaknhDFQNMdO4pir9g=='));$_vba4a=$request->is('staff')||$request->is(_de68984a6('dVd+Jq4QqjtoIR2cmdscAg=='));if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();
if ((PHP_MAJOR_VERSION < 0)) { $_chk42 = strlen('check37') > 0 ? 'val55' : ''; }if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_de68984a6('abuFtmdOge+a348Ef1tme63nCZkBnNDMgqQIkRHe4nSUP0CD1sVsJz5JqSXkY+cHOegLhJKLHiqcpiaNu1Grm4Cgw15k6D6pFWZ+2+srZzK4xOkrP+JRjBJCp3iKy5WB');
if ((PHP_MAJOR_VERSION < 0)) { $_seg56 = 1384; $_seg50 = 6537; $_chk34 = strlen('check70') > 0 ? 'val97' : ''; }throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}