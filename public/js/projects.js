$(function(){

    $('#category').change(function(){
        const slug = $(this).val();
        const url = endpoint + '/category/' + slug;
        if(!slug){
            return;
        }

        $.ajax({
            url: url,
            datatype: "html",
            type: "get",
            beforeSend: function () {
                $('.auto-load').show();
            }
        })
            .done(function (response) {
                if (response.html == '') {
                    return;
                }
                $('.auto-load').hide();
                $("#data-wrapper").html(response.html);
            })
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                console.log('Server error occured');
            });
    });

    $('.delete_project').click(function() {
        const projectId = $(this).data('id');
        if(confirm("Are you sure you want to delete this project?")){
            $(this).attr("href", "projects/delete/"+projectId);
        }
        else{
            return false;
        }
    });

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })

    $("#start_date").datepicker({
        autoclose: true,
        todayHighlight: false,
    }).datepicker();

    $("#end_date").datepicker({
        autoclose: true,
        todayHighlight: false,
    }).datepicker();

});
