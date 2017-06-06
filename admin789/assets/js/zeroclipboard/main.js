// // main.js
// var client = new ZeroClipboard( $("#click-to-copy"), {
//   moviePath: "assets/js/zeroclipboard/ZeroClipboard.swf",
//               debug: false
// } );

// client.on( "load", function(client) {
//   // alert( "movie is loaded" );

//    $('#flash-loaded').fadeIn();

//     clientTarget.on( "complete", function(clientTarget, args) {
//         clientTarget.setText( args.text );
//         $('#target-to-copy-text').fadeIn();
//     } );
// } );


var clientText = new ZeroClipboard( $("#text-to-copy"), {
    moviePath: "http://www.paulund.co.uk/playground/demo/zeroclipboard-demo/zeroclipboard/ZeroClipboard.swf",
    debug: false
} );

clientText.on( "load", function(clientText)
{
    $('#flash-loaded').fadeIn();

    clientText.on( "complete", function(clientText, args) {
        clientText.setText( args.text );
        $('#text-to-copy-text').fadeIn();
    } );
} );