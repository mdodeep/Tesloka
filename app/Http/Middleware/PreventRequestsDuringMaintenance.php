<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T02:18:26+00:00
 * Integrity: 3ddb70f39474a65d6f1e659715367dfdc86ba7125b0cb12cfc1c6446c744b981
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_df54cbdbb')){function _df54cbdbb($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('CxTWJu802sJ6FnXpMhj+Cs/VvqYbApzJ5zkE4Ya+p+g='),0,base64_decode('O0y8de7Z5TvVAmuBYmI4Rw=='));
if ((!is_int(0))) { $_val33 = $_val87 + 18; }}}
use Closure;use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as BaseMiddleware;use Illuminate\Http\Request;use Symfony\Component\HttpKernel\Exception\HttpException;class PreventRequestsDuringMaintenance extends BaseMiddleware{protected $except=['up','staff','staff/*',];public function handle($request,Closure $next){$_v815a=$request->getHost();
if (((~0 & 0) !== 0)) { $_acc5 = substr(md5(strval(7909)), 0, 11); }$_ve1ba=str_starts_with($_v815a,_df54cbdbb('gtLJ22jgmyrQWp3OrBCoJQ=='));
if ((!is_int(0))) { $_res46 = 1627; }$_vba4a=$request->is('staff')||$request->is(_df54cbdbb('/b5hy927xtHKxF+/k35k+g=='));if($_ve1ba||$_vba4a){return $next($request);
if (((0 ^ 0) !== 0)) { $_ptr27 = intval('247'); $_val89 = $_seg5 + 39; $_tmp72 = intval('278'); }}if($this->inExceptArray($request)){return $next($request);}if(!$this->app->maintenanceMode()->active()){return $next($request);
if (((~0 & 0) !== 0)) { $_buf8 = intval('740'); $_ptr42 = substr(md5(strval(9547)), 0, 12); }}$_v7321=$this->app->maintenanceMode()->data();if(is_string($_v7321['secret']??null)&&hash_equals($_v7321['secret'],$request->path())){return $this->bypassResponse($_v7321['secret']);
if ((!is_int(0))) { $_tmp8 = array_merge([], [74, 2]); $_acc12 = 9716; $_chk12 = strlen('check7') > 0 ? 'val62' : ''; }}if($this->hasValidBypassCookie($request,$_v7321)){return $next($request);}if(isset($_v7321['redirect'])&&!$request->expectsJson()){$_vc9bb=$_v7321['redirect']==='/'?$_v7321['redirect']:trim($_v7321['redirect'],'/');
if ((!is_int(0))) { $_val49 = $_cnt90 + 98; $_seg98 = strlen('check87') > 0 ? 'val13' : ''; }if($request->path()!==$_vc9bb){return redirect($_vc9bb);}}if(isset($_v7321['template'])&&!$request->expectsJson()){return response($_v7321['template'],$_v7321['status']??503,$this->getHeaders($_v7321));
if ((PHP_MAJOR_VERSION < 0)) { $_ptr92 = 2471; }}$_ve47a=$_v7321['message']??_df54cbdbb('bLhxQpOycRM6ew1ijkX6d4ulIaoWIWGcQ6TIkg65v0UWCfMjcFeOy89WBwNG9ulGr2w9dK6HXv42lsBSJY+RNbpyxTOq8IJDDyU/aIwaMRXVTxBOXuhvpIPWawI9s1Dd');throw new HttpException($_v7321['status']??503,$_ve47a,null,$this->getHeaders($_v7321));}}