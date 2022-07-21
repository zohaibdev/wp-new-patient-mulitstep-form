(function ($) {
    $(document).ready(function () {
        $('.content_owl').owlCarousel({
            loop: true,
            navText: ["<i class='fal fa-long-arrow-right'></i>", "<i class='fal fa-long-arrow-right'></i>"],
            margin: 20,
            nav: true,
			autoplay:true,
			autoplayTimeout:5000,
			autoplayHoverPause:true,
            dots: false,
            responsive: {
                0: {
                    items: 1,
					nav: false,
					dots: true
                },
                768: {
                    items: 2,
					nav: false,
					dots: true
                },
				992: {
                    items: 3,
					nav: false,
					dots: true
                },
                1200: {
                    items: 3,
					dots: false
                }
            }
        });
		
		$('.hero-carousel').owlCarousel({
            loop: true,
            navText: ["<i class='fal fa-long-arrow-right'></i>", "<i class='fal fa-long-arrow-right'></i>"],
            margin: 20,
            nav: false,
			autoplay:false,
			autoplayTimeout:5000,
			autoplayHoverPause:true,
            dots: false,
			touchDrag  : false,
			mouseDrag  : false,
            items: 1
        });
		
		$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
		
	$('.for-class-virtual-add').eq(0).addClass('active');
		
		
		
		 $('#floorplanSelect').on('change', function(e) {
    $('.tab-pane').removeClass('active in')
    $('#' + $(e.currentTarget).val()).addClass("active in");
  })

		jQuery('.comment-form-url').append( jQuery('.comment-form-comment') );
		
$('.map-carousel').owlCarousel({
    loop:true,
	 navText: ["<i class='fal fa-long-arrow-right'></i>", "<i class='fal fa-long-arrow-right'></i>"],
    margin:10,
    nav:true,
	autoplay:true,
	autoplayTimeout:5000,
	autoplayHoverPause:true,
	 dots: false,
 responsive: {
                0: {
                    items: 1,
					nav: false,
					dots: true
                },
                768: {
                    items: 2,
					nav: false,
					dots: true
                },
				992: {
                    items: 3,
					nav: false,
					dots: false
                },
                1200: {
                    items: 3,
					dots: false
                }
            }
});
$('.map-slider').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
	dots: false,
	autoplay:false,
	autoplayTimeout:5000,
	autoplayHoverPause:true,
	items: 1
});

$('.map-slider-thumb').owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    dots: false,
    center: true,
    URLhashListener: true,
	responsive: {
    	0: {
			items: 3
    	},
    	600: {
			items: 5
    	}
    }
});
		
$(document).ready(function () {
  var navListItems = $('div.setup-panel div a'),
          allWells = $('.setup-content'),
          allNextBtn = $('.nextBtn'),
  		  allPrevBtn = $('.prevBtn');

  allWells.hide();

  navListItems.click(function (e) {
      e.preventDefault();
      var $target = $($(this).attr('href')),
              $item = $(this);

      if (!$item.hasClass('disabled')) {
          navListItems.removeClass('btn-primary').addClass('btn-default');
          $item.addClass('btn-primary');
          allWells.hide();
          $target.show();
          $target.find('input:eq(0)').focus();
      }
  });
  
  allPrevBtn.click(function(){
      var curStep = $(this).closest(".setup-content"),
          curStepBtn = curStep.attr("id"),
          prevStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().prev().children("a");

          prevStepWizard.removeAttr('disabled').trigger('click');
  });

  allNextBtn.click(function(){
      var curStep = $(this).closest(".setup-content"),
          curStepBtn = curStep.attr("id"),
          nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
          curInputs = curStep.find("input[type='text'],input[type='url']"),
          isValid = true;

      $(".form-group").removeClass("has-error");
      for(var i=0; i<curInputs.length; i++){
          if (!curInputs[i].validity.valid){
              isValid = false;
              $(curInputs[i]).closest(".form-group").addClass("has-error");
          }
      }

      if (isValid)
          nextStepWizard.removeAttr('disabled').trigger('click');
  });

  $('div.setup-panel div a.btn-primary').trigger('click');
});
        $('.blog_carousel').owlCarousel({
            loop: true,
            navText: ["<i class='fal fa-long-arrow-right'></i>", "<i class='fal fa-long-arrow-right'></i>"],
            margin: 20,
            nav: true,
			autoplay:true,
			autoplayTimeout:5000,
			autoplayHoverPause:true,
            dots: true,
            responsive: {
                0: {
                    items: 1,
					nav: false,
					dots: true
                },
                768: {
                    items: 2,
					nav: false,
					dots: true
                },
				992: {
                    items: 3,
					dots: false,
					nav: false
                },
                1200: {
                    items: 3,
					dots: false,
					
                }
            }
        });
		
    $('#virtual-rooms').DataTable( {
		"bPaginate": false,
		"bInfo": false,
		
		"order": [[1, "asc" ]],
		language: { search: '', searchPlaceholder: "Search..." },
		responsive: true,
        initComplete: function () {
            this.api().columns( 2 ).every( function () {
                var column = this;
                var select = $('<select><option value="">All</option></select>')
                    .appendTo( $("#virtual-rooms_filter") )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    } );

    });

	
	$(".accordion-collapse").eq(0).addClass("show");
$(".accordion-button").eq(0).removeClass("collapsed");

    function openNav() {
        document.getElementById("myNav").style.display = "block";
    }
    function closeNav() {
        document.getElementById("myNav").style.display = "none";
    }
}) (jQuery)