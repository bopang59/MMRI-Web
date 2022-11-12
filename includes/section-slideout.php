<div id ="slideout-button" class="">
    <i class="fas fa-caret-left"></i>

    <h1>Page Contents</h1>

</div>
         
<div id="slideout-bar">

    <div id="slideout-tab">
        <div id="slideout-logo">
            <img src="./img/U-M_Logo-Square.png" alt="">
        </div>
        <div id="toc">
            <h1>Page Contents</h1>
            <ul>
                <li>
                    <a href="#banner-container">Affiliate Quicklinks</a>
                </li>
                <li>
                    <a href="#mission-statment-container">Our Vision</a>
                </li>
                <li>
                    <a href="#recentNews">Recent News</a>
                </li>
                <li>
                    <a href="#cores">MMRI Cores</a>
    
                </li>
                <li>
                    <a href="#banner-bottom">Contact MMRI</a>
                </li>
                
            </ul>
    
        </div>



        <div id="ql">
            <h1>Quick Links</h1>
                <ul>
                    <li>
                        <a href="#">Home</a>
                    </li>
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Capabilities</a>
        
                    </li>
                    <li>
                        <a href="#">News</a>
                    </li>
                    <li>
                        <a href="#">Affiliates</a>
                    </li>
                    <li>
                        <a href="#">My Account</a>
                    </li>
                </ul>
        </div>

    </div>



</div>
<!--slideout toc controls-->
<script>

    slideoutButton = document.getElementById("slideout-button");
    slideoutBar = document.getElementById("slideout-bar");

    slideoutButton.addEventListener('click', function(){
       
            slideoutBar.classList.toggle("active");
            slideoutButton.classList.toggle("active")
      
    });

  
</script>