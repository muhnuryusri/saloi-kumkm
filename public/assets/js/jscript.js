//  <!-- waktu -->
{/* <script> */}
$(document).ready(function(){
    $("#test").hide();
    $("#tutup").change(function(){
        $("#test").toggle();
        $("#ttp").toggle();
        
        if(test.style.display == "none"){
            $("#waktu_senin").val("Tutup")
        }
        else {
            $resulta= $("#jam_buka").val();
            $resultb= $("#jam_tutup").val();
            $("#waktu_senin").val($resulta +' - '+ $resultb)
            $("#jam_buka").change(function(){
                $resulta= $("#jam_buka").val();
                $resultb= $("#jam_tutup").val();
                $("#waktu_senin").val($resulta +' - '+ $resultb)
            });
            $("#jam_tutup").change(function(){
                $resulta= $("#jam_buka").val();
                $resultb= $("#jam_tutup").val();
                $("#waktu_senin").val($resulta +' - '+ $resultb)
            });
        }
    });
    
});
$(document).ready(function(){
    $("#waktu2").hide();
    $("#tutup2").change(function(){
        $("#waktu2").toggle();
        $("#ttp2").toggle();
        
        if(waktu2.style.display == "none"){
            $("#waktu_selasa").val("Tutup")
        }
        else {
            $resulta= $("#jam_buka2").val();
            $resultb= $("#jam_tutup2").val();
            $("#waktu_selasa").val($resulta +' - '+ $resultb)
            $("#jam_buka2").change(function(){
                $resulta= $("#jam_buka2").val();
                $resultb= $("#jam_tutup2").val();
                $("#waktu_selasa").val($resulta +' - '+ $resultb)
            });
            $("#jam_tutup2").change(function(){
                $resulta= $("#jam_buka2").val();
                $resultb= $("#jam_tutup2").val();
                $("#waktu_selasa").val($resulta +' - '+ $resultb)
            });
        }
    });
    
});
$(document).ready(function(){
    $("#waktu3").hide();
    $("#tutup3").change(function(){
        $("#waktu3").toggle();
        $("#ttp3").toggle();
        
        if(waktu3.style.display == "none"){
            $("#waktu_rabu").val("Tutup")
        }
        else {
            $resulta= $("#jam_buka3").val();
            $resultb= $("#jam_tutup3").val();
            $("#waktu_rabu").val($resulta +' - '+ $resultb)
            $("#jam_buka3").change(function(){
                $resulta= $("#jam_buka3").val();
                $resultb= $("#jam_tutup3").val();
                $("#waktu_rabu").val($resulta +' - '+ $resultb)
            });
            $("#jam_tutup3").change(function(){
                $resulta= $("#jam_buka3").val();
                $resultb= $("#jam_tutup3").val();
                $("#waktu_rabu").val($resulta +' - '+ $resultb)
            });
        }
    });
    
});
$(document).ready(function(){
    $("#waktu4").hide();
    $("#tutup4").change(function(){
        $("#waktu4").toggle();
        $("#ttp4").toggle();
        
        if(waktu4.style.display == "none"){
            $("#waktu_kamis").val("Tutup")
        }
        else {
            $resulta= $("#jam_buka4").val();
            $resultb= $("#jam_tutup4").val();
            $("#waktu_kamis").val($resulta +' - '+ $resultb)
            $("#jam_buka4").change(function(){
                $resulta= $("#jam_buka4").val();
                $resultb= $("#jam_tutup4").val();
                $("#waktu_kamis").val($resulta +' - '+ $resultb)
            });
            $("#jam_tutup4").change(function(){
                $resulta= $("#jam_buka4").val();
                $resultb= $("#jam_tutup4").val();
                $("#waktu_kamis").val($resulta +' - '+ $resultb)
            });
        }
    });
    
});
$(document).ready(function(){
    $("#waktu5").hide();
    $("#tutup5").change(function(){
        $("#waktu5").toggle();
        $("#ttp5").toggle();
        
        if(waktu5.style.display == "none"){
            $("#waktu_jumat").val("Tutup")
        }
        else {
            $resulta= $("#jam_buka5").val();
            $resultb= $("#jam_tutup5").val();
            $("#waktu_jumat").val($resulta +' - '+ $resultb)
            $("#jam_buka5").change(function(){
                $resulta= $("#jam_buka5").val();
                $resultb= $("#jam_tutup5").val();
                $("#waktu_jumat").val($resulta +' - '+ $resultb)
            });
            $("#jam_tutup5").change(function(){
                $resulta= $("#jam_buka5").val();
                $resultb= $("#jam_tutup5").val();
                $("#waktu_jumat").val($resulta +' - '+ $resultb)
            });
        }
    });
    
});
$(document).ready(function(){
    $("#waktu6").hide();
    $("#tutup6").change(function(){
        $("#waktu6").toggle();
        $("#ttp6").toggle();
        
        if(waktu6.style.display == "none"){
            $("#waktu_sabtu").val("Tutup")
        }
        else {
            $resulta= $("#jam_buka6").val();
            $resultb= $("#jam_tutup6").val();
            $("#waktu_sabtu").val($resulta +' - '+ $resultb)
            $("#jam_buka6").change(function(){
                $resulta= $("#jam_buka6").val();
                $resultb= $("#jam_tutup6").val();
                $("#waktu_sabtu").val($resulta +' - '+ $resultb)
            });
            $("#jam_tutup6").change(function(){
                $resulta= $("#jam_buka6").val();
                $resultb= $("#jam_tutup6").val();
                $("#waktu_sabtu").val($resulta +' - '+ $resultb)
            });
        }
    });
    
});
$(document).ready(function(){
    $("#waktu7").hide();
    $("#tutup7").change(function(){
        $("#waktu7").toggle();
        $("#ttp7").toggle();
        
        if(waktu7.style.display == "none"){
            $("#waktu_minggu").val("Tutup")
        }
        else {
            $resulta= $("#jam_buka7").val();
            $resultb= $("#jam_tutup7").val();
            $("#waktu_minggu").val($resulta +' - '+ $resultb)
            $("#jam_buka7").change(function(){
                $resulta= $("#jam_buka7").val();
                $resultb= $("#jam_tutup7").val();
                $("#waktu_minggu").val($resulta +' - '+ $resultb)
            });
            $("#jam_tutup7").change(function(){
                $resulta= $("#jam_buka7").val();
                $resultb= $("#jam_tutup7").val();
                $("#waktu_minggu").val($resulta +' - '+ $resultb)
            });
        }
    });
    
});
// </script>
