<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

	protected $fillable = ['question', 'answer_1', 'answer_2', 'answer_3', 'answer_4', 'correctAnswer', 'picture' , 'state'];

}


