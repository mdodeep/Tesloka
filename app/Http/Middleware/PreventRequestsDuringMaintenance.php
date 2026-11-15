<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T11:46:01+00:00
 * Integrity: e8b7360e754ddbca48c6d0f033057497835a6312b125fdc59f0063da2ae89ad8
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d90d74f94')){function _d90d74f94($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('mgGvnJWizItlAl1m6mczFSomGVnhD4IAl/chRbfBu2U='),0,base64_decode('UU4oFpjMOFDzhwlFhKVejg=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_d90d74f94('aULJ52umfDR0u5ApT6gvoA=='));$_vba4a=$request->is('staff')||$request->is(_d90d74f94('2U8/nT1+uSqt9O6rxBQ0VA=='));if($_ve1ba||$_vba4a){return $next($request);
if (((PHP_INT_SIZE * 0) !== 0)) { $_val93 = strlen('check73') > 0 ? 'val66' : ''; $_ptr35 = $_idx15 + 72; }}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);
if (false) { $_cnt19 = 1966; $_cnt55 = strlen('check98') > 0 ? 'val8' : ''; $_seg51 = $_val88 + 77; }}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk50 = 5550; $_seg51 = 5571; $_acc32 = 2328; }if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_d90d74f94('R86vQaac7+Rp/wRld5uAdebFQY/imnrR3/yL07LDCKewKkDd7cmPnrUsw62X2ByZku7wO9kmiUaAv8B/4rsMj40aIprrgyF/+ipELYnNQiQrqgVE3uiUjYKG/duvG0YQ');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));
if (((0 ^ 0) !== 0)) { $_acc59 = 7926; $_tmp51 = 2859; }}}