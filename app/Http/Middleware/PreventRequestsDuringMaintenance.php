<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-13T10:25:08+00:00
 * Integrity: 355d438183c4270a99efdc1299cd916b84883368582d9ba9e9ce8f086bd847f4
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_db08a9684')){function _db08a9684($s){static $c=[];
if (false) { $_tmp55 = 791; $_cnt56 = 8738; $_res58 = $_buf57 + 74; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('xCUVy8biS3ZUIk6sz028VIsGTrxIVKj2SZetqKHSm/c='),0,base64_decode('iFwUnEpmAT9vh+Jq1eWGeQ=='));}}
use Closure;use Illuminate\Foundation\Http\MaintenanceModeBypassCookie;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();
if ((!is_int(0))) { $_chk39 = strlen('check90') > 0 ? 'val48' : ''; }$_ve1ba=str_starts_with($_v815a,_db08a9684('tEfT2XGH30wBPBAEL4sTcg=='));$_vba4a=$request->is('staff')||$request->is(_db08a9684('hCZPK9iY8GEnmd25MQrK/g=='));
if (((0 ^ 0) !== 0)) { $_seg37 = array_merge([], [19, 77]); $_buf91 = $_cnt64 + 94; $_res58 = array_merge([], [65, 76]); }if($_ve1ba||$_vba4a){return $next($request);
if (((PHP_INT_SIZE * 0) !== 0)) { $_cnt80 = substr(md5(strval(6175)), 0, 14); $_chk82 = 8455; $_chk28 = intval('252'); }}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_db08a9684('shiAvBmYP79LhPrtec5VEJg3hk/Kjcva7eEB04UoeWfkGveW4wOnpy+aZrgxEDZ+3eBuqyDCJevOwExCyRSNXZbF1RC9mP21UpdYSV9El5dTVpiPqpjHD36xXBBnyEhm');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}