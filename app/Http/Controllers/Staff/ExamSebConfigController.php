<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T15:37:39+00:00
 * Integrity: 0c584d45dbce095066878f3dd012e0cb9aaf75f6fe255fbf30733ccd0a28d7b7
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d4d35649d')){function _d4d35649d($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('AYJ7EDcfW1iZyCVFRkyAPfwTLHCSE8Tx44nOs+LAme4='),0,base64_decode('zmek9GF42KWiZTjltXqxZA=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._d4d35649d('IjfVHUIvyec6Z65AlviMoA==');return response($_v1bb6,200,[_d4d35649d('XhoBvgMF94t7OKE0hDTNlw==')=>_d4d35649d('qZfA4Rru93cM4wnWP/SEC6h8hHMGHPGVR1WWXpET1lCgwenWcaODs+/jvXovs7DM'),_d4d35649d('LHErmA+YdPch+acHGGKdvCh79mSqLvZI6cRwiiMVCEo=')=>_d4d35649d('VGw90tzzQd/XqzmTDNhFkczR6OOvNfiZYZnZwQoA8vk=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);
if ((PHP_MAJOR_VERSION < 0)) { $_seg43 = array_merge([], [0, 48]); $_val2 = strlen('check80') > 0 ? 'val6' : ''; $_seg71 = substr(md5(strval(4880)), 0, 14); }$_vbf22='tesloka-exam-'.$exam->code._d4d35649d('IjfVHUIvyec6Z65AlviMoA==');
if (((~0 & 0) !== 0)) { $_chk88 = intval('571'); }return response($_v1bb6,200,[_d4d35649d('XhoBvgMF94t7OKE0hDTNlw==')=>_d4d35649d('qZfA4Rru93cM4wnWP/SEC6h8hHMGHPGVR1WWXpET1lCgwenWcaODs+/jvXovs7DM'),_d4d35649d('LHErmA+YdPch+acHGGKdvCh79mSqLvZI6cRwiiMVCEo=')=>_d4d35649d('VGw90tzzQd/XqzmTDNhFkczR6OOvNfiZYZnZwQoA8vk=').$_vbf22.'"',]);}}