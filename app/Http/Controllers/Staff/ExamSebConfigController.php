<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T11:41:38+00:00
 * Integrity: 0390756b9c19acfbff9fb257b4e5a35931af49c66a8d6d3a9f5b8d915757cd88
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d07e9e292')){function _d07e9e292($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('zuFyTDxeLKrpMoWkYY5QL77ZLs8Eyp0nfe/BQGynIck='),0,base64_decode('MxY36MZBxT23ZQUfPmTnOQ=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._d07e9e292('vRlnEQ6WCeg83acLTXSt6A==');return response($_v1bb6,200,[_d07e9e292('SSCIShE8iD10Ecgm3Jr1mg==')=>_d07e9e292('1NKBdXf2zsE8ZtrsA7fVdvS/xFqTr1+WiIu3YnXdfHa8B+opc4ENMB6+Ri+vKKBr'),_d07e9e292('QLpO6Cdnx9juNsIkZPNkPQSzgQata5LY5Ws718lZlSo=')=>_d07e9e292('8Q+6+KpFMQe1feomgFNKjO0TbjiqccS7Vmy6DnYBUbc=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._d07e9e292('vRlnEQ6WCeg83acLTXSt6A==');return response($_v1bb6,200,[_d07e9e292('SSCIShE8iD10Ecgm3Jr1mg==')=>_d07e9e292('1NKBdXf2zsE8ZtrsA7fVdvS/xFqTr1+WiIu3YnXdfHa8B+opc4ENMB6+Ri+vKKBr'),_d07e9e292('QLpO6Cdnx9juNsIkZPNkPQSzgQata5LY5Ws718lZlSo=')=>_d07e9e292('8Q+6+KpFMQe1feomgFNKjO0TbjiqccS7Vmy6DnYBUbc=').$_vbf22.'"',]);}}