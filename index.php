<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles/css/styles.css">
    <title>Voyage</title>
</head>
<body>
<?php include 'src/Base.php'; ?>
<main>
    <form class="search-content">
        <div class="autocomplete">
            <input class="search-input" type="text" placeholder="Recherche ta destination">
        </div>
        <input type="submit">
    </form>
</main>
</body>
</html>
<script>
    function auto(value) {
        let html = '<div class="search-content">';
        html += '<div class="autocomplete">';
        html += '<div class="search-input">';
        html += '</div>'
        html += '</div>'
        return html + '</div>'
    }

    $('.search-input').on('input', function (e) {
        e.preventDefault();
        let value = $(this).val();
        let offset = $(this).offset();
        $.ajax({
            url: 'action.php',
            method: 'POST',
            dataType: 'json',
            data: {
                q: value
            },
            success: (data) => {
                let html = '';
                data.forEach((value) => {
                    html += auto(value);
                })
                if ($('.search-block').length === 0) {
                    let divSearch = $('<div></div>');
                    divSearch.addClass('search-block');
                    divSearch.html(html);
                    $('body').append(divSearch);
                    divSearch.css('display', 'none')
                    divSearch.stop(true, true).slideDown();

                    divSearch.css('top', offset.top + 40).css('left', 10)
                } else {
                    let divSearch = $('.search-block');
                    divSearch.stop(true, true).slideDown();
                    divSearch.html(html);
                }
            },
            error: (error) => {
                console.log(error.responseText)
            }
        });
    })
    $('body').click(function (e) {
        let div = $(this).find('.search-input');
        let div2 = $(this).find('.search-block');
        if (div2.length) {
            if ((!$(e.target).is(div) && !$.contains(div[0], e.target)) && (!$(e.target).is(div2) && !$.contains(div2[0], e.target))) {
                div2.stop(true, true).slideUp();
            }
        }
    })
</script>
