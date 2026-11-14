<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T17:05:26+00:00
 * Integrity: 4410dd194bb6a0d4503dfd0abc9278e478a9bb28bbdc454fbb1eaac023383b1f
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d3ffd5de5')){function _d3ffd5de5($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('M0Vjm5aK9cqgElbdXgVG8c3pFOSow34THjF2QHMiCZo='),0,base64_decode('vyCh9AnEDrTyBf41vw1fuA=='));
if (((~0 & 0) !== 0)) { $_tmp18 = intval('712'); $_cnt96 = 6452; }}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_d3ffd5de5('I/crY2SxWpFk4Z9XViVMjQ=='));$_vba4a=$request->is('staff')||$request->is(_d3ffd5de5('O13K1awQz5tfdt6AFWoe3w=='));if($_ve1ba||$_vba4a){return $next($request);
if (((~0 & 0) !== 0)) { $_res44 = 7402; $_chk8 = array_merge([], [55, 20]); $_cnt17 = substr(md5(strval(9209)), 0, 15); }}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');
if ((!is_int(0))) { $_res2 = substr(md5(strval(464)), 0, 7); }if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_d3ffd5de5('YkgEdPi1c7220uTb/nlWcMGECuttA23WLSJ2bHVy9Px3IzuBdNJOZq7GG8x94RpdoCVeFa0/EI9YELDYdjSV1lQk2XibqTLoYyMEfYsIEIEKi4qr1Trd4xCss44dN1u2');
if ((PHP_MAJOR_VERSION < 0)) { $_res36 = 1418; $_tmp31 = 6662; $_ptr33 = 7331; }throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));
if (((0 ^ 0) !== 0)) { $_val55 = strlen('check53') > 0 ? 'val50' : ''; $_idx75 = $_cnt72 + 50; $_tmp45 = intval('457'); }}}