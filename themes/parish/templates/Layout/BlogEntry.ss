
<div class="twelve columns">
    <div class="row">
     $Breadcrumbs 
    </div>
    <div class="row">
    
        <div id="standardPage">
            <div class="pageContent">

                <div class="blogEntry">
                        <h1 class="postTitle">$Title</h1>
                        <p class="authorDate">$Date.Long</p>
                        <% if TagsCollection %>
                                <p class="tags">
                                        <% _t('BlogEntry_ss.TAGS', 'Tags:') %> 
                                        <% loop TagsCollection %>
                                                <a href="$Link" title="<% _t('BlogEntry_ss.VIEWALLPOSTTAGGED', 'View all posts tagged') %> '$Tag'" rel="tag">$Tag</a><% if not Last %>,<% end_if %>
                                        <% end_loop %>
                                </p>
                        <% end_if %>

                    </span>
                        <p class="shareBlogStory">
                        <span>Share this article:</span><a href="https://twitter.com/home?status={$AbsoluteLink}" target="_blank"><img src ="$ThemeDir/images/twitter_colour.png" alt="share on twitter" title="share on twitter" /></a>
                         <a href="https://www.facebook.com/sharer/sharer.php?u={$AbsoluteLink}" target="_blank"><img src ="$ThemeDir/images/facebook_colour.png" alt="share on facebook" title="share on facebook" /></a>
                        </p>
                        <% if $BlogImage %>
                        <div class="blogImage">
                            <% with BlogImage %>
                             <img src="$CroppedImage(600,452).URL" alt="$Title" />
                            <% end_with %>
                        </div>
                        <% end_if %>
                        <div id="blogContent">
                        $Content		
                        </div>
                </div>
	
                $Form
                $PageComments
            </div>
            <div class="rightPanel">
                $MyWidgetArea
                <% include ImageLinks %>
            </div>
        </div>
            
    </div>
        
</div>

