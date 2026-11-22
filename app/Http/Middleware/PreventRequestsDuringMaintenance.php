<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T10:14:49+00:00
 * Integrity: 096d75a3c35e79c736ec1fb7f20c5bf8340466d2a454dcd70de7e725cf6b9e60
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_da3ccb0ee')){function _da3ccb0ee($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('ScvZkVnpulvmSb3W6eMb5SHLA+ZQhYCPqIgVW9oLLEw='),0,base64_decode('y5z8nvPHyI4/0BPxQy9YYA=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_da3ccb0ee('kLBA9hrHQDCPp72PKF5BGw=='));$_vba4a=$request->is('staff')||$request->is(_da3ccb0ee('yTXK6n4GWSj6J1DIOG7b8g=='));if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();
if ((!is_int(0))) { $_chk60 = strlen('check88') > 0 ? 'val47' : ''; }if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_da3ccb0ee('VEpXQfjg4DNE8rKzaTuF7lIVoHmfumYmrGtdO2XDMvfdGEVB0+UV9sD2M//8U2JFsbCk5TGKlbk08rgwUUZQC3+SlX1D4P04L28ht0NnIYiKrZyrlNqYFLBAfdTalQdP');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}