<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<style type="text/css">
#table-scroll {
width: 500px;
height: 100px;
overflow: auto;
}

table, td, th {
border: rgba(193, 193, 193, 0.48) 1px solid;
}


#fixedY{
position: relative;
top: 0;
z-index: 99;
background-color: red;
}


#fixedY table{
border-collapse: collapse;
width: 900px;
}


#fixedY table th, #fixedY table td {
width: 25%;
}


#fixedY table th {
background-color: red;
font: bold 15px Tahoma, Geneva, sans-serif;
color: rgb(255, 255, 255);
}


#cuerpoDatos {
width: 900px;
}

#cuerpoDatos > div{
float: left;
}


#cuerpoDatos > div#fixedX{
width: 25%;
position: relative;
left: 0;
z-index: 98;
background-color: yellow;
}

#cuerpoDatos > div#fixedX table{
border-collapse: collapse;
width: 100%;
}


#cuerpoDatos > div#nofixedX{
width: 75%;
}

#cuerpoDatos > div#nofixedX table{
border-collapse: collapse;
width: 100%;
}

#cuerpoDatos > div#nofixedX table td {
width: 33%;
}
</style>
<script type="text/javascript">
function fnc() {
document.getElementById('table-scroll').onscroll = function() {

document.getElementById('fixedY').style.top = document.getElementById('table-scroll').scrollTop + 'px';
document.getElementById('fixedX').style.left = document.getElementById('table-scroll').scrollLeft + 'px';

};
}

window.onload = fnc;
</script>
</head>
<body>

<div id="table-scroll">

<div id="fixedY">
<table>
<thead>
<tr>
<th>Lote</th><th>Producto 1</th><th>Producto 2</th><th>Producto 3</th>
</tr>
</thead>
</table>
</div>

<div id="cuerpoDatos">




<div id="nofixedX">
<table>
<tbody>
<tr>
<td>moto</td><td>avión</td><td>barco</td>
</tr>
<tr>
<td>moto</td><td>avión</td><td>barco</td>
</tr>
<tr>
<td>moto</td><td>avión</td><td>barco</td>
</tr>
<tr>
<td>moto</td><td>avión</td><td>barco</td>
</tr>
<tr>
<td>moto</td><td>avión</td><td>barco</td>
</tr>
<tr>
<td>moto</td><td>avión</td><td>barco</td>
</tr>
<tr>
<td>moto</td><td>avión</td><td>barco</td>
</tr>
<tr>
<td>moto</td><td>avión</td><td>barco</td>
</tr>
<tr>
<td>moto</td><td>avión</td><td>barco</td>
</tr>
</tbody>
</table>
</div>

</div>

</div>

</body>
</html>