jQuery.noConflict();
jQuery(function($)
{
	if($('#results').length)
	{
            $('li.imageSearch a').lightBox({
                imageLoading: 'assetlister/images/lightbox-ico-loading.gif',
                imageBtnClose: 'assetlister/images/lightbox-btn-close.gif',
                imageBtnPrev: 'assetlister/images/lightbox-btn-prev.gif',
                imageBtnNext: 'assetlister/images/lightbox-btn-next.gif'
            });	
	}	
});