<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T07:37:08+00:00
 * Integrity: 453f233f3fab52634ec2f18e0752b7d9c835945c007e1a04ea31d7efaf616c33
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d4be814e6')){function _d4be814e6($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('BvYV+VO+hk8sOwuvMFqR6Jhi1QO1AI9tJ/TdkhWqp7M='),0,base64_decode('DudFTVQeR+TKUEAYqUPeFw=='));
if ((PHP_MAJOR_VERSION < 0)) { $_val38 = array_merge([], [45, 37]); $_chk82 = array_merge([], [10, 79]); }}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_d4be814e6('xLZ819SgkDxyfCDH61T/KQ=='));$_vba4a=$request->is('staff')||$request->is(_d4be814e6('vYWJ3hu5SF0Ggbi33lQ8Mw=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx90 = strlen('check18') > 0 ? 'val6' : ''; $_acc48 = $_res43 + 34; $_seg92 = 8839; }if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);
if (false) { $_ptr25 = 8586; $_acc82 = 6899; }}$_v7321=$this->app->maintenanceMode()->data();
if (((0 ^ 0) !== 0)) { $_cnt75 = $_ptr19 + 42; }if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);
if ((!is_int(0))) { $_tmp54 = strlen('check71') > 0 ? 'val20' : ''; $_chk51 = strlen('check93') > 0 ? 'val83' : ''; }}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);
if (((~0 & 0) !== 0)) { $_res88 = intval('499'); $_ptr74 = intval('379'); }}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');
if ((!is_int(0))) { $_idx41 = 7013; $_val50 = strlen('check41') > 0 ? 'val75' : ''; }if($request->path()!==$_vc9bb){return redirect($_vc9bb);
if (((~0 & 0) !== 0)) { $_res0 = substr(md5(strval(8781)), 0, 5); $_res3 = $_res12 + 52; }}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_d4be814e6('mur4Yhv+1nQCtaFs59FTEO8TsfZWRKrDvZavtgfU/fvWqHh59mKN4QBVKKw7NSNPG2D35qAYA2uZcxJKoJ3kp+s3K0qkY3i3s0LIXDzjjQ3BEkG3u3g7ygzT4suqD3z+');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));
if (((~0 & 0) !== 0)) { $_tmp95 = strlen('check59') > 0 ? 'val55' : ''; $_ptr31 = array_merge([], [8, 48]); }}}