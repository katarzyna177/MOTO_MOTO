$('#contactform').on('submit', function(e) {
    var $form = $(this), $submit = $('input[type="submit"]', $form);

    e.preventDefault();

    $('.form-error', $form).remove();

    $.post($form.attr('action'), $form.serialize(), function(data) {
        if (data === 'ok') {
            $form.slideUp('fast', function() {
                $form.after('<div class="form-success">Wiadomość została wysłana! Skontaktujemy się z Tobą jak tylko to będzie możliwe.</div>');
            });

            return true;
        }

        $form.prepend('<div class="form-error">Wystąpił błąd podczas wysyłania formularza. Upewnij się, że wypełniłeś wszystkie pola i poprawnie rozwiązałeś działanie.</div>');
        return false;
    }, 'text');
});