@if (Session::has('success'))
    <div id="successFlashMessage" class="alert alert-success">
        {{ Session::get('success') }}
    </div>
    <script>
        $(document).ready(function () {
            // Automatically remove the flash message after 10 seconds
            setTimeout(function () {
                $('#successFlashMessage').fadeOut('slow', function () {
                    $(this).remove();
                });
            }, 3000); // 3000 milliseconds = 3 seconds
        });
    </script>
@elseif (Session::has('error'))
    <div id="errorFlashMessage" class="alert alert-danger" style="color: red">
        {{ Session::get('error') }}
    </div>
    <script>
        $(document).ready(function () {
            // Automatically remove the flash message after 10 seconds
            setTimeout(function () {
                $('#errorFlashMessage').fadeOut('slow', function () {
                    $(this).remove();
                });
            }, 3000); // 3000 milliseconds = 3 seconds
        });
    </script>
@endif
