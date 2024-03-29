jQuery(function ($) {

    $('input[placeholder], textarea[placeholder]').placeholder();
    $(".bx-soa-more-btn").click(function () {
        $(".mask-phone").mask("8 (999) 999-99-99");
    });
    $(".mask-phone").mask("8 (999) 999-99-99");
    $("input[name='ORDER_PROP_2']").inputmask("+7(999)9999999");
    // add-open-class
    $('.burger-menu').click(function () {
        if ($(this).parent().is('.menu-burger--opened')) {
            $(this).parent().removeClass('menu-burger--opened');
            $('body').removeClass('menu-open-wrapper-page');
        } else {
            $(this).parent().addClass('menu-burger--opened');
            $('body').addClass('menu-open-wrapper-page');
        }
    });

    // add-open-class
    $('.menu-item__link--dd-open').click(function () {
        if ($(this).parent().is('.menu-item--dd-opened')) {
            $(this).parent().removeClass('menu-item--dd-opened');
        } else {
            $(this).parent().addClass('menu-item--dd-opened');
        }
    });


    $('.link-header--modal span').click(function () {
        if ($(this).parent().is('.link-header--opened')) {
            $(this).parent().removeClass('link-header--opened');
        } else {
            $(this).parent().addClass('link-header--opened');
        }
    });

    $(document).bind('click touchstart', function (e) {
        var $clicked = $(e.target);
        if (!$clicked.parents().hasClass("link-header--modal")) {
            $(".link-header--modal").removeClass("link-header--opened");
        }
    });

    jcf.setOptions('Select', {
        wrapNative: false,
        multipleCompactStyle: true,
        maxVisibleItems: 6,
        useCustomScroll: false
    });

    jcf.replaceAll();


//scroll to slow
    $("a.scrollto").click(function () {
        var elementClick = $(this).attr("href")
        var destination = $(elementClick).offset().top;
        jQuery("html:not(:animated),body:not(:animated)").animate({scrollTop: destination}, 800);
        return false;
    });


    // plus/minus value
    // $('.minus-input').click(function () {
    //   var $input = $(this).parent().find('input');
    //   var count = parseInt($input.val()) - 1;
    //   count = count < 1 ? 1 : count;
    //   $input.val(count);
    //   $input.change();
    //   return false;
    // });

    // $('.plus-input').click(function () {
    //   var $input = $(this).parent().find('input');
    //   $input.val(parseInt($input.val()) + 1);
    //   $input.change();
    //   return false;
    // });

    $('ul.js-tabs').on('click', 'li:not(.current)', function () {
        $(this).addClass('current').siblings().removeClass('current')
            .parents('div.korpus').find('div.box').eq($(this).index()).fadeIn(500).siblings('div.box').hide();
    })

});


$(window).load(function () {
    $('.main-slider').owlCarousel({
        loop: true,
        nav: true,
        dots: true,
        autoplaySpeed: 1200,
        navSpeed: 1200,
        dotsSpeed: 1200,
        items: 1,
        autoplay: true,
        autoplayTimeout: 5000,
        mouseDrag: false
    });

    $('.slider-cont').owlCarousel({
        loop: true,
        nav: true,
        dots: false,
        autoplaySpeed: 1000,
        navSpeed: 1000,
        dotsSpeed: 1000,
        items: 1,
        autoplay: false,
        autoplayTimeout: 5000,
        mouseDrag: false,
        responsive: {
            0: {
                items: 1
            },
            480: {
                items: 2,
                margin: 20
            },
            640: {
                items: 1
            },
            1350: {
                items: 2,
                margin: 30
            }
        }
    });


    //----------------------------------------------------
    // owl carousel thumb
    //

    var sync1 = $(".owl-slider-main");
    var sync2 = $(".owl-thumbs");
    var slidesPerPage = 4;
    var syncedSecondary = true;

    sync1.owlCarousel({
        items: 1,
        slideSpeed: 2000,
        nav: true,
        autoplay: true,
        dots: false,
        loop: true,
        responsiveRefreshRate: 200,
    }).on('changed.owl.carousel', syncPosition);

    sync2
        .on('initialized.owl.carousel', function () {
            sync2.find(".owl-item").eq(0).addClass("current");
        })
        .owlCarousel({
            items: slidesPerPage,
            dots: true,
            nav: true,
            smartSpeed: 200,
            margin: 10,
            slideSpeed: 500,
            slideBy: slidesPerPage,
            responsiveRefreshRate: 100
        }).on('changed.owl.carousel', syncPosition2);

    function syncPosition(el) {

        var count = el.item.count - 1;
        var current = Math.round(el.item.index - (el.item.count / 2) - .5);

        if (current < 0) {
            current = count;
        }
        if (current > count) {
            current = 0;
        }

        //end block

        sync2
            .find(".owl-item")
            .removeClass("current")
            .eq(current)
            .addClass("current");
        var onscreen = sync2.find('.owl-item.active').length - 1;
        var start = sync2.find('.owl-item.active').first().index();
        var end = sync2.find('.owl-item.active').last().index();

        if (current > end) {
            sync2.data('owl.carousel').to(current, 100, true);
        }
        if (current < start) {
            sync2.data('owl.carousel').to(current - onscreen, 100, true);
        }
    }

    function syncPosition2(el) {
        if (syncedSecondary) {
            var number = el.item.index;
            sync1.data('owl.carousel').to(number, 100, true);
        }
    }

    sync2.on("click", ".owl-item", function (e) {
        e.preventDefault();
        var number = $(this).index();
        sync1.data('owl.carousel').to(number, 300, true);
    });

    //
    // end owl carousel thumb
    //----------------------------------------------------


});


