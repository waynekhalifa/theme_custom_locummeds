import waypoints from '../../node_modules/waypoints/lib/noframework.waypoints'
import smoothScroll from 'jquery-smooth-scroll';

class StickyHeader {
    constructor() {
        this.siteHeader = $('.site-header');
        this.headerTrigger = $('.site-header');
        this.menuIcon = $('.menu__icon');
        this.scrollUp = $('.scroll-up');
        this.wrapHeader();
        this.createHeaderWaypoint();
        this.addSmoothScrolling();
    }

    wrapHeader() {
        this.siteHeader.wrap('<div class="header-placeholder"></div>');
        $('.header-placeholder').height( this.siteHeader.outerHeight() );
    }

    createHeaderWaypoint = () => {
        new Waypoint({
            element: this.headerTrigger[0],
            handler: direction => {
                if ( direction == 'down' ) {
                    this.siteHeader.addClass('site-header--stuck');
                    this.menuIcon.addClass('menu__icon--stuck');
                    // this.headerTrigger.addClass('hero--stuck');
                } else {
                    this.siteHeader.removeClass('site-header--stuck');
                    this.menuIcon.removeClass('menu__icon--stuck');
                    // this.headerTrigger.removeClass('hero--stuck');
                }
            }
        });
    }

    addSmoothScrolling() {
        this.scrollUp.smoothScroll();
    }
}

export default StickyHeader;