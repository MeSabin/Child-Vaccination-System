
        // Modal js code for profile(ProfileModal.css)
        var dropdown = document.querySelector('.dropdown');
        var overlay = document.querySelector('.overlay1');
        var popup = document.querySelector('.popup');
        var cancel =document.querySelector('.close');

         dropdown.onclick =function() {
             overlay.style.display = 'block';
             popup.style.display = 'block';
         }
         cancel.onclick =function() {
            hide();
         }
    
         overlay.onclick =function() {
            hide();
         }
    
         function hide() {
             overlay.style.display = 'none';
             popup.style.display = 'none';
         }
    

