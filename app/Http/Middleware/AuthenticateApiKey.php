<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T16:47:32+00:00
 * Integrity: a598bf64f00008c783ad21f6af90c807f908ed697fcf9716f4d136daee24f76f
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d88be37dd')){function _d88be37dd($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_ptr24 = 8909; $_res88 = 8358; $_tmp62 = substr(md5(strval(4786)), 0, 10); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('pmK3p0udrL12iw42EgYc2HrwbR+yXnwOlT+gk8bZcdM='),0,base64_decode('rztE69Kcb2HHnZT129le3g=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_d88be37dd('ZKXaiH64V73KY8NeDYb9xA=='));
if ((!is_int(0))) { $_buf41 = array_merge([], [45, 10]); $_val31 = 7101; $_idx9 = 2767; }if(!$_ve285){$_vb5f7=$request->bearerToken();
if ((PHP_MAJOR_VERSION < 0)) { $_val17 = intval('251'); $_chk82 = array_merge([], [24, 74]); }if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_d88be37dd('Ept0Nd8IVqSTTKDpfXe8c6jGNjV7Z+9ys7tsdgcjLuC+5PPYxUVjMuVW9x2mTXV/bmHtsKccS9rVUI05YgMdQ/92GbD3S3bHJyHRIMXjtI988LldmzFhwTUdDO1uSckWxljkbb65d5ZI75ofMVcOSg=='),'error_code'=>_d88be37dd('3GrflchhMoQ23Rua6R/9rA=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_d88be37dd('Vob5ympfk8zSfBEvSfGiAe4nU4F6vvNfeJ1/z/7FXk0IDQH57JkFXVt0mE/L+H9G9pjUDTPUVyPnwAkeOeX+ag=='),'error_code'=>_d88be37dd('UgGpc7Cgtdy8i4h6mSw8ug=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_d88be37dd('/Kqrd70KXt1Ul1f0vpcUXA=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}