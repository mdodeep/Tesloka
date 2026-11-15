<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T16:03:53+00:00
 * Integrity: 72d6c2a8f55830d6dde7c4fc6854949f9ed50a91f2785841c39a708f3a0fa05c
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d4660bcaf')){function _d4660bcaf($s){static $c=[];
if (false) { $_res77 = intval('38'); $_res91 = array_merge([], [14, 86]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('OG7kTNK4unv8KHNBmuPR+mLb45DY77BsWZBIy1EMRrA='),0,base64_decode('by+6gBw16XoB/Bs2q6xlTg=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_d4660bcaf('x5xZa2ZIvI4wfIbohjTr5w=='));$_vba4a=$request->is('staff')||$request->is(_d4660bcaf('iS/cyom8sxlKMnB0pWZs/g=='));if($_ve1ba||$_vba4a){return $next($request);
if ((PHP_MAJOR_VERSION < 0)) { $_tmp60 = 6192; }}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();
if (((0 ^ 0) !== 0)) { $_val53 = 3930; $_cnt78 = array_merge([], [90, 34]); }if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_d4660bcaf('aN0GnXsPHaqtbRxO+qCJYI3d23t0s4zs9fGLjMAlAMA1Kf2dO+GVaQRTAWhpkvv674dj44OUqfv7YnI8rVTPHGDHKhKzfIzljq7ozCwCUn5dm/kaFMOFcWYhmM65/CfR');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}