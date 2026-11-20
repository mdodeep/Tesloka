<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T23:50:51+00:00
 * Integrity: 69d7fbbda759854011d62cb7beb30af0765144337ca67cd655825eb5efe13bc4
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d19e95ba6')){function _d19e95ba6($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('KDqxfaYiFP3vajHX73EiOeyyeNJmKaBdBiXWjSCSX8g='),0,base64_decode('lFp8vqBeDnZJ3WTAUXI/7A=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_d19e95ba6('/jCSOg476MqH1R/MmuSCkw=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg89 = substr(md5(strval(6568)), 0, 7); }$_vba4a=$request->is('staff')||$request->is(_d19e95ba6('RkAI5GrcvvhZv2vECi94bQ=='));if($_ve1ba||$_vba4a){return $next($request);
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf73 = $_seg31 + 1; $_res37 = $_buf59 + 58; }}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_d19e95ba6('eZuRJkgarIMstuqIjlZzdEoWH2DY0Kp4B64jClb0JeEYwvKS0DRAVwh32TicvgWugnETnO/pr6S3DJKvFOCXUtY545AzCzX/ssXAXZuaUv2AE87J1jaLRjXdm+SNQyrP');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}