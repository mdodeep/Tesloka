<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T17:24:06+00:00
 * Integrity: ec9f45c93320d5f28644126c3b1c07841080090a05f68ce05292584e527973ed
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_da11eb187')){function _da11eb187($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('igmcQkUsYW2GNfrrmAq0NpPR4sSDPEY0kWtz8kJX4Bs='),0,base64_decode('gREByRxNU5cVgPXoacaqCw=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._da11eb187('viqBzyI8g9IqJPOhiu0LSw==');return response($_v1bb6,200,[_da11eb187('cD/9ly1qWMzcsAcX7cKV5g==')=>_da11eb187('4Ed7JVQPdLdprwwHjHJ3i0N+zQHpNgqK01kSfOhcrm+zeNaaY6eJbK4USV1WS07i'),_da11eb187('fs4dgE+MQ5QKhRBB/xIC69Cp6lsP4ff3imA6YkAL/EM=')=>_da11eb187('idYW5zDbFyr6aFil/MkOQ9x2DFK2ccaKEYnd/a2ihGc=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._da11eb187('viqBzyI8g9IqJPOhiu0LSw==');return response($_v1bb6,200,[_da11eb187('cD/9ly1qWMzcsAcX7cKV5g==')=>_da11eb187('4Ed7JVQPdLdprwwHjHJ3i0N+zQHpNgqK01kSfOhcrm+zeNaaY6eJbK4USV1WS07i'),_da11eb187('fs4dgE+MQ5QKhRBB/xIC69Cp6lsP4ff3imA6YkAL/EM=')=>_da11eb187('idYW5zDbFyr6aFil/MkOQ9x2DFK2ccaKEYnd/a2ihGc=').$_vbf22.'"',]);}}