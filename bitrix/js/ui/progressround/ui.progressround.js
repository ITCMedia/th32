(function() {

	'use strict';

	BX.namespace('BX.UI.ProgressRound');

	BX.UI.ProgressRound = function(options)
	{
		this.options = BX.type.isPlainObject(options) ? options : {};

		this.bar = null;
		this.id = options.id;
		this.container = null;
		this.status = null;
		this.statusPercent = "0%";
		this.statusCounter = "0 / 0";
		this.textBefore = null;
		this.textAfter = null;
		this.maxValue = 100;
		this.value = 0;
		this.style = null;
		this.statusType = BX.UI.ProgressRound.Status.NONE;
		this.color = BX.UI.ProgressRound.Color.PRIMARY;
		this.size = 200;
		this.lineSize = false;
		this.fisrtHalfRound = BX.create("div", { props: { className: "slice1" } });
		this.secondHalfRound = BX.create("div", { props: { className: "slice2" } });

		this.setLineSize(options.lineSize);
		this.setSize(options.size);
		this.setValue(options.value);
		this.setMaxValue(options.maxValue);
		this.setStatusType(options.statusType);
		this.setColor(options.color);
		this.setFill(options.fill);
		this.setColumn(options.column);
		this.setTextBefore(options.textBefore);
		this.setTextAfter(options.textAfter);
	};

	/**
	 *
	 * @enum {string}
	 */
	BX.UI.ProgressRound.Status = {
		COUNTER: "COUNTER",
		PERCENT: "PERCENT",
		NONE: "NONE"
	};

	/**
	 *
	 * @enum {string}
	 */
	BX.UI.ProgressRound.Color = {
		DANGER: "ui-progressround-danger",
		SUCCESS: "ui-progressround-success",
		PRIMARY: "ui-progressround-primary",
		WARNING: "ui-progressround-warning"
	};

	// /**
	//  *
	//  * @enum {string}
	//  */
	// BX.UI.ProgressRound.Size = {
	// 	LARGE: "ui-progressround-lg",
	// 	MEDIUM: "ui-progressround-md"
	// };

	BX.UI.ProgressRound.prototype =
	{
		//region Parameters
		getId: function ()
		{
			return this.id;
		},

		getValue: function()
		{
			return this.value;
		},

		setValue: function(value)
		{
			if (BX.type.isNumber(value))
			{
				this.value = value;
			}
		},

		getMaxValue: function()
		{
			return this.maxValue;
		},

		setMaxValue: function(value)
		{
			if (BX.type.isNumber(value))
			{
				this.maxValue = value;
			}
		},

		setColor: function(color)
		{
			if (BX.type.isNotEmptyString(color))
			{
				BX.removeClass(this.getContainer(), this.color);
				this.color = color;
				BX.addClass(this.getContainer(), this.color);
			}
		},

		/*setSize: function(size)
		{
			if (BX.type.isNotEmptyString(size))
			{
				BX.removeClass(this.getContainer(), this.size);
				this.size = size;
				BX.addClass(this.getContainer(), this.size);
			}
		},*/

		getSize: function()
		{
			return this.size;
		},

		setSize: function(size) {
			if (BX.type.isNumber(size))
			{
				this.size = size;
			}
		},

		getLineSize: function()
		{
			if (this.lineSize !== false )
			{
				return this.lineSize;
			}
		},

		setLineSize: function(lineSize)
		{
			if (BX.type.isNumber(lineSize))
			{
				this.lineSize = lineSize;
			}
		},

		getBagel:function()
		{
			if ((!this.bagel) && (this.lineSize !== false))
			{
				this.bagel = BX.create("div", {
					props: { className: "ui-progressround-bagel" },
					style: { borderWidth: this.getLineSize() + "px" }
					// html: this.options.textAfter
				});
			}

			return this.bagel;
		},

		setFill: function(fill)
		{
			if (fill === true)
			{
				BX.addClass(this.getContainer(), "ui-progressround-bg");
			}
			else
			{
				BX.removeClass(this.getContainer(), "ui-progressround-bg");
			}
		},

		setColumn: function(column)
		{
			if (column === true)
			{
				BX.addClass(this.getContainer(), "ui-progressround-column");
			}
			else
			{
				BX.removeClass(this.getContainer(), "ui-progressround-column");
			}
		},

		//endregion

		//region Text
		getTextBefore: function()
		{
			if (this.textBefore === null)
			{
				this.textBefore = BX.create("div", {
					props: { className: "ui-progressround-text-before" },
					html: this.options.textBefore
				});
			}

			return this.textBefore;
		},

		setTextBefore: function(text)
		{
			BX.adjust(this.textBefore, {
				html: text
			});
		},

		getTextAfter: function()
		{
			if (this.textAfter === null)
			{
				this.textAfter = BX.create("div", {
					props: { className: "ui-progressround-text-after" },
					html: this.options.textAfter
				});
			}

			return this.textAfter;
		},

		setTextAfter: function(text)
		{
			BX.adjust(this.textAfter, {
				html: text
			});
		},

		//endregion

		// region Status
		getStyleNode: function()
		{
			this.style = BX.create('style', {
				attrs: {
					type: 'text/css'
				}
			})
		},

		setStyle: function()
		{
			//debugger;
			if((!this.rotateFirstHalf) || (!this.rotateSecondHalf))
			{
				this.calculateRotate();
			}

			var head = document.head;
			/*var styles =
				'#' + this.getId() + ' .slice1 { transform: rotate(' + this.getRotateFirstHalf() + 'deg); } ' +
				'#' + this.getId() + ' .slice2 { transform: rotate(' + this.getRotateSecondHalf() + 'deg); } ';
*/
			var styles =
				'#' + this.getId() + ' { --ui-current-round-size: ' + this.getSize() + 'px;}' +
				'#' + this.getId() + ' .slice1 { transform: rotate(' + this.getRotateFirstHalf() + 'deg); animation-name: animate_' + this.getId() + '_slice1; } ' +
				'#' + this.getId() + ' .slice2 { transform: rotate(' + this.getRotateSecondHalf() + 'deg); animation-name: animate_' + this.getId() + '_slice2; } ' +
				'@keyframes animate_' + this.getId() + '_slice1 { from { transform: rotate(0) } to { transform: rotate(' + this.getRotateFirstHalf() + 'deg) } }' +
				'@keyframes animate_' + this.getId() + '_slice2 { from { transform: rotate(0) } to { transform: rotate(' + this.getRotateSecondHalf() + 'deg) } }';

			if(!this.style)
			{
				this.getStyleNode()
			}

			BX.cleanNode(this.style);
			styles = document.createTextNode(styles);
			this.style.appendChild(styles);
			head.appendChild(this.style);

			// this.countItemsPerRow = this.calculateCountItemsPerRow();
		},

		calculateRotate: function()
		{
			this.rotateFirstHalf = 180;
			this.rotateSecondHalf = 0;

			var drawAngle = this.getValue() / this.getMaxValue() * 360;

			if (drawAngle <= 180) {
				this.rotateFirstHalf = drawAngle;
			} else {
				this.rotateSecondHalf = drawAngle - 180;
			}
		},

		getRotateFirstHalf: function()
		{
			if(this.rotateFirstHalf)
			{
				return this.rotateFirstHalf;
			}

			this.calculateRotate();

			return this.rotateFirstHalf;
		},

		getRotateSecondHalf: function()
		{
			if(this.rotateSecondHalf)
			{
				return this.rotateSecondHalf;
			}

			this.calculateRotate();

			return this.rotateSecondHalf;
		},

		getStatus: function()
		{
			if (this.status === null)
			{
				if (this.getStatusType() === BX.UI.ProgressRound.Status.COUNTER)
				{
					this.status = BX.create("div", {
						props: { className: "ui-progressround-status" },
						text: this.getStatusCounter()
					});
				}
				else if (this.getStatusType() === BX.UI.ProgressRound.Status.PERCENT)
				{
					this.status = BX.create("div", {
						props: { className: "ui-progressround-status-percent" },
						text: this.getStatusPercent()
					});
				}
			}

			return this.status;
		},

		getStatusPercent: function()
		{
			this.statusPercent = Math.round(this.getValue() / (this.getMaxValue() / 100));
			if (this.statusPercent > 100)
			{
				this.statusPercent = 100;
			}

			return this.statusPercent + "%";
		},

		getStatusCounter: function()
		{
			this.statusCounter = Math.round(this.getValue()) + " / " + Math.round(this.getMaxValue());
			if (Math.round(this.getValue()) > Math.round(this.getMaxValue()))
			{
				this.statusCounter = Math.round(this.getMaxValue()) + " / " + Math.round(this.getMaxValue());
			}

			return this.statusCounter;
		},

		setStatus: function()
		{
			if (this.getStatusType() === BX.UI.ProgressRound.Status.COUNTER)
			{
				BX.adjust(this.status, {
					text: this.getStatusCounter()
				});
			}
			else
			{
				BX.adjust(this.status, {
					text: this.getStatusPercent()
				});
			}
		},

		getStatusType: function()
		{
			return this.statusType;
		},

		setStatusType: function(type)
		{
			if (BX.type.isNotEmptyString(type))
			{
				this.statusType = type;
			}
		},

		//endregion

		// region ProgressRound
		getBar: function()
		{
			if (this.bar === null)
			{
				this.bar = BX.create("div", {
					props: { className: "ui-progressround-track pie" },
					children: [

						BX.create("div", {
							props: { className: "ui-progressround-bar clip1" },
							children: [ this.fisrtHalfRound ]
						}),

						BX.create("div", {
							props: { className: "ui-progressround-bar clip2" },
							children: [ this.secondHalfRound ]
						}),

						this.getBagel()

					]
				})

			}

			return this.bar;
		},

		update: function(value)
		{
			this.setValue(value);
			this.setStatus();

			if (this.bar === null)
			{
				this.getBar();
			}

			BX.adjust(this.bar, {
				style: { width: this.getStatusPercent() }
			});
		},

		//endregion

		getContainer: function()
		{
			if (this.container === null)
			{
				//debugger;
				this.container = BX.create("div", {
					props: { className: "ui-progressround" },
					children: [
						this.getTextAfter(),
						this.getTextBefore(),
						this.getStatus(),
						this.getBar()
					]
				});

				this.setStyle();
			}

			return this.container;
		}
	};

})();