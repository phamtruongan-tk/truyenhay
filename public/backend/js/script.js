
            $(document).ready(function () {
                // load sách trong view thêm và sửa
               $('#loadBook').change(function () { 
                   var id = $(this).val();
                   $.ajax({
                       type: "GET",
                       url: "http://localhost/truyenhay/ajax/" + id,
                       success: function (response) {
                           $('#ch_book_id').html(response);
                       }
                   });
               });

            //    lọc truyện theo danh mục
               $('.chose_cate').change(function () { 
                   var url = $(this).val();
                   if(url){
                        window.location.href = url
                   }
               });
               current_book()
                function current_book(){
                    var url = window.location.href;
                    $('.chose_cate').find('option[value ="'+url+'"]').attr('selected',true);
                }

                // lọc truyện ajax
                $('.chose-cate').change(function () { 
                    var c_id = $(this).val();
                    $.ajax({
                       type: "GET",
                       url: "http://localhost/truyenhay/ajax/choseCate/" + c_id,
                       success: function (response) {
                           $('.chose-book').html(response);
                       }
                   });
                });
                // lọc chương theo sách
                $('.chose-book').change(function () { 
                   var url = $(this).val();
                   if(url){
                        window.location.href = url
                   }
               });
               current_chapter()
                function current_chapter(){
                    var url = window.location.href;
                    $('.chose-book').find('option[value ="'+url+'"]').attr('selected',true);
                }

                
            });