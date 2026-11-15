<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T16:15:02+00:00
 * Integrity: 3fdd4e81275382375f811facecf8d5cef5cda7157404fa8661a4104594859a25
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_de22d0863')){function _de22d0863($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('7k65v8QR2F9p5AQacZ1kwl2KZEtQLDsTDg6CsKAxwYk='),0,base64_decode('o1YzMoIvJAwAOCbL1vctew=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_de22d0863('l+20+LD5kbMouqAX1VEUKA=='));
if (((~0 & 0) !== 0)) { $_buf51 = strlen('check0') > 0 ? 'val39' : ''; $_tmp51 = strlen('check1') > 0 ? 'val72' : ''; }$_vba4a=$request->is('staff')||$request->is(_de22d0863('St1VmAqJzEBVajU2eb9DZw=='));
if (((~0 & 0) !== 0)) { $_tmp66 = 8888; $_res74 = 9918; $_buf25 = 1075; }if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_de22d0863('A+nQLgtbnNUsXvH2n4DFz4GEEKfW9oBnxgMGBZK3uxdHpEkkVO2W4yhPSAx3rdDB/MoFFC0OsBDzrLctyXlKgBlbVHCNf+Oxsa2FvAfWBgpN8YfVW7TGlc7xvuxcPsv4');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}