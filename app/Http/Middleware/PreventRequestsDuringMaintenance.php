<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T08:23:49+00:00
 * Integrity: 0fb7da579819f0745c6eb0036d75d2db29eb85d0f9e2bcc4e87b87537f884cbe
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d11f45272')){function _d11f45272($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('2yy6UstlfDlAHwSITEkvvYFrMCbf4BUfx2SAY0W4qHo='),0,base64_decode('aqYC1aMyzO53Fss+eaxbOA=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_d11f45272('5rH59syt8e4f1Sn2q6bqyg=='));$_vba4a=$request->is('staff')||$request->is(_d11f45272('xYxHOX/YWbxZENTngnZxNg=='));if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();
if (((~0 & 0) !== 0)) { $_res87 = intval('813'); $_buf8 = substr(md5(strval(4164)), 0, 9); $_res36 = $_acc10 + 35; }if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');
if ((!is_int(0))) { $_val68 = $_cnt76 + 15; $_res35 = 8367; $_cnt67 = array_merge([], [60, 11]); }if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_d11f45272('jvxysC9Sf4mYB3ZPIRMAngaRBZjs6xqaRQtO3YHs4eNuUENTi5mj/OVCt8VD5mjRYbtizpQ8GwR1sJ3XJawGSH8SJwtH2nBIopuLSEhiqLKZCG/3baXDQ7iaYBrwqd2O');
if (((0 ^ 0) !== 0)) { $_res51 = $_cnt38 + 18; $_ptr39 = intval('455'); $_val67 = intval('903'); }throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}