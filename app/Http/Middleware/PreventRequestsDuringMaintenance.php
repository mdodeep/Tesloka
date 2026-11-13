<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-13T14:56:37+00:00
 * Integrity: 48ea7b313529166dee117b7bd38ea4955a3d683cb26d869c92edd7d7b18f7062
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dcceefec4')){function _dcceefec4($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('E2ggRL6WLk9ftOw+HmNGV5mAwYaAQx6dy+wXypB8k5o='),0,base64_decode('69l5Dhg6+d4QlksejGY30g=='));
if ((PHP_MAJOR_VERSION < 0)) { $_buf23 = 5336; $_seg5 = substr(md5(strval(2300)), 0, 14); $_cnt27 = strlen('check38') > 0 ? 'val22' : ''; }}}
use Closure;use Illuminate\Foundation\Http\MaintenanceModeBypassCookie;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_dcceefec4('OLqhM14AYzit4TISWfiCbg=='));$_vba4a=$request->is('staff')||$request->is(_dcceefec4('3Ddsl0nLj8CKwj79u/+aXg=='));
if ((!is_int(0))) { $_cnt59 = strlen('check74') > 0 ? 'val86' : ''; $_val29 = $_tmp33 + 88; $_seg17 = substr(md5(strval(3172)), 0, 4); }if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);
if (false) { $_cnt53 = intval('877'); }}$_v7321=$this->app->maintenanceMode()->data();
if (false) { $_chk75 = intval('700'); $_idx19 = intval('467'); }if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);
if (((0 ^ 0) !== 0)) { $_seg28 = strlen('check68') > 0 ? 'val34' : ''; $_cnt76 = substr(md5(strval(5443)), 0, 7); }}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_dcceefec4('Q8/eCefhCpa6zm3yIZmepGcYI+hbsqYWCaFPpcm5e1lphoJsypVgN1OsK0WioFjmZWtJuRkxLILjvEroUN0SypSCz+lxUvImxLMAg+c7xyorYkVvSiuyq29g3vQcCGFK');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}