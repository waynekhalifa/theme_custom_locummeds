import waypoints from '../../node_modules/waypoints/lib/noframework.waypoints';

class RevealOnScroll {
    constructor(items, offset, effect) {
        this.itemsToReveal = items;
        this.offsetPercentage = offset;
        this.effect = effect;
        this.hideInitially();
        this.createWaypoints();
    }

    hideInitially() {
        this.itemsToReveal.addClass('reveal-item');
        this.itemsToReveal.addClass('reveal-item--' + this.effect);
    }

    createWaypoints() {
        const that = this;

        this.itemsToReveal.each(function() {
            let currentItem = this;

            new Waypoint({
                element: currentItem,
                handler: function() {
                    $(currentItem).addClass('reveal-item--is-visible');
                },
                offset: that.offsetPercentage
            });
        });
    }
}

export default RevealOnScroll;