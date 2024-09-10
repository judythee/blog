import './bootstrap';

import jQuery from 'jquery';
window.$ = jQuery;
import select2 from "select2";
select2(jQuery);
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

$(document).on("load",function() {
    $("..js-example-basic-single").select2();
});