//Plugin placeholder
(function (b, f, i) {
    function l() {
        b(this).find(c).each(j)
    }

    function m(a) {
        for (var a = a.attributes, b = {}, c = /^jQuery\d+/, e = 0; e < a.length; e++) if (a[e].specified && !c.test(a[e].name)) b[a[e].name] = a[e].value;
        return b
    }

    function j() {
        var a = b(this), d;
        a.is(":password") || (a.data("password") ? (d = a.next().show().focus(), b("label[for=" + a.attr("id") + "]").attr("for", d.attr("id")), a.remove()) : a.realVal() == a.attr("placeholder") && (a.val(""), a.removeClass("placeholder")))
    }

    function k() {
        var a = b(this), d, c;
        placeholder = a.attr("placeholder");
        b.trim(a.val()).length > 0 || (a.is(":password") ? (c = a.attr("id") + "-clone", d = b("<input/>").attr(b.extend(m(this), {
            type: "text",
            value: placeholder,
            "data-password": 1,
            id: c
        })).addClass("placeholder"), a.before(d).hide(), b("label[for=" + a.attr("id") + "]").attr("for", c)) : (a.val(placeholder), a.addClass("placeholder")))
    }

    var g = "placeholder" in f.createElement("input"), h = "placeholder" in f.createElement("textarea"),
        c = ":input[placeholder]";
    b.placeholder = {input: g, textarea: h};
    !i && g && h ? b.fn.placeholder = function () {
    } : (!i && g &&
    !h && (c = "textarea[placeholder]"), b.fn.realVal = b.fn.val, b.fn.val = function () {
        var a = b(this), d;
        if (arguments.length > 0) return a.realVal.apply(this, arguments);
        d = a.realVal();
        a = a.attr("placeholder");
        return d == a ? "" : d
    }, b.fn.placeholder = function () {
        this.filter(c).each(k);
        return this
    }, b(function (a) {
        var b = a(f);
        b.on("submit", "form", l);
        b.on("focus", c, j);
        b.on("blur", c, k);
        a(c).placeholder()
    }))
})(jQuery, document, window.debug);


//checkbox
!function (e) {
    e.addModule(function (e) {
        "use strict";
        return {
            name: "Checkbox",
            selector: 'input[type="checkbox"]',
            options: {
                wrapNative: !0,
                checkedClass: "jcf-checked",
                uncheckedClass: "jcf-unchecked",
                labelActiveClass: "jcf-label-active",
                fakeStructure: '<span class="jcf-checkbox"><span></span></span>'
            },
            matchElement: function (e) {
                return e.is(":checkbox")
            },
            init: function () {
                this.initStructure(), this.attachEvents(), this.refresh()
            },
            initStructure: function () {
                this.doc = e(document), this.realElement = e(this.options.element), this.fakeElement = e(this.options.fakeStructure).insertAfter(this.realElement), this.labelElement = this.getLabelFor(), this.options.wrapNative ? this.realElement.appendTo(this.fakeElement).css({
                    position: "absolute",
                    height: "100%",
                    width: "100%",
                    opacity: 0,
                    margin: 0
                }) : this.realElement.addClass(this.options.hiddenClass)
            },
            attachEvents: function () {
                this.realElement.on({
                    focus: this.onFocus,
                    click: this.onRealClick
                }), this.fakeElement.on("click", this.onFakeClick), this.fakeElement.on("jcf-pointerdown", this.onPress)
            },
            onRealClick: function (e) {
                var t = this;
                this.savedEventObject = e, setTimeout(function () {
                    t.refresh()
                }, 0)
            },
            onFakeClick: function (e) {
                this.options.wrapNative && this.realElement.is(e.target) || this.realElement.is(":disabled") || (delete this.savedEventObject, this.stateChecked = this.realElement.prop("checked"), this.realElement.prop("checked", !this.stateChecked), this.fireNativeEvent(this.realElement, "click"), this.savedEventObject && this.savedEventObject.isDefaultPrevented() ? this.realElement.prop("checked", this.stateChecked) : this.fireNativeEvent(this.realElement, "change"), delete this.savedEventObject)
            },
            onFocus: function () {
                this.pressedFlag && this.focusedFlag || (this.focusedFlag = !0, this.fakeElement.addClass(this.options.focusClass), this.realElement.on("blur", this.onBlur))
            },
            onBlur: function () {
                this.pressedFlag || (this.focusedFlag = !1, this.fakeElement.removeClass(this.options.focusClass), this.realElement.off("blur", this.onBlur))
            },
            onPress: function (e) {
                this.focusedFlag || "mouse" !== e.pointerType || this.realElement.focus(), this.pressedFlag = !0, this.fakeElement.addClass(this.options.pressedClass), this.doc.on("jcf-pointerup", this.onRelease)
            },
            onRelease: function (e) {
                this.focusedFlag && "mouse" === e.pointerType && this.realElement.focus(), this.pressedFlag = !1, this.fakeElement.removeClass(this.options.pressedClass), this.doc.off("jcf-pointerup", this.onRelease)
            },
            getLabelFor: function () {
                var t = this.realElement.closest("label"), s = this.realElement.prop("id");
                return !t.length && s && (t = e('label[for="' + s + '"]')), t.length ? t : null
            },
            refresh: function () {
                var e = this.realElement.is(":checked"), t = this.realElement.is(":disabled");
                this.fakeElement.toggleClass(this.options.checkedClass, e).toggleClass(this.options.uncheckedClass, !e).toggleClass(this.options.disabledClass, t), this.labelElement && this.labelElement.toggleClass(this.options.labelActiveClass, e)
            },
            destroy: function () {
                this.options.wrapNative ? this.realElement.insertBefore(this.fakeElement).css({
                    position: "",
                    width: "",
                    height: "",
                    opacity: "",
                    margin: ""
                }) : this.realElement.removeClass(this.options.hiddenClass), this.fakeElement.off("jcf-pointerdown", this.onPress), this.fakeElement.remove(), this.doc.off("jcf-pointerup", this.onRelease), this.realElement.off({
                    focus: this.onFocus,
                    click: this.onRealClick
                })
            }
        }
    })
}(jcf);


