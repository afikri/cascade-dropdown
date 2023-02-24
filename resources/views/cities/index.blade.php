<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        /* Center and adjust the width of the toggle button */
        #toggle-button {
            display: block;
            margin: 0 auto;
            text-align: center;
            width: 200px;
        }
    </style>

</head>

<body>
    <!-- Button to trigger modal -->
    <button type="button" id="toggle-button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Select City and Company
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Select City and Company</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="input-name">Name:</label>
                        <input type="text" class="form-control" id="input-name" name="name">
                    </div>

                    <div class="form-group">
                        <label for="input-name">Phone Number:</label>
                        <input type="text" class="form-control" id="input-name" name="name">
                    </div>

                    <div class="form-group">
                        <label for="input-name">Email:</label>
                        <input type="text" class="form-control" id="input-name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="city">City:</label>
                        <select class="form-control" name="city" id="city">
                            <option value="">Select City</option>
                            @foreach($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->city }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="company">Company:</label>
                        <select class="form-control" name="company" id="company">
                            <option value="">Select Company</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#city').on('change', function() {
                var city_id = $(this).val();
                if (city_id) {
                    $.ajax({
                        url: "{{ route('cities.companies', ':city_id') }}".replace(':city_id', city_id),
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#company').empty();
                            $('#company').append('<option value="">Select Company</option>');
                            $.each(data, function(key, value) {
                                $('#company').append('<option value="' + value.id + '">' + value.company + '</option>');
                            });
                        }
                    });
                } else {
                    $('#company').empty();
                    $('#company').append('<option value="">Select Company</option>');
                }
            });
        });
    </script>


</body>

</html>