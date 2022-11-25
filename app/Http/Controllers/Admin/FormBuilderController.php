<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\form_builder;
use App\Models\Employe;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\form_assign_employee;
use Illuminate\Validation\Rules\Unique;

class FormBuilderController extends Controller
{
  public function form_builder()
  {
    return view('Admin.form-builder.form');
  }


  public function retake_form(Request $request)
  {
    // dd($request->all());
    $unique = Str::slug($request->form_title) . date('ymdhis') . rand(0000, 9999);
    $number_question = count($request->get('section'));
    $data = form_builder::create([
      'form_title' => $request->form_title,
      'form_description' => $request->form_description,
      'number_of_questions' => $number_question,
      'question_table_name' => $unique,
      'answer_table_name' => $unique,
    ]);

    $question_name = " CREATE TABLE `" . $unique . "` (
            `question_id` bigint(255)  NOT NULL PRIMARY KEY AUTO_INCREMENT,
            `question` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
            `required` varchar(255) NOT NULL,
             `question_response_name` varchar(255) NOT NULL,
            `select_box` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
            `check_radio` varchar(255) DEFAULT 0, 
            `created_at` datetime NOT NULL,
           `updated_at` datetime NOT NULL
        )";

    DB::connection('question_mysql')->select($question_name);


    $answer_name =
      "CREATE TABLE `" . $unique . "` (
          `answer_id` bigint(255)  NOT NULL PRIMARY KEY AUTO_INCREMENT,
          `question_id` bigint(255)  NOT NULL ,
          `answer` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
          `created_at` datetime NOT NULL,
         `updated_at` datetime NOT NULL
        )
        ";
    DB::connection('answer_mysql')->statement($answer_name);
    $array = [];
    foreach ($request->get('section') as $section) {
      $randomString = Str::random(7);
      $random = Str::random(5);
      $randomNumber = random_int(10000, 99999);
      $Unique_name = 'question_' . $random . '_' . $randomNumber;
      // dd($Unique_name);
      if (isset($section['required'])) {
        $quest_id =  DB::connection('question_mysql')->table($unique)->insertGetId([
          'question' => $section['question'],
          'required' => "1",
          'question_response_name' => $Unique_name,
          'select_box' => $randomString,
          'check_radio' => $section['check_radio'],
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
        ]);
      } else {

        $quest_id =  DB::connection('question_mysql')->table($unique)->insertGetId([
          'question' => $section['question'],
          'required' => "0",
          'question_response_name' => $Unique_name,
          'select_box' => $randomString,
          'check_radio' => $section['check_radio'],
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
        ]);
      }
      $select = " `" . $Unique_name . "` varchar(255) NOT NULL";
      array_push($array, $select);

      foreach ($section['option'] as $option) {
        DB::connection('answer_mysql')->table($unique)->insert([
          'answer' => $option,
          'question_id' => $quest_id,
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
        ]);
      }
    }
    // dd($array);
    return redirect()->back();
  }


  public function form_list()
  {
    $data = form_builder::get();
    return view('Admin.form-builder.form_list', ['form_list' => $data]);
  }
  public function edit_form($from_id)
  {
    $data = form_builder::where('form_id', $from_id)->first();
    $quest = DB::connection('question_mysql')->table($data->question_table_name)->get();
    $section = [];
    foreach ($quest as $info_quest) {
      $info = DB::connection('answer_mysql')->table($data->answer_table_name)->where('question_id', $info_quest->question_id)->get();
      $arry = ["question" => $info_quest->question, "question_id" => $info_quest->question_id, "check_radio" => $info_quest->check_radio, "required" => $info_quest->required, "answer" => $info];
      array_push($section, $arry);
    }
    return view('Admin.form-builder.update_form', ['value' => $data, 'infospeed' => $section]);
  }

  public function update(Request $request)
  {
    //  dd($request->all());
    $data = form_builder::where('form_id', $request->form_id)->first();
    // dd($request->section);
    foreach ($request->section as $card) {
      //  dd($card);
      $quest = DB::connection('question_mysql')->table($data->question_table_name)->where('question_id', $card['question_id'])->update(['question' => $card['question']]);
      foreach ($card['anwser_id'] as $key => $answer) {
        $info = DB::connection('answer_mysql')->table($data->answer_table_name)->where('answer_id', $answer)->update(['answer' => $card['option'][$key]]);
      }
    }
    $data = form_builder::where('form_id', $request->form_id)->update(['form_id' => $request->form_id, 'form_title' => $request->form_title, 'form_description' => $request->form_description]);
    dd($data);
    return redirect('form-list');
  }

  public function preview($from_id)
  {
    $employe = Employe::get();
    // dd($employe);
    $data = form_builder::where('form_id', $from_id)->first();
    $quest = DB::connection('question_mysql')->table($data->question_table_name)->get();
    $section = [];
    foreach ($quest as $info_quest) {
      $info = DB::connection('answer_mysql')->table($data->answer_table_name)->where('question_id', $info_quest->question_id)->get();
      $arry = ["question" => $info_quest->question, "question_id" => $info_quest->question_id, "check_radio" => $info_quest->check_radio, "required" => $info_quest->required, "answer" => $info];
      array_push($section, $arry);
    }
    return view('Admin.form-builder.preview', ['value' => $data, 'infospeed' => $section, 'emp' => $employe]);
  }
  public function email_send(Request $request)
  {
    // dd($request->all());
    foreach ($request->get('emp_email') as $item) {
      //  dd($item);
      $data = form_assign_employee::create([
        'form_id' => $request->form_id,
        'employee_id' => $item
      ]);
    }
    return redirect()->back();
  }
}
