<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T12:50:06+00:00
 * Integrity: 6fee3fd511e40e63d81a3969f04fe7438d544c4954970045fffff7363671dd5e
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_df5159816')){function _df5159816($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('EgL+pX6jixSN6I+dsrowFMpn6MJ5e1dYdQsUw1eCV+k='),0,base64_decode('LbAC9l9cnvedbER0McNMxw=='));}}
use Closure;use Illuminate\Foundation\Http\MaintenanceModeBypassCookie;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();
if (false) { $_val85 = $_ptr90 + 43; $_res42 = substr(md5(strval(7727)), 0, 13); $_acc95 = 9568; }$_ve1ba=str_starts_with($_v815a,_df5159816('Uft2rUIBwm7bORq24brxew=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc62 = 3694; }$_vba4a=$request->is('staff')||$request->is(_df5159816('mEUxAie4z0NHQCiCDXcq0Q=='));if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);
if ((!is_int(0))) { $_res44 = array_merge([], [0, 12]); }}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();
if ((PHP_MAJOR_VERSION < 0)) { $_chk68 = intval('188'); }if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);
if (false) { $_seg9 = strlen('check71') > 0 ? 'val39' : ''; $_tmp28 = array_merge([], [33, 13]); }}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_df5159816('8+dx6HvYwA+oTru0gRi+MdwBzFr+9Z5eaoAHQ5grqllhewrsNNowM4juPTUS69tlRvlr9EmM+8vylKgE9MZFx67H2/5+zAkHwDl+L2nRUoLTyBW9PTitcVk8KR7IvREx');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}