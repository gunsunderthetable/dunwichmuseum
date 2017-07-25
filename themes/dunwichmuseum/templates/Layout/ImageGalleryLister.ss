<div class="twelve columns">
    <div id="contentWrap" class="clearFix">
        $Breadcrumbs 
        <div class="pageContent">
            <h1>$Title</h1>
            <div id="imageGallerytLister">
                <ul>
                    <% loop GalleryImages %>
                    <% if $ClassName == "Image" %>
                    <li>
                        <a href="$SetRatioSize(800,540).URL" title="$Title">
                <img src="$CroppedImage(330,250).URL" alt="$Title"/>
                    </a>                            
                    </li>
                    <% end_if %>
                    <% end_loop %>
                </ul>
            </div> 
            $Form
            $PageComments
        </div>
        <div class="rightPanel">
            <% include SubNav %>
            $MyWidgetArea
            <% include ImageLinks %>
        </div>
    </div>        
</div>

<% require css("assetlister/css/jquery.lightbox-0.5.css") %>
<% require javascript("assetlister/javascript/jquery.lightbox-0.5.pack.js") %>
<% require javascript("assetlister/javascript/imageGallery.js") %>