//radio
!function (e) {
    e.addModule(function (t) {
        "use strict";
        return {
            name: "Radio",
            selector: 'input[type="radio"]',
            options: {
                wrapNative: !0,
                checkedClass: "jcf-checked",
                uncheckedClass: "jcf-unchecked",
                labelActiveClass: "jcf-label-active",
                fakeStructure: '<span class="jcf-radio"><span></span></span>'
            },
            matchElement: function (e) {
                return e.is(":radio")
            },
            init: function () {
                this.initStructure(), this.attachEvents(), this.refresh()
            },
            initStructure: function () {
                this.doc = t(document), this.realElement = t(this.options.element), this.fakeElement = t(this.options.fakeStructure).insertAfter(this.realElement), this.labelElement = this.getLabelFor(), this.options.wrapNative ? this.realElement.prependTo(this.fakeElement).css({
                    position: "absolute",
                    opacity: 0
                }) : this.realElement.addClass(this.options.hiddenClass)
            },
            attachEvents: function () {
                this.realElement.on({
                    focus: this.onFocus,
                    click: this.onRealClick
                }), this.fakeElement.on("click", this.onFakeClick), this.fakeElement.on("jcf-pointerdown", this.onPress)
            },
            onRealClick: function (e) {
                var t = this;
                this.savedEventObject = e, setTimeout(function () {
                    t.refreshRadioGroup()
                }, 0)
            },
            onFakeClick: function (e) {
                this.options.wrapNative && this.realElement.is(e.target) || this.realElement.is(":disabled") || (delete this.savedEventObject, this.currentActiveRadio = this.getCurrentActiveRadio(), this.stateChecked = this.realElement.prop("checked"), this.realElement.prop("checked", !0), this.fireNativeEvent(this.realElement, "click"), this.savedEventObject && this.savedEventObject.isDefaultPrevented() ? (this.realElement.prop("checked", this.stateChecked), this.currentActiveRadio.prop("checked", !0)) : this.fireNativeEvent(this.realElement, "change"), delete this.savedEventObject)
            },
            onFocus: function () {
                this.pressedFlag && this.focusedFlag || (this.focusedFlag = !0, this.fakeElement.addClass(this.options.focusClass), this.realElement.on("blur", this.onBlur))
            },
            onBlur: function () {
                this.pressedFlag || (this.focusedFlag = !1, this.fakeElement.removeClass(this.options.focusClass), this.realElement.off("blur", this.onBlur))
            },
            onPress: function (e) {
                this.focusedFlag || "mouse" !== e.pointerType || this.realElement.focus(), this.pressedFlag = !0, this.fakeElement.addClass(this.options.pressedClass), this.doc.on("jcf-pointerup", this.onRelease)
            },
            onRelease: function (e) {
                this.focusedFlag && "mouse" === e.pointerType && this.realElement.focus(), this.pressedFlag = !1, this.fakeElement.removeClass(this.options.pressedClass), this.doc.off("jcf-pointerup", this.onRelease)
            },
            getCurrentActiveRadio: function () {
                return this.getRadioGroup(this.realElement).filter(":checked")
            },
            getRadioGroup: function (e) {
                var s = e.attr("name"), i = e.parents("form");
                return s ? i.length ? i.find('input[name="' + s + '"]') : t('input[name="' + s + '"]:not(form input)') : e
            },
            getLabelFor: function () {
                var e = this.realElement.closest("label"), s = this.realElement.prop("id");
                return !e.length && s && (e = t('label[for="' + s + '"]')), e.length ? e : null
            },
            refreshRadioGroup: function () {
                this.getRadioGroup(this.realElement).each(function () {
                    e.refresh(this)
                })
            },
            refresh: function () {
                var e = this.realElement.is(":checked"), t = this.realElement.is(":disabled");
                this.fakeElement.toggleClass(this.options.checkedClass, e).toggleClass(this.options.uncheckedClass, !e).toggleClass(this.options.disabledClass, t), this.labelElement && this.labelElement.toggleClass(this.options.labelActiveClass, e)
            },
            destroy: function () {
                this.options.wrapNative ? this.realElement.insertBefore(this.fakeElement).css({
                    position: "",
                    width: "",
                    height: "",
                    opacity: "",
                    margin: ""
                }) : this.realElement.removeClass(this.options.hiddenClass), this.fakeElement.off("jcf-pointerdown", this.onPress), this.fakeElement.remove(), this.doc.off("jcf-pointerup", this.onRelease), this.realElement.off({
                    blur: this.onBlur,
                    focus: this.onFocus,
                    click: this.onRealClick
                })
            }
        }
    })
}(jcf);

