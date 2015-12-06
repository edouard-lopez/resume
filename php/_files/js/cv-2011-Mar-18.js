$(document).ready(function(){
// alert('DOM loaded');
  // prevent CSS behavior
  $(".has-sub ul").removeClass('quick-access').addClass('quick-access-js');
  hideQuickAccess();
  
  function hideQuickAccess(hide)
  {
    $(".quick-access-js li").css({
      float: 'none',
      left: '-999em', 
      position: 'absolute',
    });
    if (hide==1)
    {
      $(".quick-access-js").css({
        backgroundColor: 'transparent'
      });
      $(".drawer-vertical-bottom").animate({ top: '-12px'}, 250);
    }
  }
  
  $(".has-sub").hover(
    function()
    { //When mouse rolls over
      $(".quick-access-js").css({ 
        backgroundColor: '#fff',
        border: 'thin solid #DDD',
        borderTop: 'thin hidden transparent'
      }).addClass('b-s-5p');
      $(".quick-access-js li").css({
          left: 'auto', 
          position: 'relative'
      });
      $(".quick-access-js").delay(100).animate({ height: ['7.5em', 'swing'] }, 500 );
    },
    function()
    { //When mouse is removed
      $(".quick-access-js").css({ 
        backgroundColor: '#fff',
        border: 'thin hidden transparent'
      }).removeClass('b-s-5p');
      $(".quick-access-js").delay(100).animate({ height: ['0px', 'swing']}, 500, function() {hideQuickAccess(1)});
      $(".drawer-vertical-bottom").css({ top: '-2px' });
  }
  );
 
  setSearchCloseButton();
  printFriendly();
  facetedSearch();
  if ($('body.debug').length > 0) { fold(); }

});


// FILTER RESUME/CV
function facetedSearch()
{
  $("#faceted-search .selection").removeClass('hide'); // show select All/None buttons
  $("#faceted-search #filter").addClass('hide'); // hide submit button
  
  $("#facets > span > input").click( function (event) {  // attach filtering events
//   alert('run '+$(this).attr('id'));
    updateFilter($(this));
    setTimeout(function() { // run at the end (1001ms) of the events
      setFacetSize();
      setAllNonePartial();
    }, 405);
  } );

  attachAllNoneHandler('#select-all-none', '#facets'); // attach select All/None event
    selectAllFacets();
    setFacetSize();
}

function setAllNonePartial()
{
  var check = 0;
  var uncheck = 0;
  
  $("#facets > span > input").each(function () {
    if ($(this).is(':checked'))
      { check++; } 
    else
      { uncheck++; }
  });
  
//   alert('check:'+check+' + uncheck:'+uncheck+' = total:'+getFacetsCount());
  if (check<getFacetsCount() || uncheck<getFacetsCount())
  { $("#select-all-none > input").click(); } 
  if (check == getFacetsCount())
  { $("#select-all-none > span:eq(1) > input").click(); }
  else if (uncheck == getFacetsCount())
  { $("#select-all-none > span:eq(2) > input").click(); }
}

function getFacetsCount()
  { return $('#facets > span > input').length; }

function attachAllNoneHandler(sourceSwitch, targetSwitch) 
{
  var selectedItemsCount = 0;

  $("#select-all-none > span:eq(1) > input").click( function () 
  { // #all - Check All
    $(targetSwitch+" span > input").each(function () {
// alert($(this).is(':checked'));
      if (!$(this).is(':checked'))
      {// check
        $(this).click().triggerHandler('click'); // before state is changed
      }
    });
  });
  
  
  $("#select-all-none > span:eq(2) > input").click( function () 
  { // #none - Select None
    $(targetSwitch+" span > input").each(function () {
      if ($(this).is(':checked'))
      {// UNcheck
        $(this).click().triggerHandler('click'); // before state is changed
      }
    });
  });
}
$("#facets span > input").each(function () {
    alert($(this).attr('id'));
});

function selectAllFacets()
{
    $("#select-all-none > span:eq(1) > input").trigger('click');
}

function getItemsCount()
  { return $("#resume ol.vcalendar li").length; }
function getCountByVisibilityByClass(class, visibility)
{
  if (class) 
    { class = "."+class; }
  else 
    { class = "";}
//   alert("#resume .vcalendar > li"+class+":"+visibility);
  return $("#resume .vcalendar > li"+class+":"+visibility ).length     
}  
function getVisibleCount() 
  { return getVisibleCountByClass(false); }
