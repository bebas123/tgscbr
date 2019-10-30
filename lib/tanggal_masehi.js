Masehi = new Date();
var hari = new Array("Minggu","Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu");
var bulan = new Array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
var tanggal = ((Masehi.getDate()<10) ? "0" : "") + Masehi.getDate();
document.write(hari[Masehi.getDay()] + ", " + tanggal + " " + bulan[Masehi.getMonth()] + " " + Masehi.getFullYear());