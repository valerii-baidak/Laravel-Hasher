$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    var url = {
        word : {
            add: '/word/add',
            remove: '/word/remove'
        },
        algorithm: {
            add: '/algorithm/add',
            remove: '/algorithm/remove'
        }
    }

    $('.words input').on('change', function(){
        var data = $(this).val();
        if ($(this).prop('checked')){
            Hash (data, url.word.add)
        }else{
            Hash (data, url.word.remove)
        };
    });

    $('.hash input').on('change', function(){
        var data = $(this).val();
        if ($(this).prop('checked')){
            Hash (data, url.algorithm.add)
        }else{
            Hash (data, url.algorithm.remove);
        };
    });

    function Hash (data, url) {
        $.ajax({
            url: url,
            type: "POST",
            data: {
                data: data
            },
            success: function( response ){
                $('.js-table table tr').each(function(){
                    $(this).remove();
                });
                $('.js-button button').remove();

                $.each( response.wordItem , function( key, value ) {
                    var word = value.word;
                    $.each( value.encrypt , function( key, value) {
                        $('.js-table table').append (
                            '<tr><td>'+word +'</td>'+
                            '<td>'+key +'</td>'+
                            '<td>'+value +'</td></tr>'
                        )
                    });
                });

                if (response.words && response.hash  ) {
                    $('.js-table table').prepend(
                        '<tr><th>word</th><th>algorithm</th><th>hash</th></tr>'
                    )
                    $('.js-button').append(
                        '<button class="js-save">Save</button>'
                    )
                }
            }
        });
    }

    $('body').on('click', '.js-save', function(){
        $.ajax({
            url: '/save',
            type: "POST",
        });
    })




});
