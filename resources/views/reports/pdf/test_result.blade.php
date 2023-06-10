<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="{{ asset('backendIT/assets/css/main/app.css') }}">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap');

        :root {
            --highlight-color-one: #1FC2DE;
            --highlight-color-one-transparent: #1FC2DEB3;
            --text-color: #303E48;
            --table-row-separator-color: #CEC3BA;
        }

        @page {
            /*
            This CSS highlights how page sizes and margin boxes are set.
            https://docraptor.com/documentation/article/1067959-size-dimensions-orientation
            Within the page margin boxes content from running elements is used instead of a
            standard content string. The name which is passed in the element() function can
            be found in the CSS code below in a position property and is defined there by
            the running() function.

            On the bottom right page margin box we also add the current page number and
            in the @footnote rule we define the style of the footnote area.
            */
            size: A4;
            margin: 2cm 2cm 2.5cm 2cm;
            counter-reset: footnote;

            @top-left {
                content: element(header);
            }

            @bottom-left {
                width: 100%;
                content: element(footer);
            }

            @bottom-right {
                font-family: 'Montserrat', sans-serif;
                font-size: 8pt;
                font-weight: bold;
                color: var(--highlight-color-one);
                content: counter(page, decimal-leading-zero);
            }

            @footnote {
                border-top: .125mm solid var(--table-row-separator-color);
                padding-top: 2mm;
            }

            box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
            border: 0.5cm solid rgba(0, 0, 0, 0.5);
        }


        @page bibliography {
            @bottom-left {
                width: 100%;
                content: element(footerBibliography);
            }
        }

        @page: first {
            /*
            This CSS highlights how the margin, background and page margin boxes are set
            only for the first page of the PDF.

            As the first or cover page should not get the header and footer like all other
            pages, we set the content of these page margin boxes to empty.
            */
            margin: 0;
            background-size: cover;
            background-image: url(https://images.unsplash.com/photo-1497250681960-ef046c08a56e?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1834&q=80);

            @top-left {
                content: "";
            }

            @bottom-left {
                content: "";
            }
        }

        body {
            margin: 0;
            padding: 0;
            color: var(--text-color);
            font-family: 'Montserrat', sans-serif;
            font-size: 10pt;
            counter-reset: chapters;
        }


        a {
            color: inherit;
            text-decoration: none;
        }


        hr {
            height: 0;
            border: 0;
            border-top: .75mm solid var(--highlight-color-one);
            margin: 1cm 0 1cm 0;
        }

        header {
            position: running(header);
            height: 2cm;
            border-bottom: .5mm solid var(--table-row-separator-color);
        }


        .pageBreak {
            page-break-before: always;
            height: 1cm;
        }

        .coverPage {
            color: white;
            margin: 2cm;
        }

        .coverPage h1 {
            margin-top: 6cm;
            font-size: 64pt;
        }


        .coverPage .coverFooter {
            text-transform: uppercase;
            font-size: 8pt;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: absolute;
            bottom: 1cm;
            width: calc(100% - 4cm);
        }

        .coverPage .coverFooter a:first-of-type {
            font-weight: bold;
        }


        .coverPage .coverFooter hr {
            height: .5mm;
            background-color: white;
            border-top: 0;
            width: 40%;
        }

        .bibliographyPage {
            page: bibliography;
        }

        .chapterPage h1,
        .tocPage h1,
        .bibliographyPage h1 {
            margin-top: 1cm;
            text-transform: uppercase;
        }

        .chapterPage h1::before,
        .bibliographyPage h1::before {
            counter-increment: chapters;
            content: counter(chapters, decimal-leading-zero) " ";
        }

        .imageContainer {
            max-height: 9cm;
            overflow: hidden;
        }

        .imageContainer img {
            max-width: 100%;
        }

        .imageContainerColumns {
            overflow: hidden;
            max-height: 180mm;
        }

        .imageContainerColumns img {
            max-height: 100%;
        }

        .twoColumns,
        .threeColumns {
            display: flex;
            align-items: stretch;
            justify-content: space-between;
            margin: 1cm 0 1cm 0;
        }

        .twoColumns>* {
            width: 48%;
        }

        .threeColumns>* {
            width: 30%;
        }

        .twoTextColumns {
            margin: 1cm 0 1cm 0;
            column-count: 2;
            column-gap: 1cm;
        }

        dl,
        .highlight,
        .highlightLight {
            color: var(--highlight-color-one);
        }

        .highlight {
            font-weight: bold;
            font-size: 14pt;
        }

        .imageContainer+.highlight {
            margin-top: 1cm;
        }

        h4 {
            font-size: 10pt;
            margin: 0;
        }

        p {
            margin-top: 0;
        }

        dt {
            font-size: 16pt;
        }

        dd {
            margin: 0 0 .5cm 0;
        }

        .footnote {
            float: footnote;
            margin-bottom: 2mm;
            color: var(--text-color);
            font-family: 'Montserrat', sans-serif;
            font-size: 8pt;
            font-weight: normal;
            footnote-style-position: inside;
        }

        .footerStandard,
        .footerBibliography {
            position: running(footer);
            color: var(--highlight-color-one);
            display: flex;
            align-items: center;
            font-size: 8pt;
            text-transform: uppercase;
        }

        footer a:first-of-type {
            font-weight: bold;
        }

        footer hr {
            margin: 0 3% 0 3%;
            height: .5mm;
            background-color: var(--highlight-color-one);
            border-top: 0;
            width: 70%;
            display: inline-block;
        }

        .footerBibliography {
            position: running(footerBibliography);
        }
    </style>
</head>

<body>
    <header>
    </header>
    <div class="text-center">
        <footer class="footerStandard">
            <h2>{{ $test->name }} Revision</h2>
            <a href="{{ url('/') }}">
                {{ env('APP_NAME') }}
            </a>
        </footer>
        <footer class="footerBibliography">
            <div>
                <a href="{{ url('/') }}">{{ url('/') }}</a>
                <br/>
                <p>Talk to Us? <a href="mailto:info@takemyitclass.com">info@takemyitclass.com</a></p>
            </div>
        </footer>
    </div>
    <br>
    <p class="highlight"><strong>Score</strong> {{$test_result}}</p>
    <div class="chapterPage">
        @foreach ($testQuestions as $key => $question)
            <div class="card mt-2">
                <div class="card-body">
                    <div class="row">
                        <p class="highlight"><strong>Question {{$key+1}}</strong> <span class="{{ $question->answer == 'correct'?'text-success':'text-danger' }}"> {{ $question->answer == 'correct'?'1 point of 1':'0 point of 1'; }} </span></p>
                             {!! $question->question->question ?? 'Question Not Set' !!}
                    </div>
                    <div class="row">
                        <div class="container">
                            <div class="col-md-12">
                                <div class="answer-area" id="answerArea">
                                    @php $choices = $question->question->choices; @endphp
                                    <ul class="list-unstyled">
                                        @foreach ($choices as $key => $value)
                                            <li>
                                                <div class="form-group">
                                                    <label>
                                                        {{ str_replace('choice_', '', $key) }}&nbsp;:&nbsp;
                                                        {{ $value }}
                                                    </label>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <br>
                            </div>
                            <div class="col-md-6">
                                <strong>Answer</strong>
                                <div class="answer-area" id="answerArea">
                                    <p class="highlightLight">{!! $question->question->answer !!}</p>
                                </div>
                                <strong>My Answer</strong>
                                <div class="answer-area" id="answerArea">
                                    <p class="highlightLight">{!! $question->student_choice !!}</p>
                                </div>
                                <br>
                            </div>
                            <div class="col-md-6">
                                <strong>Test Topic & Concept</strong>
                                <div class="answer-area" id="shortAnswerArea">
                                    <p class="highlightLight">{!! $question->question->topic->name !!}</p>
                                </div>
                                <br>
                                <strong>Short Answer Explanation</strong>
                                <div class="answer-area" id="shortAnswerArea">
                                    <p class="highlightLight">{!! $question->question->short_answer !!}</p>
                                </div>
                                <br>
                                <strong>Full Answer Explanation</strong>
                                <div class="answer-area" id="fullAnswerArea">
                                    <p class="highlightLight">{!! $question->question->full_answer !!}</p>
                                </div>
                                <br>
                                <strong>Answer Resource Link</strong>
                                <div class="answer-area" id="answerResourceArea">
                                    <a href="{{ $question->question->answer_resource }}" target="_blank"
                                        rel="noopener noreferrer">{{ $question->question->answer_resource }}</a>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        @endforeach
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
