<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="{{ asset('css/special.css') }}" rel="stylesheet">
    <title>Glossary & Abbreviation FAQs</title>
</head>
<body style="background-image: url('/images/bg%20(1).jpg'); background-size: cover; background-position: center;">
    <div class="container faq-container">
        <h2 class="faq-title">Glossary & Abbreviation FAQs</h2>
        <ul class="faq-list">
            @foreach ($faqs as $faq)
                <li>
                    <button class="faq-question">
                        <h6>{{ $faq->display_name }}</h6>
                    </button>
                    <div class="faq-answer">
                        {{ $faq->description }}
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const faqQuestions = document.querySelectorAll('.faq-question');
            const faqAnswers = document.querySelectorAll('.faq-answer');

            faqQuestions.forEach((question) => {
                question.addEventListener('click', function() {
                    const answer = this.nextElementSibling;

                    faqAnswers.forEach((faqAnswer) => {
                        if (faqAnswer !== answer) {
                            faqAnswer.classList.remove('show');
                        }
                    });

                    answer.classList.toggle('show');
                });
            });
        });
    </script>

  
</body>
</html>
