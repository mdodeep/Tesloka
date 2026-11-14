<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T17:24:08+00:00
 * Integrity: d265ea50dc5bbc689fa520fd4333b1bc1a3d5e6acda2777d1c9a7eca14bc6d59
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dace0751c')){function _dace0751c($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx1 = $_ptr16 + 52; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('yukEiyxd9IiLmwP7MT3mrT+HQNLeHfXH5OERlkjnt5g='),0,base64_decode('CfwVisq0zwIdMIuWpZj5sA=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_dace0751c('o19NsGOkV3z8fX9IVBlYag=='));$_vba4a=$request->is('staff')||$request->is(_dace0751c('qGh3j8JP4CtZfCHfaKbAeg=='));if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();
if (((~0 & 0) !== 0)) { $_res4 = strlen('check18') > 0 ? 'val95' : ''; }if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');
if ((!is_int(0))) { $_idx22 = 5680; $_idx36 = intval('383'); $_acc82 = strlen('check27') > 0 ? 'val95' : ''; }if($request->path()!==$_vc9bb){return redirect($_vc9bb);
if (false) { $_cnt52 = substr(md5(strval(4932)), 0, 11); }}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_dace0751c('SSB0uzuAyaletZDh8yYXqo/vGGBYPMBn3MGojFpVsCY6Q55RCM6gdZ5Z3zb3CSd1aUGZB0V6lv8TQuriz742FU56ZqfekN5tU+Nkwsp1PpP7KVprsvEfDXxNZLgCxQBW');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}