<ul>
<% loop Events %>
    <li class="vevent clearfix">
        <h3 class="summary"><% if Announcement %>$Title<% else %>$Event.Title<% end_if %></h3>
            <% if Event.Address %><div class="address">$Event.Address</div><% end_if %>
        <p class="dates">$DateRange <% if AllDay %><% _t('ALLDAY','All Day') %><% else %><% if StartTime %>$TimeRange<% end_if %><% end_if %></p>
        <% if Announcement %>
            $Content
        <% else %>
            <% with Event %>
                <div class="event-summary">
                $Content.FirstParagraph(html)
                </div>
            <% end_with %>
            <a href="$Link"><% _t('MORE','Read more&hellip;') %></a>
        <% end_if %>
        <% if OtherDates %>
        <div class="event-calendar-other-dates">
            <h4><% _t('Calendar.ADDITIONALDATES','Additional Dates for this Event') %>:</h4>
            <ul>
                <% loop OtherDates %>
                <li><a href="$Link" title="$Event.Title">$DateRange <% if StartTime %> $TimeRange<% end_if %></a></li>
                <% end_loop %>
            </ul>
        </div>
        <% end_if %>
    </li>
<% end_loop %>
</ul>
<% if MoreEvents %>
<a href="$MoreLink" class="calendar-view-more"><% _t('Calendar.VIEWMOREEVENTS','View more events...') %></a>
<% end_if %>
