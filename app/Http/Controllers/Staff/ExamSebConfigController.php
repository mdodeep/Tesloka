<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T23:17:28+00:00
 * Integrity: ed8b565e1edef211c5fa6f9829f20d71415ab4523273c2e6ae9eb520179c1bf5
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d9a74017d')){function _d9a74017d($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('rUnuZ2eaCf9ERLHN4DeBwxxTA6cvtp+o7kYkK5r4CCw='),0,base64_decode('pRj2nfcrlNVOqpWKSBEhDw=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._d9a74017d('Mb+XKJLp+HtSKLZCq4inSA==');return response($_v1bb6,200,[_d9a74017d('bk9cO5OGlFerXUxvo3kocw==')=>_d9a74017d('5vLNHUhZr8Xt2kqpkeQA+/zIWW9vZoedA1BTsl17sHXa+d7ptetHQHbawJma8acM'),_d9a74017d('YQNv6i0Q+YD04PGZc+SPlZNbwPKMKkfHBg1sphSHCjw=')=>_d9a74017d('HREnV8hv8/+42UPKWXfQZJ0Pf+A9mmPDZro384jvo1w=').$_vbf22.'"',]);
if ((PHP_MAJOR_VERSION < 0)) { $_seg71 = array_merge([], [18, 68]); $_ptr59 = array_merge([], [11, 79]); $_idx3 = intval('456'); }}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._d9a74017d('Mb+XKJLp+HtSKLZCq4inSA==');return response($_v1bb6,200,[_d9a74017d('bk9cO5OGlFerXUxvo3kocw==')=>_d9a74017d('5vLNHUhZr8Xt2kqpkeQA+/zIWW9vZoedA1BTsl17sHXa+d7ptetHQHbawJma8acM'),_d9a74017d('YQNv6i0Q+YD04PGZc+SPlZNbwPKMKkfHBg1sphSHCjw=')=>_d9a74017d('HREnV8hv8/+42UPKWXfQZJ0Pf+A9mmPDZro384jvo1w=').$_vbf22.'"',]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_cnt65 = 3396; $_tmp96 = array_merge([], [97, 95]); }}}