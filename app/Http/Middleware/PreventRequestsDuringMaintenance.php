<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T15:39:43+00:00
 * Integrity: 0fdf13291d07f0e42301c8c3306b05ab598cd2c738e47ff0d4f9093778ec66c3
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d10fec302')){function _d10fec302($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('EV9UaMoTOpUzGbBINWEx+UmtNIUla7c6eGvULglVXLs='),0,base64_decode('PdfIt7Y2oLTpoR2SmMio7g=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_d10fec302('aBg4dyjy1RHJMYkijCi0KA=='));$_vba4a=$request->is('staff')||$request->is(_d10fec302('PbNJUuAXxaoNEIC7H0nXRQ=='));if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);
if (((~0 & 0) !== 0)) { $_chk36 = array_merge([], [4, 18]); }}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));
if (((0 ^ 0) !== 0)) { $_idx3 = intval('765'); $_idx76 = intval('824'); }}$_ve47a=$_v7321['message']??_d10fec302('Geh+pR9C+wJddMdqEc2dkr6ue2cDqI3OwixOV9zyWzOsRNrhkxZHbMGgN99q+SXTn4a5OE4FPLP+gvoefntHKA2pr3rqV9K8jZPaA4sdZjj/hCGihs9+/4YWZacQPbDv');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}