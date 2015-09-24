// SpryCollapsiblepaneln.js - version 0.7 - Spry Pre-Release 1.6.1
//
// Copyright (c) 2006. Adobe Systems Incorporated.
// All rights reserved.
//
// Redistribution and use in source and binary forms, with or without
// modification, are permitted provided that the following conditions are met:
//
//   * Redistributions of source code must retain the above copyright notice,
//     this list of conditions and the following disclaimer.
//   * Redistributions in binary form must reproduce the above copyright notice,
//     this list of conditions and the following disclaimer in the documentation
//     and/or other materials provided with the distribution.
//   * Neither the name of Adobe Systems Incorporated nor the names of its
//     contributors may be used to endorse or promote products derived from this
//     software without specific prior written permission.
//
// THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
// AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
// IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
// ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE
// LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
// CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
// SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
// INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
// CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
// ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
// POSSIBILITY OF SUCH DAMAGE.

var Spry;
if (!Spry) Spry = {};
if (!Spry.Widget) Spry.Widget = {};

Spry.Widget.Collapsiblepaneln = function(element, opts)
{
	this.element = this.getElement(element);
	this.focusElement = null;
	this.hoverClass = "CollapsiblepanelnTabHover";
	this.openClass = "CollapsiblepanelnOpen";
	this.closedClass = "CollapsiblepanelnClosed";
	this.focusedClass = "CollapsiblepanelnFocused";
	this.enableAnimation = true;
	this.enableKeyboardNavigation = true;
	this.animator = null;
	this.hasFocus = false;
	this.contentIsOpen = true;

	this.openpanelnKeyCode = Spry.Widget.Collapsiblepaneln.KEY_DOWN;
	this.closepanelnKeyCode = Spry.Widget.Collapsiblepaneln.KEY_UP;

	Spry.Widget.Collapsiblepaneln.setOptions(this, opts);

	this.attachBehaviors();
};

Spry.Widget.Collapsiblepaneln.prototype.getElement = function(ele)
{
	if (ele && typeof ele == "string")
		return document.getElementById(ele);
	return ele;
};

Spry.Widget.Collapsiblepaneln.prototype.addClassName = function(ele, className)
{
	if (!ele || !className || (ele.className && ele.className.search(new RegExp("\\b" + className + "\\b")) != -1))
		return;
	ele.className += (ele.className ? " " : "") + className;
};

Spry.Widget.Collapsiblepaneln.prototype.removeClassName = function(ele, className)
{
	if (!ele || !className || (ele.className && ele.className.search(new RegExp("\\b" + className + "\\b")) == -1))
		return;
	ele.className = ele.className.replace(new RegExp("\\s*\\b" + className + "\\b", "g"), "");
};

Spry.Widget.Collapsiblepaneln.prototype.hasClassName = function(ele, className)
{
	if (!ele || !className || !ele.className || ele.className.search(new RegExp("\\b" + className + "\\b")) == -1)
		return false;
	return true;
};

Spry.Widget.Collapsiblepaneln.prototype.setDisplay = function(ele, display)
{
	if( ele )
		ele.style.display = display;
};

Spry.Widget.Collapsiblepaneln.setOptions = function(obj, optionsObj, ignoreUndefinedProps)
{
	if (!optionsObj)
		return;
	for (var optionName in optionsObj)
	{
		if (ignoreUndefinedProps && optionsObj[optionName] == undefined)
			continue;
		obj[optionName] = optionsObj[optionName];
	}
};

Spry.Widget.Collapsiblepaneln.prototype.onTabMouseOver = function(e)
{
	this.addClassName(this.getTab(), this.hoverClass);
	return false;
};

Spry.Widget.Collapsiblepaneln.prototype.onTabMouseOut = function(e)
{
	this.removeClassName(this.getTab(), this.hoverClass);
	return false;
};

Spry.Widget.Collapsiblepaneln.prototype.open = function()
{
	this.contentIsOpen = true;
	if (this.enableAnimation)
	{
		if (this.animator)
			this.animator.stop();
		this.animator = new Spry.Widget.Collapsiblepaneln.panelnAnimator(this, true, { duration: this.duration, fps: this.fps, transition: this.transition });
		this.animator.start();
	}
	else
		this.setDisplay(this.getContent(), "block");

	this.removeClassName(this.element, this.closedClass);
	this.addClassName(this.element, this.openClass);
};

