<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T02:29:33+00:00
 * Integrity: 43fdf86efbfbbb1116c9caf705672898348bcddc1b8947fa1b458ec37cb62b52
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d292ce997')){function _d292ce997($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('VHQo6ztJF1DcYtYAWM51K8yWi5ZI6AxkePu/RF3EcgY='),0,base64_decode('QOunDcXXMX/CrrDTuyOW8g=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_d292ce997('6pmklv+I1WIj3dToZPuj8w=='));$_vba4a=$request->is('staff')||$request->is(_d292ce997('DSfDKqvPwDVsshd3T+T+Dg=='));if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);
if ((!is_int(0))) { $_val71 = substr(md5(strval(1807)), 0, 5); }}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);
if ((PHP_MAJOR_VERSION < 0)) { $_chk60 = strlen('check66') > 0 ? 'val96' : ''; $_buf41 = intval('197'); }}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));
if (false) { $_acc94 = intval('488'); $_buf97 = intval('949'); $_res89 = strlen('check12') > 0 ? 'val67' : ''; }}$_ve47a=$_v7321['message']??_d292ce997('lvGBukV0UvLcTxsuJ5P43tAik5yFX6sDYg6wHMaTISyZvwAtcwYRRxGnp2Hb0bNWPJF3PEYXLENf7iJ0sFfRUPY7gqH7HsmGyvR6BbgOxq1j86ur5zWX38bKtHV0DDSC');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}