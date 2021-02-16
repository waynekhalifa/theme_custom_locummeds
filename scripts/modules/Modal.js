class Modal {
	constructor(modal, openBtn, closeBtn) {
        this.modal = modal;
        this.modalContent = $('.modal');
		this.openModalButtom = openBtn;
        this.closeModalButton = closeBtn;
        this.backdrop = $('.backdrop');
		this.events();
	}

	events() {
		this.openModalButtom.on('click', this.openModal.bind(this));
		this.closeModalButton.on('click', this.closeModal.bind(this));

		// on any key
		$(document).keyup(this.keyPressHandler.bind(this));
	}

	keyPressHandler(e) {
		if ( e.keyCode == 27 ) {
			this.closeModal();
		}
	}

	openModal() {
        this.modal.addClass('expanded');
        this.modalContent.addClass('modal--is-visible');
        this.backdrop.addClass('backdrop--is-visible');
		return false;
	}

	closeModal() {
        this.modal.removeClass('expanded');
        this.modalContent.removeClass('modal--is-visible');
        this.backdrop.removeClass('backdrop--is-visible');
	}
}

export default Modal;