var ContentManager = {};
/* ContentManager.AUTOMATICALLY_TRACK_GOOGLE_ANALYTICS = !0, */ ContentManager.SHOW_TRACES = !1, ContentManager._activeTemplates = new Array, ContentManager._templateRegister = new Array, ContentManager._templateGroups = new Array, ContentManager._newPath = "", ContentManager._blocked = !1, ContentManager._defaultPath = "home", ContentManager._xml = null, ContentManager._prevTemplateObj = null, ContentManager._passedVariables = null, ContentManager.TEMPLATES_ADDED = 0, ContentManager._oldPath = null, ContentManager._samePathCount = 0, ContentManager.init = function(xml, defaultPath) {
    ContentManager.trace("init();"), ContentManager._xml = xml, defaultPath && (ContentManager._defaultPath = defaultPath, ContentManager.trace(ContentManager._defaultPath, "_defaultPath")), window.addEventListener("hashchange", ContentManager.onHashChange), "Explorer" == BrowserDetect.BROWSER_NAME && BrowserDetect.BROWSER_VERSION <= 7 && ContentManager.autoCheck(), ContentManager.onHashChange()
}, ContentManager.path = function(newPath) {
    var getType = typeof newPath;
    "object" == getType && (newPath = ContentManager.composeFullPathFromXML(newPath)), ContentManager.trace("path();"), ContentManager.trace(newPath, "newPath"), window.location.hash = "/" + newPath
}, ContentManager.nextTemplate = function(passedVars) {
    ContentManager.trace("nextTemplate();"), ContentManager._passedVariables = passedVars, ContentManager._blocked = !1, ContentManager.onHashChange()
}, ContentManager.addTemplate = function(templateName, JSClass) {
    ContentManager._templateRegister.push({
        templateName: templateName,
        JSClass: JSClass
    })
}, ContentManager.addTransitionGroup = function(groupName, group) {
    ContentManager._templateGroups.push({
        name: groupName,
        group: group
    })
}, ContentManager.getTransitionGroup = function(templateName1, templateName2) {
    var i = null,
        l = ContentManager._templateGroups.length,
        groupObj = null,
        group = null,
        rName = null;
    for (i = 0; l > i; i += 1)
        if (groupObj = ContentManager._templateGroups[i], group = groupObj.group, -1 != group.indexOf(templateName1) && -1 != group.indexOf(templateName2)) {
            rName = groupObj.name;
            break
        }
    return rName
}, ContentManager.composeFullPathFromXML = function(xml) {
    var pathStep = xml.getAttribute("data-path"),
        pathSteps = new Array;
    pathStep && pathSteps.unshift(pathStep);
    for (var parent = xml.parentNode, loops = 0; pathStep && (pathStep = parent.getAttribute("data-path"), pathStep && pathSteps.unshift(pathStep), parent = parent.parentNode, loops += 1, !(loops > 10)););
    var rPath = pathSteps.join("/");
    return rPath
}, ContentManager.getTransitionIndex = function() {}, ContentManager.isContentSupported = function(path) {
    var pathXML = ContentManager.findContent(ContentManager.extractPath(path).split("/")),
        isContentSupported = !1;
    return pathXML && (templateName = pathXML.getAttribute("data-template"), templateName && ContentManager.findTemplateFromName(templateName) && (isContentSupported = !0)), isContentSupported
}, ContentManager.onHashChange = function() {
    if (ContentManager.trace("-----------------------------"), 0 == ContentManager._blocked) {
        if (ContentManager._newPath = ContentManager.extractPath(window.location.hash), ContentManager._oldPath === ContentManager._newPath) {
            if (ContentManager._samePathCount += 1, ContentManager._samePathCount > 3) return void console.error("ContentManager.as bug, same path is repeated! - this is a show breaker :(")
        } else ContentManager._samePathCount = 0;
        ContentManager._oldPath = ContentManager._newPath;
        var pathXML, templateName, templateLevel, templatePath, pathArr = ContentManager._newPath.split("/"),
            candidates = new Array;
        for ("" == pathArr[0] && (pathArr[0] = ContentManager._defaultPath), ContentManager.trace(pathArr, "pathArr"); pathArr.length > 0;) pathXML = ContentManager.findContent(pathArr), pathXML && (templateName = pathXML.getAttribute("data-template"), templateName && ContentManager.findTemplateFromName(templateName) && (templateLevel = ContentManager.findTemplateLevelFromName(templateName), templateLevel === !1 && (templateLevel = pathArr.length - 1), templatePath = pathXML.getAttribute("data-path"), ContentManager.trace("new candidate"), ContentManager.trace(templatePath, "templatePath"), ContentManager.trace(templateName, "templateName"), ContentManager.trace(templateLevel, "templateLevel"), candidates.push({
            xml: pathXML,
            path: templatePath,
            templateName: templateName,
            level: templateLevel,
            sort: templateLevel + pathArr.length
        }))), pathArr.pop();
        candidates = candidates.sortOn("sort");
        for (var l = candidates.length, i = 0; l > i; i += 1) ContentManager.trace(candidates[i].templateName + " (" + candidates[i].level + ")", "sorting");
        candidates.reverse();
        var candidate, candidateLevel, i = 0,
            l = candidates.length,
            type = "none",
            activeTemplates = ContentManager._activeTemplates;
        for (ContentManager.trace(candidates.length, "candidates.length"), i = 0; l > i && (candidate = candidates[i], candidateLevel = candidate.level, null == activeTemplates[candidateLevel] ? type = "push" : activeTemplates[candidateLevel].path != candidate.path && (0 === activeTemplates[candidateLevel].fullPath.indexOf(ContentManager.composeFullPathFromXML(candidate.xml)) || (type = "pop")), "none" === type); i += 1);
        if ("none" == type) {
            var numberOfActiveTemplate = activeTemplates.length;
            l < activeTemplates.length ? type = "pop" : l === numberOfActiveTemplate && 0 !== numberOfActiveTemplate && activeTemplates[numberOfActiveTemplate - 1].path !== candidate.path && (type = "pop")
        }
        if (ContentManager.trace(type, "type"), "none" != type && candidate)
            if (ContentManager._blocked = !0, "pop" == type) {
                var oldTemplateObj = activeTemplates.pop(),
                    templateData = oldTemplateObj.templateData;
                ContentManager._passedVariables && (templateData.setPassedVariables(ContentManager._passedVariables), ContentManager._passedVariables = null);
                var nextTemplateData = new TemplateData;
                nextTemplateData.setTemplateName(candidate.templateName), nextTemplateData.setLevel(candidate.level), nextTemplateData.setTemplatePath(candidate.path), templateData.setNextTemplateData(nextTemplateData), ContentManager._prevTemplateObj = oldTemplateObj, oldTemplateObj.template.templateOut()
            } else if ("push" == type) {
            ContentManager.trace("push candidate"), ContentManager.trace(candidate.path, "candidate.path"), ContentManager.trace(candidate.templateName, "candidate.templateName"), ContentManager.trace(candidate.level, "candidate.level");
            var JSClass = ContentManager.findTemplateFromName(candidate.templateName);
            if (JSClass) {
                var templateData = new TemplateData;
                templateData.setXML(candidate.xml), templateData.setLevel(candidate.level), templateData.setTemplatePath(candidate.path), templateData.setTemplateName(candidate.templateName);
                var fullPath = ContentManager.composeFullPathFromXML(candidate.xml);
                templateData.setTemplateFullPath(fullPath), ContentManager._prevTemplateObj && (templateData.setPrevTemplateData(ContentManager._prevTemplateObj.templateData), ContentManager._prevTemplateObj = null), ContentManager._passedVariables && (templateData.setPassedVariables(ContentManager._passedVariables), ContentManager._passedVariables = null);
                var newTemplate = new JSClass(templateData);
               /*  if (templateData.setTemplate(newTemplate), null !== typeof ga || ContentManager.AUTOMATICALLY_TRACK_GOOGLE_ANALYTICS === !0) {
                    var getLocation = "#/" + ContentManager.composeFullPathFromXML(candidate.xml);
                    ga("send", "pageview", getLocation)
                } */
                var newTemplateObj = {
                    template: newTemplate,
                    path: candidate.path,
                    templateName: candidate.templateName,
                    fullPath: fullPath,
                    xml: candidate.xml,
                    templateData: templateData
                };
                ContentManager._prevTemplateObj = newTemplateObj, activeTemplates.push(newTemplateObj), ContentManager.TEMPLATES_ADDED += 1, newTemplate.templateIn()
            } else ContentManager._blocked = !1, trace("ContentManger.js unable to find template")
        }
    }
}, ContentManager.findContent = function(pathArr) {
    for (var currXML, i, l, xmlChildren, pathArrClone = ContentManager.cloneArray(pathArr), searchPath = pathArrClone[0], rXML = ContentManager._xml, currPath = "", found = !1, loop = 0, level = 0; searchPath;) {
        for (xmlChildren = rXML.children, l = xmlChildren.length, i = 0; l > i; i += 1)
            if (currXML = xmlChildren[i], currPath = currXML.getAttribute("data-path"), currPath == searchPath) {
                pathArrClone.shift(), searchPath = pathArrClone[0], rXML = currXML, found = !0, level += 1;
                break
            }(!found || !searchPath || loop > 10) && (searchPath = null), loop += 1
    }
    return level != pathArr.length && (rXML = null), rXML
}, ContentManager.extractPath = function(str) {
    var i, currPart, arr1 = str.split("#"),
        arr2 = arr1[arr1.length - 1].split("/"),
        arr3 = new Array,
        l = arr2.length;
    for (i = 0; l > i; i += 1) currPart = arr2[i], null !== currPart && "" !== currPart && arr3.push(currPart);
    var newPath = arr3.join("/");
    return newPath
}, ContentManager.findTemplateFromName = function(templateName) {
    var i, regObj, JSClass, register = ContentManager._templateRegister,
        l = register.length;
    for (i = 0; l > i; i += 1)
        if (regObj = register[i], regObj.templateName == templateName) {
            JSClass = regObj.JSClass;
            break
        }
    return JSClass
}, ContentManager.findTemplateLevelFromName = function(templateName) {
    var rLevel = !1,
        levelFromTemplateName = templateName.match(/\d+/);
    return levelFromTemplateName && (rLevel = levelFromTemplateName), rLevel
}, ContentManager.autoCheck = function() {
    function checkHash() {
        var newPath = window.location.hash;
        newPath != lastPath && (lastPath = newPath, ContentManager.onHashChange()), setTimeout(checkHash, 1e3 * checkInterval)
    }
    ContentManager.trace("autoCheck();");
    var lastPath = window.location.hash,
        checkInterval = .2;
    setTimeout(checkHash, 1e3 * checkInterval)
}, ContentManager.cloneArray = function(arr) {
    var i, l = arr.length,
        rArr = new Array;
    for (i = 0; l > i; i += 1) rArr.push(arr[i]);
    return rArr
}, ContentManager.getChildByAttr = function(xml, attr, value) {
    var i, child, children = xml.children,
        l = children.length,
        rVal = null;
    for (i = 0; l > i; i += 1)
        if (child = children[i], child.getAttribute("data-" + attr) == value) {
            rVal = child;
            break
        }
    return rVal
}, ContentManager.getFirstChildWithAttr = function(xml, attr) {
    var i, child, rVal, children = xml.children,
        l = children.length;
    for (i = 0; l > i; i += 1)
        if (child = children[i], child.getAttribute("data-" + attr)) {
            rVal = child;
            break
        }
    return rVal
}, ContentManager.getChildIndex = function(xml, arr) {
    var i, child, children = arr ? arr : xml.parentNode.children,
        l = children.length;
    for (i = 0; l > i; i += 1)
        if (child = children[i], child === xml) return i;
    return -1
}, ContentManager.getChildrenByAttr = function(xml, attr, value) {
    var i, child, children = xml.children,
        l = children.length,
        rVal = [];
    for (i = 0; l > i; i += 1) child = children[i], child.getAttribute("data-" + attr) == value && rVal.push(child);
    return rVal
}, ContentManager.getElementByTagName = function(xml, tagName) {
    return xml.getElementsByTagName(tagName)[0]
}, ContentManager.getAllChildrenByBackwardsWithAttribute = function(target, name) {
    for (var parent = target, children = [], currAttr = null; null !== parent;) "function" == typeof parent.getAttribute && (currAttr = parent.getAttribute("data-" + name), currAttr && children.unshift(parent)), parent = parent.parentNode;
    return children
}, ContentManager.trace = function(what, where) {
    ContentManager.SHOW_TRACES && (where || (where = ""), trace(what, "ContentManager.js " + where))
};