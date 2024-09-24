<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ Search</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="{{ asset('css/search.css') }}" rel="stylesheet"> 
    
</head>
<body>

    <div class="navbar">
        <a href="{{ route('admin.login.form') }}" class="admin-button">Admin</a>
    </div>

    <div class="search-container">
        <h4><a href="{{ route('faqs.special') }}" class="text-white">Glossary & Abbreviation FAQs</a></h4>
        <h1>Ask Your Question</h1>
        <input type="text" id="search" placeholder="Search FAQs..." autocomplete="off" />
        <div class="search-results" id="results"></div>
        <div id="faq-description"></div> 
    </div>

    <script>
        $(document).ready(function() {
            $('#search').on('keyup', function() {
                let query = $(this).val();
                if (query.length > 2) {
                    $.ajax({
                        url: "{{ route('faq.search') }}", 
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
                    $('#faq-description').hide(); 
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
