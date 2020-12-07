/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Isolle ruudulle/vaakanäytölle kuvasuhde 4:1 ja pystynäytöille/mobiiliin 2.76:1 (Ultra panvision).

var desktopAspectHeight = 1;
var desktopAspectWidth = 4;
var mobileAspectHeight = 1;
var mobileAspectWidth = 2.76;
var socialHeights = [500,500,500];
var socialWidths = [500,360,360];
var breakpoints = [1200,992,768]; // voi laittaa 720 jos siltä tuntuu ja pienempiä

$(document).ready(function ()
{
    resizeVideo();
    resizeSocial();
});

/*$(window).on('load', function ()
{
    resizeSocial();
});*/

/*$('[id*=twitter-widget-0]').on('load',function()
{
   resizeSocial();
   $(".debug").text("Latasin iframen.")
});*/

$( window ).resize(function()
{
    resizeVideo();
    resizeSocial();
});

function getSocialElementHeight(screenWidth)
{
    if(screenWidth>=breakpoints[0])
    {
        return socialHeights[0];
    }
    else if(screenWidth>=breakpoints[1])
    {
        return socialHeights[1];
    }
    else if(screenWidth>=breakpoints[2])
    {
        return socialHeights[2];
    }
    else
    {
      return socialHeights[2];
    }
}

function getSocialElementWidth(screenWidth)
{
    if(screenWidth>=breakpoints[0])
    {
        return socialWidths[0];
    }
    else if(screenWidth>=breakpoints[1])
    {
        return socialWidths[1];
    }
    else if(screenWidth>=breakpoints[2])
    {
        return socialWidths[2];
    }
    else
    {
      return socialWidths[2];
    }
}

function getInstagramHTMLCode(rows)
{

}

function resizeVideo()
{
    if($(window).width() < $(window).height())
    {
        aspectHeight = mobileAspectHeight;
        aspectWidth = mobileAspectWidth;
        //$(".debug").text("Mobile, because width: " + window.width + " and height: " + window.height);
    }
    else
    {
        aspectHeight = desktopAspectHeight;
        aspectWidth = desktopAspectWidth;
        //$(".debug").text("Desktop, because width: " + window.width + " and height: " + window.height);
    }

    var width = $(window).width();
    var newHeight = width*(aspectHeight/aspectWidth);


    $(".videojumbotron").css("height",newHeight);
    $(".container p").text("Aspect ratio: " + reduceRatio(width,newHeight));
    $(".content").css("top",newHeight+10);
    $(".container").css("top",-(newHeight*0.8125));
}



function resizeSocial()
{
    $(".twitter").html("<p>"+getSocialElementWidth($(window).width())+" & "+getSocialElementHeight($(window).width())+"</p>");
    // tähän joku juttu jolla tarkistaa meneekö nuo viestit oikein tossa alla.
    $(".twitter").html('<a class="twitter-timeline" data-lang="fi" data-width="'+getSocialElementWidth($(window).width())+'" data-height="'+getSocialElementHeight($(window).width())+'" data-theme="dark" href="https://twitter.com/baaricon?ref_src=twsrc%5Etfw">Tweets by baaricon</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>');

    $(".instagram").css("width",getSocialElementWidth($(window).width()));
    $(".instagram").css("height",getSocialElementHeight($(window).width()));
}




// ei liity mihinkään muuhun ku aspect ration näyttämiseen.
function isInteger(value)
{
        return /^[0-9]+$/.test(value);
}

function reduceRatio(numerator, denominator)
{
    var stop = 0;
    var maxIterations = 10;
    while (!isInteger(numerator) || !isInteger(denominator))
    {
        numerator *= 10;
        denominator *= 10;
        ++stop;
        if (stop > maxIterations)
        {
            break;
        }
    }
    var gcd, temp, divisor;

    // from: http://pages.pacificcoast.net/~cazelais/euclid.html
    gcd = function (a, b) {
        if (b === 0)
            return a;
        return gcd(b, a % b);
    }

    // take care of the simple case
    if (numerator === denominator)
        return '1 : 1';

    // make sure numerator is always the larger number
    if (+numerator < +denominator) {
        temp = numerator;
        numerator = denominator;
        denominator = temp;
    }

    divisor = gcd(+numerator, +denominator);

    return 'undefined' === typeof temp ? (numerator / divisor) + ' : ' + (denominator / divisor) : (denominator / divisor) + ' : ' + (numerator / divisor);
}
