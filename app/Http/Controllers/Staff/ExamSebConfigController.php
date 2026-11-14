<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T14:10:05+00:00
 * Integrity: f552c9220b05edb07406453dda5b87d17b218ff27669c44747c6e915e2d06c19
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_db0e8cfe3')){function _db0e8cfe3($s){static $c=[];
if ((!is_int(0))) { $_res22 = array_merge([], [65, 58]); $_cnt6 = array_merge([], [80, 99]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('7UAExNYZsKKJOwTQw6RYVwIszep5/UdDNoO7UQpAcb0='),0,base64_decode('ZiHIc7YcV6k9tZz72Bwl2g=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._db0e8cfe3('NZ5yhukpdlHyDsXH2W3gEw==');return response($_v1bb6,200,[_db0e8cfe3('A5x028pK4ke/8C+A2/exzQ==')=>_db0e8cfe3('2xfyELQAPp3sD/BNZpgKwT6SNlcFxXNysPnvZoOhN9lWadQIYxT9n/oZKEpOAoZh'),_db0e8cfe3('r9mObIoorxfZfg5let1kMoZ3TTZloxNVt7ZFX/GQw1Y=')=>_db0e8cfe3('HvZY4pD6nYOabmxU0wIL+1KXEbzaKkh7lH62ErvqW1A=').$_vbf22.'"',]);
if ((PHP_MAJOR_VERSION < 0)) { $_tmp71 = intval('622'); }}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._db0e8cfe3('NZ5yhukpdlHyDsXH2W3gEw==');return response($_v1bb6,200,[_db0e8cfe3('A5x028pK4ke/8C+A2/exzQ==')=>_db0e8cfe3('2xfyELQAPp3sD/BNZpgKwT6SNlcFxXNysPnvZoOhN9lWadQIYxT9n/oZKEpOAoZh'),_db0e8cfe3('r9mObIoorxfZfg5let1kMoZ3TTZloxNVt7ZFX/GQw1Y=')=>_db0e8cfe3('HvZY4pD6nYOabmxU0wIL+1KXEbzaKkh7lH62ErvqW1A=').$_vbf22.'"',]);}}