<% if ImageLinks %>
<% loop ImageLinks %>
<div class="imageLink $EvenOdd">
    <a href="$LinkPage.Link" alt="$Title" title="$Title" ><img src="<% loop LinkImage %><% loop CroppedImage(450,450) %>$URL<% end_loop %><% end_loop %>" /></a>
    <div class="imageLinkText">
        <a href="$LinkPage.Link" alt="$Title" title="$Title" >            
        <h2>$Title</h2>
        <h1>$Content</h1>
        </a>
    </div>
</div>
<% end_loop %>
<% end_if %>  