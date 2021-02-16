class LoadMore {
    constructor() {
        this.loadMore = $('.read-more__button');
        this.events();
    }

    events = () => {
        this.loadMore.on('click', this.loadMoreHandler);
    }

    loadMoreHandler() {
        const page = $(this).data('page');
        const newPage = page + 1;
        const ajaxurl = $(this).data('url');
        const action = $(this).data('action');
        const container = $(this).data('container');
        const loader = $(this).data('loader');

        $(loader).addClass('loading');

        $.ajax({
            url: ajaxurl,
            type: 'post',
            data: {
                action: action,
                page: page,
            },
            success: res => {
                $(this).data('page', newPage);
                $(loader).removeClass('loading');
                $(container).append(res.data);
            },
            error: err => {
                console.log(err);
            }
        });
    }
}

export default LoadMore;