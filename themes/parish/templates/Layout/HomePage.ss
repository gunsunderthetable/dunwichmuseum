<div class="row">
    <div id="pagePanel">
        <div class="sideBar homePage desktop">
            <% if $Links %>
            <div id="links" class="nav">
                <h2><% if $QuickLinksHeader %>$QuickLinksHeader<% else %>Quick Links<% end_if %></h2>
                <ul class="clearFix">
                    <% loop $Links %>
                    <li>
                        <% if $ExternalLink %>
                            <a href="$ExternalLink" title="$Title" target="_blank">$Title</a>
                        <% else %>
                            <a href="$LinkPage.Link" title="$Title">$Title</a>
                        <% end_if %>
                    </li>
                    <% end_loop %>
                </ul>

            </div>
            <% end_if %>

            <% if $Events && not $HideEvents %>
            <div id="events" class="nav clearFix">
                <h2 class="clearFix">Events</h2>
                <% include EventListForHomePage %>
                <a class="clearFix readMore" href="$EventsHolder.Link">See all events</a>
            </div>
            <% end_if %>

            <% if $News && not $HideNews %>
            <div id="news" class="nav clearFix">
                <h2 class="clearFix">News</h2>
                <% loop $News %>
                <div class="feature $FirstLast">
                    <a href="$Link"><h3>$Title</h3></a>
                    <p>$Content.FirstSentence</p>
                </div>
                <% if $First %>
                    <% if MainImageID %>
                        <div class="imgWrapper">
                        <% with $MainImage %>
                            <img class="featureImg" src="$CroppedImage(600,260).URL" alt="$Title" />
                        <% end_with %>                    
                        </div>
                    <% else %>
                        <div class="iHateSpacers"></div>
                    <% end_if %>
                <% end_if %>                    
                <% end_loop %>
                <a class="clearFix readMore" href="$NewsHolder.Link">See all news</a>
            </div>
            <% end_if %>

            
            <% include ImageLinks %>
                
            <div id="widgets">
                $MyWidgetArea
            </div>

        </div>


        <div id="homePanel">
            <% if Slides %>
            <div class="row holdsTheSlider desktop">
                <div class="flexslider loading">
                  <ul class="slides">
                    <% loop Slides %>
                        <li>
                            <img src="$SlideImage.CroppedImage(600,320).URL" alt="$Title" title="$Title" />
                            <p class="flex-caption">
                                <span>$Title</span>$Description
                                <% if $PageID || $ExternalLink %>
                                    <% if $PageID %>
                                        <% with $Page %><a href="$Link">Read more</a><% end_with %>
                                    <% else %>
                                        <a href="$ExternalLink" target="_blank">Read more</a>
                                    <% end_if %>
                                <% end_if %>
                            </p>
                        </li>
                    <% end_loop %>
                  </ul>
                </div>
            </div>
            <% end_if %>
            <h1>$Title</h1>
            <% if $Links %>
            <div id="mobileLinks">
                <div class="clearFix">
                <h2><% if $QuickLinksHeader %>$QuickLinksHeader<% else %>Quick Links<% end_if %></h2>
                <p>
                    <% loop $Links %>
                        <% if $ExternalLink %>
                            <a class="quickLinkPara $FirstLast" href="$ExternalLink" title="$Title" target="_blank">$Title</a>
                        <% else %>
                            <a class="quickLinkPara $FirstLast" href="$LinkPage.Link" title="$Title">$Title</a>
                        <% end_if %>
                    <% end_loop %>
                </p>
                </div>
            </div>            
            <% end_if %>
            $Content
        </div> 

    </div>
</div>

<% require javascript(mysite/javascript/jquery.flexslider-min.js) %>
<% require javascript(mysite/javascript/flex_init.js) %>

<% require css(mysite/css/flexslider.css) %>


