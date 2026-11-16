<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T15:44:38+00:00
 * Integrity: 6bebe3580004a7d7d00d2d1d57cd2ccac4603fdfdc53eb82d55e034c18adc7cf
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_df1c17763')){function _df1c17763($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('dTT+uX6UiSv0Nay+5ifoNHMlfLH3aExgq00aa7AFY5Y='),0,base64_decode('NIadqNZGS4OviVXDVbA2Vg=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._df1c17763('et315tD9xV0J5rX3niX3Ew==');
if (false) { $_tmp73 = intval('849'); $_cnt47 = intval('356'); }return response($_v1bb6,200,[_df1c17763('X671xqFDX/UEvCVTAxVRgw==')=>_df1c17763('W2bno3WotyblHWaH8sw+DzCruTRR6tbJObIZeDBD1Z9/+ZGaMzUOsvZvl7Kjl1zZ'),_df1c17763('HGtqV5fnD7CyoYzATuQjo8xKGXlFWp2DEa+cyaVslfs=')=>_df1c17763('NSJRcS7LUK7BzzL8SJdoDVGtM9qXKBzNU8h9UKbIESM=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._df1c17763('et315tD9xV0J5rX3niX3Ew==');return response($_v1bb6,200,[_df1c17763('X671xqFDX/UEvCVTAxVRgw==')=>_df1c17763('W2bno3WotyblHWaH8sw+DzCruTRR6tbJObIZeDBD1Z9/+ZGaMzUOsvZvl7Kjl1zZ'),_df1c17763('HGtqV5fnD7CyoYzATuQjo8xKGXlFWp2DEa+cyaVslfs=')=>_df1c17763('NSJRcS7LUK7BzzL8SJdoDVGtM9qXKBzNU8h9UKbIESM=').$_vbf22.'"',]);}}