@include('header')

    <body>
        <div class="container">
                
                <h1 style="margin-top:60px;margin-bottom:30px;text-align: center;">
                    Einbürgerungstest 2017
                </h1>
                

                <div class="links" style="text-align: center;margin-bottom: 30px;">
                        <a href="/einbuergerungstest">Einbürgerungstest starten</a>
                        <a href="/fragenkatalog" }}>Fragenkatalog</a>
                        <a href="/informationen">Informationen</a>
                </div>
                <hr style="height:5px;border:none;color:#333;background-color:#333; margin-bottom: 60px;" />
                <div class="row">
                    @if($score < 17 )
                    <h2 style="text-align: center;color:red;"> Nicht bestanden! </h2>
                    @else
                    <h2 style="text-align: center;color:green;"> Glückwunsch! Sie haben bestanden. </h2>
                    @endif
                   <h3 style="text-align: center;size:20px;"> Punktzahl {{ $score }} von 30 </h3>
                @if($wrong_answers !== [])
                <hr style="height:5px;border:none;color:#333;background-color:#333; margin-bottom: 60px; margin-top:60px;" />
                <h2 style="text-align: center;color:red; margin-top:30px;margin-bottom:30px;"> Falsch beantwortete Fragen </h2>
                @foreach ($wrong_answers as $question)
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
                            <p  @if(1 == $question->selected) class="failure" @endif @if($question->answer_1 == $question->correctAnswer) class="success" @endif>1. {{  $question->answer_1 }} </p> 

                            <p  @if(2 == $question->selected) class="failure" @endif @if($question->answer_2 == $question->correctAnswer) class="success" }} @endif>2. {{  $question->answer_2 }} </p> 
                            <p @if(3 == $question->selected) class="failure" @endif @if($question->answer_3 == $question->correctAnswer) class="success" }} @endif>3. {{  $question->answer_3 }} </p> 
                            
                            <p @if(4 == $question->selected) class="failure" @endif @if($question->answer_4 == $question->correctAnswer) class="success" }} @endif>4. {{  $question->answer_4 }}</p> 
                       
                        </div>
                    </div>

                </div>
                @endforeach
                @endif
                @if($correct_answers !== [])
                <hr style="height:5px;border:none;color:#333;background-color:#333; margin-top: 60px;" />
                <h2 style="text-align: center;color:green; margin-top:60px; margin-bottom:30px;"> Richtig beantwortete Fragen </h2>
                @foreach ($correct_answers as $question)
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
                            <p  @if($question->answer_1 == $question->correctAnswer) class="success" @endif>1. {{  $question->answer_1 }} </p> 

                            <p  @if($question->answer_2 == $question->correctAnswer) class="success" }} @endif>2. {{  $question->answer_2 }} </p> 
                            <p @if($question->answer_3 == $question->correctAnswer) class="success" }} @endif>3. {{  $question->answer_3 }} </p> 
                            
                            <p @if($question->answer_4 == $question->correctAnswer) class="success" }} @endif>4. {{  $question->answer_4 }}</p> 
                       
                        </div>
                    </div>

                </div>
                @endforeach
                @endif
                </div>
            </div>
        </body>

@include('footer')

</html>
