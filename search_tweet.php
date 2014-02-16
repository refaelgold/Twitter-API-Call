<!doctype html>
    <html lang="en-US">
        <head>
            <meta charset="UTF-8">
            <title>twitter api request</title>


            <style type="text/css">
                .floatLeft{float:left;}
                .clear{clear:both;}
                #container{list-style-type: none;}
                #container li{clear:both;margin-bottom:10px;height:53px;border-bottom:1px dotted #000000;}
                #container li img{margin-right:10px;}
            </style>
        </head>
        <body>
        <form id="formUnique" method="post" action="search.php">
            <span>Search</span>
            <input type="text" name="searchTxt" id="searchTxt" />
            <input type="submit" value="Search"/>
        </form>


        <div>
            <h1>result</h1>
            <p class="emptyUiAlert">
                please enter a search word on the text box to see results of tweet
            </p>
            <ul id="container">

            </ul>
        </div>

        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript">




            $("#formUnique").on('submit',function(e){

//                init the list
                $("#container").empty();
                $(".emptyUiAlert").empty();
                e.preventDefault();
                $.ajax({ url: 'search.php',
                    data : {'searchTxt':$('#searchTxt').val()},
                    type: 'post',
                    success: function(data) {



                        var data = $.parseJSON(data);
                        var statuses = data.statuses



                        for (var i = 0; i < statuses.length; i++) {
                            $("#container").append("<li><img class='floatLeft' src='"+statuses[i].user.profile_image_url+"'/><div class='floatLeft'><span>User:"+statuses[i].user.screen_name+"</span><br/><span>Tweet:"+statuses[i].text+"</span></div></li>");
                    }


                    }

                });
                return false;

            })

        </script>

</body>
</html>
