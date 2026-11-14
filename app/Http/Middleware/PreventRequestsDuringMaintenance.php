<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T01:41:26+00:00
 * Integrity: daf5c66de71bc09bf0c0a2fb71b5b6723e05ef631f92f337e40f6b92ee499698
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dbd77e57e')){function _dbd77e57e($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('3kIjRoqd47AjKbLUVSZEl+Osz/PLxhxifZX1ynKVxUo='),0,base64_decode('fgrtQxg5snDW/fleup7qUw=='));
if (false) { $_acc26 = array_merge([], [73, 38]); $_cnt71 = intval('45'); }}}
use Closure;use Illuminate\Foundation\Http\MaintenanceModeBypassCookie;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();
if (((0 ^ 0) !== 0)) { $_acc91 = strlen('check20') > 0 ? 'val22' : ''; }$_ve1ba=str_starts_with($_v815a,_dbd77e57e('ETRWzs67IyBsFirM3UkZGA=='));$_vba4a=$request->is('staff')||$request->is(_dbd77e57e('QEwxM4ljTdrkvORktdy/yw=='));
if (false) { $_buf62 = array_merge([], [40, 51]); }if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);
if ((PHP_MAJOR_VERSION < 0)) { $_val51 = array_merge([], [57, 68]); }}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_dbd77e57e('0lh3vK4eOr7pYsNaA9UKPuhAqIgTuC/tZox42YhElqmTaOWp2yweFTfBTEjw0vj1Uf1rLy+xqbmtEcwY4K5XOEISgRUYTzrBlJu+H0DA1PS8/vDwA104NsCyQ7DbMHb2');
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg47 = $_buf51 + 60; $_seg37 = 1218; $_cnt41 = 269; }throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}