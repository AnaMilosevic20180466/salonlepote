$('#prikazi').click(function () {
    const checked = $('input[name=checked-donut]:checked'); //kupimo koji red iz tabele je korisnik selektovao
   // console.log(checked.val());
    request = $.ajax({
        url: 'handler/get.php', 
        type: 'post',
        data: { 'id': checked.val() },
        dataType: 'json'
    });
   
    //console.log(request);
    request.done(function (response, textStatus, jqXHR) {
    
       
        $('#modelPreview').text(response[0]['naziv']);
        console.log(response[0]['naziv']);

        $('#cena').text("      "+response[0]['cena'].trim());
        console.log(response[0]['cena'].trim());

        $('#opis').text("      "+response[0]['opis']);
        console.log(response[0]['opis'] );

        $('#kozmeticar').text("      "+response[0]['ime']+" "+response[0]['prezime']);
        console.log(response[0]['ime']+" "+response[0]['prezime']);
 

      

        $('#id').val(checked.val());

 

    //ovako cemo dodati sliku ako bude trebalo

         if (response[0]['naziv'].toUpperCase().includes("LICE") ||response[0]['naziv'].toUpperCase().includes("LICA")  ) {
            document.getElementById("Img").src = 'slike/lice.jpg';
         } else if (response[0]['naziv'].toUpperCase().includes("MASAZA")) {
             document.getElementById("Img").src = 'slike/masaza.jpg';
          } else if (response[0]['naziv'].toUpperCase().includes("CELULIT")) {
            document.getElementById("Img").src = 'img/celulit.png';
       }
         else {
            document.getElementById("Img").src = 'http://placehold.it/100x100';
        }

      
    });

    request.fail(function (jqXHR, textStatus, errorThrown) {
        console.error('The following error occurred: ' + textStatus, errorThrown);
    });

});