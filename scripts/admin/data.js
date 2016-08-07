var dataSet = [
    [ "102", "Siva Kumar" ],
    [ "103", "Gopi Raju" ],
	[ "104", "Rajesh" ],
    [ "105", "Ramesh" ],
	[ "102", "Sivaramakrishna" ],
    [ "103", "Manoj Babu" ],
	[ "104", "Ravikiran" ],
    [ "105", "Mani Teja" ],
    [ "106", "Ravikumar" ]
];
 
$(document).ready(function() {
    $('#example').DataTable( {
        data: dataSet,
        columns: [
            { title: "StudentId" },
            { title: "StudentName" },
            
        ]
    } );
} );