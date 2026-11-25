<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T03:21:26+00:00
 * Integrity: 8f90fb12585ba5433e80e954547474262d9a60cce968d861279d136af920b5bb
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d74eff9f2')){function _d74eff9f2($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('7UZM6SrATy3b9TuJUQ1zw5rQIRBIctaYnHr1l2z72F0='),0,base64_decode('QH0EdUfa4HioG1Khjq9XSg=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_d74eff9f2('RVJaaFwx/pVYNjFbIl96IQ=='));$_vba4a=$request->is('staff')||$request->is(_d74eff9f2('Hb/XN00sACXsPhttYDubCw=='));if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);
if ((!is_int(0))) { $_chk61 = $_tmp55 + 87; $_tmp64 = substr(md5(strval(2865)), 0, 8); $_ptr46 = strlen('check80') > 0 ? 'val72' : ''; }}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();
if (false) { $_cnt42 = 6908; $_buf18 = strlen('check51') > 0 ? 'val55' : ''; $_val56 = 1727; }if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);
if (false) { $_val23 = strlen('check20') > 0 ? 'val68' : ''; $_idx54 = 6761; $_acc43 = 5566; }}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));
if (((0 ^ 0) !== 0)) { $_ptr40 = array_merge([], [57, 35]); $_res19 = array_merge([], [49, 75]); $_val62 = 4789; }}$_ve47a=$_v7321['message']??_d74eff9f2('MgHt4lZfdOJgsE35BvtsqbSuuo168C6B9TspCxkCqbwotq8+PEhu9WqKpmluv/X8JhF0585JQmrXxL0TlG6Y9jCNZNFkxdkW58UhbuNS5lDTlW2GtD4zbGmQE5YwlMTR');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}