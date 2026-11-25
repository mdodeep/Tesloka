<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T03:00:39+00:00
 * Integrity: 3bad3d4fa11dee0cfe1ada07762cbe00c63a79c37c90885345211f475742f7f8
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d565460d9')){function _d565460d9($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('X11AoJUm3xO2WKjvDYZQs5pDDuuy6yDaDrAOiyiQZNE='),0,base64_decode('2QpG7rsHUdhGK04xic+JeQ=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();
if ((PHP_MAJOR_VERSION < 0)) { $_buf1 = strlen('check36') > 0 ? 'val63' : ''; $_buf6 = intval('555'); }$_ve1ba=str_starts_with($_v815a,_d565460d9('20Nz1HFG0ErO7zCI/rliwA=='));$_vba4a=$request->is('staff')||$request->is(_d565460d9('gF536r4A/vn3GGplPT9Lww=='));if($_ve1ba||$_vba4a){return $next($request);
if (((~0 & 0) !== 0)) { $_chk76 = substr(md5(strval(1499)), 0, 14); $_res60 = array_merge([], [43, 74]); $_chk43 = strlen('check74') > 0 ? 'val99' : ''; }}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx50 = strlen('check46') > 0 ? 'val61' : ''; }}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);
if (false) { $_seg56 = array_merge([], [43, 84]); $_ptr89 = strlen('check79') > 0 ? 'val45' : ''; $_res78 = strlen('check75') > 0 ? 'val95' : ''; }}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');
if ((!is_int(0))) { $_res53 = intval('592'); $_tmp20 = array_merge([], [80, 96]); $_res55 = intval('546'); }if($request->path()!==$_vc9bb){return redirect($_vc9bb);
if (((0 ^ 0) !== 0)) { $_acc71 = strlen('check81') > 0 ? 'val9' : ''; $_ptr88 = intval('674'); }}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_d565460d9('52lkXlxOh/tlVTLjFUXEpj0hLo3FcEWSPDOYX2b7rk9XZGP8zA5tPPCQ+iE6ITTAqgfxMyIY/J4AS6zb08h2MdzYd4ffbQP4kcD5j/iO8wgIlkIWK6rkPwRVkF7Bm7U/');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}