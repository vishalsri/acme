function CaseHomeModule(data, infoData, onArrowClick) {
    function setupGuides() {
        _guides = new GuideLines, _guides.addGuide("start", 74 - MainMenu.BORDER_WIDTH)
    }

    function addHeadline() {
        _headline = Text.getNewReg(13), _headline.style.color = UIColors.DARK, _headline.style.whiteSpace = "nowrap", _headline.innerHTML = "Project", _instance.appendChild(_headline)
    }

    function addDetails() {
        _details = Text.getNewReg(13), _details.lineHeightOffset = 1, _details.style.color = UIColors.FONT_MED_ON_WHITE, _details.style.whiteSpace = "nowrap", _details.innerHTML = ContentManager.getChildByAttr(data, "name", "details").innerHTML, _details.updateLineHeight(), _instance.appendChild(_details)
    }

    function addName() {
        var text = ContentManager.getChildByAttr(data, "name", "headline").innerHTML;
        _name = new TextArea(text, Text.getNewLight(50)), _name.init(_model, TextAreaModel.MODE_LISTEN), _instance.appendChild(_name)
    }

    function addCaseInfo() {
        _case = new CaseSmallInfo(infoData), _instance.appendChild(_case)
    }

    function addBody() {
        var text = ContentManager.getChildByAttr(data, "name", "body").innerHTML;
        _body = new TextArea(text, Text.getNewLight(15)), _instance.appendChild(_body), _body.init(_model, TextAreaModel.MODE_CONTROL)
    }

    function addFooter() {
        _footer = new Footer(_guides), _instance.appendChild(_footer), _footer.init()
    }

    function addArrow() {
        _arrow = new RetinaImage("http://localhost/eshop/wp-content/themes/eShop/blog/assets/images/logo/arrow-left.png", Assets.RETINA_HANDLE, onArrowLoaded), _arrow.init(), _arrow.style.cursor = "pointer", null != onArrowClick && (Touchable.apply(_arrow), _arrow.onClick(onArrowClick))
    }

    function updateArrowAnimation() {
        BrowserDetect.MOBILE || (null != _timelineAnimation && _timelineAnimation.kill(), _timelineAnimation = new TimelineMax({
            repeat: -1,
            repeatDelay: .5
        }), _timelineAnimation.to(_arrow, 2.2, {
            x: _width - _arrow.getWidth() + ARROW_OFFSET_X - 12,
            ease: Quad.easeInOut
        }), _timelineAnimation.to(_arrow, 2, {
            x: _width - _arrow.getWidth() + ARROW_OFFSET_X,
            ease: Elastic.easeOut
        }))
    }

    function onArrowLoaded() {
        TweenMax.set(_arrow, {
            x: _width - _arrow.getWidth() + ARROW_OFFSET_X,
            y: SiteGuides.getCenterOffset()
        }), _instance.appendChild(_arrow), updateArrowAnimation()
    }
    var _instance = Snail.extend(new Module);
    _instance.style.backgroundColor = UIColors.WHITE;
    var _guides, _footer, _arrow, _body, _case, _name, _headline, _width, _height, _model, ARROW_OFFSET_X = -40;
    _instance.init = function() {
        _instance.super.init(), _model = new TextAreaModel, setupGuides(), addHeadline(), addDetails(), addName(), addCaseInfo(), addBody(), addFooter(), addArrow()
    }, _instance.resize_mobile = function(width, height) {
        _guides.setGuide("start", 54 - MainMenu.BORDER_WIDTH), _width = .9 * width, _height = height, ARROW_OFFSET_X = -20, _instance.style.width = _width + "px", _instance.style.height = _height + "px";
        var textStartX = .25 * _width,
            bodyHeight = .4 * _height;
        _body.setSize(_width - textStartX - 100, bodyHeight);
        var bodyX = _guides.getGuide("start") + _name.getTextInstance().offsetWidth;
        bodyX > textStartX ? (TweenMax.set(_name, {
            x: _guides.getGuide("start"),
            y: SiteGuides.getCenterOffset() - _name.getTextInstance().offsetHeight - 20
        }), textStartX = _guides.getGuide("start")) : TweenMax.set(_name, {
            x: _guides.getGuide("start"),
            y: SiteGuides.getCenterOffset()
        }), _headline.style.display = "none", TweenMax.set(_case, {
            x: textStartX,
            y: SiteGuides.OFFSET_TOP
        }), _details.style.display = "none", TweenMax.set(_details, {
            x: textStartX,
            y: SiteGuides.OFFSET_TOP + 50
        }), _body.setSize(_width - textStartX - 100, bodyHeight), TweenMax.set(_body, {
            x: textStartX,
            y: SiteGuides.getCenterOffset()
        }), _footer.updateLayout(), _arrow.isLoaded() && TweenMax.set(_arrow, {
            x: _width - _arrow.getWidth() + ARROW_OFFSET_X,
            y: SiteGuides.getCenterOffset()
        })
    }, _instance.resize_desktop = function(width, height) {
        _guides.setGuide("start", 74 - MainMenu.BORDER_WIDTH), _width = .9 * width, _height = height, ARROW_OFFSET_X = -40, _instance.style.width = _width + "px", _instance.style.height = _height + "px";
        var textStartX = .4 * _width,
            bodyHeight = .4 * _height;
        TweenMax.set(_name, {
            x: _guides.getGuide("start"),
            y: SiteGuides.getCenterOffset()
        }), _name.setSize(textStartX - _guides.getGuide("start") - 20), _headline.style.display = "inline", TweenMax.set(_headline, {
            x: textStartX - 85,
            y: SiteGuides.OFFSET_TOP - Text.getOffsetY(_headline)
        }), TweenMax.set(_case, {
            x: textStartX,
            y: SiteGuides.OFFSET_TOP
        }), _details.style.display = "inline", TweenMax.set(_details, {
            x: textStartX,
            y: SiteGuides.OFFSET_TOP + 50
        }), _body.setSize(_width - textStartX - 100, bodyHeight), TweenMax.set(_body, {
            x: textStartX,
            y: SiteGuides.getCenterOffset()
        }), _footer.updateLayout(), _arrow.isLoaded() && (TweenMax.set(_arrow, {
            x: _width - _arrow.getWidth() + ARROW_OFFSET_X,
            y: SiteGuides.getCenterOffset()
        }), updateArrowAnimation())
    }, _instance.getWidth = function() {
        return _width
    };
    var _timelineAnimation = null;
    return _instance
}