function numRound(num, place){
    if(typeof(place) == 'undefined') place = 2;
    var roundIt = Math.pow(10, place);
    return Math.round(num*roundIt)/roundIt;
}

var stockUrl = 'http://query.yahooapis.com/v1/public/yql?format=json&q='+encodeURIComponent('select * from json where url="http://dev.markitondemand.com/Api/v2/Quote/json?Symbol=SBGI"');

jQuery.ajax({
    type: "GET",
    url: stockUrl,
    dataType: "jsonp"
})
.done(function( q ) {
    var stockData = q.query.results.json;
    //console.log(stockData);
    jQuery('.sbgi-facts .stock-fact:eq(1) .stock-data').html('$'+stockData.LastPrice);
    var stockChange = numRound(stockData.Change, 2);
    var stockDir = (stockChange > 0 ? 'up': 'down');
    var stockPer = numRound(stockData.ChangePercent, 2);
    jQuery('.sbgi-facts .stock-fact:eq(2) .stock-data').html('$' + stockChange+'&nbsp;<span class="fa fa-caret-'+stockDir+'"></span>');
    jQuery('.sbgi-facts .stock-fact:eq(2) .stock-title').html(stockPer+'%');
    jQuery('.sbgi-facts').show();
});
