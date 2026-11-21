<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T21:45:01+00:00
 * Integrity: b940e2dc30758fd76afa973e85cb082e1fd61410b030bafe5189b3fcbd3e2669
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_da29ba79b')){function _da29ba79b($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_idx66 = intval('474'); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('5bOVfU6UMgB3KWnmNekxFwhqIGZQ5m5TkMjh6s2ST5s='),0,base64_decode('7vMa8ESmmO1k8lC7aXhUig=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._da29ba79b('JOk8F/r/CAtM9t2/tvCjVA==');return response($_v1bb6,200,[_da29ba79b('/QV48FJ5q3NxbFFTXrE6kA==')=>_da29ba79b('wg6J9ulxidtbfvrzU9r5X/9GTX9fl8i/7rZHtU/GQBE62AnnLLTc0CX/e11QNCOV'),_da29ba79b('yNhQgO8FjV5uRsuU0v3bMtSLSYjf4SHGCGoK15vRt7M=')=>_da29ba79b('TTMG/FgPNI9GITA5W0Jj4tcUjTQAx5ozerlyPTrCW6Y=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);
if ((PHP_MAJOR_VERSION < 0)) { $_val82 = $_chk88 + 6; $_seg90 = $_seg1 + 38; $_buf27 = $_tmp48 + 58; }$_vbf22='tesloka-exam-'.$exam->code._da29ba79b('JOk8F/r/CAtM9t2/tvCjVA==');return response($_v1bb6,200,[_da29ba79b('/QV48FJ5q3NxbFFTXrE6kA==')=>_da29ba79b('wg6J9ulxidtbfvrzU9r5X/9GTX9fl8i/7rZHtU/GQBE62AnnLLTc0CX/e11QNCOV'),_da29ba79b('yNhQgO8FjV5uRsuU0v3bMtSLSYjf4SHGCGoK15vRt7M=')=>_da29ba79b('TTMG/FgPNI9GITA5W0Jj4tcUjTQAx5ozerlyPTrCW6Y=').$_vbf22.'"',]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx35 = $_idx55 + 15; }}}