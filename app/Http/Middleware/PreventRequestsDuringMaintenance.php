<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T10:44:49+00:00
 * Integrity: 0617fe45b49cd5d031a22b03bf5ebd8f1d93ffe50a9543382cbcd3000291716c
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dab952ee1')){function _dab952ee1($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('e0PyMMa4hawo7UPkAet/CLBZAO8K4c0JVdgNgOKNFdw='),0,base64_decode('dt571JEQzJptc3i0R5uA5A=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_val44 = intval('150'); $_res18 = $_tmp60 + 87; $_acc85 = strlen('check36') > 0 ? 'val19' : ''; }}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_dab952ee1('1izm4s0DK0lwUw+KHdNNXQ=='));$_vba4a=$request->is('staff')||$request->is(_dab952ee1('wbiUuO3TG27NvluV3an7kg=='));if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_dab952ee1('t/jtt3B8hKef32TpyZwl5KeUfNRV/ug1x/odkgTX8xvG9/BsTopxJs1QbRx2bCxGjLF3nniR3V0qY4F6kYZiIUpwuProDvQi1cIUUkiCA29PrOAY9q6IgV+QRQiViFlQ');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}