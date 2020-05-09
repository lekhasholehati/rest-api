// Dari Object ke JSON pake json.stringify

// let mahasiswa = {
// 	nama :"lekha sholehati",
// 	npm : "12334433"
// }

// console.log(JSON.stringify(mahasiswa));

// cara ambil json dengan ajax

// let xhr = new XMLHttpRequest();
// xhr.onreadystatechange = function() {
// 	if (xhr.readyState == 4 && xhr.status == 200) {
// 		let mahasiswa = JSON.parse(this.responseText);
// 		console.log(mahasiswa);
// 	}
// }

// xhr.open('GET', 'coba.json', true);
// xhr.send();

// cara ambil data json pake jquery

$.getJSON('coba.json', function(data){
	console.log(data);

});