<div class="row">
    <div id="pagePanel">

        <div id="homePanel">
            <% if $Content %>
            <div id="contentWrap" class="clearFix homePage">
                <h1>$Title</h1>
                $Content
            </div>
            <% end_if %>        
            <% if Boxes %>
            <div id="boxes" class="clearFix">
            <% loop Boxes %>
                <div class="box $Colour">
                    <div class="content">
                        <% if $LinkPage.ID > 0 %>
                        <a href="$LinkPage.Link">
                        <% else %>
                        <a href="$ExternalLink" target="_blank">
                        <% end_if %>

                        <% if $BoxImageID %>
                            <img src="$BoxImage.CroppedImage(520,380).URL" alt="$Title" title="$Title" />
                        <% end_if %>
                        <div class="boxText $TextPosition<% if $TextShadow %> textShadow<% end_if %>">
                        <h2>$Title</h2>
                        <p>$Description</p>
                        </div>
                       </a>
                    </div>
                </div>
            <% end_loop %>
            </div>
            <% end_if %>

        </div> 

    </div>
</div>



