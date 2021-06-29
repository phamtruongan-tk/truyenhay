
        $(document).ready(function () {
            $('.load-chapter').change(function () { 
                var url = $(this).val();
                window.location.href = url;
                $(this).find();
            });

            current_chapter()
            function current_chapter(){
                var url = window.location.href;
                $('.load-chapter').find('option[value ="'+url+'"]').attr('selected',true);
            }

            $('.search').keyup(function () { 
                var key = $(this).val();
                $.ajax({
                    type: "GET",
                    url: "http://localhost/truyenhay/ajax/search/" + key,
                    success: function (response) {
                        $('ul#result').html(response);
                        $('.submit').html('Tất cả kết quả');
                    }
                });
            });
        });