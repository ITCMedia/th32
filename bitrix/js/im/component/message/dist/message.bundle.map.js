{"version":3,"sources":["message.bundle.js"],"names":["exports","im_component_message_body","im_model","ui_vue","im_const","im_utils","im_tools_animation","Vue","component","props","userId","default","dialogId","chatId","enableReactions","enableDateActions","enableCreateContent","enableGestureQuote","enableGestureMenu","showAvatar","showMenu","showName","showLargeFont","capturedMoveEvent","referenceContentClassName","referenceContentBodyClassName","referenceContentNameClassName","dialog","type","Object","DialoguesModel","create","getElementState","message","MessagesModel","data","componentBodyId","drag","dragWidth","dragPosition","dragIconShow","created","this","dragStartPositionX","dragStartPositionY","dragMovePositionX","dragMovePositionY","beforeDestroy","clearTimeout","dragStartTimeout1","dragStartTimeout2","dragBackAnimation","Animation","cancel","methods","clickByAvatar","event","$emit","clickByUserName","Utils","platform","isMobile","clickByUploadCancel","clickByKeyboardButton","clickByMessageMenu","clickByMessageRetry","setMessageReaction","openMessageReactionList","gestureRouter","eventName","gestureQuote","gestureMenu","_this","gestureMenuStarted","gestureMenuPreventTouchEnd","target","tagName","gestureMenuStartPosition","x","changedTouches","clientX","y","clientY","gestureMenuTimeout","setTimeout","Math","abs","preventDefault","_this2","isAndroid","layerX","getBoundingClientRect","left","layerY","top","dragCheck","result","$refs","body","offsetWidth","start","end","increment","duration","element","elementProperty","callback","dragLayerPosition","undefined","watch","movementX","dragPositionMax","dragPositionIcon","isBitrixMobile","app","exec","computed","MessageType","system","authorId","self","opponent","localize","getFilteredPhrases","$root","$bitrixMessages","freeze","assign","IM_MESSENGER_MESSAGE_MENU_TITLE","replace","isMac","userData","$store","getters","userAvatar","avatar","concat","filesData","files","isEdited","params","IS_EDITED","isDeleted","IS_DELETED","isLargeFont","LARGE_FONT","template","window","BX","Messenger","Model","Const"],"mappings":"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","file":"message.bundle.map.js"}