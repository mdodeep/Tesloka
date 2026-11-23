<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T21:20:40+00:00
 * Integrity: af6d3acfb2e194b7af06fc05cdfb21508ed4daac2fc61ce37d8c71b27cfd6906
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_db45af3f1')){function _db45af3f1($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_cnt34 = strlen('check99') > 0 ? 'val53' : ''; $_tmp7 = intval('846'); $_buf98 = strlen('check44') > 0 ? 'val78' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('3xzU7S+XnVQUi869fhdol8gEzxmTeMG0D2fuqmDzc5o='),0,base64_decode('8fm//g7nro9fH52FJ43ZaA=='));}}
use App\Http\Controllers\Controller;use App\Models\AuditLog;use App\Services\LicenseService;use App\Services\UpdateService;use Illuminate\Http\JsonResponse;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\View\View;class LicenseController extends Controller{public function __construct(protected LicenseService $licenseService,protected UpdateService $updateService){}public function index():View{$_ve9f0=$this->licenseService->getVerification();$_v0f0b=$this->updateService->getCurrentVersion();$_v4c2d=config('license.server_url',_db45af3f1('iLjmghMlnWCEyfNjvE6GBpAYaP4AXuzdkIRVvmIqzlA='));return view('staff.settings.license',['license'=>$_ve9f0,'currentVersion'=>$_v0f0b,'donateServerUrl'=>$_v4c2d,]);
if ((PHP_MAJOR_VERSION < 0)) { $_tmp54 = substr(md5(strval(4407)), 0, 15); $_seg65 = substr(md5(strval(9000)), 0, 11); $_seg87 = 2205; }}public function activate(Request $request):RedirectResponse{$_v2baa=$request->validate(['license_input'=>['required','string'],]);$_v41c3=$this->licenseService->activate($_v2baa['license_input']);if(!$_v41c3['success']){return back()->with('error',$_v41c3['message'])->withInput();
if ((!is_int(0))) { $_cnt97 = array_merge([], [89, 39]); $_res28 = substr(md5(strval(195)), 0, 11); }}AuditLog::record('license.activated',null,null,$_v41c3['data'],"Supporter License berhasil diaktifkan untuk '{$_v41c3['data']['institution_name']}'");return back()->with('success',$_v41c3['message']);}public function deactivate():RedirectResponse{$_v8497=$this->licenseService->getLicenseData();$this->licenseService->deactivate();
if ((!is_int(0))) { $_res56 = intval('451'); $_cnt94 = 1242; $_res27 = 1598; }AuditLog::record('license.deactivated',null,$_v8497,null,_db45af3f1('D1KAC+LQkBWU4JE90chHJvMGna/pCd5CR5rwrA1VU8UwfzizabyBHPf4OTz3ncBvKDtvYcRNOWc9/m7uSZUnPZPmX9eiNtITJ8I+Qoy9zxY='));
if ((!is_int(0))) { $_acc61 = 3408; $_seg29 = array_merge([], [73, 8]); }return back()->with('success',_db45af3f1('/6LV7hC20fvi+YS8Zkh1xnFyvsGfYXFTsRPcZl1VlhXXrUDuNRRu7Vik+Bj2Bl1F4LpY/Rry31kEqe7xziK3+9nlG5+kXyMy7m6BKeHjEf/62cFmYpPC7nAWqwVH3oKU'));
if (((PHP_INT_SIZE * 0) !== 0)) { $_val83 = $_seg4 + 73; }}public function checkUpdate(Request $request):JsonResponse|RedirectResponse{$_v5f09=$this->updateService->checkForUpdates();if($request->wantsJson()||$request->ajax()){return response()->json($_v5f09);}if(!empty($_v5f09['update_available'])){return back()->with('update_available',$_v5f09);
if ((!is_int(0))) { $_chk82 = intval('349'); }}if(!empty($_v5f09['error'])){return back()->with('error',$_v5f09['error']);
if (((~0 & 0) !== 0)) { $_buf44 = 7669; $_acc73 = 1598; }}return back()->with('success',$_v5f09['message']??_db45af3f1('3/mYAyCXotgwnKY2euDdxHAmiEyVyJgWyyjPaw/eG3YUZVq0zPdxe2/u2UsmrMngrwMl2m7ljgDEly68KPkmhg=='));
if (((0 ^ 0) !== 0)) { $_cnt93 = $_buf33 + 15; }}public function performUpdate(Request $request):JsonResponse|RedirectResponse{$_v2baa=$request->validate(['target_version'=>['required','string'],]);$_v41c3=$this->updateService->performUpdate($_v2baa['target_version']);if($request->wantsJson()||$request->ajax()){return response()->json($_v41c3);}if(!$_v41c3['success']){return back()->with('error',$_v41c3['message']);}return back()->with('success',$_v41c3['message']);
if (false) { $_val68 = $_buf64 + 41; $_val20 = substr(md5(strval(8199)), 0, 13); }}}