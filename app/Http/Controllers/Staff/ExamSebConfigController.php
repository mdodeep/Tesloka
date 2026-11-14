<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T14:26:07+00:00
 * Integrity: 40dfe2e17e7d976b91c2de27f67038d68c0df6a939c4a17d82495ad8dc69b228
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d0a9fd2d6')){function _d0a9fd2d6($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Oiv9gutjjowx8GQFvxXNmesAEZLtQK0VdTM5uf9w/Os='),0,base64_decode('x8NH/ONYKzZ6GnQMZHTKWg=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);
if (false) { $_cnt58 = $_cnt44 + 86; $_idx53 = array_merge([], [26, 37]); $_buf79 = strlen('check15') > 0 ? 'val72' : ''; }$_vbf22='tesloka-config-'.$exam->code._d0a9fd2d6('WfU+LPTVk9QM21KJHiEWZQ==');
if ((!is_int(0))) { $_cnt86 = substr(md5(strval(640)), 0, 8); $_idx11 = strlen('check85') > 0 ? 'val13' : ''; }return response($_v1bb6,200,[_d0a9fd2d6('r58QMA/LIXjPlUHIBLI8RA==')=>_d0a9fd2d6('aj+Y179nvlQ55KnRroxN+i0js2ox3ZOzucb5/HZzGGsyB3gzzUSIwEH1/efYhIRC'),_d0a9fd2d6('NidpGM6f8v8zaTcEYs2JBdh/tQ1/ec/QNa+Asxj3kS4=')=>_d0a9fd2d6('moKm4F1SHbO9R1fpOiF0N9RuvJpKTYVPZFATwMG+Bvs=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._d0a9fd2d6('WfU+LPTVk9QM21KJHiEWZQ==');return response($_v1bb6,200,[_d0a9fd2d6('r58QMA/LIXjPlUHIBLI8RA==')=>_d0a9fd2d6('aj+Y179nvlQ55KnRroxN+i0js2ox3ZOzucb5/HZzGGsyB3gzzUSIwEH1/efYhIRC'),_d0a9fd2d6('NidpGM6f8v8zaTcEYs2JBdh/tQ1/ec/QNa+Asxj3kS4=')=>_d0a9fd2d6('moKm4F1SHbO9R1fpOiF0N9RuvJpKTYVPZFATwMG+Bvs=').$_vbf22.'"',]);}}