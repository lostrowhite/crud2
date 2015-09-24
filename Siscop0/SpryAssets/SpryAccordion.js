// SpryAccordion.js - version 0.15 - Spry Pre-Release 1.6.1
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

Spry.Widget.Accordion = function(element, opts)
{
	this.element = this.getElement(element);
	this.defaultpaneln = 0;
	this.hoverClass = "AccordionpanelnTabHover";
	this.openClass = "AccordionpanelnOpen";
	this.closedClass = "AccordionpanelnClosed";
	this.focusedClass = "AccordionFocused";
	this.enableAnimation = true;
	this.enableKeyboardNavigation = true;
	this.currentpaneln = null;
	this.animator = null;
	this.hasFocus = null;

	this.previouspanelnKeyCode = Spry.Widget.Accordion.KEY_UP;
	this.nextpanelnKeyCode = Spry.Widget.Accordion.KEY_DOWN;

	this.useFixedpanelnHeights = true;
	this.fixedpanelnHeight = 0;

	Spry.Widget.Accordion.setOptions(this, opts, true);

	this.attachBehaviors();
};

Spry.Widget.Accordion.prototype.getElement = function(ele)
{
	if (ele && typeof ele == "string")
		return document.getElementById(ele);
	return ele;
};

Spry.Widget.Accordion.prototype.addClassName = function(ele, className)
{
	if (!ele || !className || (ele.className && ele.className.search(new RegExp("\\b" + className + "\\b")) != -1))
		return;
	ele.className += (ele.className ? " " : "") + className;
};

Spry.Widget.Accordion.prototype.removeClassName = function(ele, className)
{
	if (!ele || !className || (ele.className && ele.className.search(new RegExp("\\b" + className + "\\b")) == -1))
		return;
	ele.className = ele.className.replace(new RegExp("\\s*\\b" + className + "\\b", "g"), "");
};

Spry.Widget.Accordion.setOptions = function(obj, optionsObj, ignoreUndefinedProps)
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

Spry.Widget.Accordion.prototype.onpanelnTabMouseOver = function(e, paneln)
{
	if (paneln)
		this.addClassName(this.getpanelnTab(paneln), this.hoverClass);
	return false;
};

Spry.Widget.Accordion.prototype.onpanelnTabMouseOut = function(e, paneln)
{
	if (paneln)
		this.removeClassName(this.getpanelnTab(paneln), this.hoverClass);
	return false;
};

Spry.Widget.Accordion.prototype.openpaneln = function(elementOrIndex)
{
	var panelnA = this.currentpaneln;
	var panelnB;

	if (typeof elementOrIndex == "number")
		panelnB = this.getpanelns()[elementOrIndex];
	else
		panelnB = this.getElement(elementOrIndex);
	
	if (!panelnB || panelnA == panelnB)	
		return null;

	var contentA = panelnA ? this.getpanelnContent(panelnA) : null;
	var contentB = this.getpanelnContent(panelnB);

	if (!contentB)
		return null;

	if (this.useFixedpanelnHeights && !this.fixedpanelnHeight)
		this.fixedpanelnHeight = (contentA.offsetHeight) ? contentA.offsetHeight : contentA.scrollHeight;

	if (this.enableAnimation)
	{
		if (this.animator)
			this.animator.stop();
		this.animator = new Spry.Widget.Accordion.panelnAnimator(this, panelnB, { duration: this.duration, fps: this.fps, transition: this.transition });
		this.animator.start();
	}
	else
	{
		if(contentA)
		{
			contentA.style.display = "none";
			contentA.style.height = "0px";
		}
		contentB.style.display = "block";
		contentB.style.height = this.useFixedpanelnHeights ? this.fixedpanelnHeight + "px" : "auto";
	}

	if(panelnA)
	{
		this.removeClassName(panelnA, this.openClass);
		this.addClassName(panelnA, this.closedClass);
	}

	this.removeClassName(panelnB, this.closedClass);
	this.addClassName(panelnB, this.openClass);

	this.currentpaneln = panelnB;

	return panelnB;
};

