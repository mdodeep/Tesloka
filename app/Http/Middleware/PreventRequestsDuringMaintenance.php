<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T22:15:49+00:00
 * Integrity: 47d77785b7693bde6cba101c75e2ba7d523281db8c0cc0ae672ba68f3781cb9f
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dee96a312')){function _dee96a312($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('4nfd55tZjC4n8F/6A/OlAvGWBP/4neeEsk/JMhbvMc8='),0,base64_decode('HPJCoM3n9vzD5syyipY6SA=='));}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();$_ve1ba=str_starts_with($_v815a,_dee96a312('IbCzQfTeIOU/tspLIdb+Iw=='));$_vba4a=$request->is('staff')||$request->is(_dee96a312('WfvO+7Ss3FrIb1ljpebJcA=='));if($_ve1ba||$_vba4a){return $next($request);}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);
if ((!is_int(0))) { $_tmp22 = substr(md5(strval(4266)), 0, 10); }}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));}$_ve47a=$_v7321['message']??_dee96a312('OOIPTcLm5lwVQqgma+84WH6oMDFr56swwKvLCbLGh6cF4TexJSC22+MDe8sfK9oHDFAfIcnRV0z7WdEdOoEms1pS/D+qAF8uLkOnr5fITGL+PkOWWNYz0f2GT9BXBtqU');
if ((!is_int(0))) { $_idx71 = strlen('check47') > 0 ? 'val72' : ''; $_tmp5 = $_res64 + 67; }throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));
if (false) { $_buf60 = substr(md5(strval(8618)), 0, 11); $_idx86 = 6473; }}}