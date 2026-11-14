<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T15:39:29+00:00
 * Integrity: db198eb344b0719cf7be8ac787b93e52c13ba092eaa9aabd53e8ed29d0ec5f03
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dfbdbda0d')){function _dfbdbda0d($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('p75zEdm8Z7kaNkCfBUQbUidyCbib/7HArIMCSVFCS38='),0,base64_decode('foouz1SzEga811QCqxF1UQ=='));}}
use Closure;use Illuminate\Foundation\Http\MaintenanceModeBypassCookie;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_dfbdbda0d('/riTEzMQLOQufakP1CXwMg=='));
if ((PHP_MAJOR_VERSION < 0)) { $_acc70 = intval('650'); $_seg89 = intval('349'); $_acc8 = strlen('check74') > 0 ? 'val39' : ''; }$_vba4a=$request->is('staff')||$request->is(_dfbdbda0d('ZEV49xpHPwm/bNUYiE84Gw=='));if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);
if (false) { $_ptr92 = 9603; $_res60 = array_merge([], [39, 45]); }}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_dfbdbda0d('tdsJ6UDmd6MAF0+3oF+19jR2xHYoFhoLpOSwzb60PwrEnrCVvjTTS37nP0ggGZ/ADdP6ZlijFyWxNbMs2rcRLXCzMXymcNUH/3tImGi1/7kx8KYzBAHjKQPPCXhNQ2sy');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));
if ((!is_int(0))) { $_chk50 = 2475; $_buf64 = strlen('check14') > 0 ? 'val53' : ''; }}}