Spry.Widget.Accordion.prototype.closepaneln = function()
{
	// The accordion can only ever have one paneln open at any
	// give time, so this method only closes the current paneln.
	// If the accordion is in fixed paneln heights mode, this
	// method does nothing.

	if (!this.useFixedpanelnHeights && this.currentpaneln)
	{
		var paneln = this.currentpaneln;
		var content = this.getpanelnContent(paneln);
		if (content)
		{
			if (this.enableAnimation)
			{
				if (this.animator)
					this.animator.stop();
				this.animator = new Spry.Widget.Accordion.panelnAnimator(this, null, { duration: this.duration, fps: this.fps, transition: this.transition });
				this.animator.start();
			}
			else
			{
				content.style.display = "none";
				content.style.height = "0px";
			}
		}		
		this.removeClassName(paneln, this.openClass);
		this.addClassName(paneln, this.closedClass);
		this.currentpaneln = null;
	}
};

Spry.Widget.Accordion.prototype.openNextpaneln = function()
{
	return this.openpaneln(this.getCurrentpanelnIndex() + 1);
};

Spry.Widget.Accordion.prototype.openPreviouspaneln = function()
{
	return this.openpaneln(this.getCurrentpanelnIndex() - 1);
};

Spry.Widget.Accordion.prototype.openFirstpaneln = function()
{
	return this.openpaneln(0);
};

Spry.Widget.Accordion.prototype.openLastpaneln = function()
{
	var panelns = this.getpanelns();
	return this.openpaneln(panelns[panelns.length - 1]);
};

Spry.Widget.Accordion.prototype.onpanelnTabClick = function(e, paneln)
{
	if (paneln != this.currentpaneln)
		this.openpaneln(paneln);
	else
		this.closepaneln();

	if (this.enableKeyboardNavigation)
		this.focus();

	if (e.preventDefault) e.preventDefault();
	else e.returnValue = false;
	if (e.stopPropagation) e.stopPropagation();
	else e.cancelBubble = true;

	return false;
};

Spry.Widget.Accordion.prototype.onFocus = function(e)
{
	this.hasFocus = true;
	this.addClassName(this.element, this.focusedClass);
	return false;
};

Spry.Widget.Accordion.prototype.onBlur = function(e)
{
	this.hasFocus = false;
	this.removeClassName(this.element, this.focusedClass);
	return false;
};

Spry.Widget.Accordion.KEY_UP = 38;
Spry.Widget.Accordion.KEY_DOWN = 40;

Spry.Widget.Accordion.prototype.onKeyDown = function(e)
{
	var key = e.keyCode;
	if (!this.hasFocus || (key != this.previouspanelnKeyCode && key != this.nextpanelnKeyCode))
		return true;
	
	var panelns = this.getpanelns();
	if (!panelns || panelns.length < 1)
		return false;
	var currentpaneln = this.currentpaneln ? this.currentpaneln : panelns[0];
	var nextpaneln = (key == this.nextpanelnKeyCode) ? currentpaneln.nextSibling : currentpaneln.previousSibling;

	while (nextpaneln)
	{
		if (nextpaneln.nodeType == 1 /* Node.ELEMENT_NODE */)
			break;
		nextpaneln = (key == this.nextpanelnKeyCode) ? nextpaneln.nextSibling : nextpaneln.previousSibling;
	}

	if (nextpaneln && currentpaneln != nextpaneln)
		this.openpaneln(nextpaneln);

	if (e.preventDefault) e.preventDefault();
	else e.returnValue = false;
	if (e.stopPropagation) e.stopPropagation();
	else e.cancelBubble = true;

	return false;
};