Spry.Widget.Collapsiblepaneln.prototype.close = function()
{
	this.contentIsOpen = false;
	if (this.enableAnimation)
	{
		if (this.animator)
			this.animator.stop();
		this.animator = new Spry.Widget.Collapsiblepaneln.panelnAnimator(this, false, { duration: this.duration, fps: this.fps, transition: this.transition });
		this.animator.start();
	}
	else
		this.setDisplay(this.getContent(), "none");

	this.removeClassName(this.element, this.openClass);
	this.addClassName(this.element, this.closedClass);
};

Spry.Widget.Collapsiblepaneln.prototype.onTabClick = function(e)
{
	if (this.isOpen())
		this.close();
	else
		this.open();

	this.focus();

	return this.stopPropagation(e);
};

Spry.Widget.Collapsiblepaneln.prototype.onFocus = function(e)
{
	this.hasFocus = true;
	this.addClassName(this.element, this.focusedClass);
	return false;
};

Spry.Widget.Collapsiblepaneln.prototype.onBlur = function(e)
{
	this.hasFocus = false;
	this.removeClassName(this.element, this.focusedClass);
	return false;
};

Spry.Widget.Collapsiblepaneln.KEY_UP = 38;
Spry.Widget.Collapsiblepaneln.KEY_DOWN = 40;

Spry.Widget.Collapsiblepaneln.prototype.onKeyDown = function(e)
{
	var key = e.keyCode;
	if (!this.hasFocus || (key != this.openpanelnKeyCode && key != this.closepanelnKeyCode))
		return true;

	if (this.isOpen() && key == this.closepanelnKeyCode)
		this.close();
	else if ( key == this.openpanelnKeyCode)
		this.open();
	
	return this.stopPropagation(e);
};

Spry.Widget.Collapsiblepaneln.prototype.stopPropagation = function(e)
{
	if (e.preventDefault) e.preventDefault();
	else e.returnValue = false;
	if (e.stopPropagation) e.stopPropagation();
	else e.cancelBubble = true;
	return false;
};

Spry.Widget.Collapsiblepaneln.prototype.attachpanelnHandlers = function()
{
	var tab = this.getTab();
	if (!tab)
		return;

	var self = this;
	Spry.Widget.Collapsiblepaneln.addEventListener(tab, "click", function(e) { return self.onTabClick(e); }, false);
	Spry.Widget.Collapsiblepaneln.addEventListener(tab, "mouseover", function(e) { return self.onTabMouseOver(e); }, false);
	Spry.Widget.Collapsiblepaneln.addEventListener(tab, "mouseout", function(e) { return self.onTabMouseOut(e); }, false);

	if (this.enableKeyboardNavigation)
	{
		// XXX: IE doesn't allow the setting of tabindex dynamically. This means we can't
		// rely on adding the tabindex attribute if it is missing to enable keyboard navigation
		// by default.

		// Find the first element within the tab container that has a tabindex or the first
		// anchor tag.
		
		var tabIndexEle = null;
		var tabAnchorEle = null;

		this.preorderTraversal(tab, function(node) {
			if (node.nodeType == 1 /* NODE.ELEMENT_NODE */)
			{
				var tabIndexAttr = tab.attributes.getNamedItem("tabindex");
				if (tabIndexAttr)
				{
					tabIndexEle = node;
					return true;
				}
				if (!tabAnchorEle && node.nodeName.toLowerCase() == "a")
					tabAnchorEle = node;
			}
			return false;
		});

		if (tabIndexEle)
			this.focusElement = tabIndexEle;
		else if (tabAnchorEle)
			this.focusElement = tabAnchorEle;

		if (this.focusElement)
		{
			Spry.Widget.Collapsiblepaneln.addEventListener(this.focusElement, "focus", function(e) { return self.onFocus(e); }, false);
			Spry.Widget.Collapsiblepaneln.addEventListener(this.focusElement, "blur", function(e) { return self.onBlur(e); }, false);
			Spry.Widget.Collapsiblepaneln.addEventListener(this.focusElement, "keydown", function(e) { return self.onKeyDown(e); }, false);
		}
	}
};

