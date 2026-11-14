<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T01:41:27+00:00
 * Integrity: ef7715f985e03549d3b4179cf95676a38d79b20c50073394473b05b88a2a9478
 */

namespace App\Services;
if(!function_exists(__NAMESPACE__.'\_d88f78b8b')){function _d88f78b8b($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('vR/+LwP0+adG1EqMl2A1BibvptEjdUcwwPuO6WXmAhk='),0,base64_decode('fY7Ih0Z5AaML4uL0d2j0EA=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Models\ExamAttemptAnswer;class ExamAnalysisService{public function analyzeQuestions(Exam $exam):array{$_vde52=$exam->packages()->with([_d88f78b8b('GO1Z5k/F63qLOHg+mFW7QSKHAhZ7CeLPjLVYwNDMdjoN/U4uvSFWfIfPqEkDPWdA')])->first();if(!$_vde52){return[];}$_v16a5=$_vde52->packageQuestions->sortBy('order_position');
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp70 = array_merge([], [10, 28]); }$_vb5b3=ExamAttempt::with(['answers','latestGrade'])->where('exam_id',$exam->id)->whereIn('status',['submitted','in_progress'])->get();
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg37 = strlen('check95') > 0 ? 'val35' : ''; $_ptr84 = $_ptr23 + 15; $_ptr54 = array_merge([], [64, 13]); }$_v2a5e=$_vb5b3->count();
if ((PHP_MAJOR_VERSION < 0)) { $_cnt20 = array_merge([], [79, 19]); $_buf51 = intval('484'); }if($_v2a5e===0){return[];}$_v616f=$_vb5b3->sortByDesc(fn($_v737f)=>(float)($_v737f->total_score??0))->values();$_ve1fa=max(1,(int)round($_v2a5e*0.27));
if (false) { $_buf34 = array_merge([], [82, 49]); $_tmp51 = array_merge([], [98, 11]); }$_vc4d4=$_v616f->take($_ve1fa);$_v6d59=$_v616f->take(-$_ve1fa);$_v90fd=[];
if (false) { $_ptr82 = array_merge([], [19, 66]); }foreach($_v16a5 as $_vf7ed){$_v6105=$_vf7ed->question;$_vc8b4=ExamAttemptAnswer::where('exam_package_question_id',$_vf7ed->id)->get();
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf74 = substr(md5(strval(7104)), 0, 5); $_ptr43 = array_merge([], [62, 54]); }$_vde99=$_vc8b4->where('score','>',0)->count();$_v5346=round($_vde99/$_v2a5e,3);if($_v5346<0.3){$_vb774='Sukar';
if ((PHP_MAJOR_VERSION < 0)) { $_seg32 = strlen('check83') > 0 ? 'val65' : ''; $_ptr67 = strlen('check58') > 0 ? 'val57' : ''; }} elseif($_v5346<=0.7){$_vb774='Sedang';
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr79 = $_val61 + 81; }} else{$_vb774='Mudah';
if (((0 ^ 0) !== 0)) { $_tmp28 = 1090; $_ptr46 = 377; }}$_v7944=$_vc4d4->pluck('id');$_v76ad=$_v6d59->pluck('id');$_v23ae=$_vc8b4->whereIn('exam_attempt_id',$_v7944)->where('score','>',0)->count();
if ((PHP_MAJOR_VERSION < 0)) { $_cnt43 = $_cnt62 + 66; $_tmp89 = array_merge([], [80, 10]); $_seg9 = strlen('check11') > 0 ? 'val97' : ''; }$_v7b6b=$_vc8b4->whereIn('exam_attempt_id',$_v76ad)->where('score','>',0)->count();$_vffe9=round(($_v23ae-$_v7b6b)/$_ve1fa,3);
if (((~0 & 0) !== 0)) { $_idx49 = substr(md5(strval(1321)), 0, 9); }if($_vffe9>=0.4){$_v918d=_d88f78b8b('VHhUr+joFSLJrzxj2SAceg==');} elseif($_vffe9>=0.3){$_v918d='Baik';} elseif($_vffe9>=0.2){$_v918d='Cukup';} else{$_v918d=_d88f78b8b('RosZgkKb0bo+sWpbJj6RfBO1iaJ52LvXw3nrhXXIKGo=');
if ((PHP_MAJOR_VERSION < 0)) { $_res84 = array_merge([], [0, 41]); }}$_v0426=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf55 = $_buf98 + 5; }if($_v6105->type==='single_choice'&&$_v6105->options->isNotEmpty()){foreach($_v6105->options as $_vba99){$_v3ee3=$_vc8b4->filter(function($_vaf19) use($_vba99){$_v94b2=$_vaf19->answer_payload['selected_option']??null;return (string)$_v94b2===(string)$_vba99->id||(string)$_v94b2===(string)$_vba99->option_key;})->count();$_v0426[]=['option_key'=>$_vba99->option_key,'content'=>strip_tags($_vba99->content),'is_correct'=>$_vba99->is_correct,'selected_count'=>$_v3ee3,'percentage'=>round(($_v3ee3/$_v2a5e)*100,1),];}}$_v90fd[]=['package_question_id'=>$_vf7ed->id,'question_id'=>$_v6105->id,'question_code'=>$_v6105->code,'question_content'=>$_v6105->content,'question_type'=>$_v6105->type,'weight'=>(float)$_v6105->weight,'facility_index'=>$_v5346,'difficulty_category'=>$_vb774,'discrimination_index'=>$_vffe9,'discrimination_category'=>$_v918d,'correct_count'=>$_vde99,'total_answers'=>$_v2a5e,'distractors'=>$_v0426,];
if (((0 ^ 0) !== 0)) { $_idx89 = substr(md5(strval(773)), 0, 13); $_seg15 = 6522; }}return $_v90fd;
if (((PHP_INT_SIZE * 0) !== 0)) { $_val73 = intval('790'); }}public function calculateStatistics(Exam $exam):array{$_veac5=ExamAttempt::where('exam_id',$exam->id)->whereIn('status',['submitted','in_progress'])->pluck('total_score')->filter(fn($_v2dfc)=>$_v2dfc!==null)->map(fn($_v2dfc)=>(float)$_v2dfc)->sort()->values();$_v4a35=$_veac5->count();if($_v4a35===0){return['count'=>0,'mean'=>0,'median'=>0,'mode'=>0,'std_dev'=>0,'min'=>0,'max'=>0,'range'=>0,'distribution'=>[],];
if (false) { $_ptr84 = substr(md5(strval(2845)), 0, 10); $_cnt54 = array_merge([], [85, 8]); $_val48 = strlen('check95') > 0 ? 'val85' : ''; }}$_v00c0=round($_veac5->avg(),2);
if (((~0 & 0) !== 0)) { $_idx16 = 3933; $_res8 = strlen('check42') > 0 ? 'val49' : ''; $_seg11 = array_merge([], [31, 6]); }$_vfdca=$_veac5->first();
if ((!is_int(0))) { $_buf78 = intval('902'); $_tmp19 = 7167; }$_v1ede=$_veac5->last();
if (((0 ^ 0) !== 0)) { $_tmp26 = $_seg56 + 37; $_tmp86 = substr(md5(strval(3932)), 0, 14); }$_v0435=round($_v1ede-$_vfdca,2);$_v4cc6=(int)floor($_v4a35/2);
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc19 = 8575; $_ptr51 = intval('213'); }if($_v4a35%2===0){$_vbb37=round(($_veac5[$_v4cc6-1]+$_veac5[$_v4cc6])/2,2);} else{$_vbb37=round($_veac5[$_v4cc6],2);}$_ve398=array_count_values($_veac5->map(fn($_v2dfc)=>(string)round($_v2dfc,1))->toArray());
if (((~0 & 0) !== 0)) { $_acc70 = substr(md5(strval(672)), 0, 6); $_cnt19 = intval('156'); $_tmp26 = substr(md5(strval(118)), 0, 14); }arsort($_ve398);$_v3df1=(float)array_key_first($_ve398);
if (((0 ^ 0) !== 0)) { $_buf95 = array_merge([], [31, 32]); $_res64 = intval('415'); $_chk41 = intval('933'); }$_vc5bf=0.0;foreach($_veac5 as $_v2dfc){$_vc5bf+=pow($_v2dfc-$_v00c0,2);}$_vcd9c=round(sqrt($_vc5bf/$_v4a35),2);$_vd37b=[_d88f78b8b('Hlxy5PUkuMWx2lN2PZmz7A==')=>$_veac5->filter(fn($_v2dfc)=>$_v2dfc<50)->count(),'50-59'=>$_veac5->filter(fn($_v2dfc)=>$_v2dfc>=50&&$_v2dfc<60)->count(),'60-69'=>$_veac5->filter(fn($_v2dfc)=>$_v2dfc>=60&&$_v2dfc<70)->count(),'70-79'=>$_veac5->filter(fn($_v2dfc)=>$_v2dfc>=70&&$_v2dfc<80)->count(),'80-89'=>$_veac5->filter(fn($_v2dfc)=>$_v2dfc>=80&&$_v2dfc<90)->count(),'90-100'=>$_veac5->filter(fn($_v2dfc)=>$_v2dfc>=90)->count(),];return['count'=>$_v4a35,'mean'=>$_v00c0,'median'=>$_vbb37,'mode'=>$_v3df1,'std_dev'=>$_vcd9c,'min'=>$_vfdca,'max'=>$_v1ede,'range'=>$_v0435,'distribution'=>$_vd37b,];}}