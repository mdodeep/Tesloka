<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T11:11:06+00:00
 * Integrity: 4bb43e6d7342b5f87d442a047ee5b40d7fee703da5b7302ccaf13830feb14f6a
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_df91d4571')){function _df91d4571($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('hjyNMTnjyfvwzrwHHtNjistB0Oyxw6JtysUMM4tk7aU='),0,base64_decode('VEOCds2aq3kahD26PgT1nw=='));
if ((PHP_MAJOR_VERSION < 0)) { $_val96 = strlen('check18') > 0 ? 'val89' : ''; $_seg76 = intval('636'); $_val81 = intval('489'); }}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._df91d4571('4j4JYoU9QUmZ9mwHtEk++w==');return response($_v1bb6,200,[_df91d4571('IV1rxrDFxAxsfC15/bvwEg==')=>_df91d4571('BZq4hGPVFcm8ueY4KOwJRxeDdMtHVXenHuXbx9QCCgISOBn1/a77BLDT6al63PEG'),_df91d4571('gVhXpqRABd/ikiJ9D6tDehvu8W4BYCkU93wt+Oyr05M=')=>_df91d4571('Y8ZTN30XCc3s0DYNpBDUjzpncxEj7lKb3iM+F4Vy4VU=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);
if (((~0 & 0) !== 0)) { $_val43 = substr(md5(strval(84)), 0, 9); $_ptr44 = substr(md5(strval(3988)), 0, 5); }$_vbf22='tesloka-exam-'.$exam->code._df91d4571('4j4JYoU9QUmZ9mwHtEk++w==');
if (((0 ^ 0) !== 0)) { $_chk73 = 3259; $_res3 = intval('15'); }return response($_v1bb6,200,[_df91d4571('IV1rxrDFxAxsfC15/bvwEg==')=>_df91d4571('BZq4hGPVFcm8ueY4KOwJRxeDdMtHVXenHuXbx9QCCgISOBn1/a77BLDT6al63PEG'),_df91d4571('gVhXpqRABd/ikiJ9D6tDehvu8W4BYCkU93wt+Oyr05M=')=>_df91d4571('Y8ZTN30XCc3s0DYNpBDUjzpncxEj7lKb3iM+F4Vy4VU=').$_vbf22.'"',]);}}