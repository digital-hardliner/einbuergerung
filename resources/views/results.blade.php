<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Einbürgerungstest 2017</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">

        <!-- jQuery -->
        <script
        src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>

        <!-- Bootstrap -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <!-- Styles -->
        <style>

            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Slabo 27px', serif;
                font-size: x-large;
                margin: 0;
            }

            .container {
                height: 90vh;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                text-decoration: none;
                text-align: center;
            }


            .question_block {
                border: 1px solid black;
                margin: 15px;
                font-family: 'Slabo 27px', serif;
                font-size: x-large;
                padding:20px;
            }

            p {
                margin-bottom: 20px;
            }

            .success {
                background-color: #5cb85c;
                padding:3px;
                color:white;
            }

            .failure {
                background-color: red;
                padding:3px;
                color:white;
            }

        </style>
    </head>
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
                    @if($score > 2 )
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
        
    <footer class="footer" style="text-align:center" >
        <a href="/impressum">Impressum</a>
    </footer>
    </html>
