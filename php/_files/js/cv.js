/**
 * CV
 * @require JQuery URL Parser plugin - https://github.com/allmarkedup/jQuery-URL-Parser
 */

 var slideDuration = 5;
$(document).ready(function(){
    // prevent CSS behavior
    $(".has-sub ul").removeClass('quick-access').addClass('quick-access-js');
    hideQuickAccess();

    /**
    * menu toggle
    */
    $(".has-sub").hover(
        menuMouseOn(),
        menuMouseOut()
    );

    setSearchCloseButton();
    printFriendly();
    // facetedSearch();
    // getFacetsFromFragment();

    if ($("body").hasClass("debug")) { setDebugMode(); }

    scrollToAnchor(getAnchorFromURL()); // jump at loading
    $("a[href]").click( function() {
        scrollToAnchor(getAnchor($(this).url().fparam())); // jump on link click
    });
});


/**
 * Hide the quick access menu
 *
 * @param  {boolean} hide should we hide or not
 *
 * @return {[type]} [description]
 */
 function hideQuickAccess(hide) {
    $(".quick-access-js li").attr('class', 'hide-menu');
    if (hide===true)
    {
      $(".quick-access-js").css({
        backgroundColor: 'transparent'
    });
      $(".drawer-vertical-bottom").animate({ top: '-12px'}, 250);
  }
}

/**
 * display sub-menu on mouse OVER
 *
 * @return {void}
 */
function menuMouseOn() { //When mouse rolls over
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
}


/**
 * hide the sub-menu on mouse OUT
 *
 * @return {[type]} [description]
 */
 function menuMouseOut()
{ //When mouse is removed
  $(".quick-access-js").css({
    backgroundColor: '#fff',
    border: 'thin hidden transparent'
}).removeClass('b-s-5p');
  $(".quick-access-js").delay(100).animate({
    height: ['0px', 'swing']},
    500,
    function() { hideQuickAccess(true); }
    );
  $(".drawer-vertical-bottom").css({ top: '-2px' });
}


/**
 * Filter résumé/CV
 *
 * @return {void}
 */
 function facetedSearch() {
    //   console.log("\tfacetedSearch");
    $("#faceted-search .selection").removeClass('hide'); // show select All/None buttons
    $("#faceted-search #filter").addClass('hide'); // hide submit button

    firstCall = true;
    $("#facets input").click( function (event) {  // attach filtering events
        //   console.log("\tattachEvent to:"+$(this).attr('id'));
        if ( firstCall ) {
            setFacetSize(); // update the number of item in this facet
            updateAllLinksFragment(); // include URL, languages' tab, Anchor
            setAllNonePartial(); // update the All/None/Partial button status
            //   console.log('fparam AFTER: '+$.url().fparam('show'));
        } else {
            updateView();
            setTimeout(function() { // run AT THE END (x+5ms) of the events
                // updateResumeHeight();
                setFacetSize(); // update the number of item in this facet
                updateAllLinksFragment(); // include URL, languages' tab, Anchor
                setAllNonePartial(); // update the All/None/Partial button status
                fixItemDate();
            }, //.bind(this), // needed to access $(this)
            slideDuration+5
            );
        }
    } );

    attachAllNoneHandler('#select-all-none', '#facets'); // attach select All/None event
    //  console.log('fparam BEFORE: '+$.url().fparam('show'));
    if ( firstCall )
    { selectFragmentFacets(); }
    else
    { selectAllFacets(); }

    firstCall = false;
}

/**
 * Display items belonging to any facets (same as click the 'any' button)
 *
 * @return {void}
 */
 function selectAllFacets()
 { $("#select-all-none > span:eq(1) > input").trigger('click'); }


/**
 * Hide items belonging to any facets (same as click the 'none' button)
 *
 * @return {void}
 */
 function selectNoneFacets()
 { $("#select-all-none > span:eq(2) > input").trigger('click'); }


