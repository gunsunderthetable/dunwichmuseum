<% if $Menu(2) %>
<div id="subNav" class="nav desktop">
   <h2>In this section</h2>
    <ul class="clearFix">
        <% loop Menu(2) %>
        <li>
            <a href="$Link" title="$Title" class="$LinkingMode">$MenuTitle</a>
            <% if $Children %>
            <% if $LinkOrSection = section %>
            <ul>
                <% loop $Children %>
                <li>
                    <a href="$Link" title="$Title" class="$LinkingMode">$MenuTitle</a>
                    <% if $Children %>
                    <% if $LinkOrSection = section %>
                    <ul>
                        <% loop $Children %>
                        <li>
                            <a href="$Link" title="$Title" class="$LinkingMode">$MenuTitle</a>
                                <% if $Children %>
                                <% if $LinkOrSection = section %>
                                <ul>
                                    <% loop $Children %>
                                    <li>
                                        <a href="$Link" title="$Title" class="$LinkingMode">$MenuTitle</a>
                                    </li>
                                    <% end_loop %>
                                </ul>
                                <% end_if %>
                                <% end_if %>
                        </li>
                        <% end_loop %>
                    </ul>
                    <% end_if %>
                    <% end_if %>
                </li>
                <% end_loop %>
            </ul>
            <% end_if %>
            <% end_if %>
        </li>
        <% end_loop %>
    </ul>
</div>
<% end_if %>