//select
!function (e) {
    e.addModule(function (t, s) {
        "use strict";

        function i(e) {
            this.options = t.extend({
                wrapNative: !0,
                wrapNativeOnMobile: !0,
                fakeDropInBody: !0,
                useCustomScroll: !0,
                flipDropToFit: !0,
                maxVisibleItems: 10,
                fakeAreaStructure: '<span class="jcf-select"><span class="jcf-select-text"></span><span class="jcf-select-opener"></span></span>',
                fakeDropStructure: '<div class="jcf-select-drop"><div class="jcf-select-drop-content"></div></div>',
                optionClassPrefix: "jcf-option-",
                selectClassPrefix: "jcf-select-",
                dropContentSelector: ".jcf-select-drop-content",
                selectTextSelector: ".jcf-select-text",
                dropActiveClass: "jcf-drop-active",
                flipDropClass: "jcf-drop-flipped"
            }, e), this.init()
        }

        function o(e) {
            this.options = t.extend({
                wrapNative: !0,
                useCustomScroll: !0,
                fakeStructure: '<span class="jcf-list-box"><span class="jcf-list-wrapper"></span></span>',
                selectClassPrefix: "jcf-select-",
                listHolder: ".jcf-list-wrapper"
            }, e), this.init()
        }

        function n(e) {
            this.options = t.extend({
                holder: null,
                maxVisibleItems: 10,
                selectOnClick: !0,
                useHoverClass: !1,
                useCustomScroll: !1,
                handleResize: !0,
                multipleSelectWithoutKey: !1,
                alwaysPreventMouseWheel: !1,
                indexAttribute: "data-index",
                cloneClassPrefix: "jcf-option-",
                containerStructure: '<span class="jcf-list"><span class="jcf-list-content"></span></span>',
                containerSelector: ".jcf-list-content",
                captionClass: "jcf-optgroup-caption",
                disabledClass: "jcf-disabled",
                optionClass: "jcf-option",
                groupClass: "jcf-optgroup",
                hoverClass: "jcf-hover",
                selectedClass: "jcf-selected",
                scrollClass: "jcf-scroll-active"
            }, e), this.init()
        }

        var l = {
            name: "Select",
            selector: "select",
            options: {element: null, multipleCompactStyle: !1},
            plugins: {ListBox: o, ComboBox: i, SelectList: n},
            matchElement: function (e) {
                return e.is("select")
            },
            init: function () {
                this.element = t(this.options.element), this.createInstance()
            },
            isListBox: function () {
                return this.element.is("[size]:not([jcf-size]), [multiple]")
            },
            createInstance: function () {
                this.instance && this.instance.destroy(), this.isListBox() && !this.options.multipleCompactStyle ? this.instance = new o(this.options) : this.instance = new i(this.options)
            },
            refresh: function () {
                var e = this.isListBox() && this.instance instanceof i || !this.isListBox() && this.instance instanceof o;
                e ? this.createInstance() : this.instance.refresh()
            },
            destroy: function () {
                this.instance.destroy()
            }
        };
        t.extend(i.prototype, {
            init: function () {
                this.initStructure(), this.bindHandlers(), this.attachEvents(), this.refresh()
            }, initStructure: function () {
                this.win = t(s), this.doc = t(document), this.realElement = t(this.options.element), this.fakeElement = t(this.options.fakeAreaStructure).insertAfter(this.realElement), this.selectTextContainer = this.fakeElement.find(this.options.selectTextSelector), this.selectText = t("<span></span>").appendTo(this.selectTextContainer), h(this.fakeElement), this.fakeElement.addClass(r(this.realElement.prop("className"), this.options.selectClassPrefix)), this.realElement.prop("multiple") && this.fakeElement.addClass("jcf-compact-multiple"), this.options.isMobileDevice && this.options.wrapNativeOnMobile && !this.options.wrapNative && (this.options.wrapNative = !0), this.options.wrapNative ? this.realElement.prependTo(this.fakeElement).css({
                    position: "absolute",
                    height: "100%",
                    width: "100%"
                }).addClass(this.options.resetAppearanceClass) : (this.realElement.addClass(this.options.hiddenClass), this.fakeElement.attr("title", this.realElement.attr("title")), this.fakeDropTarget = this.options.fakeDropInBody ? t("body") : this.fakeElement)
            }, attachEvents: function () {
                var e = this;
                this.delayedRefresh = function () {
                    setTimeout(function () {
                        e.refresh(), e.list && (e.list.refresh(), e.list.scrollToActiveOption())
                    }, 1)
                }, this.options.wrapNative ? this.realElement.on({
                    focus: this.onFocus,
                    change: this.onChange,
                    click: this.onChange,
                    keydown: this.delayedRefresh
                }) : (this.realElement.on({
                    focus: this.onFocus,
                    change: this.onChange,
                    keydown: this.onKeyDown
                }), this.fakeElement.on({"jcf-pointerdown": this.onSelectAreaPress}))
            }, onKeyDown: function (e) {
                13 === e.which ? this.toggleDropdown() : this.dropActive && this.delayedRefresh()
            }, onChange: function () {
                this.refresh()
            }, onFocus: function () {
                this.pressedFlag && this.focusedFlag || (this.fakeElement.addClass(this.options.focusClass), this.realElement.on("blur", this.onBlur), this.toggleListMode(!0), this.focusedFlag = !0)
            }, onBlur: function () {
                this.pressedFlag || (this.fakeElement.removeClass(this.options.focusClass), this.realElement.off("blur", this.onBlur), this.toggleListMode(!1), this.focusedFlag = !1)
            }, onResize: function () {
                this.dropActive && this.hideDropdown()
            }, onSelectDropPress: function () {
                this.pressedFlag = !0
            }, onSelectDropRelease: function (e, t) {
                this.pressedFlag = !1, "mouse" === t.pointerType && this.realElement.focus()
            }, onSelectAreaPress: function (e) {
                var s = !this.options.fakeDropInBody && t(e.target).closest(this.dropdown).length;
                s || e.button > 1 || this.realElement.is(":disabled") || (this.selectOpenedByEvent = e.pointerType, this.toggleDropdown(), this.focusedFlag || ("mouse" === e.pointerType ? this.realElement.focus() : this.onFocus(e)), this.pressedFlag = !0, this.fakeElement.addClass(this.options.pressedClass), this.doc.on("jcf-pointerup", this.onSelectAreaRelease))
            }, onSelectAreaRelease: function (e) {
                this.focusedFlag && "mouse" === e.pointerType && this.realElement.focus(), this.pressedFlag = !1, this.fakeElement.removeClass(this.options.pressedClass), this.doc.off("jcf-pointerup", this.onSelectAreaRelease)
            }, onOutsideClick: function (e) {
                var s = t(e.target), i = s.closest(this.fakeElement).length || s.closest(this.dropdown).length;
                i || this.hideDropdown()
            }, onSelect: function () {
                this.refresh(), this.realElement.prop("multiple") ? this.repositionDropdown() : this.hideDropdown(), this.fireNativeEvent(this.realElement, "change")
            }, toggleListMode: function (e) {
                this.options.wrapNative || (e ? this.realElement.attr({
                    size: 4,
                    "jcf-size": ""
                }) : this.options.wrapNative || this.realElement.removeAttr("size jcf-size"))
            }, createDropdown: function () {
                this.dropdown && (this.list.destroy(), this.dropdown.remove()), this.dropdown = t(this.options.fakeDropStructure).appendTo(this.fakeDropTarget), this.dropdown.addClass(r(this.realElement.prop("className"), this.options.selectClassPrefix)), h(this.dropdown), this.realElement.prop("multiple") && this.dropdown.addClass("jcf-compact-multiple"), this.options.fakeDropInBody && this.dropdown.css({
                    position: "absolute",
                    top: -9999
                }), this.list = new n({
                    useHoverClass: !0,
                    handleResize: !1,
                    alwaysPreventMouseWheel: !0,
                    maxVisibleItems: this.options.maxVisibleItems,
                    useCustomScroll: this.options.useCustomScroll,
                    holder: this.dropdown.find(this.options.dropContentSelector),
                    multipleSelectWithoutKey: this.realElement.prop("multiple"),
                    element: this.realElement
                }), t(this.list).on({
                    select: this.onSelect,
                    press: this.onSelectDropPress,
                    release: this.onSelectDropRelease
                })
            }, repositionDropdown: function () {
                var e, t, s, i = this.fakeElement.offset(), o = this.fakeElement[0].getBoundingClientRect(),
                    n = o.width || o.right - o.left, l = this.fakeElement.outerHeight(),
                    r = this.dropdown.css("width", n).outerHeight(), h = this.win.scrollTop(), a = this.win.height(),
                    c = !1;
                i.top + l + r > h + a && i.top - r > h && (c = !0), this.options.fakeDropInBody && (s = "static" !== this.fakeDropTarget.css("position") ? this.fakeDropTarget.offset().top : 0, this.options.flipDropToFit && c ? (t = i.left, e = i.top - r - s) : (t = i.left, e = i.top + l - s), this.dropdown.css({
                    width: n,
                    left: t,
                    top: e
                })), this.dropdown.add(this.fakeElement).toggleClass(this.options.flipDropClass, this.options.flipDropToFit && c)
            }, showDropdown: function () {
                this.realElement.prop("options").length && (this.dropdown || this.createDropdown(), this.dropActive = !0, this.dropdown.appendTo(this.fakeDropTarget), this.fakeElement.addClass(this.options.dropActiveClass), this.refreshSelectedText(), this.repositionDropdown(), this.list.setScrollTop(this.savedScrollTop), this.list.refresh(), this.win.on("resize", this.onResize), this.doc.on("jcf-pointerdown", this.onOutsideClick))
            }, hideDropdown: function () {
                this.dropdown && (this.savedScrollTop = this.list.getScrollTop(), this.fakeElement.removeClass(this.options.dropActiveClass + " " + this.options.flipDropClass), this.dropdown.removeClass(this.options.flipDropClass).detach(), this.doc.off("jcf-pointerdown", this.onOutsideClick), this.win.off("resize", this.onResize), this.dropActive = !1, "touch" === this.selectOpenedByEvent && this.onBlur())
            }, toggleDropdown: function () {
                this.dropActive ? this.hideDropdown() : this.showDropdown()
            }, refreshSelectedText: function () {
                var e, s = this.realElement.prop("selectedIndex"), i = this.realElement.prop("options")[s],
                    o = i ? i.getAttribute("data-image") : null, n = "", l = this;
                this.realElement.prop("multiple") ? (t.each(this.realElement.prop("options"), function (e, t) {
                    t.selected && (n += (n ? ", " : "") + t.innerHTML)
                }), n || (n = l.realElement.attr("placeholder") || ""), this.selectText.removeAttr("class").html(n)) : i ? this.currentSelectedText === i.innerHTML && this.currentSelectedImage === o || (e = r(i.className, this.options.optionClassPrefix), this.selectText.attr("class", e).html(i.innerHTML), o ? (this.selectImage || (this.selectImage = t("<img>").prependTo(this.selectTextContainer).hide()), this.selectImage.attr("src", o).show()) : this.selectImage && this.selectImage.hide(), this.currentSelectedText = i.innerHTML, this.currentSelectedImage = o) : (this.selectImage && this.selectImage.hide(), this.selectText.removeAttr("class").empty())
            }, refresh: function () {
                "none" === this.realElement.prop("style").display ? this.fakeElement.hide() : this.fakeElement.show(), this.refreshSelectedText(), this.fakeElement.toggleClass(this.options.disabledClass, this.realElement.is(":disabled"))
            }, destroy: function () {
                this.options.wrapNative ? this.realElement.insertBefore(this.fakeElement).css({
                    position: "",
                    height: "",
                    width: ""
                }).removeClass(this.options.resetAppearanceClass) : (this.realElement.removeClass(this.options.hiddenClass), this.realElement.is("[jcf-size]") && this.realElement.removeAttr("size jcf-size")), this.fakeElement.remove(), this.doc.off("jcf-pointerup", this.onSelectAreaRelease), this.realElement.off({focus: this.onFocus})
            }
        }), t.extend(o.prototype, {
            init: function () {
                this.bindHandlers(), this.initStructure(), this.attachEvents()
            }, initStructure: function () {
                this.realElement = t(this.options.element), this.fakeElement = t(this.options.fakeStructure).insertAfter(this.realElement), this.listHolder = this.fakeElement.find(this.options.listHolder), h(this.fakeElement), this.fakeElement.addClass(r(this.realElement.prop("className"), this.options.selectClassPrefix)), this.realElement.addClass(this.options.hiddenClass), this.list = new n({
                    useCustomScroll: this.options.useCustomScroll,
                    holder: this.listHolder,
                    selectOnClick: !1,
                    element: this.realElement
                })
            }, attachEvents: function () {
                var e = this;
                this.delayedRefresh = function (t) {
                    t && (16 === t.which || t.ctrlKey || t.metaKey || t.altKey) || (clearTimeout(e.refreshTimer), e.refreshTimer = setTimeout(function () {
                        e.refresh(), e.list.scrollToActiveOption()
                    }, 1))
                }, this.realElement.on({
                    focus: this.onFocus,
                    click: this.delayedRefresh,
                    keydown: this.delayedRefresh
                }), t(this.list).on({
                    select: this.onSelect,
                    press: this.onFakeOptionsPress,
                    release: this.onFakeOptionsRelease
                })
            }, onFakeOptionsPress: function (e, t) {
                this.pressedFlag = !0, "mouse" === t.pointerType && this.realElement.focus()
            }, onFakeOptionsRelease: function (e, t) {
                this.pressedFlag = !1, "mouse" === t.pointerType && this.realElement.focus()
            }, onSelect: function () {
                this.fireNativeEvent(this.realElement, "change"), this.fireNativeEvent(this.realElement, "click")
            }, onFocus: function () {
                this.pressedFlag && this.focusedFlag || (this.fakeElement.addClass(this.options.focusClass), this.realElement.on("blur", this.onBlur), this.focusedFlag = !0)
            }, onBlur: function () {
                this.pressedFlag || (this.fakeElement.removeClass(this.options.focusClass), this.realElement.off("blur", this.onBlur), this.focusedFlag = !1)
            }, refresh: function () {
                this.fakeElement.toggleClass(this.options.disabledClass, this.realElement.is(":disabled")), this.list.refresh()
            }, destroy: function () {
                this.list.destroy(), this.realElement.insertBefore(this.fakeElement).removeClass(this.options.hiddenClass), this.fakeElement.remove()
            }
        }), t.extend(n.prototype, {
            init: function () {
                this.initStructure(), this.refreshSelectedClass(), this.attachEvents()
            }, initStructure: function () {
                this.element = t(this.options.element), this.indexSelector = "[" + this.options.indexAttribute + "]", this.container = t(this.options.containerStructure).appendTo(this.options.holder), this.listHolder = this.container.find(this.options.containerSelector), this.lastClickedIndex = this.element.prop("selectedIndex"), this.rebuildList(), this.element.prop("multiple") && (this.previousSelection = this.getSelectedOptionsIndexes())
            }, attachEvents: function () {
                this.bindHandlers(), this.listHolder.on("jcf-pointerdown", this.indexSelector, this.onItemPress), this.listHolder.on("jcf-pointerdown", this.onPress), this.options.useHoverClass && this.listHolder.on("jcf-pointerover", this.indexSelector, this.onHoverItem)
            }, onPress: function (e) {
                t(this).trigger("press", e), this.listHolder.on("jcf-pointerup", this.onRelease)
            }, onRelease: function (e) {
                t(this).trigger("release", e), this.listHolder.off("jcf-pointerup", this.onRelease)
            }, onHoverItem: function (e) {
                var t = parseFloat(e.currentTarget.getAttribute(this.options.indexAttribute));
                this.fakeOptions.removeClass(this.options.hoverClass).eq(t).addClass(this.options.hoverClass)
            }, onItemPress: function (e) {
                "touch" === e.pointerType || this.options.selectOnClick ? (this.tmpListOffsetTop = this.list.offset().top, this.listHolder.on("jcf-pointerup", this.indexSelector, this.onItemRelease)) : this.onSelectItem(e)
            }, onItemRelease: function (e) {
                this.listHolder.off("jcf-pointerup", this.indexSelector, this.onItemRelease), this.tmpListOffsetTop === this.list.offset().top && this.listHolder.on("click", this.indexSelector, {savedPointerType: e.pointerType}, this.onSelectItem), delete this.tmpListOffsetTop
            }, onSelectItem: function (e) {
                var s, i = parseFloat(e.currentTarget.getAttribute(this.options.indexAttribute)),
                    o = e.data && e.data.savedPointerType || e.pointerType || "mouse";
                this.listHolder.off("click", this.indexSelector, this.onSelectItem), e.button > 1 || this.realOptions[i].disabled || (this.element.prop("multiple") ? e.metaKey || e.ctrlKey || "touch" === o || this.options.multipleSelectWithoutKey ? this.realOptions[i].selected = !this.realOptions[i].selected : e.shiftKey ? (s = [this.lastClickedIndex, i].sort(function (e, t) {
                    return e - t
                }), this.realOptions.each(function (e, t) {
                    t.selected = e >= s[0] && e <= s[1]
                })) : this.element.prop("selectedIndex", i) : this.element.prop("selectedIndex", i), e.shiftKey || (this.lastClickedIndex = i), this.refreshSelectedClass(), "mouse" === o && this.scrollToActiveOption(), t(this).trigger("select"))
            }, rebuildList: function () {
                var s = this, i = this.element[0];
                this.storedSelectHTML = i.innerHTML, this.optionIndex = 0, this.list = t(this.createOptionsList(i)), this.listHolder.empty().append(this.list), this.realOptions = this.element.find("option"), this.fakeOptions = this.list.find(this.indexSelector), this.fakeListItems = this.list.find("." + this.options.captionClass + "," + this.indexSelector), delete this.optionIndex;
                var o = this.options.maxVisibleItems, n = this.element.prop("size");
                n > 1 && !this.element.is("[jcf-size]") && (o = n);
                var l = this.fakeOptions.length > o;
                return this.container.toggleClass(this.options.scrollClass, l), l && (this.listHolder.css({
                    maxHeight: this.getOverflowHeight(o),
                    overflow: "auto"
                }), this.options.useCustomScroll && e.modules.Scrollable) ? void e.replace(this.listHolder, "Scrollable", {
                    handleResize: this.options.handleResize,
                    alwaysPreventMouseWheel: this.options.alwaysPreventMouseWheel
                }) : void(this.options.alwaysPreventMouseWheel && (this.preventWheelHandler = function (e) {
                    var t = s.listHolder.scrollTop(),
                        i = s.listHolder.prop("scrollHeight") - s.listHolder.innerHeight();
                    (0 >= t && e.deltaY < 0 || t >= i && e.deltaY > 0) && e.preventDefault()
                }, this.listHolder.on("jcf-mousewheel", this.preventWheelHandler)))
            }, refreshSelectedClass: function () {
                var e, t = this, s = this.element.prop("multiple"), i = this.element.prop("selectedIndex");
                s ? this.realOptions.each(function (e, s) {
                    t.fakeOptions.eq(e).toggleClass(t.options.selectedClass, !!s.selected)
                }) : (this.fakeOptions.removeClass(this.options.selectedClass + " " + this.options.hoverClass), e = this.fakeOptions.eq(i).addClass(this.options.selectedClass), this.options.useHoverClass && e.addClass(this.options.hoverClass))
            }, scrollToActiveOption: function () {
                var e = this.getActiveOptionOffset();
                "number" == typeof e && this.listHolder.prop("scrollTop", e)
            }, getSelectedOptionsIndexes: function () {
                var e = [];
                return this.realOptions.each(function (t, s) {
                    s.selected && e.push(t)
                }), e
            }, getChangedSelectedIndex: function () {
                var e = this.element.prop("selectedIndex"), s = this, i = !1, o = null;
                return this.element.prop("multiple") ? (this.currentSelection = this.getSelectedOptionsIndexes(), t.each(this.currentSelection, function (e, t) {
                    !i && s.previousSelection.indexOf(t) < 0 && (0 === e && (i = !0), o = t)
                }), this.previousSelection = this.currentSelection, o) : e
            }, getActiveOptionOffset: function () {
                var e = this.getChangedSelectedIndex();
                if (null !== e) {
                    var t = this.listHolder.height(), s = this.listHolder.prop("scrollTop"), i = this.fakeOptions.eq(e),
                        o = i.offset().top - this.list.offset().top, n = i.innerHeight();
                    return o + n >= s + t ? o - t + n : s > o ? o : void 0
                }
            }, getOverflowHeight: function (e) {
                var t = this.fakeListItems.eq(e - 1), s = this.list.offset().top, i = t.offset().top,
                    o = t.innerHeight();
                return i + o - s
            }, getScrollTop: function () {
                return this.listHolder.scrollTop()
            }, setScrollTop: function (e) {
                this.listHolder.scrollTop(e)
            }, createOption: function (e) {
                var t = document.createElement("span");
                t.className = this.options.optionClass, t.innerHTML = e.innerHTML, t.setAttribute(this.options.indexAttribute, this.optionIndex++);
                var s, i = e.getAttribute("data-image");
                return i && (s = document.createElement("img"), s.src = i, t.insertBefore(s, t.childNodes[0])), e.disabled && (t.className += " " + this.options.disabledClass), e.className && (t.className += " " + r(e.className, this.options.cloneClassPrefix)), t
            }, createOptGroup: function (e) {
                var t, s, i = document.createElement("span"), o = e.getAttribute("label");
                return t = document.createElement("span"), t.className = this.options.captionClass, t.innerHTML = o, i.appendChild(t), e.children.length && (s = this.createOptionsList(e), i.appendChild(s)), i.className = this.options.groupClass, i
            }, createOptionContainer: function () {
                var e = document.createElement("li");
                return e
            }, createOptionsList: function (e) {
                var s = this, i = document.createElement("ul");
                return t.each(e.children, function (e, t) {
                    var o, n = s.createOptionContainer(t);
                    switch (t.tagName.toLowerCase()) {
                        case"option":
                            o = s.createOption(t);
                            break;
                        case"optgroup":
                            o = s.createOptGroup(t)
                    }
                    i.appendChild(n).appendChild(o)
                }), i
            }, refresh: function () {
                this.storedSelectHTML !== this.element.prop("innerHTML") && this.rebuildList();
                var t = e.getInstance(this.listHolder);
                t && t.refresh(), this.refreshSelectedClass()
            }, destroy: function () {
                this.listHolder.off("jcf-mousewheel", this.preventWheelHandler), this.listHolder.off("jcf-pointerdown", this.indexSelector, this.onSelectItem), this.listHolder.off("jcf-pointerover", this.indexSelector, this.onHoverItem), this.listHolder.off("jcf-pointerdown", this.onPress)
            }
        });
        var r = function (e, t) {
            return e ? e.replace(/[\s]*([\S]+)+[\s]*/gi, t + "$1 ") : ""
        }, h = function () {
            function t(e) {
                e.preventDefault()
            }

            var s = e.getOptions().unselectableClass;
            return function (e) {
                e.addClass(s).on("selectstart", t)
            }
        }();
        return l
    })
}(jcf);


