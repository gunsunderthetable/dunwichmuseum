<div class="twelve columns">
    <div class="row">
     $Breadcrumbs 
    </div>    
    <div class="row">
        <div id="standardPage">
                <div id="landingText">
                    <h1>$Title</h1>
                    <p><strong>$Intro</strong></p>
                </div>
                <div id="grid">
                <% loop Children %>
                    <div class="box lander $EvenOdd desktop-$Modulus(5) mobile-$Modulus(2) tablet-$Modulus(3)" onclick="location.href='$Link';">
                        <div class="boxText">
                            <h2>$Title</h2>
                        </div>
                    </div>                    
                <% end_loop %>
                </div>
                <div id="landingPageContent">
                    $Content
                </div>
        </div>
            
    </div>  
</div>