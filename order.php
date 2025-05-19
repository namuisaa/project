<?php
$location = array ("Taplejung","Terhrathum","Panchthar","Sankhuwasabha","Solukhumbu","Bhojpur","Khotang","Ilam","Udayapur","Okhaldhunga","Jhapa","Dhankuta","Morang","Sunsari","Parsa","Bara","Rautahat","Sarlahi","Mahottari","Dhanusha","Siraha","Saptari","Kathmandu","Lalitpur","Bhaktapur","Kavre","Sindhupalchowk","Dolakha","Dhading","Nuwakot","Makwanpur","Rasuwa","Ramechhap","Chitwan","Sindhuli","Kaski","Gorkha","Nawalparasi(Bardaghat Susta East)","Parbhat","Tanahu","Baglung","Myagdi","Lamjung","Syangja","Manag","Mustang","Parasi","Dang","Gulmi","Kapilvastu","Arghakharchi","Palpa","Rukum East","Pyuthan","Banke","Bardiya","Rupandehi","Rolpa","Rukum West","Mugu","Dailekh","Dolpa","Jumla","Jajarkot","Kalikot","Salyan","Surkhet","Humla","Kailali","Kanchanpur","Achham","Dadeldhura","Doti","Darchula","Bajhang","Bajura","Baitadi");
sort($location);
$length = count($location);
for($i=0; $i<$length; $i++){
    echo $location[$i];
    echo "<br>";
}
echo $i;
?>