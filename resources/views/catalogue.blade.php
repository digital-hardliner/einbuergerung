@include('header')

    <body>
        <div class="container">
                <h1 style="margin-top:60px;margin-bottom:30px;text-align: center;">
                    Einbürgerungstest
                </h1>

                <div class="links" style="text-align: center;margin-bottom: 30px;">
                        <a href="/einbuergerungstest">Einbürgerungstest starten</a>
                        <a href="/fragenkatalog" }}>Fragenkatalog</a>
                        <a href="/informationen">Informationen</a>
                </div>
                <hr style="height:5px;border:none;color:#333;background-color:#333; margin-bottom: 60px;" />

                <h2 style="text-align: center;"> Fragenkatalog </h2>
                @foreach ($questions as $question)
                <div class="question_block">
                    <div class="row" style="margin-bottom:20px;"">
                        <div class="col-md-4">
                            <b> Frage </b> 
                        </div>
                        <div class="col-md-8">
                            {{  $question->question }}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <b> Antworten </b>
                        </div>
                        <div class="col-md-8">
                            <p  @if($question->answer_1 == $question->correctAnswer) id={{ "correct_answer" . $question->id }} @endif>1. {{  $question->answer_1 }} </p> 
                             <p  @if($question->answer_2 == $question->correctAnswer) id={{ "correct_answer" . $question->id }} @endif>2. {{  $question->answer_2 }} </p> 
                             <p @if($question->answer_3 == $question->correctAnswer) id={{ "correct_answer" . $question->id }} @endif>3. {{  $question->answer_3 }} </p> 
                             <p @if($question->answer_4 == $question->correctAnswer) id={{ "correct_answer" . $question->id }} @endif>4. {{  $question->answer_4 }}</p> 
                            <button class="btn btn-success btn-lg" style="font-family: 'Slabo 27px', serif;font-size: x-large;" id="{{ 'show_correct_answer' . $question->id }}" data-dismiss="alert"> Richtige Antwort anzeigen</button>

                            <script>

                                document.getElementById("{{'show_correct_answer'. $question->id}}").onclick = function()
                                {
                                    var correct_answer = document.getElementById("{{'correct_answer'. $question->id }}");
                                    if(correct_answer.className == "success")
                                    {
                                        //
                                    }
                                    else
                                    {
                                        correct_answer.className += "success";
                                    }
                                    
                                }


                            </script>
                        </div>
                    </div>

                </div>
                @endforeach
            </div>
        </div>
    </body>

@include('footer')
</html>
