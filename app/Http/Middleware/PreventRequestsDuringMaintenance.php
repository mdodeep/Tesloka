<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T00:14:22+00:00
 * Integrity: cba49dac84e23e46259554721a02318f0fec97670fbdd18307dcaddb2439029b
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d443e1ab9')){function _d443e1ab9($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('ekZSo2YeM5e5w9/tD6dCsYrXqVH9o6b6Qmy83/YIMUk='),0,base64_decode('GzJ9B5tJTyX1YEa+Z/ZyiA=='));}}
use Closure;use Illuminate\Foundation\Http\MaintenanceModeBypassCookie;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_d443e1ab9('s3MKOkffA/12DWmDIuQsNQ=='));$_vba4a=$request->is('staff')||$request->is(_d443e1ab9('uyoWtRY+0XA8Qtft8V11MQ=='));if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);
if (((~0 & 0) !== 0)) { $_seg86 = 4433; $_cnt20 = array_merge([], [29, 73]); }}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');
if (false) { $_idx45 = intval('546'); }if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_d443e1ab9('jK2DqLr1dHI1FDnsqqBHjZ7eU79/n4BGEhV7Siz682BxW0d9ege36o5glvcs0rOkDkCo7dhYHHXtMtL0rpGmiWIjEWH96I/o3wsNbTrPQPDaiK/xL+LZuGCFqXwyw3Xw');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}