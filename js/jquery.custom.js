/* ----------------- Start Document ----------------- */
(function($){
  $(document).ready(function(){

/*---------------------------------------------------------*/
/* Front-end jQuery for Mixitup sorting
/*---------------------------------------------------------*/

  $('#Grid').mixitup({
      targetSelector: '.mix',
      filterSelector: '.filter',
      sortSelector: '.sort',
      buttonEvent: 'click',
      effects: ['fade','scale'],
      listEffects: null,
      easing: 'smooth',
      layoutMode: 'grid',
      targetDisplayGrid: 'inline-block',
      targetDisplayList: 'block',
      gridClass: '',
      listClass: '',
      transitionSpeed: 400,
      showOnLoad: 'all',
      sortOnLoad: false,
      multiFilter: false,
      filterLogic: 'or',
      resizeContainer: true,
      minHeight: 0,
      failClass: 'fail',
      perspectiveDistance: '3000',
      perspectiveOrigin: '50% 50%',
      animateGridList: true,
      onMixLoad: null,
      onMixStart: null,
      onMixEnd: null
  });

/* ------------------ End Document ------------------ */
});

})(this.jQuery);