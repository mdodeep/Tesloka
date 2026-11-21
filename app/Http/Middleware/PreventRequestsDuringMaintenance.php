<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T22:23:12+00:00
 * Integrity: 22fe0485658e378b8e3824adbf5f2768e37e3742a2eba6ba81060bb1364b2fab
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d54ea647e')){function _d54ea647e($s){static $c=[];
if ((!is_int(0))) { $_acc72 = intval('906'); $_acc58 = substr(md5(strval(2450)), 0, 14); $_seg64 = 4986; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('wkC2LflScXMLdNr2Xs5RHhVdAmVgcWY0S8lYCmc7uEU='),0,base64_decode('EQFdStrGVSPxYL8OZkcNYQ=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();
if (((~0 & 0) !== 0)) { $_cnt90 = substr(md5(strval(3892)), 0, 13); $_tmp66 = intval('945'); }$_ve1ba=str_starts_with($_v815a,_d54ea647e('Wibi/w/DoNtXDFdPdz2aow=='));$_vba4a=$request->is('staff')||$request->is(_d54ea647e('INAxwLH4JnJ+LLhMrDr1XA=='));
if (((0 ^ 0) !== 0)) { $_buf30 = intval('800'); }if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);
if (false) { $_seg99 = strlen('check31') > 0 ? 'val82' : ''; $_buf42 = $_cnt92 + 68; $_val22 = 1761; }}if(!$this->app->maintenanceMode()->active()){return $next($request);
if (false) { $_ptr97 = intval('404'); }}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');
if (false) { $_chk44 = intval('997'); $_tmp95 = substr(md5(strval(3972)), 0, 16); $_tmp33 = intval('308'); }if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_d54ea647e('NyyOSBNNf5vd1Oy1RnOmEkiZYSxr5BtWIKGgxBoxxGkYovzNePnm849YcWF3r8aUjYrTEdiJ6xeMZQjJeyXM56M9WH1zXG00pHcx5ZUh1Hk7WyvgcQrIYdT+1g9pseDo');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));
if ((!is_int(0))) { $_tmp62 = intval('893'); $_val92 = intval('298'); }}}