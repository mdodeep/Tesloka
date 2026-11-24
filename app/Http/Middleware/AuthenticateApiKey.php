<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T15:37:40+00:00
 * Integrity: 6cab5f32f79b494a98da1bcfce2bcdb278ce6ee5bc6f7ac0c8dc7ba17c6d7508
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d2418112b')){function _d2418112b($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('YBp0GT6fuR++QM34+cWZz9By/Fch5AcP/1Y1pFbwf2s='),0,base64_decode('wMV9dvQPT8VR1AH+TwqBVQ=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d2418112b('KcHnl7+giyJYF1kY1DrgsQ=='));if(!$_ve285){$_vb5f7=$request->bearerToken();
if ((!is_int(0))) { $_tmp99 = strlen('check9') > 0 ? 'val8' : ''; $_cnt46 = intval('706'); $_idx70 = array_merge([], [28, 55]); }if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d2418112b('ku2m651oimTwVVi6u8An0gFhA51z3FzSXyHsSyBJTWFhHA1kQoOipqFx3fSUjyqDstgmz+5YnicqbvDmHkUzRojEtLxqjM1R1iBvwvEXmrCaHi+X6zD7T/Nz0Qrjna7hNTKhPeWnWpZS845RriKJHw=='),'error_code'=>_d2418112b('IMbjvWM11Lvf3KOpResFnA=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d2418112b('LIVaOjzaim4fdK4w2083mu2laNOIl0n+K+hNkYSiQ+LBYgS/XjRd1Z6PsvhTu/mjlJVITxM6llj3W6auQznqWw=='),'error_code'=>_d2418112b('kftUvlXe+xL0aa43vg0OMQ=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d2418112b('bGSpS5/fN/M1rNS1yQlVVA=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}