{*
* 2007-2022 ETS-Soft
*
* NOTICE OF LICENSE
*
* This file is not open source! Each license that you purchased is only available for 1 wesite only.
* If you want to use this file on more websites (or projects), you need to purchase additional licenses. 
* You are not allowed to redistribute, resell, lease, license, sub-license or offer our resources to any third party.
* 
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs, please contact us for extra customization service at an affordable price
*
*  @author ETS-Soft <etssoft.jsc@gmail.com>
*  @copyright  2007-2022 ETS-Soft
*  @license    Valid for 1 website (or project) for each purchase of license
*  International Registered Trademark & Property of ETS-Soft
*}
{if isset($blog_post.enabled) && $blog_post.enabled}
<script type="text/javascript">
    ybc_blog_free_report_url = '{$report_url|escape:'html':'UTF-8'}';
    ybc_blog_free_report_warning = '{l s='Do you want to report this comment?' mod='ybc_blog_free'}';
    ybc_blog_free_error = '{l s='There was a problem while submitting your report. Try again later' mod='ybc_blog_free'}';
    prettySkin = '{$prettySkin|escape:'html':'UTF-8'}';
    prettyAutoPlay = false;
</script>
<div class="ybc_blog_free_layout_{$blog_layout|escape:'html':'UTF-8'} ybc-blog-wrapper-detail" itemscope itemType="http://schema.org/BlogPosting">
    <meta itemprop="author" content="{ucfirst($blog_post.firstname)|escape:'html':'UTF-8'} {ucfirst($blog_post.lastname)|escape:'html':'UTF-8'}"/> 
    <div itemprop="publisher" itemtype="http://schema.org/Organization" itemscope="" style="display: none;">
        <meta itemprop="name" content="{Configuration::get('PS_SHOP_NAME')|escape:'html':'UTF-8'}" />
        {if Configuration::get('PS_LOGO')}
            <div itemprop="logo" itemscope itemtype="http://schema.org/ImageObject">
                <meta itemprop="url" content="{$blog_config.YBC_BLOG_FREE_SHOP_URI|escape:'html':'UTF-8'}img/{Configuration::get('PS_LOGO')|escape:'html':'UTF-8'}" />
                <meta itemprop="width" content="200px" />
                <meta itemprop="height" content="100px" />
            </div>
        {/if}
    </div>
    {if $blog_post.image}
        <div class="ybc_blog_free_img_wrapper" itemprop="image" itemscope itemtype="http://schema.org/ImageObject">
            {if $enable_slideshow}<a href="{$blog_post.image|escape:'html':'UTF-8'}" class="prettyPhoto">{/if}                            
            <img title="{$blog_post.title|escape:'html':'UTF-8'}" src="{$blog_post.image|escape:'html':'UTF-8'}" alt="{$blog_post.title|escape:'html':'UTF-8'}" itemprop="url" />
            <meta itemprop="width" content="600px" />
            <meta itemprop="height" content="300px" />
            {if $enable_slideshow}</a>{/if}
        </div>                        
     {/if}
     <div class="ybc-blog-wrapper-content">
    {if $blog_post}
        <h1 class="page-heading product-listing" itemprop="mainEntityOfPage"><span  class="title_cat" itemprop="headline">{$blog_post.title|escape:'html':'UTF-8'}</span></h1>
        <div class="post-details">
            <div class="blog-extra">
                <div class="ybc-blog-latest-toolbar">
                    {if $show_views}                  
                        <span title="{l s='Page views' mod='ybc_blog_free'}" class="ybc-blog-latest-toolbar-views">
                            {$blog_post.click_number|intval} 
                            {if $blog_post.click_number != 1}
                                <span>{l s='Views' mod='ybc_blog_free'}</span>
                            {else}
                                <span>{l s='View' mod='ybc_blog_free'}</span>
                            {/if}
                        </span>
                    {/if} 
                    {if $allow_like}
                        <span title="{if $likedPost}{l s='Liked' mod='ybc_blog_free'}{else}{l s='Like this post' mod='ybc_blog_free'}{/if}" class="ybc-blog-like-span ybc-blog-like-span-{$blog_post.id_post|intval} {if $likedPost}active{/if}"  data-id-post="{$blog_post.id_post|intval}">
                            <span class="ben_{$blog_post.id_post|intval}">{$blog_post.likes|intval}</span>
                            <span class="blog-post-like-text blog-post-like-text-{$blog_post.id_post|intval}"><span>{l s='Liked' mod='ybc_blog_free'}</span></span>
                        </span>  
                    {/if}
                    {if $allow_rating && $everage_rating}                      
                        <div class="blog_rating_wrapper" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">                            
                            {if $total_review}
                                <span title="{l s='Comments' mod='ybc_blog_free'}" class="blog_rating_reviews">
                                     <span class="total_views" itemprop="reviewCount">{$total_review|intval}</span>
                                     <span>
                                        {if $total_review != 1}
                                            {l s='Reviews' mod='ybc_blog_free'}
                                        {else}
                                            {l s='Review' mod='ybc_blog_free'}
                                        {/if}
                                    </span>
                                </span>
                            {/if}
                            <div title="{l s='Everage rating' mod='ybc_blog_free'}" class="ybc_blog_free_review">
                                <span>{l s='Rating: ' mod='ybc_blog_free'}</span> 
                                {for $i = 1 to $everage_rating}
                                    <div class="star star_on"></div>
                                {/for}
                                {if $everage_rating<5}
                                    {for $i = $everage_rating + 1 to 5}
                                        <div class="star"></div>
                                    {/for}
                                {/if}
                                <meta itemprop="worstRating" content="0"/>
                                <span class="ybc-blog-rating-value"  itemprop="ratingValue">{number_format((float)$everage_rating, 1, '.', '')|escape:'html':'UTF-8'}</span>
                                <meta itemprop="bestRating" content="5"/>                                                
                            </div>
                        </div>
                    {/if}  
                    {if $show_date}
                        {if !$date_format}{assign var='date_format' value='F jS Y'}{/if}
                        <span class="post-date">
                            <span class="be-label">{l s='Posted on' mod='ybc_blog_free'}: </span>
                            <span>{date($date_format,strtotime($blog_post.datetime_added))|escape:'html':'UTF-8'}</span>
                            <meta itemprop="datePublished" content="{date('Y-m-d',strtotime($blog_post.datetime_added))|escape:'html':'UTF-8'}" />
                            <meta itemprop="dateModified" content="{date('Y-m-d',strtotime($blog_post.datetime_modified))|escape:'html':'UTF-8'}" />
                        </span>
                    {/if}
                    {if $show_author && ($blog_post.firstname || $blog_post.lastname)}
                        <div class="author-block">
                            <span class="post-author-label">{l s='Posted by: ' mod='ybc_blog_free'}</span>
                            <a href="{$blog_post.author_link|escape:'html':'UTF-8'}">
                                <span class="post-author-name">
                                    {ucfirst($blog_post.firstname)|escape:'html':'UTF-8'} {ucfirst($blog_post.lastname)|escape:'html':'UTF-8'}
                                </span>
                            </a>
                        </div>
                    {/if}
                </div>
                <div class="ybc-blog-tags-social"> 
                {if $use_google_share || $use_facebook_share || $use_twitter_share}
                    <div class="blog-extra-item blog-extra-facebook-share">
                        {if $use_facebook_share}
                            <div class="ybc_blog_free_button_share">
                                <div id="fb-root"></div>
                                {literal}
                                    <script>(function(d, s, id) {
                                      var js, fjs = d.getElementsByTagName(s)[0];
                                      if (d.getElementById(id)) return;
                                      js = d.createElement(s); js.id = id;
                                      js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.3";
                                      fjs.parentNode.insertBefore(js, fjs);
                                    }(document, 'script', 'facebook-jssdk'));</script>
                                {/literal}
                                <div class="fb-like" data-href="{$post_url|escape:'html':'UTF-8'}" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
                            </div>
                        {/if}
                        {if $use_google_share}
                            <div class="ybc_blog_free_button_share">
                                <script src="https://apis.google.com/js/platform.js" async defer></script>                   
                                <div class="g-plusone" data-size="medium" data-href="{$post_url|escape:'html':'UTF-8'}"></div>
                            </div>
                        {/if}
                        {if $use_twitter_share}
                            <div class="ybc_blog_free_button_share">
                                <a href="https://twitter.com/share" class="twitter-share-button" data-url="{$post_url|escape:'html':'UTF-8'}">{l s='Tweet' mod='ybc_blog_free'}</a>
                                {literal}
                                    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                                {/literal}
                            </div>
                        {/if}
                    </div>   
                {/if}          
            </div>               
            </div>                           
            <div class="blog_description">
                {if $blog_post.description}
                    {$blog_post.description nofilter}
                {else}
                    {$blog_post.short_description nofilter}
                {/if}
            </div>
            {if ($show_tags && $blog_post.tags) || ($show_categories && $blog_post.categories)}
            <div class="extra_tag_cat">
                {if $show_tags && $blog_post.tags}
                    <div class="ybc-blog-tags">
                        {assign var='ik' value=0}
                        {assign var='totalTag' value=count($blog_post.tags)}
                        <span class="be-label">
                            {if $totalTag > 1}{l s='Tags' mod='ybc_blog_free'}
                            {else}{l s='Tag' mod='ybc_blog_free'}{/if}: 
                        </span>
                        {foreach from=$blog_post.tags item='tag'}
                            {assign var='ik' value=$ik+1}                                        
                            <a href="{$tag.link|escape:'html':'UTF-8'}">{ucfirst($tag.tag)|escape:'html':'UTF-8'}</a>{if $ik < $totalTag}, {/if}
                        {/foreach}
                    </div>
                {/if}
                {if $show_categories && $blog_post.categories}
                    <div class="ybc-blog-categories">
                        {assign var='ik' value=0}
                        {assign var='totalCat' value=count($blog_post.categories)}                        
                        <div class="be-categories">
                            <span class="be-label">{l s='Posted in' mod='ybc_blog_free'}: </span>
                            {foreach from=$blog_post.categories item='cat'}
                                {assign var='ik' value=$ik+1}                                        
                                <a href="{$cat.link|escape:'html':'UTF-8'}">{ucfirst($cat.title)|escape:'html':'UTF-8'}</a>{if $ik < $totalCat}, {/if}
                            {/foreach}
                        </div>
                    </div>
                {/if} 
            </div>
            {/if}
            {if $display_related_products && $blog_post.products}
                <div id="ybc-blog-related-products" class="">
                    <h4 class="title_blog">
                        {if count($blog_post.products) > 1}{l s='Related products ' mod='ybc_blog_free'}
                        {else}{l s='Related product' mod='ybc_blog_free'}{/if}
                    </h4>
                    <div class="ybc-blog-related-products-wrapper ybc-blog-related-products-list">
                        <ul class="blog-product-list product_list grid row ybc_related_products_type_{if $blog_related_product_type}{$blog_related_product_type|escape:'html':'UTF-8'}{else}default{/if}">
                            {foreach from=$blog_post.products item='product'}
                                <li class="ajax_block_product col-xs-12 col-sm-4">
                                    <div class="product-container">
                                        <div class="left-block">
                                            <a href="{$product.link|escape:'html':'UTF-8'}"><img src="{$product.img_url|escape:'html':'UTF-8'}" alt="{$product.name|escape:'html':'UTF-8'}" /></a>
                                        </div>
                                        <div class="right-block">
                                            <h5><a href="{$product.link|escape:'html':'UTF-8'}">{$product.name|escape:'html':'UTF-8'}</a></h5>
                                            <div class="blog-product-extra content_price">
                                                {if $product.price!=$product.old_price}
                                                    <span class="bp-price-old old-price"><span class="bp-price-old-label">{l s='Old price: ' mod='ybc_blog_free'}</span><span class="bp-price-old-display">{$product.old_price|escape:'html':'UTF-8'}</span></span>
                                                {/if}
                                                <span class="bp-price price product-price"><span class="bp-price-label">{l s='Price:  ' mod='ybc_blog_free'}</span><span class="bp-price-display">{$product.price|escape:'html':'UTF-8'}</span></span>
                                                {if $product.price!=$product.old_price}
                                                    <span class="bp-percent price-percent-reduction"><span class="bp-percent-label">{l s='Discount: ' mod='ybc_blog_free'}</span><span class="bp-percent-display">-{$product.discount_percent|escape:'html':'UTF-8'}{l s='%' mod='ybc_blog_free'}</span></span>
                                                    <span class="bp-save"><span class="bp-save-label">{l s='Save up: ' mod='ybc_blog_free'}</span><span class="bp-save-display">-{$product.discount_amount|escape:'html':'UTF-8'}</span></span>
                                                {/if}
                                            </div>
                                            {if $product.short_description}
                                                <div class="blog-product-desc">
                                                    {$product.short_description|strip_tags:'UTF-8'|truncate:80:'...'|escape:'html':'UTF-8'}
                                                </div>
                                            {/if}
                                        </div>
                                    </div>
                                </li>
                            {/foreach}
                        </ul>
                    </div>
                </div>
            {/if}
            <div class="ybc-blog-wrapper-comment">          
                {if $allowComments}
                    <div class="ybc_comment_form_blog">
                        <h4 class="title_blog">{l s='Leave a comment' mod='ybc_blog_free'}</h4>
                        <div class="ybc-blog-form-comment">                   
                            {if $hasLoggedIn}
                                <form action="{$blogCommentAction|escape:'html':'UTF-8'}" method="post">
                                    <div class="blog-comment-row blog-title">
                                        <label for="bc-subject">{l s='Subject ' mod='ybc_blog_free'}</label>
                                        <input class="form-control" name="subject" id="bc-subject" type="text" value="{if isset($subject)}{$subject|escape:'html':'UTF-8'}{/if}" />
                                    </div>                                
                                    <div class="blog-comment-row blog-content-comment">
                                        <label for="bc-comment">{l s='Comment ' mod='ybc_blog_free'}</label>
                                        <textarea   class="form-control" name="comment" id="bc-comment">{if isset($comment)}{$comment|escape:'html':'UTF-8'}{/if}</textarea>
                                    </div>
                                    <div class="blog-comment-row flex_space_between">
                                    {if $allow_rating || $use_capcha}
                                        <div class="blog-rate-capcha">
                                            {if $allow_rating}                            
                                                <div class="blog-rate-post">
                                                    <label>{l s='Rating: ' mod='ybc_blog_free'}</label>
                                                    <div class="blog_rating_box">
                                                        {if $default_rating > 0 && $default_rating <5}
                                                            <input id="blog_rating" type="hidden" name="rating" value="{$default_rating|intval}" />
                                                            {for $i = 1 to $default_rating}
                                                                <div rel="{$i|intval}" class="star star_on blog_rating_star blog_rating_star_{$i|intval}"></div>
                                                            {/for}
                                                            {for $i = $default_rating + 1 to 5}
                                                                <div rel="{$i|intval}" class="star blog_rating_star blog_rating_star_{$i|intval}"></div>
                                                            {/for}
                                                        {else}
                                                            <input id="blog_rating" type="hidden" name="rating" value="5" />
                                                            {for $i = 1 to 5}
                                                                <div rel="{$i|intval}" class="star star_on blog_rating_star blog_rating_star_{$i|intval}"></div>
                                                            {/for}
                                                        {/if}
                                                    </div>
                                                </div>
                                            {/if}
                                            {if $use_capcha}
                                                <div class="blog-capcha">
                                                    <label for="bc-capcha">{l s='Security code: ' mod='ybc_blog_free'}</label>
                                                    <span class="bc-capcha-wrapper">
                                                        <img rel="{$blog_random_code|escape:'html':'UTF-8'}" id="ybc-blog-capcha-img" src="{$capcha_image|escape:'html':'UTF-8'}" />
                                                        
                                                        <input class="form-control" name="capcha_code" type="text" id="bc-capcha" value="" />
                                                        <span id="ybc-blog-capcha-refesh" title="{l s='Refresh code' mod='ybc_blog_free'}">{*l s='Refresh code'*}</span>
                                                    </span>
                                                </div>
                                            {/if}
                                        </div>
                                    {/if}
                                    <div class="blog-submit">
                                        <input class="button" type="submit" value="{l s='Submit Comment' mod='ybc_blog_free'}" name="bcsubmit" />
                                    </div>       
                                    </div>                
                                    {if $blog_errors && is_array($blog_errors)}
                                        <ul class="alert alert-danger ybc_alert-danger">
                                            {foreach from=$blog_errors item='error'}
                                                <li>{$error|escape:'html':'UTF-8'}</li>
                                            {/foreach}
                                        </ul>
                                    {/if}
                                    {if $blog_success}
                                        <p class="alert alert-success ybc_alert-success">{$blog_success|escape:'html':'UTF-8'}</p>
                                    {/if}
                                </form>
                            {else}
                                <p class="alert alert-warning">{l s='Log in to post comments' mod='ybc_blog_free'}</p>
                            {/if}
                        </div> 
                    </div>
                    {if count($comments)}
                        <div class="ybc_blog_free-comments-list">
                        <h4 class="title_blog">
                                {l s='Comments ' mod='ybc_blog_free'}
                            </h4>
                        <ul class="blog-comments-list">
                            {foreach from=$comments item='comment'}
                                
                                    <li class="blog-comment-line"  itemprop="review" itemscope="" itemtype="http://schema.org/Review">
                                    <meta itemprop="author" content="{ucfirst($comment.firstname)|escape:'html':'UTF-8'} {ucfirst($comment.lastname)|escape:'html':'UTF-8'}"/>                                                                
                                    <div class="ybc-blog-detail-comment">
                                        <h5 class="comment-subject">{$comment.subject|escape:'html':'UTF-8'}</h5>
                                        {if $comment.firstname || $comment.lastname}<span class="comment-by">{l s='By : ' mod='ybc_blog_free'}<b>{ucfirst($comment.firstname)|escape:'html':'UTF-8'} {ucfirst($comment.lastname)|escape:'html':'UTF-8'}</b></span>{/if}
                                        <span class="comment-time"><span>{l s='On' mod='ybc_blog_free'} </span>{date($date_format,strtotime($comment.datetime_added))|escape:'html':'UTF-8'}</span>
                                        {if $allow_rating && $comment.rating > 0}
                                            <div class="comment-rating" itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating">
                                                <meta itemprop="worstRating" content="0"/>
                                                <meta itemprop="ratingValue" content="{number_format((float)$comment.rating, 1, '.', '')|escape:'html':'UTF-8'}"/>
                                                <meta itemprop="bestRating" content="5"/>
                                                <span>{l s='Rating: ' mod='ybc_blog_free'}</span>
                                                <div class="ybc_blog_free_review">
                                                    {for $i = 1 to $comment.rating}
                                                        <div class="star star_on"></div>
                                                    {/for}
                                                    {if $comment.rating<5}
                                                        {for $i = $comment.rating + 1 to 5}
                                                            <div class="star"></div>
                                                        {/for}
                                                    {/if} 
                                                    <span class="ybc-blog-everage-rating"> {number_format((float)$comment.rating, 1, '.', '')|escape:'html':'UTF-8'}</span>                                     
                                                </div>
                                            </div>
                                        {/if} 
                                        {if $comment.comment}<p class="comment-content">{$comment.comment|escape:'html':'UTF-8'}</p>{/if}
                                        {if $allow_report_comment && $hasLoggedIn}
                                            {if !($reportedComments && is_array($reportedComments) && in_array($comment.id_comment, $reportedComments))}
                                                <span class="ybc-block-comment-report comment-report-{$comment.id_comment|intval}" rel="{$comment.id_comment|intval}">{l s='Report abuse' mod='ybc_blog_free'}</span>
                                            {/if}
                                        {/if}
                                        {if $comment.reply}<p class="comment-reply">
                                            {if $comment.elastname || $comment.efirstname}
                                                <span class="ybc-blog-replied-by">
                                                    {l s='Replied by : ' mod='ybc_blog_free'}
                                                    <span class="ybc-blog-replied-by-name">
                                                        {ucfirst($comment.efirstname)|escape:'html':'UTF-8'} {ucfirst($comment.elastname)|escape:'html':'UTF-8'}
                                                    </span>
                                                </span>
                                            {/if}
                                            <span class="ybc-blog-reply-content">
                                                {$comment.reply|escape:'html':'UTF-8'}
                                            </span></p>
                                        {/if}
                                    </div>
                                    </li>
                                
                            {/foreach}
                        </ul> 
                        </div>                 
                    {/if}
                {/if}
            </div>            
        </div>
        {else}
            <p class="warning">{l s='No posts found' mod='ybc_blog_free'}</p>
        {/if}
        {if $blog_post.related_posts}
            <div class="ybc-blog-related-posts ybc_blog_free_related_posts_type_{if $blog_related_posts_type}{$blog_related_posts_type|escape:'html':'UTF-8'}{else}default{/if}">
                <h4 class="title_blog">{l s='Related posts' mod='ybc_blog_free'}</h4>
                <div class="ybc-blog-related-posts-wrapper">
                    <ul class="ybc-blog-related-posts-list">
                        {foreach from=$blog_post.related_posts item='rpost'}                                            
                            <li class="ybc-blog-related-posts-list-li thumbnail-container">
                                {if $rpost.thumb}
                                    <a class="ybc_item_img" href="{$rpost.link|escape:'html':'UTF-8'}">
                                        <img src="{$rpost.thumb|escape:'html':'UTF-8'}" alt="{$rpost.title|escape:'html':'UTF-8'}" />
                                    </a>                                                    
                                {/if}
                                <a class="ybc_title_block" href="{$rpost.link|escape:'html':'UTF-8'}">{$rpost.title|escape:'html':'UTF-8'}</a>
                                <div class="ybc-blog-sidear-post-meta">
                                    {if $rpost.categories}
                                        {assign var='ik' value=0}
                                        {assign var='totalCat' value=count($rpost.categories)}                        
                                        <div class="ybc-blog-categories">
                                            <span class="be-label">{l s='Posted in' mod='ybc_blog_free'}: </span>
                                            {foreach from=$rpost.categories item='cat'}
                                                {assign var='ik' value=$ik+1}                                        
                                                <a href="{$cat.link|escape:'html':'UTF-8'}">{ucfirst($cat.title)|escape:'html':'UTF-8'}</a>{if $ik < $totalCat}, {/if}
                                            {/foreach}
                                        </div>
                                    {/if}
                                    <span class="post-date">{date($date_format,strtotime($rpost.datetime_added))|escape:'html':'UTF-8'}</span>
                                </div>
                                {if $allowComments || $show_views || $allow_like}
                                    <div class="ybc-blog-latest-toolbar">                                         
                                        {if $show_views}
                                            <span class="ybc-blog-latest-toolbar-views">
                                                {$rpost.click_number|intval}
                                                {if $rpost.click_number!=1}
                                                    <span>{l s='views' mod='ybc_blog_free'}</span>
                                                {else}
                                                    <span>{l s='view' mod='ybc_blog_free'}</span>
                                                {/if}
                                            </span> 
                                        {/if}                       
                                        {if $allow_like}
                                            <span class="ybc-blog-like-span ybc-blog-like-span-{$rpost.id_post|intval} {if isset($rpost.liked) && $rpost.liked}active{/if}"  data-id-post="{$rpost.id_post|intval}">                        
                                                {$rpost.likes|intval}
                                                <span class="blog-post-like-text blog-post-like-text-{$rpost.id_post|intval}">
                                                    {l s='Liked' mod='ybc_blog_free'}
                                                </span>
                                            </span>  
                                        {/if}
                                        {if $allowComments}
                                            <span class="ybc-blog-latest-toolbar-comments">{$rpost.comments_num|intval}
                                                {if $rpost.comments_num!=1}
                                                    <span>{l s='comments' mod='ybc_blog_free'}</span>
                                                {else}
                                                    <span>{l s='comment' mod='ybc_blog_free'}</span>
                                                {/if}
                                            </span> 
                                        {/if}
                                    </div>
                                {/if} 
                                {if $rpost.short_description}
                                    <div class="blog_description">{$rpost.short_description|strip_tags:'UTF-8'|truncate:120:'...'|escape:'html':'UTF-8'}</div>
                                {elseif $rpost.description}
                                    <div class="blog_description">{$rpost.description|strip_tags:'UTF-8'|truncate:120:'...'|escape:'html':'UTF-8'}</div>
                                {/if}
                                    
                            </li>
                        {/foreach}                        
                    </ul>
                </div>
            </div>
        {/if}
    </div>        
</div>
{else}
    <p class="alert alert-warning">{l s='This blog post is not available' mod='ybc_blog_free'}</p>
{/if}