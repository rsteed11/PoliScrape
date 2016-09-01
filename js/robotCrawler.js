var request = require('request');
var cheerio = require('cheerio');
var URL = require('url-parse');

var START_URL = "https://history.state.gov/historicaldocuments/"
var SEARCH_WORD = "winter of 1943-44";
var MAX_PAGES_TO_VISIT = 20;

var pagesVisited = {};
var numPagesVisited = 0;
var bodyText = null;
var keepGoing = 0;
var position = null;
var positionSample = null;
var pagesToVisit = [];
var url = new URL(START_URL);
var baseUrl = url.protocol + "//" + url.hostname;

pagesToVisit.push(START_URL);
crawl();

function crawl() {
  if(numPagesVisited >= MAX_PAGES_TO_VISIT) {
    console.log("Search finished. Reach maximum page limit.");
    return;
  }
  if (keepGoing == -1) {
    console.log("Search finished.");
    return;
  }
  var nextPage = pagesToVisit.pop();
  if (nextPage in pagesVisited) {
    // Repeat crawl, since already visited.
    crawl();
  } else {
    // Unvisited page.
    visitPage(nextPage, crawl);
  }
}

function visitPage(url, callback) {
  // Add page to set.
  pagesVisited[url] = true;
  numPagesVisited++;

  // Make request.
  console.log("Visiting page " + url);
  request(url, function(error, response, body) {
     // Check status code (200 is HTTP OK).
     console.log("Status code: " + response.statusCode);
     if(response.statusCode !== 200) {
       callback();
       return;
     }
     // Parse the document body.
     var $ = cheerio.load(body);
     var isWordFound = searchForWord($, SEARCH_WORD);
     if(isWordFound) {
       console.log('Term "' + SEARCH_WORD + '" found at page ' + url +".");
       console.log("Sample: '... " + positionSample + " ...'");
       //console.log("body text: " + bodyText);
       keepGoing = -1;
     } 
     else {
       collectInternalLinks($);
     }
     callback();
  });
}
function searchForWord($, word) {
  bodyText = $('html, body').text().toString().toLowerCase().replace(/[\r\n]+/g, '\n').replace(/\s+/g," ");
  position = bodyText.search(word.toLowerCase());
  var range = 500;
  positionSample = bodyText.substr(position - range/2, range);
  return(position !== -1);
}

function collectInternalLinks($) {
    var relativeLinks = $("a[href^='/']")
    //console.log("relative links: " + relativeLinks);
    console.log("Found " + relativeLinks.length + " relative links on page.");
    relativeLinks.each(function() {
        pagesToVisit.push(baseUrl + $(this).attr('href'));
    });
    if (relativeLinks.length == 0 && pagesToVisit.length == 0) {
      keepGoing = -1;
    }
    else
    {
      keepGoing = 1;
    }
}