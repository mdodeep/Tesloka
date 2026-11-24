<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T23:45:03+00:00
 * Integrity: b8bf5a6e78065226e64eac4faaa271b9ecd219b2dedc6077be7c9cc7047f99f2
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_df6b2b57b')){function _df6b2b57b($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('uXHzEgerCJDaF/ab9ZT7SVyVeKWetMN+i7q9osT4sJk='),0,base64_decode('dnCKkLxmZtWx2bCP/XpqhQ=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_df6b2b57b('kZgiV3MMU4GLOVg+TkUNgg=='));$_vba4a=$request->is('staff')||$request->is(_df6b2b57b('WDsP7migWUWlVnWyPdWNUw=='));if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();
if (false) { $_res27 = 7468; }if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_df6b2b57b('gJVehGZqplY7mA5U5XkPydWNR1vB9WIid7s+/2sTOrax+lEchF3Jcubsp1BoZd9zjIADTqKSEmALBwfUelfdBu3dd2K36ReWPDp1g1OrbHAXOT0/ZTP46akTkQ+N0c+S');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));
if ((PHP_MAJOR_VERSION < 0)) { $_cnt87 = strlen('check36') > 0 ? 'val55' : ''; $_buf32 = 1777; }}}