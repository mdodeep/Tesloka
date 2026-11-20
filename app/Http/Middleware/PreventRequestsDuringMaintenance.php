<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T21:34:56+00:00
 * Integrity: 1616d70ea295bee04dbd2667613704e9a193fe91f5bd7deff383c04143dd6e93
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d57b2f6dd')){function _d57b2f6dd($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Ub5eXHQUYfG/QMQTK48ak7REilVtCNFzjQEMxsVfGIw='),0,base64_decode('6GeAmX/GK6hpulWp7M8UTA=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx86 = array_merge([], [39, 33]); }$_ve1ba=str_starts_with($_v815a,_d57b2f6dd('1rZWZaKypcijZikz0fI09g=='));$_vba4a=$request->is('staff')||$request->is(_d57b2f6dd('622/Hi/QyrKPZF78UboMoQ=='));if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);
if ((PHP_MAJOR_VERSION < 0)) { $_acc69 = $_buf49 + 46; $_val11 = substr(md5(strval(5189)), 0, 12); $_cnt3 = substr(md5(strval(70)), 0, 10); }}$_v7321=$this->app->maintenanceMode()->data();
if (false) { $_seg14 = array_merge([], [30, 24]); $_res67 = strlen('check69') > 0 ? 'val27' : ''; }if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk47 = intval('410'); }}$_ve47a=$_v7321['message']??_d57b2f6dd('b28PkeL78/2imR7wmh1tVBQtG/O+cTGT2T/TlcwDCAypaFe1bTD/lyqWB+GjM3i++2LLoDRXkXT0L6mp46h7/TrZgR7hnqEXuu5/R8oztX/Ztm1rnMqaxANHyXvuaUtd');
if ((!is_int(0))) { $_ptr6 = strlen('check99') > 0 ? 'val96' : ''; $_val20 = strlen('check91') > 0 ? 'val39' : ''; }throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}