
<div class="twelve columns">
    <div id="contentWrap" class="clearFix">
        $Breadcrumbs 
        <div class="pageContent">
            <h1>$Title</h1>
            <% if Results.Count %>
                <p>$Results.Count records found.</p>
                <ul id="results">
                    <% loop Results %>
                    <li class="$FirstLast imageSearch clearFix">
                        <% if $ResearchImageID %>
                            <img src="$ResearchImage.CroppedImage(200,220).URL" alt="$Title" title="$Title" />
                        <% end_if %>
                        <h3>$Title</h3>
                        $Description <p><strong>Period: </strong>$PeriodNames</br><strong>Topic: </strong>$TopicNames</p>
                    </li>
                     <% end_loop %>
                </ul>
            <% else %>
                <p>Sorry, your search query did not return any results</p>
            <% end_if %>

            <h2>Search again</h2>
            <div id="researchSearch">
                $ImageSearchForm
            </div>
            $Form
            $PageComments
        </div>
    </div>        
</div>