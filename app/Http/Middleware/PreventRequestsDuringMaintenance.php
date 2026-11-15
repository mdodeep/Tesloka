<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T14:08:01+00:00
 * Integrity: 32a0d6d1e68df6079ebf52c2c66790de0ca51d31399c1ea9359321ce575e627c
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d76af6080')){function _d76af6080($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('ncFHPVVMcyPDvHHNtH+YbrT2uR9KMSRsPrE0DtnypAM='),0,base64_decode('pxHHP16V1HuOJDAgjloKjw=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_d76af6080('h6yV+D3dp/Pax6oVBYWVMw=='));$_vba4a=$request->is('staff')||$request->is(_d76af6080('xpw7ku3F07lWlcoPqE7TdA=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg23 = array_merge([], [28, 66]); $_cnt63 = intval('610'); }if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);
if (((~0 & 0) !== 0)) { $_tmp88 = intval('532'); $_cnt51 = intval('329'); $_tmp81 = array_merge([], [46, 72]); }}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_d76af6080('zEY0xv5kXRi8Gxz7Of8Yg5fwYTGj0Hth4PVFqt0Fbxj5dJaBOb0jcfHluVawvmdDkHOd1GBOR4fm6/TWHsNTO+R/XmIoHcPo5FenLwT9EjGyUsmWjJxGY2AoXrG1GzrZ');
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc26 = strlen('check11') > 0 ? 'val4' : ''; $_seg90 = substr(md5(strval(1248)), 0, 6); $_chk17 = strlen('check14') > 0 ? 'val48' : ''; }throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));
if ((!is_int(0))) { $_chk1 = intval('161'); $_ptr35 = $_buf74 + 57; }}}