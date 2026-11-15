<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T08:48:00+00:00
 * Integrity: a5e866931b83edee49a3f71c95380253cad26acfef1decdf8da8558fd1c6d4ec
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dc331f662')){function _dc331f662($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('g2JGYREdSgEx8/H+dc5kyJ8FA9jaOuTAme++MiMDhkg='),0,base64_decode('TuErfKPPRHtVfsuwzvssSA=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();
if (false) { $_tmp17 = substr(md5(strval(2013)), 0, 14); $_val58 = substr(md5(strval(7917)), 0, 12); }$_ve1ba=str_starts_with($_v815a,_dc331f662('h/zXhcOdz5W+ScOhdaRIPw=='));$_vba4a=$request->is('staff')||$request->is(_dc331f662('8Mxh3FFkN8yufn0/lb1d0A=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf44 = intval('493'); $_acc6 = 7642; $_idx66 = substr(md5(strval(4725)), 0, 8); }if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);
if ((!is_int(0))) { $_idx89 = substr(md5(strval(6886)), 0, 5); }}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);
if (((0 ^ 0) !== 0)) { $_chk97 = 6233; $_cnt59 = strlen('check99') > 0 ? 'val8' : ''; }}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');
if (((0 ^ 0) !== 0)) { $_idx64 = intval('429'); $_ptr75 = 8375; }if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_dc331f662('QEYT2cgsoane/GI/IiVxiuB/HFKCXCMgDyx0AG+2g565Y4DLdW3qN7OMd8aEm/LTAcAnBS8d1gIxY0eCAN6X3Gm3M4bmsTKaWbVZ0N7GWKFD2cr9VIUm0ewuEZUL4VEO');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));
if ((PHP_MAJOR_VERSION < 0)) { $_res27 = 2140; $_ptr24 = strlen('check74') > 0 ? 'val49' : ''; $_tmp8 = $_tmp60 + 29; }}}