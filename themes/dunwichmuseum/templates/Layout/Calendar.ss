<div class="twelve columns">
    <div class="row">
     $Breadcrumbs 
    </div>
    <div class="row">
    
        <div id="standardPage">
            <div class="pageContent">
                <h1>$Title</h1>
                $Content
                <h2>$DateHeader</h2>
                <% if Events %>
                <div id="event-calendar-events">
                  <% include EventList %>
                </div>
                <% else %>
                  <p><% _t('NOEVENTS','There are no events') %>.</p>
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
        
</div>

