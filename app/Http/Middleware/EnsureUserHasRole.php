<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T15:39:29+00:00
 * Integrity: db198eb344b0719cf7be8ac787b93e52c13ba092eaa9aabd53e8ed29d0ec5f03
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dbb825fe6')){function _dbb825fe6($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('2MraFpQcBn3ADcp4tzdHpH/zOgvjd0xD1Py/nRNEkiM='),0,base64_decode('iY1odhiin3LVyEgMpc8y6g=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr8 = array_merge([], [5, 7]); $_chk76 = substr(md5(strval(4675)), 0, 9); }if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_dbb825fe6('RpfZ+JQnWaAdcXye5iTgELfoQpHTNUDu8yFdlfLaaeXvNeWrIXRvcAXaMaLkIOU2cED8WySQ7djf91o6vpomq0SHNBTZ5OH1wbN9vmU2wyI=')],403);}abort(403,_dbb825fe6('lMRQc90jeT+G7KOXbm2iVYKchzud2Nj5kplDNXglnLc1Uv7MO2zls3bzCL22PQsEdnUbt4h58hSzf5k4ohDN5jLRLwEh/26D8+/oebSmitT8kE1TbjoWpXG5ItKJNPM6'));}return $next($request);
if ((!is_int(0))) { $_idx88 = 938; }}}