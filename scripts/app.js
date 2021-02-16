import MobileMenu from './modules/MobileMenu';
import OwlSliders from './modules/OwlSliders';
import StickyHeader from './modules/StickyHeader';
import RevealOnScroll from './modules/RevealOnScroll';
import Modal from './modules/Modal';
import Counter from './modules/Counter';
import CurrentPage from './modules/CurrentPage';
import Required from './modules/RequiredField';
import JobFilters from './modules/Filters';
import ShowMore from './modules/LoadMore';

$(document).ready(function(){
    new MobileMenu();
    new OwlSliders();
    new StickyHeader();
    // new RevealOnScroll( $('.about'), '85%', 'left' );
    // new RevealOnScroll( $('.about-us .entry-content'), '50%', 'left' );
    // new RevealOnScroll( $('.testimonials'), '85%', 'right' );
    // new RevealOnScroll( $('.company-contact'), '65%', 'zoom-out' );
    new Modal( $('.request-modal'), $('.request-callback'), $('.backdrop') );
    new Modal( $('.refer-modal'), $('.refer-friend'), $('.backdrop') );
    new Modal( $('.send-cv-modal'), $('.send-cv'), $('.backdrop') );
    new Modal( $('.vacancy-modal'), $('.register-vacancy'), $('.backdrop') );
    new Modal( $('.application-modal'), $('.apply-now__link'), $('.backdrop') );

    // Counter Up
    new Counter();

    // Highlights active filters
    new CurrentPage();

    // Requried Fields
    new Required(data.site_url);

    // Job Filters
    new JobFilters( $('.jobs-filter') );

    // Show more
    new ShowMore();
});