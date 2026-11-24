<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T16:39:10+00:00
 * Integrity: 5aa2806c8b55a3bb93428696f05684b8c1418a4bfc3fd31fec9a9a96c1e82701
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_db18fc87a')){function _db18fc87a($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('K2NyNzZ/txKoU8t1RZtJkxTQrOfi/lW9ulb6SbC3iIo='),0,base64_decode('MwIteKE5XTBwTpmM5Ka8SQ=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_db18fc87a('q4XLyOLot/rWGZ5d4up7/Q=='));$_vba4a=$request->is('staff')||$request->is(_db18fc87a('xJTkaXw0j3xk55+SlPDEyA=='));if($_ve1ba||$_vba4a){return $next($request);
if ((PHP_MAJOR_VERSION < 0)) { $_res46 = substr(md5(strval(9519)), 0, 15); $_seg80 = array_merge([], [84, 14]); $_val48 = $_chk69 + 30; }}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');
if (false) { $_acc88 = 7786; $_res63 = 6238; $_val50 = substr(md5(strval(9784)), 0, 4); }if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_db18fc87a('jz1XswfJBg8rHyc31+77/sPY3kaGoUr5TyjWhAaNDQOJ605wZwN9TUb8wOA4c/Yb8oWu+d/1mo5dzWJrpk1GjbhqrEDlY+H3HhRVgEC6KijgxlsCfjUyw1A0h4D9tHkn');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}