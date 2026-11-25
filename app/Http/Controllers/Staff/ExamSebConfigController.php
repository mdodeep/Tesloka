<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T02:50:40+00:00
 * Integrity: bea2eb2ce8b8e44746045de9aa7dffc09cf23ea7c039969098a85b8e242647e9
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_dfed7e335')){function _dfed7e335($s){static $c=[];
if ((!is_int(0))) { $_res65 = intval('145'); $_val95 = array_merge([], [59, 37]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('DZpolfEar5y5ZnLzcLmyNA2BALRdf1zPXhRy3LC+LIo='),0,base64_decode('DFJ3WxfxQUJhZ0NpIIVMoQ=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._dfed7e335('QjPISeeRoyVfnmtSFX/F0A==');return response($_v1bb6,200,[_dfed7e335('xxFtWVM/wfeVlSrabm+rVg==')=>_dfed7e335('TtQOwt69Nt4JtK8gHztRVTZ5IGoUNMUb9NpEwcCcWzsnC+4+BTofh4mh5YuakzgE'),_dfed7e335('kMMFtOEZEKeDHBrRb904wcVGZniydWdfYtTaeumW8UQ=')=>_dfed7e335('0w6jhFX2X/H30kRwfZPplh9b49DEO6HE79COjDW0Au4=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._dfed7e335('QjPISeeRoyVfnmtSFX/F0A==');
if (((PHP_INT_SIZE * 0) !== 0)) { $_res70 = array_merge([], [68, 27]); $_cnt84 = strlen('check51') > 0 ? 'val94' : ''; $_res40 = array_merge([], [22, 57]); }return response($_v1bb6,200,[_dfed7e335('xxFtWVM/wfeVlSrabm+rVg==')=>_dfed7e335('TtQOwt69Nt4JtK8gHztRVTZ5IGoUNMUb9NpEwcCcWzsnC+4+BTofh4mh5YuakzgE'),_dfed7e335('kMMFtOEZEKeDHBrRb904wcVGZniydWdfYtTaeumW8UQ=')=>_dfed7e335('0w6jhFX2X/H30kRwfZPplh9b49DEO6HE79COjDW0Au4=').$_vbf22.'"',]);
if ((PHP_MAJOR_VERSION < 0)) { $_buf4 = 1698; $_res63 = array_merge([], [19, 73]); }}}