import 'owl.carousel';

class OwlSliders {
    constructor() {
        this.events();
    }
    events() {
        $('.owl-carousel').owlCarousel({
            loop: true,
            items: 1,
            autoplay: true,
            // autoplayTimeout:5000, default is 5000
            autoplaySpeed: 800,
            autoplayHoverPause: true,
            nav: false,
        });
    }
}

export default OwlSliders;