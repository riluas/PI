document.addEventListener('DOMContentLoaded', () => {
    $("#btnLogin").click(function(event) {

        //Fetch form to apply custom Bootstrap validation
        var form = $("#formLogin")
    
        if (form[0].checkValidity() === false) {
          event.preventDefault()
          event.stopPropagation()
        }
        
        form.addClass('was-validated');
      });

      document.getElementById("cerrar").onclick=()=>  document.getElementById("session").style.display = "none";
      document.getElementById("inicio").onclick=()=>  document.getElementById("session").style.display = "inherit";
      


})