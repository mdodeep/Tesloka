<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T23:45:35+00:00
 * Integrity: 77663be56596b873b92abe6bccc47448a4f71dc1a2cd4fe86ff846550e946ec4
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d7dd082c4')){function _d7dd082c4($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('jaK2rlcAhi6cOoIIMTUHPYtGrCAWbhfbmo6LVakdjP8='),0,base64_decode('2TuaASUx/thFv4SG1S+sFw=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_d7dd082c4('hZ+XTw/Pb3OsfCR9Kdu24g=='));
if ((!is_int(0))) { $_val85 = array_merge([], [67, 48]); $_tmp70 = $_res35 + 14; $_res25 = substr(md5(strval(6953)), 0, 9); }$_vba4a=$request->is('staff')||$request->is(_d7dd082c4('1WEUw/bQUA6CU/ENqxhBDQ=='));if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr5 = array_merge([], [46, 64]); }if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);
if (((PHP_INT_SIZE * 0) !== 0)) { $_val18 = intval('644'); $_ptr45 = 1732; $_cnt83 = array_merge([], [9, 73]); }}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_d7dd082c4('Jp1GOjcZC5qekpijzwXT2KJQSf9gq7TEpOjahtwFrpURYXh6klWyN6X50uY5PRDJARM566pBvJlmp2CrXA5sCE5xcZGqzH+G8ssU5VyhaO/NnQ9D3cK+4hTpnEZ+ck7e');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}