@extends('layouts.app')

@section('content')

        <div id="quiz">
            <div id="quiz-header">
                <h1>Quiz Example</h1>
                <p><a id="quiz-home-btn">Quiz Home</a></p>
            </div>
            <div id="quiz-start-screen">
{{--                <button type="submit" id="quiz-start-btn" class="btn btn-lg col-auto bg-dark text-white quiz-button">Start test</button>--}}
                <p>
                    <a href="{{route('quiz', $subject_id)}}" id="quiz-start-btn" class="quiz-button btn btn-lg col-auto bg-dark text-white quiz-button">Start Quiz</a>
                </p>
            </div>
        </div>

@endsection

@push('scripts')

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"
            integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ"
            crossorigin="anonymous">
    </script>
    <script src="/dist/jquery.quiz-min.js"></script>

    <script>

        $(document).ready(function (){
            const myQuiz =[];

            $('#quiz-start-btn').on('click', function () {
                $.get('/api/quiz/' + '10', function (data) {

                    let question = data.questions;
                    console.log(question);
                    for (let i = 0; i < question.length; ++i) {

                        let newQuestion = {};
                        newQuestion.q = question[i].title;

                        newQuestion.options = data.answers[question[i].id];
                        myQuiz.push(newQuestion);
                    }
                });
            });

            console.log(myQuiz);

            // let questions = JSON.parse($('#question_data').text());
            // const myQuiz =[];
            // for(let i=0;i<questions.length ;i++){
            //     let newQuestion = {};
            //     newQuestion.q = questions[i].title;
            //
            //     newQuestion.options = questions[i].title;
            //     myQuiz.push(newQuestion);
            // }

            $('#quiz').quiz({

                // allows incorrect options
                allowIncorrect: true,

                // counter settings
                counter: true,
                counterFormat: '%current/%total',

                // default selectors & format
                startScreen: '#quiz-start-screen',
                startButton: '#quiz-start-btn',
                homeButton: '#quiz-home-btn',
                resultsScreen: '#quiz-results-screen',
                resultsFormat: 'You got %score out of %total correct!',
                gameOverScreen: '#quiz-gameover-screen',

                // button text
                nextButtonText: 'Next',
                finishButtonText: 'Finish',
                restartButtonText: 'Restart'

            });

            $('#quiz').quiz({
                questions: myQuiz
            });

            $('#quiz').quiz({

                answerCallback: function (currentQuestion, selected, questions[currentQuestionIndex])
                {
                    // do something
                },

                nextCallback: function () {
                    // do something
                },

                finishCallback: function () {
                    // do something
                },

                homeCallback: function () {
                    // do something
                },

                resetCallback: function () {
                    // do something
                },

                setupCallback: function () {
                    // do something
                },
            })
        });


    </script>

@endpush

