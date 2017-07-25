<div id="footer">
    <div class="container">
        <div class="twelve columns footer">
            <div class="row">
                <div id="colophonFooter">
                    <div class="colophon left">
                        <p>&copy; $Now.Year $SiteConfig.Title</p>
                    </div>
                    <div class="colophon right">
                        <p>
                            <% loop $FooterLinks %>
                            <a href="$URL" title="$LinkText">$LinkText</a><% if Last %><% else %>&nbsp;|&nbsp;<% end_if %>        
                            <% end_loop %>
                        </p>
                    </div>            
                </div>
                <div id="cloudLogo">
                    <a href="http://suffolk.cloud"><img src = "mysite/images/cloud_footer_logo.png" alt = "suffolk cloud" /></a>
                </div>
            </div>
        </div>
    </div>
</div>
