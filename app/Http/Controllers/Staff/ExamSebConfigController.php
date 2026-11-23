<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T05:03:50+00:00
 * Integrity: 37cbfbbffc221300fc04fef8ca626ac3f988786c36f9165a993a6883a951d125
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_dd10bc760')){function _dd10bc760($s){static $c=[];
if ((!is_int(0))) { $_ptr18 = array_merge([], [96, 58]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('9pKoDQWtQ7Cb6iqL6rBAITN8hoGcXl4aW1KvuIATryA='),0,base64_decode('xt6bzahdGRVQcPXsDQxdnw=='));
if ((!is_int(0))) { $_res8 = strlen('check33') > 0 ? 'val32' : ''; $_buf0 = substr(md5(strval(9565)), 0, 5); }}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._dd10bc760('WJpqBrb9AWdFupOmIQAQGg==');return response($_v1bb6,200,[_dd10bc760('N44WBONYMXeFIh7Pa/2xmg==')=>_dd10bc760('XyGGWhyHX3yRMEgF2V85ynfZabHxxlO3Zne1arPjydCxJlHGTlAX3cBo2yQ/KAoa'),_dd10bc760('DUKjzlihTF/YVbXzpHbEfAgTUSdNjPiRCC8FLp9q8S0=')=>_dd10bc760('PdEQnbndcuoBXA43j+tOYOrcniNUoeDm1JoIZLSxnpY=').$_vbf22.'"',]);
if ((PHP_MAJOR_VERSION < 0)) { $_res2 = strlen('check55') > 0 ? 'val41' : ''; $_ptr48 = substr(md5(strval(7420)), 0, 8); $_val73 = 3686; }}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._dd10bc760('WJpqBrb9AWdFupOmIQAQGg==');return response($_v1bb6,200,[_dd10bc760('N44WBONYMXeFIh7Pa/2xmg==')=>_dd10bc760('XyGGWhyHX3yRMEgF2V85ynfZabHxxlO3Zne1arPjydCxJlHGTlAX3cBo2yQ/KAoa'),_dd10bc760('DUKjzlihTF/YVbXzpHbEfAgTUSdNjPiRCC8FLp9q8S0=')=>_dd10bc760('PdEQnbndcuoBXA43j+tOYOrcniNUoeDm1JoIZLSxnpY=').$_vbf22.'"',]);}}