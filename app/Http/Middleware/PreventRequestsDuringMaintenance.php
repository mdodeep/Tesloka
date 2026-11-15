<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T14:50:48+00:00
 * Integrity: da2d8e8e7eb35502158592fc7f4fb96f0713033f54d4fc850a96d2de053c79e8
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d7950fd83')){function _d7950fd83($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('XRdzcGMz3zobo3ThTRsjlUdY6Re2rT815MpJuyVV5os='),0,base64_decode('hAoP8V1nXlz+0UGEhgfdeg=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_d7950fd83('pehDzQZyTf5Os0UiSsOatA=='));$_vba4a=$request->is('staff')||$request->is(_d7950fd83('d3xwzUsU+2pSpCTkr2GEJA=='));if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);
if ((!is_int(0))) { $_buf79 = strlen('check81') > 0 ? 'val35' : ''; $_buf6 = array_merge([], [20, 85]); }}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_d7950fd83('SMVlIX8GYJ7eeg+gLmibKNPIUIMU/pUAerv4LJeFMAtYxNP3Jmj+pLK/90TmVqakhDq8DLe5xFf5n/72A7eN8WC/rAocZDzlQN3NeMZM6ZAtaa4yI/VJfn2VBOkhUdeo');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}