<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T13:06:37+00:00
 * Integrity: cf1490e0e40d44e80b28fdf590044dfef46bee366998158e0ab499e7710c3b23
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_ddbf7ed47')){function _ddbf7ed47($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('uRnKtd/KWALnivbI7eZL6IXOVF5an70ByEo7YR+0Z1Q='),0,base64_decode('UQ7v1ghewhzaG0OgUAvxDg=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_ddbf7ed47('ExJt3DrB40lA5GVxM/V7nA=='));$_vba4a=$request->is('staff')||$request->is(_ddbf7ed47('wOBa3HrRWSh18m2/4MhvUw=='));if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);
if (((~0 & 0) !== 0)) { $_ptr93 = strlen('check29') > 0 ? 'val38' : ''; $_chk29 = 7297; }}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');
if ((!is_int(0))) { $_acc53 = array_merge([], [81, 64]); $_tmp15 = $_res87 + 49; }if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_ddbf7ed47('2HN0eaRYGsXApJqi6p5rfcxUJNhoxX+dZXPD1Q/31Hf5hS3GlpLxhYMQqnw/Ri9qtczjAuOePdPZNyIrvpsVXh6evVekIfUtY3fCu/zyg74HWM/hp/9OefDFb/guREo5');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));
if ((PHP_MAJOR_VERSION < 0)) { $_idx43 = $_val68 + 68; $_tmp12 = strlen('check55') > 0 ? 'val4' : ''; $_tmp32 = 2878; }}}