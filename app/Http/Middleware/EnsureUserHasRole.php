<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T16:12:47+00:00
 * Integrity: 1cdeb71c732ef090d82efb9eedef96d124d99060b2369817c5185abbd41d6868
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_ddd9dab2c')){function _ddd9dab2c($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('oBf3o0wMHs8upt8rxcNJjEhCsu7JgwnLlBfCs2x93Jg='),0,base64_decode('P7D5U0KWejnUQd8HjrB9Uw=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_ddd9dab2c('ZmJE7MZoYTPuMGLbgcaxBMHhmb34MJbntXd5JWWB7bZLtCAjjZU/3u5Jstd1DgAFDb60E9tdRLHDh0/AEtVjQ4hHWmubTFZWfou77XmhB7s=')],403);
if ((PHP_MAJOR_VERSION < 0)) { $_res26 = $_res87 + 67; $_cnt35 = intval('911'); $_tmp74 = 5441; }}abort(403,_ddd9dab2c('U7trzdhtSFNlyA5fB63gmdjqqomVD52NuxkitnWMGW7+r35P0vl2PKvIpgYRzf4fqNx4nsSLTG2W0Lif3xzLn5ktjSA6MtNSCCsQyGwwzgi0Qaeg9+Mx9opiMFzCTbVB'));}return $next($request);
if (((~0 & 0) !== 0)) { $_val50 = array_merge([], [43, 33]); $_idx26 = $_val8 + 37; }}}