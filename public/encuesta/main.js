jQuery(function($){

var form = window.form || {};
function equalHeight(group) {
	 tallest = 0;
	 group.each(function() {
			thisHeight = $(this).height();
			if(thisHeight > tallest) {
				 tallest = thisHeight;
			}
	 });
	 group.height(tallest);
}
  // INPUT - input[type=checkbox] | input[type=radio] on click input[type=text]
  form.inputMark = function() {
    $('.input-group-addon-text input[type=text], .input-group-addon-text input[type=email], .input-group-addon-text input[type=phone], .input-group-addon-text input[type=number]').on('click',function() {    
      $parent = $(this).parents('.input-group-addon-text');
      //checkbox
      $checkbox = $parent.find('input[type=checkbox]');
      if($checkbox.length>0) {
        $checkbox.removeAttr('checked').prop('checked',false);
        $checkbox.attr('checked','checked').prop('checked',true);
      }
      //radio
      $radio = $parent.find('input[type=radio]');
      if($radio.length>0) {
        $radio.removeAttr('checked').prop('checked',false);
        $radio.attr('checked','checked').prop('checked',true);
      }
    });
  }
  
  // MAP - loader
  form.mapLoader = function() { 
    
  	$('fieldset:has(.input-group-location)').each(function(i, el){
      
      var $pole = $(el).find('input');
      var pole = $pole[0];
      pole = new google.maps.places.Autocomplete(pole);
      
      if ($pole.val()!='')
      {
        $pole.parent().addClass('input-group-text-active');
        if ($(el).find('.map').length == 1)
        {
          $(el).find('.map').addClass('active-map');
          var gc = new google.maps.Geocoder();
          gc.geocode(
            {address:$pole.val()},
            function(results, status)
            {
              if (status == google.maps.GeocoderStatus.OK)
              {
                show(results[0]);    
              }
            }
          );
        }
      }
  
      if ($(el).find('.map').length == 1)
      {
          var mapOptions = {
            center: new google.maps.LatLng(50, 0),
            zoom: 2,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            scrollwheel:false
          };
          var map = new google.maps.Map($(el).find('.map')[0], mapOptions);
          var marker;
          
          google.maps.event.addListener(pole, 'place_changed', function() {
            if (pole.getPlace().id)
            {
               show(pole.getPlace());
            }
            else
            {
              if (marker) {
                marker.setMap(null);
                $pole.parent().removeClass('input-group-text-active');
                $(el).find('.map').removeClass('active-map');
              }
            }
  
          })
  
      }
      
      function show(place)
      {
        $pole.parent().addClass('input-group-text-active');
        $(el).find('.map').addClass('active-map');
        var type = place.types;
        var loc = place.geometry.location;
        if (marker) {
                marker.setMap(null);
        }
        marker = new google.maps.Marker({
            map:map,
            position:new google.maps.LatLng(loc.lat(),loc.lng())
        });
        map.panTo(marker.getPosition());

        if (type.indexOf('route') != -1)
        {
            map.setZoom(16);
        }
        else if (type.indexOf('street_address') != -1 || type.indexOf('establishment') != -1 )
        {
            map.setZoom(17);
        }
        else if (type.indexOf('country') != -1 || type.indexOf('political') != -1 )
        {
            map.setZoom(5);
        }
        else
        {
            map.setZoom(12);
        }
      }
      
    });
    
  } 
  
  // SELECTBOX - style
  form.selectBox = function() {
    if ($('select.form-control').length > 0)
    {
      $('select.form-control').customSelect({customClass:'selectclass'});
      /*$('select.form-control').each(function(i, select){
        $(select).parent().css('width', $(select).width()+'px');
      }); */
      $('select.form-control').on('click', function (e) {
        e.preventDefault();  
      });   
    }
  }  
  
  // SELECTBOX - width
  form.selectBoxWidth = function() {
    var windowWidth = $(window).width();
    $('select').each(function(i,el) {     
      var oldData = $(el).attr('name');
      if (!oldData) return;                  
      var oldWidth = $(el).next('.selectclass').css('width').replace('px', ''); 
      if((windowWidth - 20) < oldWidth) {
        $(this).addClass('select-fullwidth').next('.selectclass').addClass('select-fullwidth'); 
        $(this).next('.selectclass').children('.selectclassInner').addClass('select-fullwidth-inner');
        $('.inner[data-select="'+oldData+'"]').addClass('select-fullwidth');
        $('.help-block[data-select="'+oldData+'"]').addClass('select-fullwidth');
      }
      else {
        $(this).removeClass('select-fullwidth').next('.selectclass').removeClass('select-fullwidth'); 
        $(this).next('.selectclass').children('.selectclassInner').removeClass('select-fullwidth-inner');
        $('.inner[data-select="'+oldData+'"]').removeClass('select-fullwidth');
        $('.help-block[data-select="'+oldData+'"]').removeClass('select-fullwidth');
      }
    });   
    
  } 
  
  // SELECTBOX - validate
  form.selectBoxValidate = function() {
    $('select').on('change', function () {
      var selectName = $(this).attr('name');
      if($(this).val()) {  
        if($(this).val()!='textova') {
          $(this).next().addClass('selectclassActive').removeClass('input-group-addon-text'); 
          $('.inner[data-select="'+selectName+'"]').parent().fadeOut();   
          
        }
        else {
          if($('.inner[data-select="'+selectName+'"] input').val().length==0) {
            $(this).next().removeClass('selectclassActive').addClass('input-group-addon-text'); 
          }
          else {
            $(this).next().addClass('selectclassActive').addClass('input-group-addon-text'); 
          }
          $('.inner[data-select="'+selectName+'"]').parent().fadeIn(); 
        }
      }
      else {
       $(this).next().removeClass('selectclassActive').removeClass('input-group-addon-text');  
       $('.inner[data-select="'+selectName+'"]').parent().fadeOut();
      };
    }).each(function(i, el) {
    	var selectName = $(el).attr('name');
        if($(el).val()) {  
			if($(el).val()!='textova') {
			  $(el).next().addClass('selectclassActive').removeClass('input-group-addon-text'); 
			  $('.inner[data-select="'+selectName+'"]').parent().fadeOut();   
			}
			else 
			{
			  if($('.inner[data-select="'+selectName+'"] input').val().length==0) {
				$(el).next().removeClass('selectclassActive').addClass('input-group-addon-text'); 
			  }
			  else {
				$(el).next().addClass('selectclassActive').addClass('input-group-addon-text'); 
			  }
			  $('.inner[data-select="'+selectName+'"]').addClass('inner-active').parent().show(); 
			}
    	}
    });
    
    $('input.select-text').on('change keyup', function () {
      var parentData = $(this).parent().attr('data-select');
      if($(this).val().length > 0) {
        $('select[name="'+parentData+'"]').next().addClass('selectclassActive');  
        $(this).parent().addClass('inner-active');
      }
      else {
        if($('select[name="'+parentData+'"]').val()=='textova') {
          $('select[name="'+parentData+'"]').next().removeClass('selectclassActive');
        }
        $(this).parent().removeClass('inner-active');
      }

    });
  }            
  
  // Detect touch device
  form.touchDetect = function() {
    if (Modernizr.touch || window.navigator.msMaxTouchPoints) {   
      $('.input-group-addon-date').fadeOut();
    }         
  }       
  
  // INPUT - counter
  form.inputCounter = function() {
      $('input.counter, textarea.counter').on('change keyup', function (e) {
  			var val = $(this).val().replace(/(?:\r\n|\r|\n)/g,'')
  			var count = val.length
  			var allowed = parseInt($(this).data('maxlength'))
  			var remain = allowed - count;
  			document.querySelector('strong[data-name=\''+this.name+'\']').innerHTML = remain
  			if(remain < 1 && e.which && e.which != 13) {
  				e.preventDefault();
  			}
      }).each(function(i,el){
      	$(el).data('maxlength', $(el).attr('maxlength'));
      }).change();           
  }
  
  // INPUT - validate
  form.inputValidate = function() {
    $('input.validate, textarea.validate').on('change keyup', function () { 
      var motherDiv = $(this).attr('name');
      if($(this).is('textarea')==true) {
        var motherDivAdd = 'input-group-textarea-active';       
      }
      else { 
        var motherDivAdd = 'input-group-text-active'; 
      }
      if($(this).val().length > 0) {
        $('label[data-for="'+motherDiv+'"]').addClass(motherDivAdd); 
      }
      else {
        $('label[data-for="'+motherDiv+'"]').removeClass(motherDivAdd); 
      }
    }).change();           
  }
  
  // INPUT - validate startup
  form.inputValidateStart = function() {
    $('input.validate').each(function() {
      if($(this).val().length > 0) {
        var onStartInputDiv = $(this).parents('.input-group-text').attr('data-for');   
        $('label[data-for="'+onStartInputDiv+'"]').addClass('input-group-text-active'); 
      }
    });           
  }
  
  // INPUT - Image radio
  form.inputImageRadio = function() {
    $('.row input.imageradio').change(function() {
      var imageVal = $(this).attr('id');  
      // uncheck all 
      $(this).parents('.row').find('label').removeClass('input-image-active');     
      if($(this).prop('checked')==true) {    
        $('label[for="'+imageVal+'"]').addClass('input-image-active').removeClass('input-image-border-hover');
        $('input[id="'+imageVal+'"]').parent().removeClass('input-image-hover');
      }
    }); 
    
    $('.row label.input-image').hover(function() {
      var imageName = $(this).attr('for');        
      if($('input[id="'+imageName+'"]').prop('checked')==false) { 
        $('input[id="'+imageName+'"]').parent().toggleClass('input-image-hover');
        $('label.input-image[for="'+imageName+'"]').toggleClass('input-image-border-hover');
      }
      else {
        if($('input[id="'+imageName+'"]').prop('checked')==true && $('input[id="'+imageName+'"]').parent().hasClass('input-image-hover')) {
          $('input[id="'+imageName+'"]').parent().removeClass('input-image-hover');
          $('label.input-image[for="'+imageName+'"]').removeClass('input-image-border-hover');
        } 
      }
    });          
  }
  
    
  // INPUT - StarRating
  form.inputStarRating = function() {
    if($('.original-stars').length>0) {
      $maxResolution = 767;
      $('.original-stars').each(function() {        
        $this = $(this);
        $current = $this.attr('data-start');
        $forLoop = $current - 1;
        $parent = $this.attr('data-stars');
        $totalCnt = $this.find('.star-rating').length;
        $parentWidth = Math.floor($('.rating-value[data-stars='+$parent+']').width() / 2);
        
        // FOR MOBILE RESOLUTION (<768)
        if($(window).width()<=$maxResolution) {
          $maxWidth = $this.width();
          $onceWidth = Math.floor($maxWidth / $totalCnt);
          $this.find('.star-rating').css('width',$onceWidth+'px');  
        }
        else {           
          $this.find('.star-rating').removeAttr('style');
        }
        
        // Default marker
        $this.find('.star-rating').each(function(index) {
          if(index<=$forLoop) {
            $(this).addClass('star-rating-on');
          }
          else {
            return;
          }
        });
        
        // Echo default value
        if(!$('.rating-value[data-stars='+$parent+']').hasClass('rating-active')) {
          $('.rating-value[data-stars='+$parent+']').find('.rating-value-in').empty().html(($current)+'/'+$totalCnt);
        }
        $current = $this.find('.star-rating-on').length;
        if($current>0) {
          if(!$('.rating-value[data-stars='+$parent+']').hasClass('rating-active')) {
            $('.rating-value[data-stars='+$parent+']').addClass('rating-active');
          }                     
          // Move cursor
          if($(window).width()<=$maxResolution) {    
            var totalMove = ($onceWidth * $current) - ($onceWidth / 2) - $parentWidth;
            var variable = 'px';
          }
          else {
            var totalMove = Math.floor(((100 - ($totalCnt * 10)) / 2) + (($current - 1) * 10));
            var variable = '%';
          }
          $('.rating-value[data-stars='+$parent+']').css('left',totalMove+variable);
        }
        else {
          if($(window).width()<=$maxResolution) {    
            var totalMove = ($onceWidth * 1) - ($onceWidth / 2) - $parentWidth;
            var variable = 'px';
          }
          else {
            var totalMove = Math.floor(((100 - ($totalCnt * 10)) / 2));
            var variable = '%';
          }
          $('.rating-value[data-stars='+$parent+']').css('left',totalMove+variable);
        }
      });
    }
  }
  
  // INPUT - jQuery UI - Datepicker
  form.uiDatepicker = function() {
    $('.input-group-addon-date').on('click', function () { 
      var dateName = $(this).parent().find('input.datepicker').attr('name');
      $('[data-date="'+dateName+'"]').toggle();
    });
    
     $('.datepicker-callendar').datepicker($.extend({}, datepickerlang, {
        changeMonth: true,
        changeYear: true,
        yearRange: 'c-100:c+10',
  		  onSelect: function(value, date) { 
          var input = $('input[name="'+$(this).attr('data-date')+'"]');
          input.val(value);
          validate($(input).parents('fieldset'));
          form.inputValidateStart();
          $(this).hide();
        }        
  	 }));
  }
  
  // INPUT - jQuery UI - Drag and drop
  form.uiDrag = function() {
    $('.drag').sortable({
      update: function(event, ui){  
		var thisDrag = $(this).attr('data-drag');
		var thisPosition = 0;
		$('.drag[data-drag='+thisDrag+'] li').each(function() {
		  ++thisPosition;
		  $(this).find('strong:first-child').html(thisPosition+'. '); 
		  $(this).find('.ord').val(thisPosition);
		  
		});
	  }
      ,placeholder:'sortable-placeholder'
    });
    $('.drag').css('-ms-touch-action', 'none');
  }
  
  // INPUT - Matrixs
  form.inputMatrix = function() {
    // Matrix - ACTIVE
                             
    $('input.matrix').change(function() {             
      var thisParent = $(this).parents('.matrix-values');
      thisParent.find('.input-group-title-main').removeClass('data-title-active');
      thisParent.find('.title').removeClass('data-row-active');
      thisParent.find('input.matrix:checked').each(function() {
        if($(this).prop('checked')==true) {
          var rowY = $(this).attr('data-title'); 
          var rowX = $(this).attr('data-row');
          thisParent.find('.data-title-'+rowY).addClass('data-title-active');  
          thisParent.find('.data-row-'+rowX).addClass('data-row-active');
        }    
      }); 
    });
    
    // Matrix - textACTIVE
                                 
    $('input.matrixtext').blur(function() {             
      var thisParent = $(this).parents('.matrix-values');
      thisParent.find('.input-group-title-main').removeClass('data-title-active');
      thisParent.find('.title').removeClass('data-row-active');
      thisParent.find('input.matrixtext').removeClass('matrixtext-active');
      thisParent.find('input.matrixtext').each(function() {
        if($(this).val().length > 0) {
          var rowY = $(this).attr('data-title'); 
          var rowX = $(this).attr('data-row');
          $(this).addClass('matrixtext-active');
          thisParent.find('.data-title-'+rowY).addClass('data-title-active');  
          thisParent.find('.data-row-'+rowX).addClass('data-row-active');
        }    
      }); 
    });
    
    // Matrix - HOVER
                                 
    $('.addon-matrix, input.matrixtext').on('mouseover',function(){           
      var thisParent = $(this).parents('.matrix-values');
      var rowY = $(this).attr('data-title'); 
      var rowX = $(this).attr('data-row');
      thisParent.find('.data-title-'+rowY).addClass('data-title-hover');  
      thisParent.find('.data-row-'+rowX).addClass('data-row-hover');   
    });
    
    $('.addon-matrix, input.matrixtext').on('mouseout',function(){
      var thisParent = $(this).parents('.matrix-values');
      var rowY = $(this).attr('data-title'); 
      var rowX = $(this).attr('data-row');
      thisParent.find('.data-title-'+rowY).removeClass('data-title-hover');  
      thisParent.find('.data-row-'+rowX).removeClass('data-row-hover'); 
    });
    
    // Matrix - Title Width
    
    $('.matrix-values').each(function() { 
      var thisId = $(this).attr('id');
    
      var checkLabel = $(this).find('input.matrix[data-row=1]').length;
      if(checkLabel==0) {
        var checkLabel = $(this).find('input.matrixtext[data-row=1]').length;  
      }
      
      var percent = 100/checkLabel;                 
       
      $(this).find('.title-groups').css('width',percent+'%');

    });  
  }
  
  // INPUT - jQuery UI - Slider
  form.uiSlider = function() {
  
  	$('.divide-points').each(function(i, el) 
  	{
  		function arraySum(arr) {
		  var sum = 0, i;
		  for(i in arr) sum += arr[i];
		  return sum;
		}
  	
		var
			$context = $(el).parent(),
			maxValueSlider = $context.find('span').text(),
			maxValueTotal = $context.find('span').text(),
			$sliders = $context.find('.divide-part-in'),
			valueSliders = [],
			$displaySpentTotal = $context.find('span');
 
		$sliders.each(function(i, slider){
		   var                                     
			  $slider = $(slider),
			  $spent = $slider.parent('.ui-slider-handle');
			  val = parseInt($slider.parent().next().val(),'10');
			  valueSliders[i] = val || 0;
			  
		  $slider.slider({
			range: 'min',
			value: valueSliders[i],
			min: 0,
			max: maxValueSlider,
			step: 1,
			animate: true,
			orientation: "horizontal",
			slide:
				function(event, ui)
				{      
					
					var thisSum = 0;  
					for (q = 0; q < valueSliders.length; q++) {
						thisSum += valueSliders[q];
					}   
									  
					var
					sumRemainder = thisSum - valueSliders[i],
					adjustedValue = Math.min(maxValueTotal - sumRemainder, ui.value);
					valueSliders[i] = adjustedValue;
					// current total
					$displaySpentTotal.text(maxValueSlider - sumRemainder - adjustedValue);
					// current value
					$(this).find('.ui-slider-handle').html('<span class="numm">'+valueSliders[i]+'</span>');
					 // adjusted value
					$slider.slider('value', adjustedValue);
			
					$slider.parent().next().val(adjustedValue);
			
					// mark null
					if(maxValueSlider - sumRemainder - adjustedValue == 0) {
					  $displaySpentTotal.addClass('full');
					  return false;                       
					}
					else {
					  $displaySpentTotal.removeClass('full');
					  return valueSliders[i];       
					}
				}
			});
			
			if (val) {
				$slider.find('.ui-slider-handle').html('<span class="numm">'+val+'</span>');
		    }
			   
			  
		});
		
		  
		var thisSum = 0;  
		for (q = 0; q < valueSliders.length; q++) {
			thisSum += valueSliders[q];
		} 
		
		$displaySpentTotal.text(maxValueTotal - thisSum);
		
		if (thisSum == maxValueTotal)
		{
			$displaySpentTotal.addClass('full');
		}
		
	 });
  }
	 form.matrixInputPosition = function() {
		$('.matrix-values .input-group-matrix').each(function(){
			var titleHeight = $(this).find('.title').outerHeight();
			if (titleHeight != null) {
				$(this).find('label').css('height',titleHeight+'px');
				$(this).find('label').css('vertical-align','middle');
			}
		});
	}
	
	form.divide = function(){
		if ($('.row-divide').length) {
			$('.row-divide .divide-item .divide-title').css('height','auto');
			if ($(window).width() >= 768) {
				$('.row-divide').each(function(){
					var j = 0;
					for (i = 0; i <= Math.round($('.row-divide').find('.divide-item .divide-title').length/2); i++) {
						equalHeight($(this).find('.divide-item:eq('+(i+j)+') .divide-title,.divide-item:eq('+(i+j+1)+') .divide-title'));
						j = j+1;
					}
				});
			}
		}
	}
  
  $(window).resize(function() {
    form.inputStarRating();   
  });
  
  // CALL FUNCTIONS
  $(document).ready(function(){
	var windowWidth = $(window).width();
    form.mapLoader();
    form.selectBox();
    form.touchDetect();
    form.selectBoxWidth();
    form.inputCounter();
    form.inputValidate();
    form.selectBoxValidate(); 
    form.inputValidateStart();
    form.inputImageRadio();
    form.uiDatepicker();
    form.uiDrag();
    form.inputMatrix();
    form.uiSlider();
    form.inputMark();
    form.divide();
    $(window).load(function() {
      form.inputStarRating();    
    });
	
	
	
	
	
	
/*if (windowWidth >= 768) {
	form.matrixInputPosition(); 
}*/

    
    // focus the text answer box if the text answer is chosen
    $('.input-group-checkbox, .input-group-radio').click(function(e){
    	if ($(this).find('input:checked').length == 1)
    		$(this).find('.text-addon input').focus();
    });

    // prevent unchecking if the text answer box is clicked and the checkbox is select
    $('.input-group-checkbox').on('click', function(e){
    	if ($(e.target).is(':text') && $(this).find('input:checked').length == 1) 
    	{ 
    		e.preventDefault();
    	}
    });
    
    $incompleteBlock = $('fieldset:has(.alert):first');
    if ($incompleteBlock.length > 1)
    {
      window.scrollTo(0,$incompleteBlock.offset().top);
    }
  });
  
  var clicked;
  $('button').click(function()
  {
    clicked = $(this);
  });
  
  $('input').keypress(function(e){
    if (e.which == 13) {
      e.preventDefault();
      e.stopPropagation();
    }
  });
  
  // determining if "Previous" button was used to submit the form
  var back = false; 
  $('form button').on('click touch', function(e){
    back = $(this).parent().is('.previous');  
  });
  
  $('form').submit(function(e){
    
    $form = $(this);
    // if Previous button was used, skip validation
    if (back) return true;
    
    var invalid = [];
    
    $(this).find('fieldset').each(function(i,block){
      $block = $(block);
      // skip blocks without form elements
      if ($block.find('input, select, textarea').length == 0) return; 
      // skip arrange order blocks
      if ($block.find('.drag').length == 1) return;
      // validate all others
      if (!validate($block))
      {
        invalid.push({block:$block});
      } 
      
      $(block).on('mouseup click keyup keypress drag dragover drop', (function($block){
        return function(){
          validate($block);
        }
      })($block));
       
    });
    
    if (invalid.length > 0) {
      window.scrollTo(0, invalid[0].block.offset().top);
      e.preventDefault();
    }
    else
    {
     /* var height = $('ul.pager').height();
      $('ul.pager li').hide();
      $('ul.pager').append($('<li class="loader">&nbsp;</li>').css('height', height+'px' )); */
    }   
  
  });
  
  function validate($block) {
    
    var valid;
    
    // custom check for filled form fields
    $.extend($.expr[':'],{
      filled: function(el){
          return $(el).val() !== "";
      }
    });
    
    $.extend($.expr[':'],{
      validDate: function(el){
        var lang = datepickerlang.lang;
        if (supportsDateInput()) return $(el).val().match(/\d{4}-\d{2}-\d{2}/);
        if (lang == 'cs' || lang == 'sk' || lang == 'de' || lang == 'pl' || lang == 'ru')
          return $(el).val().match(/^\d\d?\. ?\d\d?\. ?\d\d\d\d$/);
        if (lang == 'en') return $(el).val().match(/^\d\d?\/\d\d?\/\d\d\d\d$/);
        if (lang == 'es') return $(el).val().match(/^\d\d?\/\d\d?\/\d\d\d\d$/);
        if (lang == 'pt') return $(el).val().match(/^\d\d\d\d\/\d\d?\/\d\d?$/);
        if (lang == 'br') return $(el).val().match(/^\d\d?\/\d\d?\/\d\d\d\d$/);
        if (lang == 'it') return $(el).val().match(/^\d\d?\/\d\d?\/\d\d\d\d$/);
        if (lang == 'sv') return $(el).val().match(/^\d\d?\/\d\d? \d\d\d\d$/);
        if (lang == 'hu') return $(el).val().match(/^\d\d\d\d?\.?\d\d?\.?\d\d\.$/);
        if (lang == 'nl' || lang == 'fr') return $(el).val().match(/^\d\d?-\d\d?-\d\d\d\d$/);
      }
    });
    
    if (($block.find('div.row:has(label), div.row-divide .divide-title').length < 2) && $block.is('.required'))
    {
      
      if (
        $block.find(':radio').length > 0 && $block.find(':radio:checked').length > 0
        || $block.find(':checkbox').length > 0 && $block.find(':checkbox:checked').length > 0
        || $block.find(':text').length > 0 && $block.find(':text:filled').length > 0
        || $block.find('select.form-control').length > 0 && $block.find('select.form-control:filled').length > 0
        || (($block.find('.datepicker').length > 0) && ($block.find('.datepicker:validDate').length > 0))
        || $block.find('input[type=number]').length > 0 && $block.find('input[type=number]:filled').length > 0
        || $block.find('textarea').length > 0 && $block.find('textarea:filled').length > 0
      )
      {
        valid = true;
      }
    }
    else if($block.find('div.row').length >= 2 && $block.is('.required'))
    {
        if ($block.find('.divide-points').length == 1)
        {
          valid = $block.find('.full').length > 0;   
        }
        else if ($block.find('.matrix-values').length == 1 
          || $block.find('.semantic-container').length > 0)
        {
          var validRows = [];
          $block.find('.input-group.row, .row-semantic').each(function(i, row){
            
            if ($(row).find('input').length == 0) return; 
            
            if ($(row).find(':radio, :checkbox').length > 0)
            {
                validRows.push($(row).find(':radio:checked, :checkbox:checked').length > 0)
            }
            
            if ($(row).find(':text').length > 0)
            {
                validRows.push($(row).find(':text:filled').length == $(row).find(':text').length)
            }
            
          });
          
          $.each(
            validRows, function(i, isvalid){
              if (!isvalid) { valid = false; return;}
              if (i == validRows.length - 1 && valid !== false) valid = true;  
            }
          );
          
        } 
    }
    else
    {
      valid = true;
    }
    
    var messageElement;
    if (valid) 
    {
      if ((messageElement = $block.find('.alert')).length > 0) {
        messageElement.remove();
      }
    }
    else
    {
      if ((messageElement = $block.find('.alert')).length == 0) {
        messageElement = $('<p class="alert alert-danger"></p>').text(lang.incomplete);
        $block.find('.special-padding-row').prepend(messageElement);  
      }
    } 
    try{
      if (parent.socket) 
      {
        var visible = $('body').children(':visible:not(.addthis-smartlayers,#_atssh)');
        
        var contentH = visible.last().offset().top + visible.last().height() 
          - visible.first().offset().top + 150; 
        parent.socket.postMessage(
          contentH
        );
      }
    } catch(e){}            
    return valid;
  }

	$('.require').smallipop({
    preferredPosition: 'left',
    theme: 'black',
    popupOffset: 5,
	  popupDistance: 10,
	  popupAnimationSpeed: 100,
    invertAnimation: true
  });	

	$(window).resize(function(){
		form.divide();
	});

});

