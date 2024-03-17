<?php
#START 000
$numarul = 0;                               #(Increment). Count of articles
echo "<!--START : ARTICLES WITH EXTENDED MODE-->";
#START URL : article
echo "<div class='feed-wrapp-articles-0-item-001'>";
echo "<!--START : Widget Hide post-->";
echo "
    <div class='tosrIDextended tosrjs p l w100 bgw pa sh br12 mb25 mt25 none' style='width: 810px;'>
        <!--START : Hide-->
        <span class='article_extended_removed_hide_js rw1s p l f14 fw'>
            ".$languagesArticle[$selectedLanguage]['ArticleRemoved']."
        </span>
        <div class='article_extended_undo_hide_js id_undo_appearance_js rw2b c p fw f14' onclick='rw2bUndo_hide_extended()'>
            ".$languagesArticle[$selectedLanguage]['UNDO']."
        </div>
        <!--END-->
        <!--START : Delete-->
        <span class='aer_extendedjs rw1s p l f14 fw'>
            ".$languagesArticle[$selectedLanguage]['articleDeleted']."
        </span>
        <div class='aerre_extendedjs id_undo_removed_appearance_js rw2b c p fw f14' onclick='rw2bUndoRemoved_extended()'>
            ".$languagesArticle[$selectedLanguage]['RECOVER']."
        </div>
    </div>";
echo "<!--END-->";
echo "
<!--START : Hide_post_Complain-->
<div class='rWPU_extended_mode_js ab bgw f14 br12 u rwpuIDextended none'>
    <!--START : Button Hide post-->
    <div class='buufjs aC c h40 buuf_hide_extended_js' onclick='unauthorized(), hidePost_extended()'>
        <!--START : Icon-->
        <div class='ac1 p l h40 w16 dg alc'>
            <img class='ac1ico' src='../src/du/icon/forbbiden.png'>
        </div>
        <!--END-->
        <!--START : Title-->
        <div class='p l pal10 h40 lh40 arcm'>
            ".$languagesArticle[$selectedLanguage]['HidePost']."
        </div>
        <!--END-->
    </div>
    <!--END-->
    <!--START : Button Complain-->
    <div class='buufjs aC c h40 buuf_extended_js' onclick='unauthorized(), complain()'>
        <!--START : Icon-->
        <div class='ac1 p l h40 w16 dg alc'>
            <svg width='16px' height='16px' viewBox='0 0 16 16' fill='#4B4F56'><path fill-rule='evenodd' d='M8 0c4.415 0 8 3.585 8 8s-3.585 8-8 8-8-3.585-8-8 3.585-8 8-8zm.999 11a1 1 0 10-2 0 1 1 0 002 0zm0-6a1 1 0 00-2 0v3a1 1 0 002 0V5z'></path></svg>
        </div>
        <!--END-->
        <!--START : Title-->
        <div class='p l pal10 h40 lh40 arcm'>
            ".$languagesArticle[$selectedLanguage]['Complain']."
        </div>
        <!--END-->
    </div>
    <!--END-->
    <!--START : Delete-->
    <div class='bofa_extendedjs buufjs aC c h40 options_for_article_js' onclick='deletePost_extended()'>
        <div class='ac1 p l h40 w16 dg alc'>
            <!--Icon-->
            <svg width='16px' height='16px' viewBox='0 0 16 16' fill='#4B4F56'><path fill-rule='evenodd' d='M8 0c4.415 0 8 3.585 8 8s-3.585 8-8 8-8-3.585-8-8 3.585-8 8-8zm.999 11a1 1 0 10-2 0 1 1 0 002 0zm0-6a1 1 0 00-2 0v3a1 1 0 002 0V5z'></path></svg>
            <!--Icon-->
        </div>
        <div class='p l pal10 h40 lh40 arcm'>
            <!--Title-->
            ".$languagesArticle[$selectedLanguage]['Delete']."
            <!--Title-->
        </div>
    </div>
    <!--END-->
    <div class='pudorWPU ab w20'><div class='pudeb ab bgw'><!--icon--></div></div>
</div>
<!--END-->";
echo "<div class='extended_httpUrlArticle_js none mt25 p l pa mb25 bgw sh br12 tosaIDextended' style='width: 810px;'></div>";
echo "</div>";
#END
echo "<!--END-->";
echo "<!--START : ARTICLES WITHOUT EXTENDED MODE-->";
echo "<div class='feed-wrapp-articles-0 p l'>"; #Place where articles will be required
#END   000
?>