/* mask input*/
(function (e) {
    function t() {
        var e = document.createElement("input"), t = "onpaste";
        return e.setAttribute(t, ""), "function" == typeof e[t] ? "paste" : "input"
    }

    var n, a = t() + ".mask", r = navigator.userAgent, i = /iphone/i.test(r), o = /android/i.test(r);
    e.mask = {
        definitions: {9: "[0-9]", a: "[A-Za-z]", "*": "[A-Za-z0-9]"},
        dataName: "rawMaskFn",
        placeholder: "_"
    }, e.fn.extend({
        caret: function (e, t) {
            var n;
            if (0 !== this.length && !this.is(":hidden")) return "number" == typeof e ? (t = "number" == typeof t ? t : e, this.each(function () {
                this.setSelectionRange ? this.setSelectionRange(e, t) : this.createTextRange && (n = this.createTextRange(), n.collapse(!0), n.moveEnd("character", t), n.moveStart("character", e), n.select())
            })) : (this[0].setSelectionRange ? (e = this[0].selectionStart, t = this[0].selectionEnd) : document.selection && document.selection.createRange && (n = document.selection.createRange(), e = 0 - n.duplicate().moveStart("character", -1e5), t = e + n.text.length), {
                begin: e,
                end: t
            })
        }, unmask: function () {
            return this.trigger("unmask")
        }, mask: function (t, r) {
            var c, l, s, u, f, h;
            return !t && this.length > 0 ? (c = e(this[0]), c.data(e.mask.dataName)()) : (r = e.extend({
                placeholder: e.mask.placeholder,
                completed: null
            }, r), l = e.mask.definitions, s = [], u = h = t.length, f = null, e.each(t.split(""), function (e, t) {
                "?" == t ? (h--, u = e) : l[t] ? (s.push(RegExp(l[t])), null === f && (f = s.length - 1)) : s.push(null)
            }), this.trigger("unmask").each(function () {
                function c(e) {
                    for (; h > ++e && !s[e];) ;
                    return e
                }

                function d(e) {
                    for (; --e >= 0 && !s[e];) ;
                    return e
                }

                function m(e, t) {
                    var n, a;
                    if (!(0 > e)) {
                        for (n = e, a = c(t); h > n; n++) if (s[n]) {
                            if (!(h > a && s[n].test(R[a]))) break;
                            R[n] = R[a], R[a] = r.placeholder, a = c(a)
                        }
                        b(), x.caret(Math.max(f, e))
                    }
                }

                function p(e) {
                    var t, n, a, i;
                    for (t = e, n = r.placeholder; h > t; t++) if (s[t]) {
                        if (a = c(t), i = R[t], R[t] = n, !(h > a && s[a].test(i))) break;
                        n = i
                    }
                }

                function g(e) {
                    var t, n, a, r = e.which;
                    8 === r || 46 === r || i && 127 === r ? (t = x.caret(), n = t.begin, a = t.end, 0 === a - n && (n = 46 !== r ? d(n) : a = c(n - 1), a = 46 === r ? c(a) : a), k(n, a), m(n, a - 1), e.preventDefault()) : 27 == r && (x.val(S), x.caret(0, y()), e.preventDefault())
                }

                function v(t) {
                    var n, a, i, l = t.which, u = x.caret();
                    t.ctrlKey || t.altKey || t.metaKey || 32 > l || l && (0 !== u.end - u.begin && (k(u.begin, u.end), m(u.begin, u.end - 1)), n = c(u.begin - 1), h > n && (a = String.fromCharCode(l), s[n].test(a) && (p(n), R[n] = a, b(), i = c(n), o ? setTimeout(e.proxy(e.fn.caret, x, i), 0) : x.caret(i), r.completed && i >= h && r.completed.call(x))), t.preventDefault())
                }

                function k(e, t) {
                    var n;
                    for (n = e; t > n && h > n; n++) s[n] && (R[n] = r.placeholder)
                }

                function b() {
                    x.val(R.join(""))
                }

                function y(e) {
                    var t, n, a = x.val(), i = -1;
                    for (t = 0, pos = 0; h > t; t++) if (s[t]) {
                        for (R[t] = r.placeholder; pos++ < a.length;) if (n = a.charAt(pos - 1), s[t].test(n)) {
                            R[t] = n, i = t;
                            break
                        }
                        if (pos > a.length) break
                    } else R[t] === a.charAt(pos) && t !== u && (pos++, i = t);
                    return e ? b() : u > i + 1 ? (x.val(""), k(0, h)) : (b(), x.val(x.val().substring(0, i + 1))), u ? t : f
                }

                var x = e(this), R = e.map(t.split(""), function (e) {
                    return "?" != e ? l[e] ? r.placeholder : e : void 0
                }), S = x.val();
                x.data(e.mask.dataName, function () {
                    return e.map(R, function (e, t) {
                        return s[t] && e != r.placeholder ? e : null
                    }).join("")
                }), x.attr("readonly") || x.one("unmask", function () {
                    x.unbind(".mask").removeData(e.mask.dataName)
                }).bind("focus.mask", function () {
                    clearTimeout(n);
                    var e;
                    S = x.val(), e = y(), n = setTimeout(function () {
                        b(), e == t.length ? x.caret(0, e) : x.caret(e)
                    }, 10)
                }).bind("blur.mask", function () {
                    y(), x.val() != S && x.change()
                }).bind("keydown.mask", g).bind("keypress.mask", v).bind(a, function () {
                    setTimeout(function () {
                        var e = y(!0);
                        x.caret(e), r.completed && e == x.val().length && r.completed.call(x)
                    }, 0)
                }), y()
            }))
        }
    })
})(jQuery);

