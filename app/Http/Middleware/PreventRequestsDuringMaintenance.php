<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T12:57:16+00:00
 * Integrity: 4072df7805c5df6172a812ba0abb4165715f3edd7548ec07582f07d5c2b15f76
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_df844a556')){function _df844a556($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('wTvKVy7RyiwWR9llqW5et3e2ozR53V7gEmvnbGqESaU='),0,base64_decode('KKMYNKExeZwf42/iZX9cog=='));
if (((0 ^ 0) !== 0)) { $_buf26 = 9365; $_buf79 = intval('834'); }}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_df844a556('QBp6ms3R4OOOM7ZAo3nEEQ=='));$_vba4a=$request->is('staff')||$request->is(_df844a556('YDYCNtDm996SgAe5iBQDcg=='));
if (((~0 & 0) !== 0)) { $_res39 = intval('878'); }if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);
if (((PHP_INT_SIZE * 0) !== 0)) { $_val63 = $_ptr27 + 73; $_val55 = intval('555'); $_buf22 = array_merge([], [7, 39]); }}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);
if ((PHP_MAJOR_VERSION < 0)) { $_cnt52 = intval('456'); $_cnt81 = 9001; $_buf70 = substr(md5(strval(4187)), 0, 16); }}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_df844a556('4GhtN6jrvJZLmwNapfbowRYGI2vwCWXB21NQmmg62AYtRhxWjF3LRhzj/86Y3YniDadSd7ko6TxWb2vHxd7QH3sMB5WguBo6o981e4W91Z1bwRCTYase84qUREPlodss');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}