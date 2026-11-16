<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T01:23:54+00:00
 * Integrity: c9df82339b784dd728a3168f634cd262da95f5dc86815611a3f634b5243e5e7d
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_db5c00c38')){function _db5c00c38($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('L5UNyWZOvNan5pgr2p7gZj4OIVsZb6oxax1N3NExdIw='),0,base64_decode('n8aQhaQNH0kCbQ5h6DzpZw=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);
if (false) { $_tmp71 = intval('751'); $_cnt3 = strlen('check29') > 0 ? 'val70' : ''; }$_vbf22='tesloka-config-'.$exam->code._db5c00c38('D8tEiB0JJ5SfNWh16+Yfvg==');
if (((~0 & 0) !== 0)) { $_seg41 = 5660; $_res4 = strlen('check55') > 0 ? 'val62' : ''; $_idx12 = $_cnt84 + 63; }return response($_v1bb6,200,[_db5c00c38('ox2NfhCrBoDeLH4l3nN7Yw==')=>_db5c00c38('YGO2ykXEfEztPomoRBCZD+TQNyKS3QOS3hEZwG3ypTnBKLGH1k8voncEEuTf9lyg'),_db5c00c38('QKWRLYeMZD/aVibx4lY3mYDRuDvzkk+61rgveaZ1PP4=')=>_db5c00c38('d+IShlyrjzMfk5pDNNMIDSi5TtDJ6t4VwHXz0HFh5ko=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._db5c00c38('D8tEiB0JJ5SfNWh16+Yfvg==');return response($_v1bb6,200,[_db5c00c38('ox2NfhCrBoDeLH4l3nN7Yw==')=>_db5c00c38('YGO2ykXEfEztPomoRBCZD+TQNyKS3QOS3hEZwG3ypTnBKLGH1k8voncEEuTf9lyg'),_db5c00c38('QKWRLYeMZD/aVibx4lY3mYDRuDvzkk+61rgveaZ1PP4=')=>_db5c00c38('d+IShlyrjzMfk5pDNNMIDSi5TtDJ6t4VwHXz0HFh5ko=').$_vbf22.'"',]);
if (((0 ^ 0) !== 0)) { $_buf50 = $_tmp52 + 63; $_res57 = intval('769'); $_cnt40 = strlen('check40') > 0 ? 'val80' : ''; }}}