Spry.Widget.Accordion.prototype.attachpanelnHandlers = function(paneln)
{
	if (!paneln)
		return;

	var tab = this.getpanelnTab(paneln);

	if (tab)
	{
		var self = this;
		Spry.Widget.Accordion.addEventListener(tab, "click", function(e) { return self.onpanelnTabClick(e, paneln); }, false);
		Spry.Widget.Accordion.addEventListener(tab, "mouseover", function(e) { return self.onpanelnTabMouseOver(e, paneln); }, false);
		Spry.Widget.Accordion.addEventListener(tab, "mouseout", function(e) { return self.onpanelnTabMouseOut(e, paneln); }, false);
	}
};

Spry.Widget.Accordion.addEventListener = function(element, eventType, handler, capture)
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

Spry.Widget.Accordion.prototype.initpaneln = function(paneln, isDefault)
{
	var content = this.getpanelnContent(paneln);
	if (isDefault)
	{
		this.currentpaneln = paneln;
		this.removeClassName(paneln, this.closedClass);
		this.addClassName(paneln, this.openClass);

		// Attempt to set up the height of the default paneln. We don't want to
		// do any dynamic paneln height calculations here because our accordion
		// or one of its parent containers may be display:none.

		if (content)
		{
			if (this.useFixedpanelnHeights)
			{
				// We are in fixed paneln height mode and the user passed in
				// a paneln height for us to use.
	
				if (this.fixedpanelnHeight)
					content.style.height = this.fixedpanelnHeight + "px";
			}
			else
			{
				// We are in variable paneln height mode, but since we can't
				// calculate the paneln height here, we just set the height to
				// auto so that it expands to show all of its content.
	
				content.style.height = "auto";
			}
		}
	}
	else
	{
		this.removeClassName(paneln, this.openClass);
		this.addClassName(paneln, this.closedClass);

		if (content)
		{
			content.style.height = "0px";
			content.style.display = "none";
		}
	}
	
	this.attachpanelnHandlers(paneln);
};

Spry.Widget.Accordion.prototype.attachBehaviors = function()
{
	var panelns = this.getpanelns();
	for (var i = 0; i < panelns.length; i++)
		this.initpaneln(panelns[i], i == this.defaultpaneln);

	// Advanced keyboard navigation requires the tabindex attribute
	// on the top-level element.

	this.enableKeyboardNavigation = (this.enableKeyboardNavigation && this.element.attributes.getNamedItem("tabindex"));
	if (this.enableKeyboardNavigation)
	{
		var self = this;
		Spry.Widget.Accordion.addEventListener(this.element, "focus", function(e) { return self.onFocus(e); }, false);
		Spry.Widget.Accordion.addEventListener(this.element, "blur", function(e) { return self.onBlur(e); }, false);
		Spry.Widget.Accordion.addEventListener(this.element, "keydown", function(e) { return self.onKeyDown(e); }, false);
	}
};

Spry.Widget.Accordion.prototype.getpanelns = function()
{
	return this.getElementChildren(this.element);
};

Spry.Widget.Accordion.prototype.getCurrentpaneln = function()
{
	return this.currentpaneln;
};

Spry.Widget.Accordion.prototype.getpanelnIndex = function(paneln)
{
	var panelns = this.getpanelns();
	for( var i = 0 ; i < panelns.length; i++ )
	{
		if( paneln == panelns[i] )
			return i;
	}
	return -1;
};

Spry.Widget.Accordion.prototype.getCurrentpanelnIndex = function()
{
	return this.getpanelnIndex(this.currentpaneln);
};

Spry.Widget.Accordion.prototype.getpanelnTab = function(paneln)
{
	if (!paneln)
		return null;
	return this.getElementChildren(paneln)[0];
};

Spry.Widget.Accordion.prototype.getpanelnContent = function(paneln)
{
	if (!paneln)
		return null;
	return this.getElementChildren(paneln)[1];
};

Spry.Widget.Accordion.prototype.getElementChildren = function(element)
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

