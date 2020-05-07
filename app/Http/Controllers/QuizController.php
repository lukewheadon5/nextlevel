<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\User;
use App\Quiz;
use App\Userscore;
use App\Question;
use App\Useranswer;

class QuizController extends Controller
{
    public function index($id)
    {
        $team = Team::findOrFail($id);
        $exists = $team->admins()->where('user_id', auth()->id())->exists();
        $exists3 = $team->coaches()->where('user_id', auth()->id())->exists();

        if($exists == true || $exists3 == true){
            return view('quiz.indexA' , ['team'=>$team]);
        }else{
            return view('quiz.index' , ['team'=>$team]);
        } 


        
    }

    public function create($id)
    {
        $team = Team::findOrFail($id);
        $quiz = new Quiz;
        $quiz->team_id = $team->id;
        $quiz->name = "new Quiz";
        $quiz->total= "0";
        $quiz->save();

        foreach($team->users as $user){
            $userscore = new Userscore;
            $userscore->user_id = $user->id;
            $userscore->quiz_id = $quiz->id;
            $userscore->complete = "false";
            $userscore->score = "0";
            $userscore->save();
        }

        return view('quiz.index' , ['team'=>$team]);
    }

    public function edit($id)
    {
        $quiz = Quiz::findOrFail($id);
        $team = $quiz->team;
        
        return view('quiz.edit' , ['quiz'=>$quiz],  ['team'=>$team]);
    }

    public function store(Request $request)
    {
        $quiz = Quiz::findOrFail($request->quiz_id);
        $team = $quiz->team;
        $quiz->name = $request->name;
        $quiz->save();

        return view('quiz.index' , ['team'=>$team]);
    }

    public function addQ($id)
    {
        $quiz = Quiz::findOrFail($id);
        $team = $quiz->team;
        return view('quiz.addQ' , ['quiz'=>$quiz], ['team'=>$team]);
    }

    public function addMQ($id)
    {
        $quiz = Quiz::findOrFail($id);
        $team = $quiz->team;
        return view('quiz.addMQ' , ['quiz'=>$quiz], ['team'=>$team]);

    }

    public function storeQ(Request $request)
    {
        if($request->type == "multiChoice"){
            $question = new Question;
            $question->quiz_id = $request->quiz_id;
            $question->type = "multiChoice";
            $question->question = $request->question;
            $question->mc1 = $request->mc1;
            $question->mc2 = $request->mc2;
            $question->mc3 = $request->mc3;
            $question->mc4 = $request->mc4;
            $question->answer = $request->answer;
            $question->save();
        }else{
            $question = new Question;
            $question->quiz_id = $request->quiz_id;
            $question->type = "written";
            $question->question = $request->question;
            $question->answer = $request->answer;
            $question->save();
        }

        $quiz = Quiz::findOrFail($request->quiz_id);
        $quiz->increment("total");

        $team = $quiz->team;

        foreach($team->users as $user){
            $useranswer = new Useranswer;
            $useranswer->user_id = $user->id;
            $useranswer->question_id = $question->id;
            $useranswer->completed = "false";
            $useranswer->save();
        }
    }

    public function show($id)
    {
        $quiz = Quiz::findOrFail($id);
        $team = $quiz->team;
        $exists = $team->admins()->where('user_id', auth()->id())->exists();
        $exists3 = $team->coaches()->where('user_id', auth()->id())->exists();

        if($exists == true || $exists3 == true){
            return view('quiz.ShowA' , ['quiz'=>$quiz], ['team'=>$team]);
        }else{
            return view('quiz.Show' , ['quiz'=>$quiz], ['team'=>$team]);
        }
    }

    public function answerQ($id)
    {
        $question = Question::findOrFail($id);
        $team = $question->quiz->team;

        if($question->type == "multiChoice"){
            return view('quiz.answerMQ' , ['question'=>$question], ['team'=>$team]);
        }else{
            return view('quiz.answerQ' , ['question'=>$question], ['team'=>$team]);
        }

    }

    public function storeResult(Request $request)
    {
        $question = Question::findOrFail($request->question_id);
        foreach($question->useranswers as $useranswer){
            if($useranswer->user_id == $request->user_id){
                $useranswer->completed = "true";
                if($request->score == "1"){
                    $useranswer->result = "correct";
                }else{
                    $useranswer->result = "incorrect";
                }
                $useranswer->save();
            }
        }
    
        $quiz = $question->quiz;
        foreach($quiz->userscores as $userscore){
            if($userscore->user_id == $request->user_id){
                if($request->score == "1"){
                    $userscore->increment("score");
                }
            }
        }

        $team = $quiz->team;

        return view('quiz.Show' , ['quiz'=>$quiz], ['team'=>$team]);

    }

    public function destroy($id)
    {
        $quiz = Quiz::findOrFail($id);
        $team = $quiz->team;
        $quiz->delete();

        return view('quiz.index' , ['team'=>$team]);
    }


}
