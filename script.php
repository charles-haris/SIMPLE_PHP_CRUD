<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</script>

<script>
    function send(action){
        $(document).ready(
            function(){
                var data ={
                    action1 : action,
                    id1:$('#id').val(),
                    name1 : $('#name').val(),
                    first_name1 : $('#first_name').val() ,
                    tel1 : $('#tel').val() ,
                    Address1 : $('#Address').val() 
                };

                $.ajax({
                    url:"controller.php",
                    type: 'post',
                    data: data,
                    success:function(response){
                        alert(response)
                        const myTimeout = setTimeout(move, 500);

                        function move() {
                            window.location.href="list.php";
                        }

                    }

                });
            }
        );


    }
</script>
