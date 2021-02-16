class RequiredField {
    constructor(url) {
        this.siteUrl = url;
        this.palceholder = $('.placeholder');
        this.inputField = $('.wpcf7-form-control');
        this.indicateRequiredField();
        // this.reloadAfterSubmit();
        this.redirectToThankYou();
    }

    indicateRequiredField() {
        this.palceholder.click(function() {
            const formGroup = $(this).closest('.form-group');
            const inputField = formGroup.find('.wpcf7-form-control');
            inputField.focus();
        });

        this.inputField.focus(function() {
            const formGroup = $(this).closest('.form-group');
            const placeholder = formGroup.find('.placeholder');
            placeholder.hide();
        });

        this.inputField.blur(function() {
            const formGroup = $(this).closest('.form-group');
            const placeholder = formGroup.find('.placeholder');

            if ($(this).val().length === 0) {
                placeholder.show();
            }
        });
    }

    reloadAfterSubmit() {
        document.addEventListener( 'wpcf7mailsent', function( event ) {
            location.reload();
        }, false );
    }

    redirectToThankYou = () => {
        const redirectUrl = this.siteUrl + '/thank-you/';
        document.addEventListener( 'wpcf7mailsent', function( event ) {
            location = redirectUrl;
        }, false );
    }
}

export default RequiredField;