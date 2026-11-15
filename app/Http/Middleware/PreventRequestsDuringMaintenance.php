<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T14:38:35+00:00
 * Integrity: 8fb32f9c498b75637e4210b82223abef44c55b561a70cd4ce9a36aab7d49c102
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d3db0569b')){function _d3db0569b($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('BlDI9dlsAaOkenwmnOytSkV0ELcUCh3uu8jUnrzYUqw='),0,base64_decode('Lebv58s0Ob0XzT3FaZOZFg=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_d3db0569b('wwIvucV6G/jk3GClIUIcAQ=='));$_vba4a=$request->is('staff')||$request->is(_d3db0569b('hv6wVTLypT9O2j9ifG2cqw=='));if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);
if (((0 ^ 0) !== 0)) { $_val53 = intval('453'); }}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_d3db0569b('7fnw3AcQM65ZlB73xKLAh7qmeSE4qWEoo7ZOcIDWDSSJjARCdPKnENmg1NNi5/vs87cDhmxNgV3L/RqiFpFXVrMJyDiTGn47GyACniq3jXsMhhldSr/H5ldPK+D7ww35');
if (((~0 & 0) !== 0)) { $_idx66 = strlen('check34') > 0 ? 'val96' : ''; $_ptr64 = array_merge([], [68, 60]); }throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}