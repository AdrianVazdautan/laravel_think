<!--START : Chat-->
    <div class="poUWCjs puwC ab bgw br12 none">
        <div class="w100 br12 p l mobhpm" style="overflow-x : hidden;">
            <!--START : Loading-->
                <div class="loading_for_chat_js w100 dg alc jcc hi">
                    <div class='loader wi hi'>
                        <div class='loader__item ab br50'></div>
                    </div>
                </div>
            <!--END-->
            <!--START : For authorized users-->
                <div class="rlsn01au">
                    <!--START-->
                        <!--START : Title-->
                            <div class="chat_title_js wwct_nav_chat_css w100 u none">
                                Chat
                                <!--START : TO CLOSE -> FOR MOBILE-->
                                    <div class="mtclmojs dg alc jcc none">
                                        <div class="h40 w40 br50 dg alc jcc c" onclick="close_mobile_chat()" style="background-color: rgba(0, 0, 0, .1);">
                                            <div class="p w26 mtm3">
                                                <div class="closemenu">
                                                    <div class="ab h3 w26 bgw br4" style="transform: rotate(45deg); background: #4B4F57;"></div>
                                                    <div class="ab h3 w26 bgw br4" style="transform: rotate(-45deg); background: #4B4F57;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <!--END-->
                            </div>
                        <!--END-->
                        <!--START : MESSAGES-->
                            <div class="wwct w100 pat10 insertMessageChatjs">
                                
                            </div>
                        <!--END-->
                        <!--START : INPUT TEXT-->
                            <div class="wwctit w100">
                                <div class="wwctit1 w100">
                                    <div class="wwctit2 p l w100">
                                        <input type="text" class="get_message_js wwctit2Input w100 br50 sh pal" placeholder="Write anything..." onclick="removeErrorChatInput()" onkeydown="chathandleKeyPress(event)">
                                        <!--START : Button SEND-->
                                            <div class="wwctit3 ab dg jcc alc">
                                                <div class="wwctit4 br50 c" onclick="send_chat_message()"><!--Button--></div>
                                            </div>
                                        <!--END-->
                                    </div>
                                </div>
                            </div>
                        <!--END-->
                    <!--END-->
                </div>
            <!--END-->
        </div>
        <!--START : Icon-Arrow-->
            <div class="puwhoc ab h20"><div class="puwde ab bgw"><!--icon--></div></div>
        <!--END-->
    </div>
<!--END : Chat-->