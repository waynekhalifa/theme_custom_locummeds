class MobileMenu {
    constructor() {
        this.menuIcon = $('.menu__icon');
        this.menuContent = $('.main-navigation');
        this.events();
    }

    events() {
        this.menuIcon.on( 'click', this.toggleTheMenu );
    }

    toggleTheMenu = () => {
        this.menuContent.toggleClass('main-navigation--is-visible');
        this.menuIcon.toggleClass('menu__icon--is-close');
    }
}

export default MobileMenu;