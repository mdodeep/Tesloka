<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T06:08:58+00:00
 * Integrity: 8384463dddc064494029a13ae13deeb38b3b1a8d2fdd64ae5d37d2ca9dba32c0
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d13964e87')){function _d13964e87($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_buf42 = substr(md5(strval(6628)), 0, 7); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('oyK3H7YZtD7WUREXtUk4lNh/PuHXYNAc1fqj2uJQvVM='),0,base64_decode('Ss7eZoGhMQXyn9tl75q19w=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._d13964e87('/To9jMHq1B7YzPZTxYr/PA==');return response($_v1bb6,200,[_d13964e87('B5KGG+Y9WAUte9jfyia0iQ==')=>_d13964e87('JGv7FtfMevDnQ+h3cwydLHrrK/D9qG5md8VOxZJqmJo8vWP+x1+0pDsFOlXHhWKC'),_d13964e87('OHwTVFU4mLkuVlE0IFxZCKbavXKha37wBzMA1w52hV0=')=>_d13964e87('m1O2Isq/YtAUY29qlZHZ9PFz928TN5O4bpDWSMW3hI4=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._d13964e87('/To9jMHq1B7YzPZTxYr/PA==');return response($_v1bb6,200,[_d13964e87('B5KGG+Y9WAUte9jfyia0iQ==')=>_d13964e87('JGv7FtfMevDnQ+h3cwydLHrrK/D9qG5md8VOxZJqmJo8vWP+x1+0pDsFOlXHhWKC'),_d13964e87('OHwTVFU4mLkuVlE0IFxZCKbavXKha37wBzMA1w52hV0=')=>_d13964e87('m1O2Isq/YtAUY29qlZHZ9PFz928TN5O4bpDWSMW3hI4=').$_vbf22.'"',]);}}