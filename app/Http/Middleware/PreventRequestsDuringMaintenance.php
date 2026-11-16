<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T07:59:36+00:00
 * Integrity: 74cfb1c25712ae88dea77b8ced4b20e6d077872b406f2c9f7a388b25212eef21
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_df8f162fd')){function _df8f162fd($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_idx90 = $_seg49 + 58; $_seg76 = intval('672'); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('jvEm62oW86N5mIPRWymLWDFXjHtoxWY6s1RvWOFBMRM='),0,base64_decode('qT7Tck5F77O8QPdN5T2l6w=='));
if (((0 ^ 0) !== 0)) { $_seg50 = intval('299'); $_buf94 = 2853; $_buf21 = 687; }}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_df8f162fd('hdi3nGLTWxf9Gq07Jfz9Sw=='));$_vba4a=$request->is('staff')||$request->is(_df8f162fd('+gPOVxOwbjqDNpxsL+R+Mg=='));if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx95 = array_merge([], [11, 24]); $_buf23 = array_merge([], [52, 63]); $_cnt42 = intval('651'); }}$_ve47a=$_v7321['message']??_df8f162fd('ihuSmvNpd/M3lgw3c8n6gHM5AEq7DqyeV8HFAkiHUUumeU/HQzwf2iyqlJbhhQ1Or4eVfsbZ0c++urxB+8BpL1rEYu84JuUualPou44EUj7f6FaygxJ7mH62YAwh0E/J');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}