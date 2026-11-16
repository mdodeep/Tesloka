<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T09:06:07+00:00
 * Integrity: 97253e7a138b8dfc29cb91654dc1e219bfff6043bef9e78fea4f64e20462c2e9
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_db1f0862d')){function _db1f0862d($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_chk56 = 1158; $_chk22 = strlen('check81') > 0 ? 'val51' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('TeGPODUnQzxnNNsiTpxkNoJyhJPpcxIkLCI8t6VXoUg='),0,base64_decode('G8GI6nHOhkdL326HO0fYYA=='));
if ((PHP_MAJOR_VERSION < 0)) { $_acc33 = 7317; $_tmp10 = strlen('check43') > 0 ? 'val72' : ''; }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_db1f0862d('3ueSPBBkgMFwmtvaFdTkLSj25tZNxSuWvlJoRPE9veI/mbxcsVlSsMbeiWaB3c3boqDhFXpNunX0t9D2PkJ4cvsVfNeiQvl5wilukRHgTUA=')],403);
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg62 = 1880; }}abort(403,_db1f0862d('tYSh/WP646Xljbjt0DRA3wGjix46TLk21lNlyh8rAr0nrAYGAVVXX3hSplYzP4/xXvt9OTi/IeyRdfR/omze1Bw4jPRqOEa/61q22AlpGg5GpSh4ptRGdleStRdi1ND1'));}return $next($request);}}