function getVisibleCountByClass(class)
  { return getCountByVisibilityByClass(class, 'visible'); }
  
function getHiddenCount() 
  { return getHiddenCountByClass(false); }
function getHiddenCountByClass(class)
  { return getCountByVisibilityByClass(class, 'hidden'); }


function setFacetState(facet, requestedState)
{
  if (getFacetState(facet))
  {// TRUE
    if (requestedState) { $("#facets #"+facet).trigger('click'); } // true -> false
    else {  } // true -> true
  } else
  {// FALSE
    if (!requestedState) { $("#facets #"+facet).trigger('click'); } // false -> true
    else {  } // false -> false
  }
}
function getFacetState(facet)
  { return $("#facets #"+facet).is(':checked'); }

function setFacetSize()
{// Update all facet in #facets
// alert('update Facet');
  $("#facets > span > input").each( function () {
    var size = 0;
//     alert($(this).attr('id'));
    
    if ($(this).is(':checked'))
    {// how many to hide
      size = getVisibleCount() - getVisibleCountByClass($(this).attr('id'));
    } else
    {// how many to show
      size = getVisibleCount() + getHiddenCountByClass($(this).attr('id'));
      if (size < 0)
      {
        size = getHiddenCountByClass($(this).attr('id'));
      }
    }
    
    $(this).siblings('span').text('('+size+')'); // label
  });
}
function getFacetSize(facet)
  { return $('.'+facet).length; }


function hideItems(selector)
  { $(selector).slideUp(400);  }
function showItems(selector)
  { $(selector).slideDown(400);  }

function updateFilter(item)
{
  if (item.is(':checked')==true) // state
  {// show
//     alert('++update filter: ADD items related to: '+item.attr('id')+'. Selector: '+item.attr('id'));
    showItems('.'+item.attr('id'));
  } else
  {// hide
//     alert('--update filter: REMOVE items related to: '+item.attr('id')+'. Selector: '+item.attr('id'));
    hideItems('.'+item.attr('id'));
  }
}


// PRINT PAGE
function printFriendly()
{
  $(".printer-me").click(function() 
  {
    window.print();
    return false;
  });  
}


// GOOGLE SEARCH
function setSearchCloseButton()
{
  var mouse_is_inside = false;
  window.setTimeout(function() {
    $(".gsc-search-box div.gsc-clear-button").clone(true, true).prependTo(".gsc-resultsbox-invisible");
    
    if ($(".gsc-resultsbox-visible")) 
    {
      $(".gsc-resultsbox-visible").hover(function(){ 
          mouse_is_inside=true; 
      }, function(){ 
          mouse_is_inside=false; 
      });
      $("body").mouseup(function(){ 
          if(! mouse_is_inside) $(".gsc-search-box div.gsc-clear-button").trigger('click');
      });
    }

    $(".gsc-resultsbox-invisible .gsc-clear-button").click( function (event) {
      $(".gsc-search-box div.gsc-clear-button").trigger('click');
    });
  }, 500);    
}


// PLUGINSSSSSSS
/*
 * Fade Slider Toggle plugin
 * 
 * Copyright(c) 2009, Cedric Dugas
 * http://www.position-relative.net
 *  
 * A sliderToggle() with opacity
 * Licenced under the MIT Licence
 */


 jQuery.fn.fadeSliderToggle = function(settings) {
  /* Damn you jQuery opacity:'toggle' that dosen't work!~!!!*/
   settings = jQuery.extend({
    speed:500,
    easing : "swing"
  }, settings)
  
  caller = this
  if($(caller).stop(true, true).css("display") == "none"){
    $(caller).animate({
      opacity: 1,
      height: 'toggle'
    }, settings.speed, settings.easing);
  }else{
    $(caller).stop(true, true).animate({
      opacity: 0,
      height: 'toggle'
    }, settings.speed, settings.easing);
  }
}; 

// jQuery.fn.fadeSliderToggle = function(speed, easing, callback) {
//   return this.animate({
//     opacity: 'toggle', 
//     height: 'toggle'
//   }, 
//   speed, easing, callback);
// };


function fold()
{// mark the area visible when landing on a page
  $('<hr class="fold h768" /><hr class="fold h1024" />').appendTo('body');
  $('.fold').css({
    position: 'absolute',
    width: '99.5%',
    zIndex: '9999',
  });
  $('.h768').css({top: '570px', borderTop: 'thin solid red' });
  $('.h1024').css({top: '820px', borderTop: 'thin solid blue' });
//   $('<span></span>').appendTo('.fold');
}