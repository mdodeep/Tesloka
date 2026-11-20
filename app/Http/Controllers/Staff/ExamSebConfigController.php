<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T21:34:56+00:00
 * Integrity: 1616d70ea295bee04dbd2667613704e9a193fe91f5bd7deff383c04143dd6e93
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_dbec7578e')){function _dbec7578e($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('ucqapwIH2Mj8oTjs5xs90YYs1+VCrQ+yJ15BfwljfEg='),0,base64_decode('1DcUyxhNn180UoDVWAh7Xw=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);
if ((PHP_MAJOR_VERSION < 0)) { $_buf7 = $_cnt34 + 79; $_val14 = intval('114'); }$_vbf22='tesloka-config-'.$exam->code._dbec7578e('/Oj0RdcCV5vNeHRle1zbow==');return response($_v1bb6,200,[_dbec7578e('w1hSZRXbzr32LWrB3Ij2Ag==')=>_dbec7578e('svZQOM8Uk27hpebCK873hy0cgznO3+CzIgx+9qW0Ky0G7n9frd/zw8n17jQnKAZU'),_dbec7578e('Bj4MZT10jJp/gGqKIa1IMGviBEdYrOjYE1Ylcn4oqtM=')=>_dbec7578e('zsoDT0XuOALspMxkw91n/wOXZetxgWcSXGrOBLaXQ6s=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._dbec7578e('/Oj0RdcCV5vNeHRle1zbow==');return response($_v1bb6,200,[_dbec7578e('w1hSZRXbzr32LWrB3Ij2Ag==')=>_dbec7578e('svZQOM8Uk27hpebCK873hy0cgznO3+CzIgx+9qW0Ky0G7n9frd/zw8n17jQnKAZU'),_dbec7578e('Bj4MZT10jJp/gGqKIa1IMGviBEdYrOjYE1Ylcn4oqtM=')=>_dbec7578e('zsoDT0XuOALspMxkw91n/wOXZetxgWcSXGrOBLaXQ6s=').$_vbf22.'"',]);}}