function gestatus() {
    var id = $('#status-id').val();
    $.ajax({
        type: "POST",
        url: "/ajax/status_order.php",
        data: {id: id}
    }).done(function (result) {
        $("#msg").html(result);
    });
}

$(document).ready(function () { // вся мaгия пoслe зaгрузки стрaницы
    // $("#searchOrder").submit(function () { 
    //     var form = $(this);
    //     var data = form.serialize();
    //     $.ajax({
    //         type: "POST",
    //         url: "/ajax/status_order.php",
    //         data: data
    //     }).done(function (result) {
    //         $("#msg").html(result);
    //     });
    // });
    $("#faq").submit(function () { // пeрeхвaтывaeм всe при сoбытии oтпрaвки
        var form = $(this); // зaпишeм фoрму, чтoбы пoтoм нe былo прoблeм с this
        var data = form.serialize(); // пoдгoтaвливaeм дaнныe
        $.ajax({ // инициaлизируeм ajax зaпрoс
            type: 'POST', // oтпрaвляeм в POST фoрмaтe, мoжнo GET
            url: '/ajax/question.php', // путь дo oбрaбoтчикa, у нaс oн лeжит в тoй жe пaпкe
            dataType: 'json', // oтвeт ждeм в json фoрмaтe
            data: data, // дaнныe для oтпрaвки
            beforeSend: function (data) { // сoбытиe дo oтпрaвки
                form.find('input[type="submit"]').attr('disabled', 'disabled'); // нaпримeр, oтключим кнoпку, чтoбы нe жaли пo 100 рaз
            },
            success: function (data) { // сoбытиe пoслe удaчнoгo oбрaщeния к сeрвeру и пoлучeния oтвeтa
                console.log(data['msg']);
                var hastype = 'success';
                if (data['hasError'] == true) {
                    hastype = 'error'
                }
                swal({
                    type: hastype,
                    title: data['msg'],
                })
                if (data['hasError'] == false) {
                    $('#faq')[0].reset();
                }
                $('.chats').load(document.URL + ' .chats');
            },
            error: function (xhr, ajaxOptions, thrownError) { // в случae нeудaчнoгo зaвeршeния зaпрoсa к сeрвeру
                swal("Ошибка", "Повторите отправку формы", "error")
            },
            complete: function (data) { // сoбытиe пoслe любoгo исхoдa
                form.find('input[type="submit"]').prop('disabled', false); // в любoм случae включим кнoпку oбрaтнo
            }
        });
        return false; // вырубaeм стaндaртную oтпрaвку фoрмы
    });
    // $('.bx-basket').click(function () {
    //     var show = 1;
    //     var action = 'show';
    //     $.ajax({
    //         type: "POST",
    //         url: "/ajax/showcart.php",
    //         data: {show: show, action: action}
    //     }).done(function (result) {
    //         var cart = $(result).find(".modal-cont").html();
    //         $('#showcart .modal-cont').html(cart);
    //     });
    // });
});