/**
 * [setAllNonePartial description]
 */
 function setAllNonePartial()
 {
  var status = countFacetsByState();

  if (status['check']<countFacets() || status['uncheck']<countFacets())
    { $("#select-all-none > input").click(); } // Partial
if (status['check'] == countFacets())
    { selectAllFacets(); } // All
else if (status['uncheck'] == countFacets())
    { selectNoneFacets(); } // None
}



/**
 * Get the list of active facet (ids of the checked facets)
 *
 * @return {array} list of ids
 */
function getFacetByState(state) {
    var idList = $('#facets input'+state).map(function() {
        return this.id || null;
    }).get();

    return idList;
}
/**
 * List of ids of enabled facets
 *
 * @return {array} list of ids
 */
function getEnabledFacets() {
    return getFacetByState(':checked');
}
/**
 * List of ids of enabled facets
 *
 * @return {array} list of ids
 */
function getDisabledFacets() {
    return getFacetByState(':not(:checked)');
}


/**
 * Active facets requested by the URL's fragment
 *
 * @return {void} [description]
 */
 function selectFragmentFacets()
 {
  var hasFragment = $.url().fparam('show');

  if (hasFragment)
  {
    var fragmentList = hasFragment.split(',');
    $.each( fragmentList , function(idx, val) {
      $("#facets input#"+val).trigger('click');
  });
    updateAllLinksFragment(); // prevent last item to disappear
    setAllNonePartial(); // update the All/None/Partial button status
} else
{ selectAllFacets(); }
}


/**
 * Count the number of checked and unckecked facets in the form
 *
 * @return {JSON object} 2 keys: 'check', 'unckecked'
 */
 function countFacetsByState() {
    return {
        'check': getEnabledFacets().length,
        'uncheck': getDisabledFacets().length
    };
}


/**
 * Count the number of facet available in the form
 *
 * @return {integer} number of facets in the form
 */
 function countFacets() {
    return $("#facets input").length;
}



function attachAllNoneHandler(sourceSwitch, targetSwitch) {
//   console.log("\tattachAllNoneHandler");
var selectedItemsCount = 0;

$("#select-all-none > span:eq(1) > input").click( function ()
  { // #all - Check All
    $(targetSwitch+" span > input:not(:checked)").each(function () {
      checkInput($(this));
  });
});

$("#select-all-none > span:eq(2) > input").click( function ()
  { // #none - Select None
    $(targetSwitch+" span > input:checked").each(function () {
//       console.log($(this));
unCheckInput($(this));
});
});
}


/**
 * Select/Show any facet
 *
 * @return {void} [description]
 */
 function checkAll() {
    $("#facets > span > input:not(:checked))").click();
}


/**
 * Unselect/Hide any facet
 *
 * @return {void} [description]
 */
 function unCheckAll() {
    $("#facets > span > input:not(:checked))").click();
}

/**
 * Check an input field
 *
 * @param  {HTML input} input input field to check
 *
 * @return {void} [description]
 */
 function checkInput(input) {
    $(input).click().triggerHandler('click'); /* before state is changed*/
}


/**
 * Check an input field
 *
 * @param  {HTML input} input input field to check
 *
 * @return {void} [description]
 */
 function unCheckInput(input) {
    $(input).click().triggerHandler('click'); /* before state is changed*/
}
function toggleInput(input)
{ $(input).click().triggerHandler('click'); /* before state is changed*/ }


function getItemsCount()
{ return $("#resume ol.vcalendar li").length; }
function getCountByVisibilityByClass(className, visibility)
{
//   console.log("\tgetCountByVisibilityByClass: "+className+'['+visibility+']');

return $("#resume .vcalendar > li"+className+":"+visibility ).length;
}
function getVisibleCount()
{ return $("#main > section > ol > li:visible, #aside > section > dl > dd:visible, #Languages:visible").length; }
//   { return getVisibleCountByClass(''); }
function getVisibleCountByClass(className)
{ return getCountByVisibilityByClass(className, 'visible'); }

function getHiddenCount()
{ return $("#main > section > ol > li:hidden, #aside > section > dl > dd:hidden, #Languages:hidden").length; }
//   { return getHiddenCountByClass(''); }
function getHiddenCountByClass(className)
{ return getCountByVisibilityByClass(className, 'hidden'); }


