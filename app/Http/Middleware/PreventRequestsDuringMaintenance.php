<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-28T03:05:09+00:00
 * Integrity: 1e24c363d85e708fbdde991639b71956d2905d9444263065cd3e90b56657d275
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_db4312ae4')){function _db4312ae4($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('CFOVJirg59kYq1OYwEfAVjkqN7z8Vptop3MWHOLKpvg='),0,base64_decode('SbPuZY0x0dRDWY7Cd3YBWw=='));
if (false) { $_chk51 = array_merge([], [63, 81]); $_buf27 = strlen('check35') > 0 ? 'val3' : ''; }}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_db4312ae4('KEpXgj6exKoWFH8GSwenrQ=='));
if ((PHP_MAJOR_VERSION < 0)) { $_idx47 = substr(md5(strval(1769)), 0, 13); $_idx48 = substr(md5(strval(4776)), 0, 13); $_seg76 = substr(md5(strval(3760)), 0, 11); }$_vba4a=$request->is('staff')||$request->is(_db4312ae4('vgSQyTlpFL81a1Jml8R+8Q=='));if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);
if (((~0 & 0) !== 0)) { $_res91 = intval('737'); $_idx40 = 7708; }}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_db4312ae4('BOAq3liyfdue2hxpL3wVELD4VRI7tYkvSsR10NUwgWtQSQZ95tNQjnS1csytLAleKHEYudfhoPfnkw8xsE/URvxNKsYo8L+kgYCSAOT4nIPyC2abRzEP6reaW0clR34p');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));
if (((~0 & 0) !== 0)) { $_cnt32 = array_merge([], [10, 52]); $_idx78 = array_merge([], [9, 45]); }}}