<?php


    echo"<form method='post' >
    <table>
   
    <tr><td>
    <tr><td>
    <label for=\"naam\">Artikel naam</label></td><td>
    <input type=\"text\" name=\"naam\" /></td></tr>
    <tr><td>
    <label for=\"prijs\">prijs</label></td><td>
    <input type=\"text\" name=\"prijs\" /></td></tr>
    <tr><td>
    <label for=\"extraeigenschap\">extra</label></td><td>
    <input type=\"text\" name=\"extraeigenschap\" /></td></tr>
    <tr><td>
    <label for=\"type\">Type</label></td><td>
    <input type=\"radio\" name=\"type\" value=\"brood\"/> Brood<br />
    <input type=\"radio\" name=\"type\" value=\"koek\"/> Koek<br /></td></tr>
    <tr><td>
    <label for=\"aanbieding\">Aanbieding</label></td><td>
    <input type=\"checkbox\" name=\"aanbieding\" /></td></tr>
    <tr><td>
    <input type='submit' value=\"opslaan\"></td><td>
    </td></tr></table>";


?>