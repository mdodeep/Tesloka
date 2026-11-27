<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-27T14:40:07+00:00
 * Integrity: b239a7db52f17bafea0fb8b829fbb68615a5cfb91459cf3afc5ae4b62e0b43b8
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_de3edc7ed')){function _de3edc7ed($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('jxAp1g/P8xs/QLyPRwx/jE8mE9yL1M48OP/GzJOkfrg='),0,base64_decode('JrGhCngg1FkvVbmCwxlrkQ=='));
if (false) { $_tmp81 = strlen('check66') > 0 ? 'val66' : ''; $_ptr15 = intval('479'); $_chk95 = substr(md5(strval(412)), 0, 11); }}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();
if (false) { $_acc87 = substr(md5(strval(1068)), 0, 8); $_seg58 = 4565; $_acc7 = substr(md5(strval(5865)), 0, 11); }$_ve1ba=str_starts_with($_v815a,_de3edc7ed('07cqcclW9W39rGRFHsmaIg=='));$_vba4a=$request->is('staff')||$request->is(_de3edc7ed('aiDwmSELp3BCSvcNk/EZyw=='));if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();
if (((0 ^ 0) !== 0)) { $_ptr97 = substr(md5(strval(2830)), 0, 10); $_ptr22 = strlen('check44') > 0 ? 'val29' : ''; }if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_de3edc7ed('16iD50GiS6oIVlcgm+9UYQfclxrTRuC2eahXXib7PiHV4ALIgrwg/8g3cXBnYCicZRmSaINT3BQR+cWzjxQwvAd2+FVIRiF3LhnTL4x8OMalFmaA5ku2BhGCusBAK+zJ');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}