
          // Modal js code for logout(dash.css)
          function showModal(){
            document.querySelector('.overlay').classList.add('showOverlay');
            document.querySelector('.confirmLogout').classList.add('showLogout');
          }
          function closeModal(){
            document.querySelector('.overlay').classList.remove('showOverlay');
            document.querySelector('.confirmLogout').classList.remove('showLogout');
          }

          const btnLogin= document.querySelector('.logout');
          btnLogin.addEventListener("click",showModal);

          const cancelLogout= document.querySelector('.cancelbutton');
          cancelLogout.addEventListener("click",closeModal);
          
          const clickToCancel= document.querySelector('.overlay');
          clickToCancel.addEventListener("click",closeModal);
