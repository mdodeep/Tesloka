<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T12:57:15+00:00
 * Integrity: 65e43bf6a4c29af18923f0d8525195efce90967c02a31016cfca55d63e64d572
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_ded8e0720')){function _ded8e0720($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('QayFlc6/+Nguf431AzTaL++qVKlJ3a0mKF3JafDPzy4='),0,base64_decode('19w2VwmUs3lXGUVYKxuVwg=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._ded8e0720('1/D9hCz0fAidmuLNgCQL8g==');return response($_v1bb6,200,[_ded8e0720('M/0L18tKToTF5mAXTz14EQ==')=>_ded8e0720('UpgIRY/yV1Zy/sH8LGgW8tKXlL/vABEvxtMquzVq5whxIGINBr6N6K8W16qkpNSn'),_ded8e0720('hp1tRf2pjuK2wTRGDU+Ea3W2sXsF2HNj6Jf7P1E6N34=')=>_ded8e0720('szOPw1PSjakLf2JN3kIkMoMVc6aedcCEj/UiERZ6lVs=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);
if ((PHP_MAJOR_VERSION < 0)) { $_acc10 = array_merge([], [36, 64]); $_tmp12 = substr(md5(strval(3183)), 0, 5); $_chk31 = $_seg49 + 26; }$_vbf22='tesloka-exam-'.$exam->code._ded8e0720('1/D9hCz0fAidmuLNgCQL8g==');return response($_v1bb6,200,[_ded8e0720('M/0L18tKToTF5mAXTz14EQ==')=>_ded8e0720('UpgIRY/yV1Zy/sH8LGgW8tKXlL/vABEvxtMquzVq5whxIGINBr6N6K8W16qkpNSn'),_ded8e0720('hp1tRf2pjuK2wTRGDU+Ea3W2sXsF2HNj6Jf7P1E6N34=')=>_ded8e0720('szOPw1PSjakLf2JN3kIkMoMVc6aedcCEj/UiERZ6lVs=').$_vbf22.'"',]);}}