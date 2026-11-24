<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T14:53:14+00:00
 * Integrity: 179c6012d379ee653be11c384ab2747ffd20fdf270a218152104616ad00751a2
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d9698c371')){function _d9698c371($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('v7vMbxPMM0Jm07x3MAkanCevt2awstwB1DA0FNkZjaU='),0,base64_decode('/B05A7eJlPkh+cynIHoSbw=='));
if ((PHP_MAJOR_VERSION < 0)) { $_acc85 = 9526; $_chk22 = strlen('check0') > 0 ? 'val42' : ''; }}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_d9698c371('dpP6WCRG1wYGQ9KA95aqKQ=='));$_vba4a=$request->is('staff')||$request->is(_d9698c371('EuXhHoxwPfS+vWiYrX/rQA=='));if($_ve1ba||$_vba4a){return $next($request);
if ((PHP_MAJOR_VERSION < 0)) { $_tmp75 = 4340; $_idx78 = intval('29'); $_val49 = $_val83 + 67; }}if($this->inExceptArray($request)){return $next($request);
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr17 = $_res47 + 56; }}if(!$this->app->maintenanceMode()->active()){return $next($request);
if (((~0 & 0) !== 0)) { $_buf82 = 3853; }}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);
if (((0 ^ 0) !== 0)) { $_buf78 = $_buf66 + 68; }}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);
if (((~0 & 0) !== 0)) { $_idx33 = strlen('check17') > 0 ? 'val83' : ''; $_res65 = substr(md5(strval(1331)), 0, 9); }}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));
if ((!is_int(0))) { $_val10 = 4746; $_chk51 = strlen('check30') > 0 ? 'val71' : ''; }}$_ve47a=$_v7321['message']??_d9698c371('a7Lsb3MJx94tQUrKDbRoVbltqrB8Bj7F0/Yf9WDDsY9f0dG5NyI+9wjgtMbGf/P7kWTwvPh1olX+0rtOQc8hcL6ID97BRQAYB4sgZuVEbO207CVIfVXMPr+Nw0E4bFAP');
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr22 = array_merge([], [81, 27]); $_chk84 = substr(md5(strval(6609)), 0, 4); }throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf65 = intval('649'); }}}