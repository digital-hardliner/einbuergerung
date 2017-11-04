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

        <!-- Bootstrap -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <!-- Styles -->
        <style>

            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                margin: 0;
            }


            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }


            .question_block {
                border: 1px solid black;
                margin: 15px;
                font-family: 'Slabo 27px', serif;
                font-size: large;
                padding:20px;
            }


        </style>
    </head>
    <body>
        <div class="container">
                <h1 style="margin-top:40px;">
                    Einbürgerungstest
                </h1>

                <div class="links">
                        <a href="/einbuergerungstest">Einbürgerungstest starten</a>
                        <a href="/fragenkatalog" }}>Fragenkatalog</a>
                        <a href="/informationen">Informationen</a>
                </div>

                @foreach ($questions as $question)
                <div class="question_block">
                    <div class="row" style="margin-bottom:20px;">
                        <div class="col-md-4">
                            <b> Frage </b> 
                        </div>
                        <div class="col-md-8">
                            {{  $question->question }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <b> Antworten </b>
                        </div>
                        <div class="col-md-8">
                            <p> {{  $question->answer_1 }}</p>
                            <p> {{  $question->answer_2 }}</p>
                            <p> {{  $question->answer_3 }}</p>
                            <p> {{  $question->answer_4 }}</p>
                        </div>
                    </div>
                </div>
                <hr>
                @endforeach
            </div>
        </div>
    </body>
</html>