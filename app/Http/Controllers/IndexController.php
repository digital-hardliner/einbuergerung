<?php

namespace App\Http\Controllers;


use App\Question;
use Illuminate\Routing\Controller as BaseController;
use Goutte\Client;
use GuzzleHttp\Client as GuzzleClient;

class IndexController extends BaseController
{
	public $general_questions;
	public $i;
	public $i_;
	public $k;
	public $k_;
	public $page;
	public $crawler;
	public $correctAnswer;


	public function index()
	{
		return view('welcome');
	}

	public function start_test()
	{
		$questions = Question::all()->random(30);
		return view('welcome')->with('questions',$questions);
	}

	public function catalogue()
	{
		$questions = Question::all();
		return view('catalogue')->with('questions',$questions);

	}


    public function populate_general()
    {
    	$client = new Client();
    	// Get the questions

    	$this->i=0;
    	$this->general_questions = [];
    	for($this->page=1;$this->page <= 10;$this->page++)
    	{
    		$this->i_ = $this->i;

    		// New page
			$this->crawler = $client->request('GET', 'https://www.einbuergerungstest-online.eu/fragen/' . $this->page);


			// Questions
			$this->crawler->filterXPath('//div[@class="questions-question-text"]/p')->each(function ($node) {
				if($node->text() !== 'Bild anzeigen')
				{
    				$this->general_questions[$this->i]['question'] = $node->text();
    				$this->i++;
    			}
    			else {

    			}
    		});

			// Answers
			$this->i=$this->i_;
			$this->crawler->filterXPath('//ul[@class="list-unstyled question-answers-list"]')->each(function ($node)
			{
				$this->k=0;
				$node->filter('li')->each(function ($node) {
					$this->general_questions[$this->i][$this->k] = $node->text();
					$this->k++;
    			});
    			$this->i++;
			});

			// Correct Answer
			$this->i=$this->i_;
			$this->crawler->filterXPath('//ul[@class="list-unstyled question-answers-list"]')->each(function ($node)
			{
				// Funktioniert noch nicht - richtige Antwort wird gefunden aber Index fehlt. Ohne Index fortfahren?
				$node->filter('span')->each(function ($node) {
					$this->general_questions[$this->i]['correctAnswer'] = $node->text();
					$this->general_questions[$this->i]['state'] = '';
				});

    			$this->i++;
			});
		}
		
		foreach ($this->general_questions as $general_question)
		{
			$question = new Question;
			$question->question = $general_question['question'];
			$question->answer_1 = $general_question['0'];
			$question->answer_2 = $general_question['1'];
			$question->answer_3 = $general_question['2'];
			$question->answer_4 = $general_question['3'];
			$question->correctAnswer = $general_question['correctAnswer'];
			$question->save();
		}

    }	
}