Spry.Widget.Collapsiblepaneln.addEventListener = function(element, eventType, handler, capture)
{
	try
	{
		if (element.addEventListener)
			element.addEventListener(eventType, handler, capture);
		else if (element.attachEvent)
			element.attachEvent("on" + eventType, handler);
	}
	catch (e) {}
};

Spry.Widget.Collapsiblepaneln.prototype.preorderTraversal = function(root, func)
{
	var stopTraversal = false;
	if (root)
	{
		stopTraversal = func(root);
		if (root.hasChildNodes())
		{
			var child = root.firstChild;
			while (!stopTraversal && child)
			{
				stopTraversal = this.preorderTraversal(child, func);
				try { child = child.nextSibling; } catch (e) { child = null; }
			}
		}
	}
	return stopTraversal;
};

Spry.Widget.Collapsiblepaneln.prototype.attachBehaviors = function()
{
	var paneln = this.element;
	var tab = this.getTab();
	var content = this.getContent();

	if (this.contentIsOpen || this.hasClassName(paneln, this.openClass))
	{
		this.addClassName(paneln, this.openClass);
		this.removeClassName(paneln, this.closedClass);
		this.setDisplay(content, "block");
		this.contentIsOpen = true;
	}
	else
	{
		this.removeClassName(paneln, this.openClass);
		this.addClassName(paneln, this.closedClass);
		this.setDisplay(content, "none");
		this.contentIsOpen = false;
	}

	this.attachpanelnHandlers();
};

Spry.Widget.Collapsiblepaneln.prototype.getTab = function()
{
	return this.getElementChildren(this.element)[0];
};

Spry.Widget.Collapsiblepaneln.prototype.getContent = function()
{
	return this.getElementChildren(this.element)[1];
};

Spry.Widget.Collapsiblepaneln.prototype.isOpen = function()
{
	return this.contentIsOpen;
};

Spry.Widget.Collapsiblepaneln.prototype.getElementChildren = function(element)
{
	var children = [];
	var child = element.firstChild;
	while (child)
	{
		if (child.nodeType == 1 /* Node.ELEMENT_NODE */)
			children.push(child);
		child = child.nextSibling;
	}
	return children;
};

Spry.Widget.Collapsiblepaneln.prototype.focus = function()
{
	if (this.focusElement && this.focusElement.focus)
		this.focusElement.focus();
};

/////////////////////////////////////////////////////

Spry.Widget.Collapsiblepaneln.panelnAnimator = function(paneln, doOpen, opts)
{
	this.timer = null;
	this.interval = 0;

	this.fps = 60;
	this.duration = 500;
	this.startTime = 0;

	this.transition = Spry.Widget.Collapsiblepaneln.panelnAnimator.defaultTransition;

	this.onComplete = null;

	this.paneln = paneln;
	this.content = paneln.getContent();
	this.doOpen = doOpen;

	Spry.Widget.Collapsiblepaneln.setOptions(this, opts, true);

	this.interval = Math.floor(1000 / this.fps);

	var c = this.content;

	var curHeight = c.offsetHeight ? c.offsetHeight : 0;
	this.fromHeight = (doOpen && c.style.display == "none") ? 0 : curHeight;

	if (!doOpen)
		this.toHeight = 0;
	else
	{
		if (c.style.display == "none")
		{
			// The content area is not displayed so in order to calculate the extent
			// of the content inside it, we have to set its display to block.

			c.style.visibility = "hidden";
			c.style.display = "block";
		}

		// Clear the height property so we can calculate
		// the full height of the content we are going to show.

		c.style.height = "";
		this.toHeight = c.offsetHeight;
	}

	this.distance = this.toHeight - this.fromHeight;
	this.overflow = c.style.overflow;

	c.style.height = this.fromHeight + "px";
	c.style.visibility = "visible";
	c.style.overflow = "hidden";
	c.style.display = "block";
};

Spry.Widget.Collapsiblepaneln.panelnAnimator.defaultTransition = function(time, begin, finish, duration) { time /= duration; return begin + ((2 - time) * time * finish); };

Spry.Widget.Collapsiblepaneln.panelnAnimator.prototype.start = function()
{
	var self = this;
	this.startTime = (new Date).getTime();
	this.timer = setTimeout(function() { self.stepAnimation(); }, this.interval);
};

