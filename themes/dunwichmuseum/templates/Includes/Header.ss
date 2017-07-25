<div id="header" <% if $SiteConfig.HeaderDepth %>style="height:{$SiteConfig.HeaderDepth}px;"<% end_if %>>
    <div class="container">
        <div id="headerPanel" class="twelve columns clearFix">
            <div id="logo">
                <img src="$ThemeDir/images/logo.png" alt="logo" title ="Logo" />
            </div>
            <div id="masthead">
                <img src="$ThemeDir/images/masthead.png" alt="logo" title ="Logo" />
            </div>
            <div id="headerTools">
                <% if $HeaderLinks %> 
                <p>
                    <% loop $HeaderLinks %>
                        <a href="$URL" title="$LinkText">$LinkText</a><% if Last %><% else %>&nbsp;|&nbsp;<% end_if %>        
                    <% end_loop %>    
                </p>
                <% end_if %>
                <% if $SiteConfig.TwitterLink || $SiteConfig.FacebookLink %>
                <div id="socialButtons">
                    <% if $SiteConfig.TwitterLink %><a href="$SiteConfig.TwitterLink" target="_blank" alt="twitter"><img src ="$ThemeDir/images/twitter.png" /></a><% end_if %>
                    <% if $SiteConfig.FacebookLink %><a href="$SiteConfig.FacebookLink" target="_blank" alt="facebook"><img src ="$ThemeDir/images/facebook.png" /></a><% end_if %>
                </div>
                <% end_if %>
            </div>
        </div>  
    </div>
</div>

<div id="mobileHeader" class="mobile">
    <div class="container">
        <div id="headerPanel" class="twelve columns clearFix">
    
            <div id="logo">
                <img src="$ThemeDir/images/logo.png" alt="logo" title ="Logo" />
            </div>
            <div id="masthead">
                <img src="$ThemeDir/images/masthead.png" alt="logo" title ="Logo" />
            </div>        
            <div id="hamburger">
                <a class="menuButton mobileNav" id="sidr-menu" href="#sidr"><img src="$ThemeDir/images/mobile_menu.png" alt="mobile menu button" /></a>
            </div>    
        </div>  
    </div>
</div>

<% include MainNav %>
