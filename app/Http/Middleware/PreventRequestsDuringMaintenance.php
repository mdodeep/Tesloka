<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T03:52:06+00:00
 * Integrity: b8aabd027ec1f419dc5f633661aea2ff50061edb89673b2f38ddd91efe947ffb
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d08123e3d')){function _d08123e3d($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('I7uMTGO0wyqZAHMVKBXC/qN1awjH7lWN8PBJzBQK0q4='),0,base64_decode('AeUk0uqJnf6Nimelbw7L6A=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();
if (((0 ^ 0) !== 0)) { $_buf14 = 4550; }$_ve1ba=str_starts_with($_v815a,_d08123e3d('MyA9I1KUK2XU7ek40ZqJ6Q=='));
if (((~0 & 0) !== 0)) { $_ptr3 = $_acc58 + 92; $_chk20 = array_merge([], [77, 48]); $_cnt15 = $_acc48 + 3; }$_vba4a=$request->is('staff')||$request->is(_d08123e3d('/6PQkQuxlURv2r4g01iq7g=='));
if ((PHP_MAJOR_VERSION < 0)) { $_cnt60 = $_val14 + 25; $_val6 = intval('505'); $_ptr34 = 869; }if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);
if (((PHP_INT_SIZE * 0) !== 0)) { $_res3 = intval('545'); }}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk24 = array_merge([], [46, 13]); $_val64 = array_merge([], [71, 85]); }}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_d08123e3d('8k246fLl5Cf6e9GdQYt3pC1HInnaNbjc2esh2b8rMuFCqAXT6jxCex21DiWYVAHFngwpUTB/CACYN5Nc6nFsL0h0DeStwJ59J42tQcQCLgqjHMJ862YTnYw1kcsun50B');
if (false) { $_acc48 = intval('596'); $_acc44 = array_merge([], [61, 73]); $_res81 = $_res96 + 8; }throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}