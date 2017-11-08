<!-- To-Dos:
- disable not selecting any answer

-->

<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-109357387-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-109357387-1');
</script>

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

                <h2 style="text-align: center;"> Einbürgerungstest Online</h2>
                @if(empty($questions))
                <p>
                    Durch die erfolgreiche Teilnahme am Einbürgerungstest können Sie Kenntnisse der Rechts- und Gesellschaftsordnung und der Lebensverhältnisse in Deutschland nachweisen, die Sie benötigen, um sich in Deutschland einbürgern zu lassen.
                </p>
                
                    <a href="/einbuergerungstest2017" class="btn btn-success btn-lg btn-block" style="font-family: 'Slabo 27px', serif;font-size: x-large;"> Einbürgerungstest 2017 Online starten
                </a>
                @else
                {{ Form::open(['method' => 'get', 'action' => 'IndexController@evaluate_test']) }}
                {{ Form::token() }}
                @foreach ($questions as $key => $question)
                <div class="question_block"  id="question_block{{ $key }}">
                    <div class="row" style="margin-bottom:20px;"">
                        <div class="col-md-4">
                            <b>Frage {{ $key+1 }} von 30 </b> 
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
                        <fieldset id="{{ 'answersArray' . $key }}">
                            <p> {{ Form::checkbox( 'select_answer[' . $question->id . '][]','1') }}  {{  $question->answer_1 }} </p> 
                             <p> {{ Form::checkbox('select_answer[' . $question->id . '][]','2')}} {{  $question->answer_2 }} </p> 
                             <p> {{ Form::checkbox('select_answer[' . $question->id . '][]','3') }} {{  $question->answer_3 }} </p> 
                             <p> {{ Form::checkbox('select_answer[' . $question->id . '][]','4') }} {{  $question->answer_4 }}</p>
                        </fieldset>
                             
                        <button id="{{'next_question_'. $key }}" class="btn btn-primary btn-lg btn-block" data-dismiss='alert'> Nächste Frage </button>
 

                        <script>

                        $("input:checkbox").on('click', function() {
                            // in the handler, 'this' refers to the box clicked on
                            var $box = $(this);
                            if ($box.is(":checked")) {
                            // the name of the box is retrieved using the .attr() method
                            // as it is assumed and expected to be immutable
                            var group = "input:checkbox[name='" + $box.attr("name") + "']";
                            // the checked state of the group/box on the other hand will change
                            // and the current value is retrieved using .prop() method
                            $(group).prop("checked", false);
                            $box.prop("checked", true);
                            } else {
                                $box.prop("checked", false);
                                }
                            });

                                $("{{ '#next_question_' . $key}}").click(function()
                                {
                                    var string1 = 'input[name="select_answer[';
                                    var string2 = '{{ $question->id }}';
                                    var string3 = '][]"]:checked';
                                    //var atLeastOneIsChecked = $("{{ '#answersArray' . $key  . ':checkbox:checked'}}").length;
                                    var atLeastOneIsChecked = $(string1.concat(string2,string3)).length;
                                    if(atLeastOneIsChecked > 0)
                                    {
                                    if({{ $key }} <= 27){
                                    $("#{{ 'question_block' . $key }}").css("display", "none");
                                    $("#{{ 'question_block' . ($key+1) }}").css("display", "block");
                                    }
                                    else{
                                        $("#{{ 'question_block' . $key }}").css("display", "none");
                                        $("#{{ 'question_block' . ($key+1) }}").css("display", "block");
                                        $("#{{ 'next_question_' . ($key+1) }}").css("display","none");
                                        $("#show_results").css("display","block");
                                    }
                                    }
                                    else {
                                        alert('Sie müssen eine Antwort auswählen.')
                                    }
                                });


                            </script>
                        </div>

                    </div>


                </div>
                @endforeach


                <div class="row" style="margin-bottom:150px;margin-top:30px;">
                <div class="col-md-12">
                <button type="submit" class="btn btn-success btn-lg btn-block" style="display:none;text-align:center;font-family: 'Slabo 27px', serif;font-size: x-large;" id="show_results"> Test Ergebnisse anzeigen </button>
                </div>
                {{ Form::close() }}
                @endif

            </div>

            </div>
        </div>
    </body>

    <footer class="footer" style="text-align:center" >
        <a href="/impressum">Impressum</a>
    </footer>

</html>
<script type="text/javascript">

$(window).on('load', function() {
  var question_blocks = document.querySelectorAll('div[id^="question_block"]');
  var question_blocks_2 = document.getElementsByClassName('question_block');
  for (var i = 1, len = question_blocks.length; i < len; i++){
    question_blocks[i].style.display = 'none'; // to make them all enabled
    }
})



</script>