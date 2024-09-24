<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ Search</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            color: #333;
            overflow: hidden; /* Prevent scrolling */
            background-image: url('/images/bg%20(1).jpg'); /* Replace with your image path */
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
            animation: moveBackground 30s ease infinite; /* Background animation */
        }

        @keyframes moveBackground {
            0% {
                background-position: 0% 0%;
            }
            50% {
                background-position: 100% 100%;
            }
            100% {
                background-position: 0% 0%;
            }
        }

        .search-container {
            max-width: 600px;
            margin: 100px auto; /* Center vertically */
            background: rgba(255, 255, 255, 0.9); /* Semi-transparent white */
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
        }
        h4 {
            text-align: center;
            font-size: 12px;
            margin-bottom: 20px;
            color: #333;
            text-shadow: 1px 1px 3px rgba(255, 255, 255, 0.7);
        }

        h1 {
            text-align: center;
            font-size: 28px;
            margin-bottom: 20px;
            color: #333;
            text-shadow: 1px 1px 3px rgba(255, 255, 255, 0.7);
        }

        input[type="text"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
            margin-bottom: 10px;
            transition: all 0.3s ease; /* Smooth transition */
        }

        input[type="text"]:hover {
            border-color: #007BFF; /* Change border color on hover */
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* Add shadow on hover */
        }

        .search-results {
            border: 1px solid #ccc;
            max-height: 300px;
            overflow-y: auto;
            display: none;
            margin-top: 10px;
            border-radius: 4px;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
        
        .search-result-item {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            cursor: pointer;
        }

        .search-result-item:last-child {
            border-bottom: none;
        }

        .search-result-item:hover {
            background-color: #f0f0f0;
        }

        #faq-description {
            margin-top: 20px;
            padding: 20px;
            background: rgba(241, 241, 241, 0.8);
            border-radius: 4px;
            display: none;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>

    <div class="search-container">
    <h4><a href="{{ route('faqs.special') }}" class="text-white">Glossary & Abbreviation FAQs</a></h4>
        <h1>Ask Your Question</h1>
        <input type="text" id="search" placeholder="Search FAQs..." autocomplete="off" />
        <div class="search-results" id="results"></div>
        <div id="faq-description"></div> <!-- Placeholder for displaying description -->
    </div>

    <script>
        $(document).ready(function() {
            $('#search').on('keyup', function() {
                let query = $(this).val();
                if (query.length > 2) {
                    $.ajax({
                        url: "{{ route('faq.search') }}", // Ensure this route exists
                        method: "GET",
                        data: { query: query },
                        success: function(data) {
                            $('#results').empty().show();
                            if (data.length) {
                                data.forEach(faq => {
                                    $('#results').append(
                                        `<div class="search-result-item" data-name="${faq.display_name}" data-description="${faq.description}">
                                            <strong>${faq.display_name}</strong>
                                        </div>`
                                    );
                                });
                            } else {
                                $('#results').append('<div class="search-result-item">No results found.</div>');
                            }
                        },
                        error: function() {
                            $('#results').empty().show().append('<div class="search-result-item">Error retrieving results.</div>');
                        }
                    });
                } else {
                    $('#results').hide();
                    $('#faq-description').hide(); // Hide description if no search results
                }
            });

            $(document).on('click', '.search-result-item', function() {
                let displayName = $(this).data('name');
                let description = $(this).data('description');
                $('#search').val(displayName);
                $('#results').hide();
                $('#faq-description').html(`<p>${description}</p>`).show();
            });
        });
    </script>
</body>
</html>
