
<div class="twelve columns">
    <div id="contentWrap" class="clearFix">
        $Breadcrumbs 
        <div class="pageContent">
            $Title
            <div id="researchSearch">
                $ResearchSearchForm
            </div>
            <% if $Reset %>
                <h1>YOU HAVE reset the form</h1>
            <% end_if %>
            <% if Results.Count %>
                <p>$Results.Count records found.</p>
                <ul id="results">
                    <% loop Results %>
                    <li class="$FirstLast imageSearch clearFix">
                        <% if $ResearchImageID %>
                            <% with $ResearchImage %>
                            <a href="$SetRatioSize(800,540).URL" title="$Title">
                            <img src="$CroppedImage(200,220).URL" alt="$Title" title="$Title" />
                            </a>
                            <% end_with %>
                        <% end_if %>
                        <h3>$Title</h3>
                        $Description <p><strong>Period: </strong>$PeriodNames</br><strong>Topic: </strong>$TopicNames<% if $Locate %><br><strong>Location: </strong>$Locate<% end_if %></p>
                    </li>
                     <% end_loop %>
                </ul>
            <% else %>
                <p>Sorry, your search query did not return any results</p>
            <% end_if %>

            $Form
            $PageComments
        </div>
    </div>        
</div>

<%-- important - PO5525455302 borrows lightbox from the asset-lister, uses it's own init file from the theme/javascript --%>

<% require css("assetlister/css/jquery.lightbox-0.5.css") %>
<% require javascript("assetlister/javascript/jquery.lightbox-0.5.pack.js") %>
<% require javascript("themes/dunwichmuseum/javascript/research_results.js") %>