$('.parent-popup-cart').click(function (event) { // ловим клик по ссылки с id="go"
    //alert(123);
    //event.preventDefault(); // выключаем стандартную роль элемента
    $('.overlay').fadeIn(400, // сначала плавно показываем темную подложку
        function () { // после выполнения предъидущей анимации
            var c = $('.parent-popup-cart').offset();
            $('#showcart').css({'top': c.top + 80, 'left': c.left - 230});
            $('#showcart').show();
        });
});
/* Закрытие модального окна, тут делаем то же самое но в обратном порядке */
$('.overlay').click(function () { // ловим клик по крестику или подложке
    $('#showcart')
        .animate({top: '45%'}, 200,  // плавно меняем прозрачность на 0 и одновременно двигаем окно вверх
            function () { // после анимации
                $(this).css('display', 'none'); // делаем ему display: none;
                $('.overlay').fadeOut(400); // скрываем подложку
            }
        );
});

function deleteid(x) {
    var show = 1;
    var action = 'delete';
    var id = x;
    $.ajax({
        type: "POST",
        url: "/ajax/showcart.php",
        data: {show: show, action: action, id: id}
    }).done(function (result) {
        var cart = $(result).find(".modal-cont").html();
        $('#showcart .modal-cont').html(cart);
    });
}

