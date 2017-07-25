
<div class="twelve columns">
    <div class="row">
     $Breadcrumbs 
    </div>
    <div id="standardPage">
        <div class="pageContent">
            <h1>$Title</h1>
            <% with CurrentDate %>
            <p class="dates">$DateRange<% if StartTime %> $TimeRange<% end_if %></p>
            <% end_with %>
            <p><strong>Location: </strong>$Location</p>
            <p class="shareBlogStory">
                <span>Share this article:</span><a href="https://twitter.com/home?status={$AbsoluteLink}" target="_blank"><img src ="$ThemeDir/images/twitter_colour.png" alt="share on twitter" title="share on twitter" /></a>
                <a href="https://www.facebook.com/sharer/sharer.php?u={$AbsoluteLink}" target="_blank"><img src ="$ThemeDir/images/facebook_colour.png" alt="share on facebook" title="share on facebook" /></a>
            </p>
            $Content

            <% if OtherDates %>
            <div class="event-calendar-other-dates">
              <h4><% _t('CalendarEvent.ADDITIONALDATES','Additional Dates for this Event') %></h4>
              <ul>
                <% loop OtherDates %>
                <li><a href="$Link" title="$Event.Title">$DateRange<% if StartTime %> $TimeRange<% end_if %></a></li>
                <% end_loop %> 
              </ul>
            </div>
            <% end_if %>
            $Form
            $PageComments            
        </div>

 
        <div class="rightPanel">
            $CalendarWidget
            $MonthJumper
            <h3>Go to...</h3>
            <% include QuickNav %>                
            $MyWidgetArea
            <% include ImageLinks %>
        </div>
    </div>
</div>