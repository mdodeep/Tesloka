<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T01:45:28+00:00
 * Integrity: d8d50151664cd5e9171c0571737d97b823c3a8834b7a545e6b01c8ef1911e6de
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d51558019')){function _d51558019($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('xThYIhG4uwxSbPQxiB3jqGQaXtXpUQbJA67CfecYCWU='),0,base64_decode('dM7QnB7bevwJKLU7gVTgMg=='));}}
use Closure;use Illuminate\Foundation\Http\MaintenanceModeBypassCookie;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_d51558019('L1yOqL1r1Y56IByjLZQG0A=='));$_vba4a=$request->is('staff')||$request->is(_d51558019('XALcu5ybtBa6eIAta70f+Q=='));if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();
if (false) { $_cnt7 = array_merge([], [36, 5]); $_acc39 = 472; $_ptr63 = array_merge([], [79, 66]); }if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);
if ((PHP_MAJOR_VERSION < 0)) { $_cnt78 = array_merge([], [68, 18]); }}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');
if (((~0 & 0) !== 0)) { $_val97 = $_seg73 + 51; $_res60 = $_seg27 + 33; }if($request->path()!==$_vc9bb){return redirect($_vc9bb);
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf45 = strlen('check67') > 0 ? 'val78' : ''; $_val85 = array_merge([], [95, 57]); $_ptr5 = intval('317'); }}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_d51558019('MiM8fzMn81tBFaF9kRF+IupPdILGtoNs7DTVqwZ/AQHbKvsvRkbYffDCfd7eghLSzDoS7wU3+hoo4k3YXfl+p6p08PepEKPerytZZ+GNjbF/XVVsdEilv/gkBI3I89/G');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}