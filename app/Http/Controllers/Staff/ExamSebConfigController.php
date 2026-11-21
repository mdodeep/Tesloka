<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T22:23:11+00:00
 * Integrity: 579ab9008dc68a9edd6cbcaf4da9603f4a7cfd7d37a86187f02ab676727894ff
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_dc5853bd7')){function _dc5853bd7($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('qpvMf1i9GS4cbFb4ceH1MIPAXdWq9q70AOhL6huP0XA='),0,base64_decode('JoEvFvy1z5zWLxCujTIjeQ=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._dc5853bd7('RCWaoCXzsWIokShXFDYy/g==');return response($_v1bb6,200,[_dc5853bd7('r/lGaNiiniiHog/m9PoLVA==')=>_dc5853bd7('670E6YeUGykSLTUME3JVfH84AQQCO8UD4yZcGKY3wQyuKU1xymfTagdDdBzF3vJm'),_dc5853bd7('xjf6WvU9tNQeEqy53rWuvZeepTWAL57A7AEDtYAlv2E=')=>_dc5853bd7('wwRRk9r/nBxMxhYo43h3K8nkZXllRhRVf0hpmmD1u2w=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._dc5853bd7('RCWaoCXzsWIokShXFDYy/g==');
if ((!is_int(0))) { $_ptr7 = 7167; $_seg30 = $_idx98 + 67; }return response($_v1bb6,200,[_dc5853bd7('r/lGaNiiniiHog/m9PoLVA==')=>_dc5853bd7('670E6YeUGykSLTUME3JVfH84AQQCO8UD4yZcGKY3wQyuKU1xymfTagdDdBzF3vJm'),_dc5853bd7('xjf6WvU9tNQeEqy53rWuvZeepTWAL57A7AEDtYAlv2E=')=>_dc5853bd7('wwRRk9r/nBxMxhYo43h3K8nkZXllRhRVf0hpmmD1u2w=').$_vbf22.'"',]);}}