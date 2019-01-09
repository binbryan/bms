<?php include 'search.php'; ?>

<span class="search-bar">
    <script type="text/javascript">
        function validate() {
            $("ducument").ready(function () {
                event.preventDefault();

                var search = $("#search").val();

                //document.getElementById("result").innerHTML = search;

                $.ajax({
                    type: 'GET',
                    
                    url: 'search.php',
                    
                    data: {
                        action: 'search',
                        search: search
                    },
                    
                    success: function (response) {
                        document.getElementById("result").innerHTML = response;
                    }
                });
            });

        }
    </script>

    <div id="result"></div>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="GET" style="display: inline-block;">
        <input type="hidden" name="action" value="search" />

        <input type="text" id="search" onkeyup="validate()" />
    </form>
</span>
