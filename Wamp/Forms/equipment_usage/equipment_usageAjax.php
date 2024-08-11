<script type="text/javascript">
    $(document).ready(function(){
    $('button.Update').click(function(){
        var Row_ID = $(this).attr("id");
        var row = $('#row-' + Row_ID);
        var cells = row.find('td').not(':last');
       
        cells.each(function(){
            var id = $(this).attr('id');
            var text = $(this).text();
            $(this).html('<input type="text" class="form-control" value="' + text + '">');
        });
        
        $(this).text('Save').removeClass('Update').addClass('Save').off('click').on('click', function(){
            var updates = {};
            
            cells.each(function(){
                var id = $(this).attr('id');
                var newValue = $(this).find('input').val();
                updates[id.split('-')[0]] = newValue;
                $(this).html(newValue);
            });

            $.ajax({
                type: 'POST',
                url: 'ViewEmployeeProcess.php',
                data: { Row_ID: Row_ID, updates: updates },
                success: function(response) {
                    try {
                        // Parse the JSON response
                        var jsonResponse = JSON.parse(response);
                        
                        if (jsonResponse.success) {
                            alert('Update successful!');
                        } else {
                            alert('Update failed. Error: ' + (jsonResponse.error || 'Unknown error'));
                        }
                    } catch (e) {
                        alert('Update failed. Error parsing JSON response.');
                    }
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText); // Log the response for debugging
                    alert('Error in AJAX request: ' + error);
                }
            });
        });
    });
});

</script>
