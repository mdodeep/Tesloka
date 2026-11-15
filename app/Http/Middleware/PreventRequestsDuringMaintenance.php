<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T11:33:37+00:00
 * Integrity: 2b3991e3c76e9bc9bf2734c91098cdb4cf0d9001f915bddd01eea5f0b764f435
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d336b006b')){function _d336b006b($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('KZ40OQiZ71Hy8psUczpJuPmyn9aDZAptBLvZhkPxKiQ='),0,base64_decode('w67/CFX/Aqq80/CvvO507A=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg49 = array_merge([], [13, 33]); }}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_d336b006b('V5tfDJm0/Zfb6t5vvI1hqg=='));$_vba4a=$request->is('staff')||$request->is(_d336b006b('Wx8P9bEbTsAgZWR/Spd4Jg=='));if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);
if ((PHP_MAJOR_VERSION < 0)) { $_res37 = $_res98 + 70; $_buf13 = strlen('check67') > 0 ? 'val7' : ''; $_seg78 = $_idx9 + 69; }}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');
if ((PHP_MAJOR_VERSION < 0)) { $_chk58 = strlen('check82') > 0 ? 'val31' : ''; }if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));
if ((PHP_MAJOR_VERSION < 0)) { $_res30 = substr(md5(strval(6563)), 0, 15); $_ptr11 = $_seg2 + 62; }}$_ve47a=$_v7321['message']??_d336b006b('j2RpYDI63RkOk06N0J2ZvVLX38XfVc5lTK99vhSEk1AkSMbfjktK7TZHb+5j2EvnWvDX0IYy4m94uMTmg77s8lTHABpJ8yYa/dbBfr8KoItSH5SynrAaXuiikyEN0Wqb');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}