$(function(){
    if ($('#user').val() == 'autre')
    { $('.musthide, .musthide').removeClass('hide');}
    /*
    $('#user').change(function(){
        if ($(this).val() == 'autre')
        {
            $('.musthide, .musthide').removeClass('hide');
        }
        else
        {
            $('.hide, .musthide').addClass('hide');

        }
    });
    */

    function submitForm(idForm, success200)
    {
            
        $(document).on('submit', '#'+idForm, function (e) {
            e.preventDefault();
            var inputSubmit = $(this).find('input[type=submit]'),
                inputVider = $(this).find('.vider'),
                valeur = inputSubmit.val();
                
            inputSubmit.val('chargement...');
            inputSubmit.addClass('disabled');
            $('input+small').text('');
            $('input').parent().removeClass('has-error');

                $.ajax({
                    method: $(this).attr('method'),
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    dataType: "json",
                    complete: function (data, statu) {
                        if (data.status == 200) {

                            $('.alert-success').removeClass('hidden');
                            inputSubmit.removeClass('disabled');
                            inputSubmit.val(valeur);
                            inputVider.val('');
                            alert('enregistre');
                             if (success200) {
                                 success200();
                             }
                        }
                        
                    }
                    
                })
                .fail(function (data) {
                    $.each(data.responseJSON, function (key, value) {
                        var input = '#'+idForm+' input[name=' + key + ']';
                        $(input + '+small').text(value);
                        $(input).parent().addClass('has-error');
                    });
                    inputSubmit.removeClass('disabled');
                    inputSubmit.val(valeur);
                });
        });
        
    }
    submitForm('formRegisterUser', function () {
        location.reload();
    });
    submitForm('formRegister');

});

jQuery(document).ready(function () {
    jQuery(".select2user").chosen({
        disable_search_threshold: 3,
        no_results_text: "Oops, rien n'a été trouvé!",
        width: "100%"
    });
});