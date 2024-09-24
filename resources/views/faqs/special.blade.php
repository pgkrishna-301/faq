@extends('layouts.app')

@section('content')
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

<!-- CSS for dropdown behavior and background design -->
<style>
    /* Add a background image with animation */
    body {
        background-image: url('/images/bg%20(1).jpg');/* Use a suitable image path */
        background-size: cover;
        background-attachment: fixed;
        background-position: center;
        animation: backgroundAnimation 15s infinite alternate;
        height: 100vh;
        margin: 0;
    }

    @keyframes backgroundAnimation {
        0% { filter: brightness(0.8); }
        100% { filter: brightness(1.2); }
    }

    /* Container for the FAQ */
    .faq-container {
        background-color: rgba(255, 255, 255, 0.9); /* Slight transparency for text visibility */
        border-radius: 8px;
        padding: 20px;
        margin: 50px auto;
        max-width: 800px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    /* Title styling */
    .faq-title {
        text-align: center;
        font-size: 32px;
        color: #333;
        margin-bottom: 30px;
    }

    /* FAQ list */
    .faq-list {
        list-style-type: none;
        padding: 0;
    }

    /* Question styling */
    .faq-question {
        background: #55565b;
        border: none;
        color: #fff;
        text-align: left;
        font-size: 18px;
        font-weight: bold;
        width: 100%;
        padding: 15px;
        cursor: pointer;
        outline: none;
        transition: background-color 0.3s, transform 0.2s;
        border-radius: 4px;
        margin-bottom: 10px;
    }

    .faq-question:hover {
        background-color: gray;
        transform: scale(1.02);
    }

    /* Answer box styling */
    .faq-answer {
        display: none;
        padding: 15px;
        font-size: 16px;
        color: #333;
        background-color: #fafafa;
        
        margin-top: 10px;
        border-radius: 4px;
        opacity: 0;
        transform: translateY(-10px);
        transition: opacity 0.4s ease, transform 0.4s ease;
    }

    .faq-answer.show {
        display: block;
        opacity: 1;
        transform: translateY(0);
    }

    /* Responsive design for mobile */
    @media (max-width: 768px) {
        .faq-container {
            padding: 15px;
        }

        .faq-title {
            font-size: 24px;
        }

        .faq-question {
            font-size: 16px;
        }

        .faq-answer {
            font-size: 14px;
        }
    }
</style>

<!-- JavaScript to toggle dropdowns with close feature -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const faqQuestions = document.querySelectorAll('.faq-question');
        const faqAnswers = document.querySelectorAll('.faq-answer');

        faqQuestions.forEach((question) => {
            question.addEventListener('click', function() {
                const answer = this.nextElementSibling;

                // Close all other answers
                faqAnswers.forEach((faqAnswer) => {
                    if (faqAnswer !== answer) {
                        faqAnswer.classList.remove('show');
                    }
                });

                // Toggle the clicked answer
                answer.classList.toggle('show');
            });
        });
    });
</script>
@endsection
