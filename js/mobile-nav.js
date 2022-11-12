

mobilenavmenu = document.getElementsByClassName("mobile-nav")[0];
menuIcon = document.getElementById("menu-icon");
  //Mobile NAV Menu functions

        menuIcon.addEventListener('click', function () {
            if (mobilenavmenu.style.opacity == '1') {
                mobilenavmenu.style.opacity = '0';
                mobilenavmenu.style.pointerEvents = 'none';
            } else {
                mobilenavmenu.style.opacity = '1';
                mobilenavmenu.style.pointerEvents = 'auto';
            }

        
    
});