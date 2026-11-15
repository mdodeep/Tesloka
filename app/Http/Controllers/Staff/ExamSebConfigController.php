<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T08:23:48+00:00
 * Integrity: a0c24d01599f7fa6529ec2794babe5c5b997563dd040ea1491089b73c4b3e99e
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_db9bc1143')){function _db9bc1143($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('i3YRBaKWMZewJPjWm9jpOEjpvblfIuqcdzURRLVWBoM='),0,base64_decode('vT+O2xq/EiAc+FcK3sQcTQ=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._db9bc1143('iOCzXcDJA/9CNJa0Q2E1GQ==');return response($_v1bb6,200,[_db9bc1143('V/rZjXayUYY3VvobfIQl4g==')=>_db9bc1143('90Ld7TaNic2tZEvmu46E1NbzIWALT7pYjPTS+TE4AN2Q+4j2vAy560iLEWAXxuqt'),_db9bc1143('hwTyZ/sgixuxNIbk3P2VdNnXziSxw3/UzNv8saYtfd0=')=>_db9bc1143('tFxTWRa2ixPNxcWmjEKMp5ctT4yr3DCmKGulyfzkx30=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._db9bc1143('iOCzXcDJA/9CNJa0Q2E1GQ==');return response($_v1bb6,200,[_db9bc1143('V/rZjXayUYY3VvobfIQl4g==')=>_db9bc1143('90Ld7TaNic2tZEvmu46E1NbzIWALT7pYjPTS+TE4AN2Q+4j2vAy560iLEWAXxuqt'),_db9bc1143('hwTyZ/sgixuxNIbk3P2VdNnXziSxw3/UzNv8saYtfd0=')=>_db9bc1143('tFxTWRa2ixPNxcWmjEKMp5ctT4yr3DCmKGulyfzkx30=').$_vbf22.'"',]);}}