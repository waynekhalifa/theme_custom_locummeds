class CurrentPage {
    constructor() {
        this.location = window.location.href;
        this.addCurrentPage();
    }

    addCurrentPage() {
        var loc = window.location.href;
        $(".filter a").each(function() {
            if($(this).attr('href') == loc) {
                $(this).addClass('current-page');
            }
        });
    }
}

export default CurrentPage;