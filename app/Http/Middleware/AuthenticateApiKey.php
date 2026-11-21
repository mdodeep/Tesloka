<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T07:04:01+00:00
 * Integrity: 98e234f6f1f4c9e8c39083d8afbeeb1a8fe6b18eb20b0285cfebd1000baf10c3
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dd06b670a')){function _dd06b670a($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('awORFU5rw2X7ByUnFeA8IPB3XoX7/+EQ7JDdER5CVDM='),0,base64_decode('gtv21NKMidcgNpcIwiP7tA=='));}}
use App\Models\ApiKey;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class AuthenticateApiKey{public function handle(Request $request,Closure $next,?string $requiredAbility=null):Response{$_ve285=$request->header(_dd06b670a('FqqSbhsX0M+eLwFlXSkSjQ=='));if(!$_ve285){$_vb5f7=$request->bearerToken();if($_vb5f7){$_ve285=$_vb5f7;}}if(!$_ve285){return response()->json(['success'=>false,'message'=>_dd06b670a('29MIe89fRpdp4AW8R3sy5B/EBtYC9cRtbHA5hG7D2SEptn9fBx+a2eajkTmXCFShgwPT8A4xwJ9t0yOzaTUAs3Lp634dkO5lTRzdBDqtbk6I62QshtmVMN+awycwnUzpq4Hu/zuKD7HNatc6SmjFlQ=='),'error_code'=>_dd06b670a('7vIdc69vrEzV7VCGv2/YhQ=='),],401);}$_vc9bd=ApiKey::findByKey($_ve285);
if (((PHP_INT_SIZE * 0) !== 0)) { $_cnt63 = $_val53 + 77; $_cnt40 = intval('724'); }if(!$_vc9bd||!$_vc9bd->isValid()){return response()->json(['success'=>false,'message'=>_dd06b670a('0/fHfWgbiDpak8MinvBfs2bUl+MepUQ546nJ4DMBEifQagKU5PcsbLnSTO2H4WCuYvpdmwgUgne0N130E6juAQ=='),'error_code'=>_dd06b670a('7bmiXLm1jOQromot5Djk8w=='),],401);}if($requiredAbility&&!$_vc9bd->hasAbility($requiredAbility)){return response()->json(['success'=>false,'message'=>"API Key tidak memiliki hak akses yang diperlukan [{$requiredAbility}].",'error_code'=>_dd06b670a('pgLHHhfJ3IkWRKQESWMIEA=='),],403);}$_vc9bd->touchUsage();$request->attributes->set('api_key',$_vc9bd);$request->setUserResolver(fn()=>$_vc9bd->user);return $next($request);}}