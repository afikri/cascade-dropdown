<!DOCTYPE html>
<html>

<head>

</head>

<body>
    <div class="form-group">
        <label for="city">City:</label>
        <select class="form-control" id="city" name="city">
            <option value="">Select City</option>
            @foreach($cities as $city)
            <option value="{{ $city->id }}">{{ $city->city }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="company">Company:</label>
        <select class="form-control" id="company" name="company">
            <option value="">Select Company</option>
        </select>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
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