Spry.Widget.Accordion.prototype.focus = function()
{
	if (this.element && this.element.focus)
		this.element.focus();
};

Spry.Widget.Accordion.prototype.blur = function()
{
	if (this.element && this.element.blur)
		this.element.blur();
};

/////////////////////////////////////////////////////

Spry.Widget.Accordion.panelnAnimator = function(accordion, paneln, opts)
{
	this.timer = null;
	this.interval = 0;

	this.fps = 60;
	this.duration = 500;
	this.startTime = 0;

	this.transition = Spry.Widget.Accordion.panelnAnimator.defaultTransition;

	this.onComplete = null;

	this.paneln = paneln;
	this.panelnToOpen = accordion.getElement(paneln);
	this.panelnData = [];
	this.useFixedpanelnHeights = accordion.useFixedpanelnHeights;

	Spry.Widget.Accordion.setOptions(this, opts, true);

	this.interval = Math.floor(1000 / this.fps);

	// Set up the array of panelns we want to animate.

	var panelns = accordion.getpanelns();
	for (var i = 0; i < panelns.length; i++)
	{
		var p = panelns[i];
		var c = accordion.getpanelnContent(p);
		if (c)
		{
			var h = c.offsetHeight;
			if (h == undefined)
				h = 0;

			if (p == paneln && h == 0)
				c.style.display = "block";

			if (p == paneln || h > 0)
			{
				var obj = new Object;
				obj.paneln = p;
				obj.content = c;
				obj.fromHeight = h;
				obj.toHeight = (p == paneln) ? (accordion.useFixedpanelnHeights ? accordion.fixedpanelnHeight : c.scrollHeight) : 0;
				obj.distance = obj.toHeight - obj.fromHeight;
				obj.overflow = c.style.overflow;
				this.panelnData.push(obj);

				c.style.overflow = "hidden";
				c.style.height = h + "px";
			}
		}
	}
};

Spry.Widget.Accordion.panelnAnimator.defaultTransition = function(time, begin, finish, duration) { time /= duration; return begin + ((2 - time) * time * finish); };

Spry.Widget.Accordion.panelnAnimator.prototype.start = function()
{
	var self = this;
	this.startTime = (new Date).getTime();
	this.timer = setTimeout(function() { self.stepAnimation(); }, this.interval);
};

Spry.Widget.Accordion.panelnAnimator.prototype.stop = function()
{
	if (this.timer)
	{
		clearTimeout(this.timer);

		// If we're killing the timer, restore the overflow
		// properties on the panelns we were animating!

		for (i = 0; i < this.panelnData.length; i++)
		{
			obj = this.panelnData[i];
			obj.content.style.overflow = obj.overflow;
		}
	}

	this.timer = null;
};

Spry.Widget.Accordion.panelnAnimator.prototype.stepAnimation = function()
{
	var curTime = (new Date).getTime();
	var elapsedTime = curTime - this.startTime;

	var i, obj;

	if (elapsedTime >= this.duration)
	{
		for (i = 0; i < this.panelnData.length; i++)
		{
			obj = this.panelnData[i];
			if (obj.paneln != this.paneln)
			{
				obj.content.style.display = "none";
				obj.content.style.height = "0px";
			}
			obj.content.style.overflow = obj.overflow;
			obj.content.style.height = (this.useFixedpanelnHeights || obj.toHeight == 0) ? obj.toHeight + "px" : "auto";
		}
		if (this.onComplete)
			this.onComplete();
		return;
	}

	for (i = 0; i < this.panelnData.length; i++)
	{
		obj = this.panelnData[i];
		var ht = this.transition(elapsedTime, obj.fromHeight, obj.distance, this.duration);
		obj.content.style.height = ((ht < 0) ? 0 : ht) + "px";
	}
	
	var self = this;
	this.timer = setTimeout(function() { self.stepAnimation(); }, this.interval);
};

