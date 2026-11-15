<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T11:11:07+00:00
 * Integrity: d9e0c3e3ccb5cb15493ff7363b92dc026aab25644f9eded31ab8067e7dd27405
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d94b41ef1')){function _d94b41ef1($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('aX/fSI6prYLaY8Dv+tfcWsBO24n3i/iOiPwpVuF7RfE='),0,base64_decode('MjkIYde0tTHb+hx3zhuRrw=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();
if (((~0 & 0) !== 0)) { $_cnt90 = strlen('check70') > 0 ? 'val12' : ''; $_tmp4 = strlen('check51') > 0 ? 'val16' : ''; }$_ve1ba=str_starts_with($_v815a,_d94b41ef1('/RZ0blZfCGoHu0CiKKUgzA=='));$_vba4a=$request->is('staff')||$request->is(_d94b41ef1('tiEiRmFojx/uQEnHoSNiaA=='));if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);
if (((~0 & 0) !== 0)) { $_tmp47 = intval('691'); $_cnt57 = array_merge([], [93, 1]); }}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_d94b41ef1('slkHHgAeF5ZdC9JAD6VhBKhyxkBgMsXHPT8rDfHSamArCVz/VfnSV/JMGInMEd3kj0YjWsC2az+mGphmkfX1eIm6pC8B60Fc3Xf26fi93u+jcrc1iqcW4JADGpxTJZxW');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}