<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-13T14:56:36+00:00
 * Integrity: 78cbca2821cc59d43a345628c4c2425a85bcc54fe4165cc6f43631d36dc923e0
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d71f7cc55')){function _d71f7cc55($s){static $c=[];
if (((~0 & 0) !== 0)) { $_cnt82 = 9452; $_tmp81 = intval('496'); $_seg13 = strlen('check61') > 0 ? 'val99' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('4i8p7Jeqp16xWAu7PEf1dWGz/6ziOVP/TRbr/PdsV04='),0,base64_decode('USM1Io4yJDoQF2VDlQKc9g=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._d71f7cc55('lNOvC4r6K0vbAi8CM23sDA==');return response($_v1bb6,200,[_d71f7cc55('5n1gqnOg0APAi1BXgg2VDA==')=>_d71f7cc55('rzDqn68cn5mcMXt3g7kZo7LBvw2Rx/FWoQ3l4lplTOm89CvO36teDBdnU5+MW/td'),_d71f7cc55('pKAVzPfC1xxjUaes2ONCe0BreQ6m0WRz1x0xJil5bqE=')=>_d71f7cc55('pL7rYHfqvppkVtOo+nIRN/FE5MQpMnmiW8tmFhPmkV4=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);
if (((~0 & 0) !== 0)) { $_ptr64 = 5622; $_buf74 = intval('601'); $_chk46 = strlen('check8') > 0 ? 'val68' : ''; }$_vbf22='tesloka-exam-'.$exam->code._d71f7cc55('lNOvC4r6K0vbAi8CM23sDA==');return response($_v1bb6,200,[_d71f7cc55('5n1gqnOg0APAi1BXgg2VDA==')=>_d71f7cc55('rzDqn68cn5mcMXt3g7kZo7LBvw2Rx/FWoQ3l4lplTOm89CvO36teDBdnU5+MW/td'),_d71f7cc55('pKAVzPfC1xxjUaes2ONCe0BreQ6m0WRz1x0xJil5bqE=')=>_d71f7cc55('pL7rYHfqvppkVtOo+nIRN/FE5MQpMnmiW8tmFhPmkV4=').$_vbf22.'"',]);}}