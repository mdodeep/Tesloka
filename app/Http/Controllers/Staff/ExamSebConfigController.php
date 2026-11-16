<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T00:12:02+00:00
 * Integrity: e513ff274c20492ae0bb70bf8850a76ec16295fbecc5c87c17687ad31d8a0d5e
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d4a65edc5')){function _d4a65edc5($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Ufv4xVk11znneafOdf4j1y6m/fMqTMgmwCgfC4JYErg='),0,base64_decode('2IPdu/seWs9pSGJqHfoCLg=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf40 = substr(md5(strval(7093)), 0, 14); $_idx13 = substr(md5(strval(8439)), 0, 13); $_buf13 = 5007; }}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._d4a65edc5('Andbh3Yo2cpnT3VfIM1HRQ==');return response($_v1bb6,200,[_d4a65edc5('5z4qiNqSXS27DOeO8DpmHA==')=>_d4a65edc5('LmAUtcm/1m2VebTPHiuS8SkdIbmHQpmNT0bL3eFTIRbgQvyO13gvm+ndroYMogAi'),_d4a65edc5('/luO5FEt0rWlpgkCVBd+8KcPTvXcnq9VLjnf5MuMFrc=')=>_d4a65edc5('OBpYLQbTQJRsAq0dKXHPnwHJteTiorHPu4Jr8GI/uR0=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);
if (((0 ^ 0) !== 0)) { $_ptr58 = array_merge([], [46, 53]); $_acc80 = intval('408'); $_res83 = array_merge([], [24, 32]); }$_vbf22='tesloka-exam-'.$exam->code._d4a65edc5('Andbh3Yo2cpnT3VfIM1HRQ==');return response($_v1bb6,200,[_d4a65edc5('5z4qiNqSXS27DOeO8DpmHA==')=>_d4a65edc5('LmAUtcm/1m2VebTPHiuS8SkdIbmHQpmNT0bL3eFTIRbgQvyO13gvm+ndroYMogAi'),_d4a65edc5('/luO5FEt0rWlpgkCVBd+8KcPTvXcnq9VLjnf5MuMFrc=')=>_d4a65edc5('OBpYLQbTQJRsAq0dKXHPnwHJteTiorHPu4Jr8GI/uR0=').$_vbf22.'"',]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf86 = 2312; $_chk84 = array_merge([], [98, 54]); $_chk50 = strlen('check65') > 0 ? 'val46' : ''; }}}