function getViewSize(status)
{
  $("#main > section > ol > li:"+status+", #aside > section > dl > dd:"+status+", #Languages"+status).each(function()
      { updateItemStatus($(this)); });
}


/**
 * 1. select item's class
 * 2. keep only class in filters.All
 * 3. remove class in filters.checked # the one that won't have any effect
 * 4. count remaining classes
 *    >=2: do nothing
 *    <2: decrement facet.size
 */
 function getFacetClass(itemClass)
{// 2. keep only class in filters.All
  var filtersAll = getFacetByState(null);
  var keepClass = [];

  $.each(itemClass, function(key, val) {
    if ( $.inArray(val, filtersAll) > -1 )
    { keepClass.push(val); }  // add to keepClass
});

  return keepClass;
}

function getCheckedClass(keepClass)
{// 3. remove class in filters.uncheck # the one that won't have any effect
    var filtersChecked = getEnabledFacets();
    var checkedClass = [];

    $.each(keepClass, function(key, val) {
        if ( $.inArray(val, filtersChecked) > -1 )
        { checkedClass.push(val); } // add to checkedClass
    });

    return checkedClass;
}

function getCountOperator(checked)
{
  var operator = 1; // uncheck -> some item will be shown

  if (checked)
    { operator = -1; } // check -> some item will be hidden

return operator;
}

function getCountIf(facet, checked) {
  var sizeDiff = 0;
  var visibleCount = getVisibleCount();

  $("#main > section > ol > li, #aside > section > dl > dd[class], #Languages").each(function() {
    itemClass =  $(this).attr('class');
    itemClassList = $(this).attr('class').split(" "); // 1. select item's class
    keepClass = getFacetClass(itemClassList); // 2. keep only class in filters.All from step 1.
    checkedClass = getCheckedClass(keepClass); // 3. keep only class in filters.checked from step 2. Only one item, egal to the facet we are computing

//     console.log('facetCnt: '+facetCnt++);

    if (checkedClass==facet.attr('id'))// && checkedClass.length == 1)
    {// working with a checked/visible FACET and item will be affected
      if ($(this).is(":visible"))
      {// item will DISAPPEAR if facet is unchecked
        sizeDiff--;
    }
} else
{
  if (facet.is(":not(:checked)") && $(this).is(":hidden"))
      {// working with UNchecked/hidden FACET and hidden ITEM
        if ( $.inArray(facet.attr('id'), keepClass) > -1 )
        {//  item will be affected
          sizeDiff++;
      }
  }
}
});

//   console.log('visibleCount + getCountOperator(checked) * sizeDiff');
//   console.log(visibleCount+' + '+getCountOperator(checked)+' * '+sizeDiff);
var size = visibleCount + sizeDiff;
facet.siblings('span').text('('+size+')');
}


