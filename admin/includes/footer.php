<script src="libs/jquery-3.1.1.js"></script>
<script src="libs/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

<script src="libs/bootbox.min.js"></script>

<script>
    $(document).on('click', '.delete-object', function(){

        var id = $(this).attr('delete-id');

        bootbox.confirm({
            message: "<h4>Biztos vagy benne, hogy törölni szeretnéd?</h4>",
            buttons: {
                confirm: {
                    label: 'Igen',
                    className: 'details-btn danger'
                },
                cancel: {
                    label: 'Nem',
                    className: 'details-btn'
                }
            },
            callback: function (result) {

                if(result==true){
                    $.post('delete_product.php', {
                        object_id: id
                    }, function(data){
                        location.reload();
                    }).fail(function() {
                        alert('Sikertelen törlés.');
                    });
                }
            }
        });

        return false;
    });
</script>
<script>
    // jQuery codes
    $(document).ready(function(){

        // add to cart button listener
        $('.add-to-cart-form').on('submit', function(){

            // get basic information for adding to cart
            var id = $(this).closest('tr').find('.product-id').text();
            var name = $(this).closest('tr').find('.product-name').text();
            var quantity = $(this).closest('tr').find('input').val();

            // redirect to add_to_cart.php, with parameter values to process the request
            window.location.href = "<?php echo $home_url; ?>add_to_cart.php?id=" + id + "&name=" + name + "&quantity=" + quantity;
            return false;
        });

        // update quantity button listener
        $('.update-quantity-form').on('submit', function(){

            // get basic information for updating the cart
            var id = $(this).closest('tr').find('.product-id').text();
            var name = $(this).closest('tr').find('.product-name').text();
            var quantity = $(this).closest('tr').find('input').val();

            // redirect to update_quantity.php, with parameter values to process the request
            window.location.href = "<?php echo $home_url; ?>update_quantity.php?id=" + id + "&name=" + name + "&quantity=" + quantity;
            return false;
        });

        // catch the submit form, used to tell the user if password is good enough
        $('#register, #change-password').submit(function(){

            var password_strenght=$('#passwordStrength').text();

            if(password_strenght!='Good Password!'){
                alert('Válassz erősebb jelszót!');
                return false;
            }

            return true;
        });

    });
</script>
</body>
</html>