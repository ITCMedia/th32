{"version":3,"file":"script.min.js","sources":["script.js"],"names":["BX","window","BXMobileApp","namespace","repo","formId","gridId","initSelect","d","select","eventNode","container","this","click","delegate","callback","init","prototype","multiple","titles","values","defaultTitles","hasAttribute","setAttribute","addCustomEvent","initValues","bind","ii","options","length","push","innerHTML","value","e","show","PreventDefault","UI","SelectPicker","multiselect","default_value","data","keys","jj","html","removeAttribute","util","in_array","message","onCustomEvent","initDatetime","node","type","formats","parentNode","format","inner","datetime","time","date","bitrix","visible","eventCancelBubble","res","start_date","getStrDate","DatePicker","setParams","makeDate","text","clone","isNotEmptyString","getAttribute","delButton","style","display","str","Date","dateR","RegExp","timeR","m","test","exec","setDate","setMonth","setFullYear","setHours","setMinutes","setSeconds","parseDate","str_pad_left","getDate","toString","getMonth","getFullYear","getHours","getMinutes","DATETIME_FORMAT","convertBitrixFormat","DATE_FORMAT","TIME_FORMAT","substr","trim","indexOf","replace","id","proxy","drop","initSelectUser","showDrop","urls","list","profile","actualizeNodes","expand","visCount","FastClick","attach","showMenu","Table","url","table_settings","markmode","return_full_mode","skipSpecialChars","modal","alphabet_index","outsection","okname","cancelname","proxy_context","remove","findParent","tagName","className","buildNodes","items","c","user","existedUsers","Math","min","join","ij","f","childNodes","setTimeout","a_users","initSelectGroup","superclass","constructor","apply","arguments","extend","b_groups","initText","app","attachButton","attachFileSettings","attachedFiles","extraData","mentionButton","smileButton","htmlspecialcharsback","okButton","name","cancelButton","htmlspecialchars","initBox","label","change","initFile","dialogName","controlName","uploadParams","uploadMethod","uploadFileUrl","allowUpload","allowUploadExt","maxCount","button","agent","Uploader","getInstance","streams","uploadFormData","showImage","sortItems","input","dropZone","placeHolder","queueFields","thumb","fields","template","preview","params","width","height","hasClass","DoNothing","buttons","title","takePhoto","quality","source","correctOrientation","targetWidth","targetHeight","destinationType","handleAppFile","ActionSheet","image","dataBlob","UploaderUtils","dataURLToBlob","onChange","_onFileIsBound","onFileIsBound","_onFileIsAppended","onFileIsAppended","_onUploadStart","onUploadStart","_onUploadProgress","onUploadProgress","_onUploadDone","onUploadDone","_onUploadError","onUploadError","onFileIsCreated","findChildren","ar1","ar2","findChild","onAttach","onAttachFiles","onQueueIsChanged","getItems","addClass","removeClass","files","error","deleteFile","getFirst","pop","acceptableL","file","size","getFormattedSize","item","bindFile","getItem","action","progress","result","n","findChildByClassName","inp","create","attrs","appendChild","del","Mobile","Grid","Form","Page","LoadingScreen","hide","nodes","obj","ff","o","i","restrictedMode","bindElement","elements","cancel","TopBar","updateButtons","bar_type","position","ok","tag","toLowerCase","event","keyCode","found","form","focus","Disk","UFMobile","getByName","save","submit","dm","ajax","restricted","method","onsuccess","onfailure","onprogress","submitAjax","getByFormId","getByGridId"],"mappings":"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"}