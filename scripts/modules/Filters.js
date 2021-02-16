class Filters {
    constructor(filtersForm) {
        this.filtersForm = filtersForm;
        this.filters = {};
        this.categories = [];
        this.locations = [];
        this.types = [];
        this.filtersPage = this.filtersForm.attr('action');
        this.query = [];
        this.events();
    }

    events = () => {
        this.filtersForm.on( 'submit', this.onSubmitHandler );
    }

    onSubmitHandler = event => {
        event.preventDefault();
        const self = this;

        this.filtersForm.find('[name]').each(function() {
            if ( $(this).is(':checked') ) {
                if ($(this).attr('name') === 'job_category') {
                    self.categories.push($(this).val());
                }

                if ($(this).attr('name') === 'job_location') {
                    self.locations.push($(this).val());
                }

                if ($(this).attr('name') === 'job_type') {
                    self.types.push($(this).val());
                }
            }
        });

        this.filters['job_category'] = this.categories.join('&');
        this.filters['job_location'] = this.locations.join('&');
        this.filters['job_type'] = this.types.join('&');

        for (const filter in this.filters) {
            if (this.filters.hasOwnProperty(filter)) {
                this.query.push(filter + '=' + this.filters[filter]);
            }
        }

        window.location.assign(this.filtersPage + this.query.join('&'));
    }
}

export default Filters;