function setFacetState(facet, requestedState)
{
//   console.log("\tsetFacetState");
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
{ return $("#facets #"+facet).is(":checked"); }

function setFacetSize()
{// Update all facet in #facets
//   console.log('setFacetSize');
$("#facets > span > input").each( function () {

    if ($(this).is(":checked")) {
      getCountIf($(this), true);
  } else
  {
      getCountIf($(this), false);
  }
});
}


function getFacetSize(facet)
{ return $('.'+facet).length; }


function getFilterPattern()
{
//   console.log("\tgetFilterPattern");
var pattern = [];

$("#facets > span > input:checked").each(function()
{
    pattern[pattern.length] = $(this).attr('id');
});

return pattern.join();
}


function getNewFragment( item )
{
  var ampersand = '';
  var previousFragmentExceptShow = getFragmentExcept( item, 'show');
  var fragment = [];
  var filters = getFilterPattern();

  if (previousFragmentExceptShow)
    { fragment.push(previousFragmentExceptShow); }

fragment.push('show='+filters);
var newFragment = fragment.join('&');

return '#'+newFragment;
}

// function getNewFragment(item)
// {
//   var ampersand = '';
//   var fragment = '';
//   var filters = getFilterPattern();
//
//   if (filters)
//   {// a filter is defined by the facet search form
//     if ($.url().fparam('lang')) // ###############################################
//     {// Query string contains other arguments
//       fragment = getFragmentExcept('show')+ampersand+'show='+filters;
//     } else
//     {
//       fragment = 'show='+filters;
//     }
//   }
//
//   return '#'+fragment;
// }

function getNewFragmentFromURL()
{
  return getNewFragment($.url());
}
function getNewFragmentFromItem( itemHref )
{
  return getNewFragment( $.url( itemHref ) );
}

function getFragmentExcept( item, arg )
{// return the fragment less the 'arg' key/value
  var fragment = []; // getLocationFragment();

  $.each( item.fparam() , function(idx, val)
  {
    var argument = '';
    if (idx != arg)
    {
      if ( val )
        { argument = idx+'='+val; }
    else
        { argument = idx; }
    fragment.push( argument );
}
});

  return fragment.join('&');
}


// function setFilterPatternAsFragment()
// {// location.hash
//   setLocationFragment(getNewFragmentFromURL());
// }

function getFacetsFromFragment()
{
//   console.log("\tgetFacetsFromFragment");
  var showFacets = $.url().fparam('show'); // create an object based of fragment

//   alert(fragment);
if (showFacets)
{
//     console.log("Got a fragment -> \n\t1. select None\n\t2. show fragment's' facets");
selectNoneFacets();
var facets = showFacets.split(',');
$.each(facets, function(key, val)
{
  checkInput('#'+val);
//       console.log('show #'+val+' ['+key+']');
});
} else {
//     console.log('No fragment');
}
}

function updateAllLinksFragment()
{
  var path = ["#menu-lang > ol#lang > li > a[href*=lang]", "#main>section>h2>a, #aside>section>h2>a"];

  setLocationFragment( getNewFragmentFromURL() );
  setFragmentTo(path);
}

function setLocationFragment(fragment)
{ // http://stackoverflow.com/questions/1822598/getting-url-hash-location-and-using-it-in-jquery
  location.hash = fragment; // return everything following the Hashtag (e.g.: #project|cog,web)
}
function getLocationFragment()
{ return location.hash; }

// function setLocationFragment(fragment)
// { // http://stackoverflow.com/questions/1822598/getting-url-hash-location-and-using-it-in-jquery
//   window.location.hash = fragment; // return everything following the Hashtag (e.g.: #project|cog,web)
// }
// function getLocationFragment()
// { return window.location.hash; }

function getAnchorFromURL()
{
  return getAnchor( $.url().fparam() );
}

function getAnchor(source)
{
  for (var first in source)
  {
    if (first != 'show')
    {
//       console.log('JUMP TO: '+first);
return first;
}
}
  return "breadcrumb"; // no valid anchor
}

function scrollToAnchor(item)
{
//   console.log("GO TO: #"+item);
var newPosition = $("#"+item).offset();
if (item != "breadcrumb")
{
    $("#"+item).css({ backgroundColor: '#fff'}).delay(150);
    $("#"+item).animate({ backgroundColor: '#e5ffcc' }, 500).delay(500);
    $("#"+item).animate({ backgroundColor: '#fff' }, 2000);
    window.scrollTo(0, newPosition.top);
}
}

function setFragmentTo(path)
{// update all fragment of element matching 'path' selector
$.each(path, function( pidx, itemPath)
  {// for each 'path' selector
  $(itemPath).each(function( iidx, val)
    {// parse each item
//       var itemHref = $(this).url();
var fullQueryString = getFullQueryString($(this));
//       var fragment = []; // getLocationFragment();
//       var ampersand = '&'; // no ampersand for the first item
//       console.log(iidx+'='+val);
var newFragment = getNewFragmentFromItem( val );
//       console.log(' ++++ getNewFragmentFromItem: '+newFragment );

$(this).attr('href', fullQueryString+newFragment);
});
});
}


function getFullQueryString(item)
{
//   console.log('queryString: '+item.url().attr('query'));
if ( ! item.url().attr('query') )
  {// no query string
    return '';
} else
  {// append question mark to query string
    return '?'+item.url().attr('query');
}
}


var counter = (function(counter) {
   var hide = 0; // This is the private persistent value
   var show = 0; // This is the private persistent value
   var defaultVal = 0;
   // The outer function returns a nested function that has access
   // to the persistent value.  It is this nested function we're storing
   // in the variable uniqueID above.
   switch(counter) {
       case 'hide':  return function() { return hide++; };
       case 'show':  return function() { return show++; };
       default:  return function() { return defaultVal++; };
   }
   return function() { return i++; };  // Return and increment
})(); // Invoke the outer function after defining it.


function hideItems(selector) {
    // $(selector).slideUp(slideDuration);
    console.log('--hide['+counter('hide')+']: '+selector);
}
function showItems(selector) {
    // $(selector).slideDown(slideDuration);
    console.log('++show['+counter('show')+']: '+selector);
}

function getSearchQuery()
{
//   console.log("\tgetSearchQuery");
var q = '';
$("#facets > span > input").each( function () {
    if ($(this).is(":checked"))
    {
      q += '.'+$(this).attr('id'); //.replace('#', '.');
  }
});

return q;
}


// function updateResumeHeight()
// {
// //   console.log("\tupdateResumeHeight");
//   var head = $("#resume > .overview").height();
//   var body = Math.max($("#resume > #main").height(), $("#resume > #aside").height() );
// //   console.log("head:", head, "+body:", $("#resume > #main").height()+'/'+$("#resume > #aside").height() , "=", head+body);
//   $("#cv").height(head+body+132);
// }

function updateView()
{
  $("#main > section > ol > li").each(function()
      { updateItemStatus($(this)); });
  $("#aside > section > dl > dd").each(function()
      { updateItemStatus($(this)); });
  $("#Languages").each(function()
      { updateItemStatus($(this)); });
}

function updateItemStatus(item)
{
  var toBeShown = $.map($("#facets > span > input:checked"), function(input) { return input.id; });
//   console.log('toBeShown:'+toBeShown);
  var show = false; // reset each item display status to hide
//   console.log( "\t\t"+item.index()+': ' +item.find('details > summary > span:eq(0)').text() +' ['+item.attr('class')+']' );
$.each(toBeShown, function(key, val)
{
//     console.log('counter: '+ cnt++);
//     console.log( "\t\t\t"+key+': '+val+'~'+item.attr('class') );
if (item.hasClass(val))
{
  item.slideDown(slideDuration);
  show = true;
      return false; // break the loop
  }
});
if (!show && item.attr('class'))
    { item.slideUp(slideDuration); }
}


function fixItemDate()
{// show or hide the date on the left of each item
//   console.log("\tfixItemDate");
var visibleSelector = "#main > section > ol.vcalendar >li:visible";
visible = $(visibleSelector);
var prevDate = 0;
var prevSection = "";

$.each(visible, function(key, val) {
    var date = $(visibleSelector+":eq("+key+") > details > .period > .dtend").text();
    var section = $(this).parents("section").attr('id');

//     console.log(prevSection+' - '+section);
if (prevSection==section || !prevSection)
{
//       console.log(prevDate+' - '+date);
if (prevDate != date)
{
    $(this).removeClass('hide-year');
} else if (prevDate == date)
      { // same date
        $(this).addClass('hide-year');
    }
}

//     console.log(key+':'+date+'['+section+']');
prevSection = section;
prevDate = date;
});
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
}, settings);

  caller = this;
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


/**
 * Mark the area visible when landing on a page
 *
 * @return {void} [description]
 */
function setDebugMode()
{
  $('<hr class="setDebugMode h768" /><hr class="setDebugMode h1024" />').appendTo('body');
  $('.setDebugMode').css({
    position: 'absolute',
    width: '99.5%',
    zIndex: '9999'
});
  $('.h768').css({top: '570px', borderTop: 'thin solid red' });
  $('.h1024').css({top: '820px', borderTop: 'thin solid blue' });
//   $('<span></span>').appendTo('.setDebugMode');
}
