<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T11:41:39+00:00
 * Integrity: 87e5ea8d43138fb2947ba934399665412252eab6e599ae288f646aed564f4406
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_df89c732c')){function _df89c732c($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('FH5+pIiTcaq52jFCVMHRyyi1Yrow+pvpG5CMTsXLGlE='),0,base64_decode('SiPQ7SWjnrsRGkFVtIc+/A=='));}}
use Closure;use Illuminate\Foundation\Http\MaintenanceModeBypassCookie;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_df89c732c('qAn03HdrZBmPndPNxujxXg=='));$_vba4a=$request->is('staff')||$request->is(_df89c732c('4v7LxDhSbWiD4APQHI0cLw=='));if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);
if ((PHP_MAJOR_VERSION < 0)) { $_acc11 = array_merge([], [13, 54]); }}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr97 = 7365; $_val36 = 3423; $_acc7 = intval('51'); }if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));
if ((PHP_MAJOR_VERSION < 0)) { $_cnt45 = 6076; }}$_ve47a=$_v7321['message']??_df89c732c('qNe799ZHxgNc14AM66bBaWfZVQ5wk+/g3nd1SWsiWJSVF8XTdTtl8+H/WFcKIzLNqWK8gTE85ubnavhbS+rnbxr3meo4szd1sXT+5QgRzb01nfDz4cE+rxrnHMIYETLu');
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc37 = substr(md5(strval(6361)), 0, 13); $_ptr99 = strlen('check64') > 0 ? 'val29' : ''; $_chk8 = $_buf72 + 3; }throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}