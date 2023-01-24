
              $(".pro_amount").mouseup(function () {
                  
                          var $el = $(this).closest('tr');

                

                          var pro_amount = $el.find(".pro_amount").val();
                          var pro_price = $el.find(".pro_price").html();

                          var total = pro_amount * pro_price;
                          $el.find(".total_price").html("");        

                          $el.find(".total_price").append(total+'$');

                          $(".btn-update").on('click', function(e) {

                              var id = $(this).val();
                            

                              $.ajax({
                                type: "POST",
                                url: "update-item.php",
                                data: {
                                  update: "update",
                                  id: id,
                                  product_amount: pro_amount
                                },

                                success: function() {
                                 // alert("done");
                                  reload();
                                }
                              })
                            });
                         
                        
                   fetch();     
              });

              fetch();

              function fetch() {

                setInterval(function () {
                          var sum = 0.0;
                          $('.total_price').each(function()
                          {
                              sum += parseFloat($(this).text());
                          });
                          $(".full_price").html(sum+"$");
                }, 4000);
              } 
              
              function reload() {

               
                    $("body").load("cart.php")
               
              }