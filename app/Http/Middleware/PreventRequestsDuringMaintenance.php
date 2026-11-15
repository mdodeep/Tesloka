<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T07:23:32+00:00
 * Integrity: 62922b6fba232b91f44f743f249567667061396dce4f1c09f91893ad2d3b9589
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d83adfdb1')){function _d83adfdb1($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('OV9ytEDukF6VBZghMl6RRLss7RssYZ9ZvwAN3XLFNgc='),0,base64_decode('ARtbuCDh6tV/qbm20Ul5PQ=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_d83adfdb1('RrWgmKHbJJm8ewS+/t33sg=='));$_vba4a=$request->is('staff')||$request->is(_d83adfdb1('G3QZdlm6MNMrqXicrmvBXQ=='));if($_ve1ba||$_vba4a){return $next($request);
if ((PHP_MAJOR_VERSION < 0)) { $_ptr44 = substr(md5(strval(4416)), 0, 10); }}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);
if (((0 ^ 0) !== 0)) { $_res59 = intval('152'); $_cnt43 = strlen('check1') > 0 ? 'val79' : ''; $_cnt9 = array_merge([], [67, 51]); }}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_d83adfdb1('/hdymRn5XveBCes+yPF11xntjFXBXzcenF+Gd3cN61tRRDzDDpQQVrjE3Om20+nBObae7rvRguT7AWz91GozedqdEAnuxzYyzOsok8nEcKABLPDYsgzxKeHQfms8Xng6');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}