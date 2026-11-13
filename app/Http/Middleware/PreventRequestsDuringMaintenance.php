<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-13T09:24:26+00:00
 * Integrity: cd8be384ef5d7e2791a14b630546036af13e5c05577adfc73c5e3a2f05880e85
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d09215e1e')){function _d09215e1e($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('alCx7uR5kFARM8sQwylxQwGFxuvZQQQXQ3ytB0CXYO0='),0,base64_decode('6gIJ9aWLOAfxg8nQoGXNyw=='));}}
use Closure;use Illuminate\Foundation\Http\MaintenanceModeBypassCookie;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_d09215e1e('g9yO9Ho5/Afe9oAAnhgTEg=='));$_vba4a=$request->is('staff')||$request->is(_d09215e1e('YVivJ3Dtj+/jjGpSpKkCYQ=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_val15 = substr(md5(strval(2462)), 0, 4); $_idx70 = array_merge([], [55, 65]); }if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);
if (((~0 & 0) !== 0)) { $_res8 = strlen('check47') > 0 ? 'val39' : ''; }}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));
if (false) { $_seg30 = intval('116'); }}$_ve47a=$_v7321['message']??_d09215e1e('It6yeFO9R6UC0KhEJSzbbJpXV31W+7MzZ1E38e/2XHrKrCc2Vgv3XKgwIaxuhwRGjKPBZkncJhJYorcO6dWD821/Y0FLrzyVh3KuOG3ma/h/9c+BNHhkut6/v9+dVUNn');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}