var url = window.location.href;
if (url.indexOf('catalog') == -1) {
	$('.menu.visible_at .menu-item--drop:nth-child(2)').hover(
        function () {
            $(this).find('.menu-dd').show();
            $('.header-nav .menu .menu-item--drop').first().find('.menu-dd').hide();
        },
        function () {
            $(this).find('.menu-dd').hide();
            $('.header-nav .menu .menu-item--drop').first().find('.menu-dd').show();
        }
    );
    $('.menu:not(.visible_at) .menu-item--drop:nth-child(2)').hover(
        function () {
            $(this).find('.menu-dd').show();
            $('.header-nav .menu .menu-item--drop').first().find('.menu-dd').hide();
        },
        function () {
            $(this).find('.menu-dd').hide();
            // $('.header-nav .menu .menu-item--drop').first().find('.menu-dd').show();
        }
    );
    $('.menu:not(.visible_at) .menu-item--drop:nth-child(1)').hover(
        function () {
            $('.header-nav .menu .menu-item--drop').find('.menu-dd').hide();
            $(this).find('.menu-dd').show();
        },
        function () {
            $(this).find('.menu-dd').hide();
            // $('.header-nav .menu .menu-item--drop').first().find('.menu-dd').show();
        }
    );
    $('.menu.main_page_menu .menu-item--drop:nth-child(2)').hover(
        function () {
            $(this).find('.menu-dd').show();
            $('.header-nav .menu .menu-item--drop').first().find('.menu-dd').hide();
        },
        function () {
            $(this).find('.menu-dd').hide();
            $('.header-nav .menu .menu-item--drop').first().find('.menu-dd').show();
        }
    );
}


$(".btn").click(function () {
    setTimeout(function () {
        var form = $('input[name=\'quantity\']'), formVal = 1;
        form.val('').focus().val(formVal);
       // $("input[name='quantity']").focus();
    },1000);
});

$('.auth_fancybox_link').click(function(){
    $.fancybox.close();
});
function setEqualHeight(columns) {
    var tallestcolumn = 0;
    columns.each(function(){
        currentHeight = $(this).height();
        if(currentHeight > tallestcolumn){
            tallestcolumn = currentHeight;
        }
    });
    columns.height(tallestcolumn);
}

$(document).ready(function() {
    setEqualHeight($(".catalog-item__link"));
    $('.product-content-one-click a').click(function(){
        var product_name = $('h1').text();
        var artikle = $('#artikle').text();
        $('input[name="form_text_11"]').val(product_name + ' Артикул: ' + artikle);
    });
    $('a.found-a-cheaper').click(function(){
        var product_name = $(this).attr('data-product');
        $('input[name="form_text_15"]').val(product_name);
    });
    if ($(window).width() < 500){
        // Подключаем стиль для мобильных
        $(".menu-item__link[href='/catalog/']").next().remove();
        $(".menu-item__link[href='/proizvoditeli/']").next().remove();
    }
});
