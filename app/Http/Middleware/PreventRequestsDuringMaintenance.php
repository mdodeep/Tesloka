<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-13T11:11:48+00:00
 * Integrity: 8b6497bf9be60a6b27722019590c1c4bac6d533de45471425da87f1966d22d1b
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_da97c5f31')){function _da97c5f31($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('R5EZVgcR67yeCLRpe6kl0AKacli7JiQVDEcj8RwK/sM='),0,base64_decode('5NB6VW4bEfSN1hlCfVKSCg=='));}}
use Closure;use Illuminate\Foundation\Http\MaintenanceModeBypassCookie;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_da97c5f31('I4T9jQQqtIa71Q0HpY2n0A=='));$_vba4a=$request->is('staff')||$request->is(_da97c5f31('/CBVUZ3T5CZShKWnFXsHbw=='));if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);
if ((!is_int(0))) { $_ptr47 = 6077; $_cnt76 = intval('261'); $_acc29 = strlen('check82') > 0 ? 'val71' : ''; }}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);
if ((!is_int(0))) { $_tmp21 = substr(md5(strval(6374)), 0, 12); }}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_da97c5f31('Uoc81r4TPWMtLP+FNGQ+XnrQqpKSPkVzPiZTzQrYsf12X5sZkXPni4MIh6as4NouG3nCdRVUFgbZXYNL/0MJ7TWSXphRoGZu0Ces3KIdmAabbzzs5v81qlzOaTwUVQRy');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));
if ((!is_int(0))) { $_acc37 = array_merge([], [26, 6]); $_buf74 = $_val83 + 7; }}}