Spry.Widget.Collapsiblepaneln.panelnAnimator.prototype.stop = function()
{
	if (this.timer)
	{
		clearTimeout(this.timer);

		// If we're killing the timer, restore the overflow property.

		this.content.style.overflow = this.overflow;
	}

	this.timer = null;
};

Spry.Widget.Collapsiblepaneln.panelnAnimator.prototype.stepAnimation = function()
{
	var curTime = (new Date).getTime();
	var elapsedTime = curTime - this.startTime;

	if (elapsedTime >= this.duration)
	{
		if (!this.doOpen)
			this.content.style.display = "none";
		this.content.style.overflow = this.overflow;
		this.content.style.height = this.toHeight + "px";
		if (this.onComplete)
			this.onComplete();
		return;
	}

	var ht = this.transition(elapsedTime, this.fromHeight, this.distance, this.duration);

	this.content.style.height = ((ht < 0) ? 0 : ht) + "px";

	var self = this;
	this.timer = setTimeout(function() { self.stepAnimation(); }, this.interval);
};

Spry.Widget.CollapsiblepanelnGroup = function(element, opts)
{
	this.element = this.getElement(element);
	this.opts = opts;

	this.attachBehaviors();
};

Spry.Widget.CollapsiblepanelnGroup.prototype.setOptions = Spry.Widget.Collapsiblepaneln.prototype.setOptions;
Spry.Widget.CollapsiblepanelnGroup.prototype.getElement = Spry.Widget.Collapsiblepaneln.prototype.getElement;
Spry.Widget.CollapsiblepanelnGroup.prototype.getElementChildren = Spry.Widget.Collapsiblepaneln.prototype.getElementChildren;

Spry.Widget.CollapsiblepanelnGroup.prototype.setElementWidget = function(element, widget)
{
	if (!element || !widget)
		return;
	if (!element.spry)
		element.spry = new Object;
	element.spry.collapsiblepaneln = widget;
};

Spry.Widget.CollapsiblepanelnGroup.prototype.getElementWidget = function(element)
{
	return (element && element.spry && element.spry.collapsiblepaneln) ? element.spry.collapsiblepaneln : null;
};

Spry.Widget.CollapsiblepanelnGroup.prototype.getpanelns = function()
{
	if (!this.element)
		return [];
	return this.getElementChildren(this.element);
};

Spry.Widget.CollapsiblepanelnGroup.prototype.getpaneln = function(panelnIndex)
{
	return this.getpanelns()[panelnIndex];
};

Spry.Widget.CollapsiblepanelnGroup.prototype.attachBehaviors = function()
{
	if (!this.element)
		return;

	var cpanelns = this.getpanelns();
	var numCpanelns = cpanelns.length;
	for (var i = 0; i < numCpanelns; i++)
	{
		var cpaneln = cpanelns[i];
		this.setElementWidget(cpaneln, new Spry.Widget.Collapsiblepaneln(cpaneln, this.opts));
	}
};

Spry.Widget.CollapsiblepanelnGroup.prototype.openpaneln = function(panelnIndex)
{
	var w = this.getElementWidget(this.getpaneln(panelnIndex));
	if (w && !w.isOpen())
		w.open();
};

Spry.Widget.CollapsiblepanelnGroup.prototype.closepaneln = function(panelnIndex)
{
	var w = this.getElementWidget(this.getpaneln(panelnIndex));
	if (w && w.isOpen())
		w.close();
};

Spry.Widget.CollapsiblepanelnGroup.prototype.openAllpanelns = function()
{
	var cpanelns = this.getpanelns();
	var numCpanelns = cpanelns.length;
	for (var i = 0; i < numCpanelns; i++)
	{
		var w = this.getElementWidget(cpanelns[i]);
		if (w && !w.isOpen())
			w.open();
	}
};

Spry.Widget.CollapsiblepanelnGroup.prototype.closeAllpanelns = function()
{
	var cpanelns = this.getpanelns();
	var numCpanelns = cpanelns.length;
	for (var i = 0; i < numCpanelns; i++)
	{
		var w = this.getElementWidget(cpanelns[i]);
		if (w && w.isOpen())
			w.close();
	}
};

