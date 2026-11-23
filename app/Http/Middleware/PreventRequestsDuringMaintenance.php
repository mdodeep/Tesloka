<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T22:10:06+00:00
 * Integrity: 1eaae2e57942a726e2a50ef69fd1762e9e4022eacc69fd6ec78c3da7a2a3b9c2
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_db6747f94')){function _db6747f94($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('NBN5m88GYu9QgeHcWQfkZZu+popkSDddmmwuTDP75o4='),0,base64_decode('/LuX5dC+XGL1gQln4yXCIg=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_db6747f94('DQwSFD3eOJeozqc2tR5/aw=='));$_vba4a=$request->is('staff')||$request->is(_db6747f94('S4UtNWa64DIp3vZ+BDRCQw=='));if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);
if (false) { $_ptr27 = $_val60 + 96; $_res46 = array_merge([], [82, 31]); $_acc57 = array_merge([], [69, 14]); }}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr57 = array_merge([], [98, 55]); }}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf32 = substr(md5(strval(3975)), 0, 11); $_buf74 = $_res4 + 76; }if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_db6747f94('sBdntlOKEtiVAuSvhuEIlSBi9gAdn2h20UNYN9afnWGim/7OO1jA9KGO103VLm/5JEz+el9qAYL3Dmaw69TvVN8XP5YAIZr8jgbs1tM98fNSZA/Wg/kW4XW7W36qRU46');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));
if ((!is_int(0))) { $_buf28 = $_res33 + 24; }}}