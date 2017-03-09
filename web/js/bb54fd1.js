/*         ______________________________________
  ________|                                      |_______
  \       |           SmartAdmin WebApp          |      /
   \      |      Copyright © 2014 MyOrange       |     /
   /      |______________________________________|     \
  /__________)                                (_________\

 * The above copyright notice and this permission notice shall be
 * included in all copies or substantial portions of the Software.
 * =======================================================================
 * SmartAdmin is FULLY owned and LICENSED by MYORANGE INC.
 * This script may NOT be RESOLD or REDISTRUBUTED under any
 * circumstances, and is only to be used with this purchased
 * copy of SmartAdmin Template.
 * =======================================================================
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
 * MERCHANTABILITY, IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
 * LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
 * OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
 * WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 * =======================================================================
 * original filename: app.config.js
 * filesize: ??
 * author: Sunny (@bootstraphunt)
 * email: info@myorange.ca
 * =======================================================================
 *
 * APP CONFIGURATION (HTML/AJAX/PHP Versions ONLY)
 * Description: Enable / disable certain theme features here
 * GLOBAL: Your left nav in your app will no longer fire ajax calls, set 
 * it to false for HTML version
 */	
	$.navAsAjax = false; 
/*
 * GLOBAL: Sound Config
 */
	$.sound_path = "sound/";
	$.sound_on = true; 
/*
 * Impacts the responce rate of some of the responsive elements (lower 
 * value affects CPU but improves speed)
 */
	var throttle_delay = 350,
/*
 * The rate at which the menu expands revealing child elements on click
 */
	menu_speed = 235,	
/*
 * Turn on JarvisWidget functionality
 * dependency: js/jarviswidget/jarvis.widget.min.js
 */
	enableJarvisWidgets = true,
/*
 * Warning: Enabling mobile widgets could potentially crash your webApp 
 * if you have too many widgets running at once 
 * (must have enableJarvisWidgets = true)
 */
	enableMobileWidgets = false,	
/*
 * Turn on fast click for mobile devices?
 * Enable this to activate fastclick plugin
 * dependency: js/plugin/fastclick/fastclick.js 
 */
	fastClick = false,
/*
 * These elements are ignored during DOM object deletion for ajax version 
 * It will delete all objects during page load with these exceptions:
 */
	ignore_key_elms = ["#header, #left-panel, #main, div.page-footer, #shortcut, #divSmallBoxes, #divMiniIcons, #divbigBoxes, #voiceModal, script"],
/*
 * VOICE COMMAND CONFIG
 * dependency: voicecommand.js
 */
	voice_command = true,
/*
 * Turns on speech without asking
 */	
	voice_command_auto = false,
/*
 * 	Sets the language to the default 'en-US'. (supports over 50 languages 
 * 	by google)
 * 
 *  Afrikaans         ['af-ZA']
 *  Bahasa Indonesia  ['id-ID']
 *  Bahasa Melayu     ['ms-MY']
 *  Català            ['ca-ES']
 *  Čeština           ['cs-CZ']
 *  Deutsch           ['de-DE']
 *  English           ['en-AU', 'Australia']
 *                    ['en-CA', 'Canada']
 *                    ['en-IN', 'India']
 *                    ['en-NZ', 'New Zealand']
 *                    ['en-ZA', 'South Africa']
 *                    ['en-GB', 'United Kingdom']
 *                    ['en-US', 'United States']
 *  Español           ['es-AR', 'Argentina']
 *                    ['es-BO', 'Bolivia']
 *                    ['es-CL', 'Chile']
 *                    ['es-CO', 'Colombia']
 *                    ['es-CR', 'Costa Rica']
 *                    ['es-EC', 'Ecuador']
 *                    ['es-SV', 'El Salvador']
 *                    ['es-ES', 'España']
 *                    ['es-US', 'Estados Unidos']
 *                    ['es-GT', 'Guatemala']
 *                    ['es-HN', 'Honduras']
 *                    ['es-MX', 'México']
 *                    ['es-NI', 'Nicaragua']
 *                    ['es-PA', 'Panamá']
 *                    ['es-PY', 'Paraguay']
 *                    ['es-PE', 'Perú']
 *                    ['es-PR', 'Puerto Rico']
 *                    ['es-DO', 'República Dominicana']
 *                    ['es-UY', 'Uruguay']
 *                    ['es-VE', 'Venezuela']
 *  Euskara           ['eu-ES']
 *  Français          ['fr-FR']
 *  Galego            ['gl-ES']
 *  Hrvatski          ['hr_HR']
 *  IsiZulu           ['zu-ZA']
 *  Íslenska          ['is-IS']
 *  Italiano          ['it-IT', 'Italia']
 *                    ['it-CH', 'Svizzera']
 *  Magyar            ['hu-HU']
 *  Nederlands        ['nl-NL']
 *  Norsk bokmål      ['nb-NO']
 *  Polski            ['pl-PL']
 *  Português         ['pt-BR', 'Brasil']
 *                    ['pt-PT', 'Portugal']
 *  Română            ['ro-RO']
 *  Slovenčina        ['sk-SK']
 *  Suomi             ['fi-FI']
 *  Svenska           ['sv-SE']
 *  Türkçe            ['tr-TR']
 *  български         ['bg-BG']
 *  Pусский           ['ru-RU']
 *  Српски            ['sr-RS']
 *  한국어          ['ko-KR']
 *  中文                            ['cmn-Hans-CN', '普通话 (中国大陆)']
 *                    ['cmn-Hans-HK', '普通话 (香港)']
 *                    ['cmn-Hant-TW', '中文 (台灣)']
 *                    ['yue-Hant-HK', '粵語 (香港)']
 *  日本語                         ['ja-JP']
 *  Lingua latīna     ['la']
 */
	voice_command_lang = 'en-US',
/*
 * 	Use localstorage to remember on/off (best used with HTML Version)
 */	
	voice_localStorage = true;
/*
 * Voice Commands
 * Defines all voice command variables and functions
 */	
 	if (voice_command) {
	 		
		var commands = {
					
			'show dashboard' : function() { $('nav a[href="dashboard.html"]').trigger("click"); },
			'show inbox' : function() { $('nav a[href="inbox.html"]').trigger("click"); },
			'show graphs' : function() { $('nav a[href="flot.html"]').trigger("click"); },
			'show flotchart' : function() { $('nav a[href="flot.html"]').trigger("click"); },
			'show morris chart' : function() { $('nav a[href="morris.html"]').trigger("click"); },
			'show inline chart' : function() { $('nav a[href="inline-charts.html"]').trigger("click"); },
			'show dygraphs' : function() { $('nav a[href="dygraphs.html"]').trigger("click"); },
			'show tables' : function() { $('nav a[href="table.html"]').trigger("click"); },
			'show data table' : function() { $('nav a[href="datatables.html"]').trigger("click"); },
			'show jquery grid' : function() { $('nav a[href="jqgrid.html"]').trigger("click"); },
			'show form' : function() { $('nav a[href="form-elements.html"]').trigger("click"); },
			'show form layouts' : function() { $('nav a[href="form-templates.html"]').trigger("click"); },
			'show form validation' : function() { $('nav a[href="validation.html"]').trigger("click"); },
			'show form elements' : function() { $('nav a[href="bootstrap-forms.html"]').trigger("click"); },
			'show form plugins' : function() { $('nav a[href="plugins.html"]').trigger("click"); },
			'show form wizards' : function() { $('nav a[href="wizards.html"]').trigger("click"); },
			'show bootstrap editor' : function() { $('nav a[href="other-editors.html"]').trigger("click"); },
			'show dropzone' : function() { $('nav a[href="dropzone.html"]').trigger("click"); },
			'show image cropping' : function() { $('nav a[href="image-editor.html"]').trigger("click"); },
			'show general elements' : function() { $('nav a[href="general-elements.html"]').trigger("click"); },
			'show buttons' : function() { $('nav a[href="buttons.html"]').trigger("click"); },
			'show fontawesome' : function() { $('nav a[href="fa.html"]').trigger("click"); },
			'show glyph icons' : function() { $('nav a[href="glyph.html"]').trigger("click"); },
			'show flags' : function() { $('nav a[href="flags.html"]').trigger("click"); },
			'show grid' : function() { $('nav a[href="grid.html"]').trigger("click"); },
			'show tree view' : function() { $('nav a[href="treeview.html"]').trigger("click"); },
			'show nestable lists' : function() { $('nav a[href="nestable-list.html"]').trigger("click"); },
			'show jquery U I' : function() { $('nav a[href="jqui.html"]').trigger("click"); },
			'show typography' : function() { $('nav a[href="typography.html"]').trigger("click"); },
			'show calendar' : function() { $('nav a[href="calendar.html"]').trigger("click"); },
			'show widgets' : function() { $('nav a[href="widgets.html"]').trigger("click"); },
			'show gallery' : function() { $('nav a[href="gallery.html"]').trigger("click"); },
			'show maps' : function() { $('nav a[href="gmap-xml.html"]').trigger("click"); },
			'show pricing tables' : function() { $('nav a[href="pricing-table.html"]').trigger("click"); },
			'show invoice' : function() { $('nav a[href="invoice.html"]').trigger("click"); },
			'show search page' : function() { $('nav a[href="search.html"]').trigger("click"); },
			'go back' :  function() { history.back(1); }, 
			'scroll up' : function () { $('html, body').animate({ scrollTop: 0 }, 100); },
			'scroll down' : function () { $('html, body').animate({ scrollTop: $(document).height() }, 100);},
			'hide navigation' : function() { 
				if ($.root_.hasClass("container") && !$.root_.hasClass("menu-on-top")){
					$('span.minifyme').trigger("click");
				} else {
					$('#hide-menu > span > a').trigger("click"); 
				}
			},
			'show navigation' : function() { 
				if ($.root_.hasClass("container") && !$.root_.hasClass("menu-on-top")){
					$('span.minifyme').trigger("click");
				} else {
					$('#hide-menu > span > a').trigger("click"); 
				}
			},
			'mute' : function() {
				$.sound_on = false;
				$.smallBox({
					title : "MUTE",
					content : "All sounds have been muted!",
					color : "#a90329",
					timeout: 4000,
					icon : "fa fa-volume-off"
				});
			},
			'sound on' : function() {
				$.sound_on = true;
				$.speechApp.playConfirmation();
				$.smallBox({
					title : "UNMUTE",
					content : "All sounds have been turned on!",
					color : "#40ac2b",
					sound_file: 'voice_alert',
					timeout: 5000,
					icon : "fa fa-volume-up"
				});
			},
			'stop' : function() {
				smartSpeechRecognition.abort();
				$.root_.removeClass("voice-command-active");
				$.smallBox({
					title : "VOICE COMMAND OFF",
					content : "Your voice commands has been successfully turned off. Click on the <i class='fa fa-microphone fa-lg fa-fw'></i> icon to turn it back on.",
					color : "#40ac2b",
					sound_file: 'voice_off',
					timeout: 8000,
					icon : "fa fa-microphone-slash"
				});
				if ($('#speech-btn .popover').is(':visible')) {
					$('#speech-btn .popover').fadeOut(250);
				}
			},
			'help' : function() {
				$('#voiceModal').removeData('modal').modal( { remote: "ajax/modal-content/modal-voicecommand.html", show: true } );
				if ($('#speech-btn .popover').is(':visible')) {
					$('#speech-btn .popover').fadeOut(250);
				}
			},		
			'got it' : function() {
				$('#voiceModal').modal('hide');
			},	
			'logout' : function() {
				$.speechApp.stop();
				window.location = $('#logout > span > a').attr("href");
			}
		}; 
		
	};
/*
 * END APP.CONFIG
 */

 
 
 
 
 
 
 	
/*! SmartAdmin - v1.4.1 - 2014-06-27 */function runAllForms(){$.fn.slider&&$(".slider").slider(),$.fn.select2&&$(".select2").each(function(){var a=$(this),b=a.attr("data-select-width")||"100%";a.select2({allowClear:!0,width:b}),a=null}),$.fn.mask&&$("[data-mask]").each(function(){var a=$(this),b=a.attr("data-mask")||"error...",c=a.attr("data-mask-placeholder")||"X";a.mask(b,{placeholder:c}),a=null}),$.fn.autocomplete&&$("[data-autocomplete]").each(function(){var a=$(this),b=a.data("autocomplete")||["The","Quick","Brown","Fox","Jumps","Over","Three","Lazy","Dogs"];a.autocomplete({source:b}),a=null}),$.fn.datepicker&&$(".datepicker").each(function(){var a=$(this),b=a.attr("data-dateformat")||"dd.mm.yy";a.datepicker({dateFormat:b,prevText:'<i class="fa fa-chevron-left"></i>',nextText:'<i class="fa fa-chevron-right"></i>'}),a=null}),$("button[data-loading-text]").on("click",function(){var a=$(this);a.button("loading"),setTimeout(function(){a.button("reset")},3e3),a=null})}function runAllCharts(){if($.fn.sparkline){var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z,A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z,_,ab,bb,cb,db,eb,fb,gb,hb,ib,jb,kb,lb,mb,nb,ob,pb,qb,rb,sb;$(".sparkline").each(function(){var tb=$(this),ub=tb.data("sparkline-type")||"bar";if("bar"==ub&&(a=tb.data("sparkline-bar-color")||tb.css("color")||"#0000f0",b=tb.data("sparkline-height")||"26px",c=tb.data("sparkline-barwidth")||5,d=tb.data("sparkline-barspacing")||2,e=tb.data("sparkline-negbar-color")||"#A90329",f=tb.data("sparkline-barstacked-color")||["#A90329","#0099c6","#98AA56","#da532c","#4490B1","#6E9461","#990099","#B4CAD3"],tb.sparkline("html",{barColor:a,type:ub,height:b,barWidth:c,barSpacing:d,stackedBarColor:f,negBarColor:e,zeroAxis:"false"}),tb=null),"line"==ub&&(b=tb.data("sparkline-height")||"20px",ab=tb.data("sparkline-width")||"90px",g=tb.data("sparkline-line-color")||tb.css("color")||"#0000f0",h=tb.data("sparkline-line-width")||1,i=tb.data("fill-color")||"#c0d0f0",j=tb.data("sparkline-spot-color")||"#f08000",k=tb.data("sparkline-minspot-color")||"#ed1c24",l=tb.data("sparkline-maxspot-color")||"#f08000",m=tb.data("sparkline-highlightspot-color")||"#50f050",n=tb.data("sparkline-highlightline-color")||"f02020",o=tb.data("sparkline-spotradius")||1.5,thisChartMinYRange=tb.data("sparkline-min-y")||"undefined",thisChartMaxYRange=tb.data("sparkline-max-y")||"undefined",thisChartMinXRange=tb.data("sparkline-min-x")||"undefined",thisChartMaxXRange=tb.data("sparkline-max-x")||"undefined",thisMinNormValue=tb.data("min-val")||"undefined",thisMaxNormValue=tb.data("max-val")||"undefined",thisNormColor=tb.data("norm-color")||"#c0c0c0",thisDrawNormalOnTop=tb.data("draw-normal")||!1,tb.sparkline("html",{type:"line",width:ab,height:b,lineWidth:h,lineColor:g,fillColor:i,spotColor:j,minSpotColor:k,maxSpotColor:l,highlightSpotColor:m,highlightLineColor:n,spotRadius:o,chartRangeMin:thisChartMinYRange,chartRangeMax:thisChartMaxYRange,chartRangeMinX:thisChartMinXRange,chartRangeMaxX:thisChartMaxXRange,normalRangeMin:thisMinNormValue,normalRangeMax:thisMaxNormValue,normalRangeColor:thisNormColor,drawNormalOnTop:thisDrawNormalOnTop}),tb=null),"pie"==ub&&(p=tb.data("sparkline-piecolor")||["#B4CAD3","#4490B1","#98AA56","#da532c","#6E9461","#0099c6","#990099","#717D8A"],q=tb.data("sparkline-piesize")||90,r=tb.data("border-color")||"#45494C",s=tb.data("sparkline-offset")||0,tb.sparkline("html",{type:"pie",width:q,height:q,tooltipFormat:'<span style="color: {{color}}">&#9679;</span> ({{percent.1}}%)',sliceColors:p,borderWidth:1,offset:s,borderColor:r}),tb=null),"box"==ub&&(t=tb.data("sparkline-width")||"auto",u=tb.data("sparkline-height")||"auto",v=tb.data("sparkline-boxraw")||!1,w=tb.data("sparkline-targetval")||"undefined",x=tb.data("sparkline-min")||"undefined",y=tb.data("sparkline-max")||"undefined",z=tb.data("sparkline-showoutlier")||!0,A=tb.data("sparkline-outlier-iqr")||1.5,B=tb.data("sparkline-spotradius")||1.5,C=tb.css("color")||"#000000",D=tb.data("fill-color")||"#c0d0f0",E=tb.data("sparkline-whis-color")||"#000000",F=tb.data("sparkline-outline-color")||"#303030",G=tb.data("sparkline-outlinefill-color")||"#f0f0f0",H=tb.data("sparkline-outlinemedian-color")||"#f00000",I=tb.data("sparkline-outlinetarget-color")||"#40a020",tb.sparkline("html",{type:"box",width:t,height:u,raw:v,target:w,minValue:x,maxValue:y,showOutliers:z,outlierIQR:A,spotRadius:B,boxLineColor:C,boxFillColor:D,whiskerColor:E,outlierLineColor:F,outlierFillColor:G,medianColor:H,targetColor:I}),tb=null),"bullet"==ub){var vb=tb.data("sparkline-height")||"auto";J=tb.data("sparkline-width")||2,K=tb.data("sparkline-bullet-color")||"#ed1c24",L=tb.data("sparkline-performance-color")||"#3030f0",M=tb.data("sparkline-bulletrange-color")||["#d3dafe","#a8b6ff","#7f94ff"],tb.sparkline("html",{type:"bullet",height:vb,targetWidth:J,targetColor:K,performanceColor:L,rangeColors:M}),tb=null}"discrete"==ub&&(N=tb.data("sparkline-height")||26,O=tb.data("sparkline-width")||50,P=tb.css("color"),Q=tb.data("sparkline-line-height")||5,R=tb.data("sparkline-threshold")||"undefined",S=tb.data("sparkline-threshold-color")||"#ed1c24",tb.sparkline("html",{type:"discrete",width:O,height:N,lineColor:P,lineHeight:Q,thresholdValue:R,thresholdColor:S}),tb=null),"tristate"==ub&&(T=tb.data("sparkline-height")||26,U=tb.data("sparkline-posbar-color")||"#60f060",V=tb.data("sparkline-negbar-color")||"#f04040",W=tb.data("sparkline-zerobar-color")||"#909090",X=tb.data("sparkline-barwidth")||5,Y=tb.data("sparkline-barspacing")||2,Z=tb.data("sparkline-zeroaxis")||!1,tb.sparkline("html",{type:"tristate",height:T,posBarColor:_,negBarColor:V,zeroBarColor:W,barWidth:X,barSpacing:Y,zeroAxis:Z}),tb=null),"compositebar"==ub&&(b=tb.data("sparkline-height")||"20px",ab=tb.data("sparkline-width")||"100%",c=tb.data("sparkline-barwidth")||3,h=tb.data("sparkline-line-width")||1,g=tb.data("sparkline-color-top")||"#ed1c24",_=tb.data("sparkline-color-bottom")||"#333333",tb.sparkline(tb.data("sparkline-bar-val"),{type:"bar",width:ab,height:b,barColor:_,barWidth:c}),tb.sparkline(tb.data("sparkline-line-val"),{width:ab,height:b,lineColor:g,lineWidth:h,composite:!0,fillColor:!1}),tb=null),"compositeline"==ub&&(b=tb.data("sparkline-height")||"20px",ab=tb.data("sparkline-width")||"90px",bb=tb.data("sparkline-bar-val"),cb=tb.data("sparkline-bar-val-spots-top")||null,db=tb.data("sparkline-bar-val-spots-bottom")||null,eb=tb.data("sparkline-line-width-top")||1,fb=tb.data("sparkline-line-width-bottom")||1,gb=tb.data("sparkline-color-top")||"#333333",hb=tb.data("sparkline-color-bottom")||"#ed1c24",ib=tb.data("sparkline-spotradius-top")||1.5,jb=tb.data("sparkline-spotradius-bottom")||ib,j=tb.data("sparkline-spot-color")||"#f08000",kb=tb.data("sparkline-minspot-color-top")||"#ed1c24",lb=tb.data("sparkline-maxspot-color-top")||"#f08000",mb=tb.data("sparkline-minspot-color-bottom")||kb,nb=tb.data("sparkline-maxspot-color-bottom")||lb,ob=tb.data("sparkline-highlightspot-color-top")||"#50f050",pb=tb.data("sparkline-highlightline-color-top")||"#f02020",qb=tb.data("sparkline-highlightspot-color-bottom")||ob,thisHighlightLineColor2=tb.data("sparkline-highlightline-color-bottom")||pb,rb=tb.data("sparkline-fillcolor-top")||"transparent",sb=tb.data("sparkline-fillcolor-bottom")||"transparent",tb.sparkline(bb,{type:"line",spotRadius:ib,spotColor:j,minSpotColor:kb,maxSpotColor:lb,highlightSpotColor:ob,highlightLineColor:pb,valueSpots:cb,lineWidth:eb,width:ab,height:b,lineColor:gb,fillColor:rb}),tb.sparkline(tb.data("sparkline-line-val"),{type:"line",spotRadius:jb,spotColor:j,minSpotColor:mb,maxSpotColor:nb,highlightSpotColor:qb,highlightLineColor:thisHighlightLineColor2,valueSpots:db,lineWidth:fb,width:ab,height:b,lineColor:hb,composite:!0,fillColor:sb}),tb=null)})}$.fn.easyPieChart&&$(".easy-pie-chart").each(function(){var a=$(this),b=a.css("color")||a.data("pie-color"),c=a.data("pie-track-color")||"#eeeeee",d=parseInt(a.data("pie-size"))||25;a.easyPieChart({barColor:b,trackColor:c,scaleColor:!1,lineCap:"butt",lineWidth:parseInt(d/8.5),animate:1500,rotate:-90,size:d,onStep:function(a){this.$el.find("span").text(~~a)}}),a=null})}function setup_widgets_desktop(){$.fn.jarvisWidgets&&enableJarvisWidgets&&$("#widget-grid").jarvisWidgets({grid:"article",widgets:".jarviswidget",localStorage:!0,deleteSettingsKey:"#deletesettingskey-options",settingsKeyLabel:"Reset settings?",deletePositionKey:"#deletepositionkey-options",positionKeyLabel:"Reset position?",sortable:!0,buttonsHidden:!1,toggleButton:!0,toggleClass:"fa fa-minus | fa fa-plus",toggleSpeed:200,onToggle:function(){},deleteButton:!0,deleteClass:"fa fa-times",deleteSpeed:200,onDelete:function(){},editButton:!0,editPlaceholder:".jarviswidget-editbox",editClass:"fa fa-cog | fa fa-save",editSpeed:200,onEdit:function(){},colorButton:!0,fullscreenButton:!0,fullscreenClass:"fa fa-expand | fa fa-compress",fullscreenDiff:3,onFullscreen:function(){},customButton:!1,customClass:"folder-10 | next-10",customStart:function(){alert("Hello you, this is a custom button...")},customEnd:function(){alert("bye, till next time...")},buttonOrder:"%refresh% %custom% %edit% %toggle% %fullscreen% %delete%",opacity:1,dragHandle:"> header",placeholderClass:"jarviswidget-placeholder",indicator:!0,indicatorTime:600,ajax:!0,timestampPlaceholder:".jarviswidget-timestamp",timestampFormat:"Last update: %m%/%d%/%y% %h%:%i%:%s%",refreshButton:!0,refreshButtonClass:"fa fa-refresh",labelError:"Sorry but there was a error:",labelUpdated:"Last Update:",labelRefresh:"Refresh",labelDelete:"Delete widget:",afterLoad:function(){},rtl:!1,onChange:function(){},onSave:function(){},ajaxnav:$.navAsAjax})}function setup_widgets_mobile(){enableMobileWidgets&&enableJarvisWidgets&&setup_widgets_desktop()}function loadScript(a,b){if(jsArray[a])b&&b();else{jsArray[a]=!0;var c=document.getElementsByTagName("body")[0],d=document.createElement("script");d.type="text/javascript",d.src=a,d.onload=b,c.appendChild(d)}}function checkURL(){var a=location.href.split("#").splice(1).join("#");if(!a)try{var b=window.document.URL;b&&b.indexOf("#",0)>0&&b.indexOf("#",0)<b.length+1&&(a=b.substring(b.indexOf("#",0)+1))}catch(c){}if(container=$("#content"),a){$("nav li.active").removeClass("active"),$('nav li:has(a[href="'+a+'"])').addClass("active");var d=$('nav a[href="'+a+'"]').attr("title");document.title=d||document.title,loadURL(a+location.search,container)}else{var e=$('nav > ul > li:first-child > a[href!="#"]');window.location.hash=e.attr("href"),e=null}}function loadURL(a,b){$.ajax({type:"GET",url:a,dataType:"html",cache:!0,beforeSend:function(){if($.navAsAjax&&$(".google_maps")[0]&&b[0]==$("#content")[0]){var a=$(".google_maps"),c=0;a.each(function(){c++;var b=document.getElementById(this.id);c==a.length+1||b&&b.parentNode.removeChild(b)})}if($.navAsAjax&&$(".dataTables_wrapper")[0]&&b[0]==$("#content")[0]){var d=$.fn.dataTable.fnTables(!0);$(d).each(function(){$(this).dataTable().fnDestroy()})}if($.navAsAjax&&$.intervalArr.length>0&&b[0]==$("#content")[0]&&enableJarvisWidgets)for(;$.intervalArr.length>0;)clearInterval($.intervalArr.pop());pagefunction=null,b.removeData().html(""),b.html('<h1 class="ajax-loading-animation"><i class="fa fa-cog fa-spin"></i> Loading...</h1>'),b[0]==$("#content")[0]&&($("body").find("> *").filter(":not("+ignore_key_elms+")").empty().remove(),drawBreadCrumb(),$("html").animate({scrollTop:0},"fast"))},success:function(a){b.css({opacity:"0.0"}).html(a).delay(50).animate({opacity:"1.0"},300),a=null,b=null},error:function(){b.html('<h4 class="ajax-loading-error"><i class="fa fa-warning txt-color-orangeDark"></i> Error 404! Page not found.</h4>')},async:!0})}function drawBreadCrumb(){var a=$("nav li.active > a"),b=a.length;bread_crumb.empty(),bread_crumb.append($("<li>Home</li>")),a.each(function(){bread_crumb.append($("<li></li>").html($.trim($(this).clone().children(".badge").remove().end().text()))),--b||(document.title=bread_crumb.find("li:last-child").text())}),a=null}function pageSetUp(){"desktop"===thisDevice?($("[rel=tooltip]").tooltip(),$("[rel=popover]").popover(),$("[rel=popover-hover]").popover({trigger:"hover"}),setup_widgets_desktop(),runAllCharts(),runAllForms()):($("[rel=popover]").popover(),$("[rel=popover-hover]").popover({trigger:"hover"}),runAllCharts(),setup_widgets_mobile(),runAllForms())}$.root_=$("body"),$.intervalArr=[];var calc_navbar_height=function(){var a=null;return $("#header").length&&(a=$("#header").height()),null===a&&(a=$('<div id="header"></div>').height()),null===a?49:a},navbar_height=calc_navbar_height,shortcut_dropdown=$("#shortcut"),bread_crumb=$("#ribbon ol.breadcrumb"),topmenu=!1,thisDevice=null,ismobile=/iphone|ipad|ipod|android|blackberry|mini|windows\sce|palm/i.test(navigator.userAgent.toLowerCase()),jsArray={},initApp=function(a){return a.addDeviceType=function(){return ismobile?($.root_.addClass("mobile-detected"),thisDevice="mobile",fastClick?($.root_.addClass("needsclick"),FastClick.attach(document.body),!1):void 0):($.root_.addClass("desktop-detected"),thisDevice="desktop",!1)},a.menuPos=function(){($.root_.hasClass("menu-on-top")||"top"==localStorage.getItem("sm-setmenu"))&&(topmenu=!0,$.root_.addClass("menu-on-top"))},a.SmartActions=function(){var a={userLogout:function(a){function b(){window.location=a.attr("href")}$.SmartMessageBox({title:"<i class='fa fa-sign-out txt-color-orangeDark'></i> Logout <span class='txt-color-orangeDark'><strong>"+$("#show-shortcut").text()+"</strong></span> ?",content:a.data("logout-msg")||"You can improve your security further after logging out by closing this opened browser",buttons:"[No][Yes]"},function(a){"Yes"==a&&($.root_.addClass("animated fadeOutUp"),setTimeout(b,1e3))})},resetWidgets:function(a){$.widresetMSG=a.data("reset-msg"),$.SmartMessageBox({title:"<i class='fa fa-refresh' style='color:green'></i> Clear Local Storage",content:$.widresetMSG||"Would you like to RESET all your saved widgets and clear LocalStorage?",buttons:"[No][Yes]"},function(a){"Yes"==a&&localStorage&&(localStorage.clear(),location.reload())})},launchFullscreen:function(a){$.root_.hasClass("full-screen")?($.root_.removeClass("full-screen"),document.exitFullscreen?document.exitFullscreen():document.mozCancelFullScreen?document.mozCancelFullScreen():document.webkitExitFullscreen&&document.webkitExitFullscreen()):($.root_.addClass("full-screen"),a.requestFullscreen?a.requestFullscreen():a.mozRequestFullScreen?a.mozRequestFullScreen():a.webkitRequestFullscreen?a.webkitRequestFullscreen():a.msRequestFullscreen&&a.msRequestFullscreen())},minifyMenu:function(a){$.root_.hasClass("menu-on-top")||($.root_.toggleClass("minified"),$.root_.removeClass("hidden-menu"),$("html").removeClass("hidden-menu-mobile-lock"),a.effect("highlight",{},500))},toggleMenu:function(){$.root_.hasClass("menu-on-top")?$.root_.hasClass("menu-on-top")&&$.root_.hasClass("mobile-view-activated")&&($("html").toggleClass("hidden-menu-mobile-lock"),$.root_.toggleClass("hidden-menu"),$.root_.removeClass("minified")):($("html").toggleClass("hidden-menu-mobile-lock"),$.root_.toggleClass("hidden-menu"),$.root_.removeClass("minified"))},toggleShortcut:function(){function a(){shortcut_dropdown.animate({height:"hide"},300,"easeOutCirc"),$.root_.removeClass("shortcut-on")}function b(){shortcut_dropdown.animate({height:"show"},200,"easeOutCirc"),$.root_.addClass("shortcut-on")}shortcut_dropdown.is(":visible")?a():b(),shortcut_dropdown.find("a").click(function(b){b.preventDefault(),window.location=$(this).attr("href"),setTimeout(a,300)}),$(document).mouseup(function(b){shortcut_dropdown.is(b.target)||0!==shortcut_dropdown.has(b.target).length||a()})}};$.root_.on("click",'[data-action="userLogout"]',function(b){var c=$(this);a.userLogout(c),b.preventDefault(),c=null}),$.root_.on("click",'[data-action="resetWidgets"]',function(b){var c=$(this);a.resetWidgets(c),b.preventDefault(),c=null}),$.root_.on("click",'[data-action="launchFullscreen"]',function(b){a.launchFullscreen(document.documentElement),b.preventDefault()}),$.root_.on("click",'[data-action="minifyMenu"]',function(b){var c=$(this);a.minifyMenu(c),b.preventDefault(),c=null}),$.root_.on("click",'[data-action="toggleMenu"]',function(b){a.toggleMenu(),b.preventDefault()}),$.root_.on("click",'[data-action="toggleShortcut"]',function(b){a.toggleShortcut(),b.preventDefault()})},a.leftNav=function(){topmenu||$("nav ul").jarvismenu({accordion:!0,speed:menu_speed,closedSign:'<em class="fa fa-plus-square-o"></em>',openedSign:'<em class="fa fa-minus-square-o"></em>'})},a.domReadyMisc=function(){$("[rel=tooltip]").length&&$("[rel=tooltip]").tooltip(),$("#search-mobile").click(function(){$.root_.addClass("search-mobile")}),$("#cancel-search-js").click(function(){$.root_.removeClass("search-mobile")}),$("#activity").click(function(a){var b=$(this);b.find(".badge").hasClass("bg-color-red")&&(b.find(".badge").removeClassPrefix("bg-color-"),b.find(".badge").text("0")),b.next(".ajax-dropdown").is(":visible")?(b.next(".ajax-dropdown").fadeOut(150),b.removeClass("active")):(b.next(".ajax-dropdown").fadeIn(150),b.addClass("active"));var c=b.next(".ajax-dropdown").find(".btn-group > .active > input").attr("id");b=null,c=null,a.preventDefault()}),$('input[name="activity"]').change(function(){var a=$(this);url=a.attr("id"),container=$(".ajax-notifications"),loadURL(url,container),a=null}),$(document).mouseup(function(a){$(".ajax-dropdown").is(a.target)||0!==$(".ajax-dropdown").has(a.target).length||($(".ajax-dropdown").fadeOut(150),$(".ajax-dropdown").prev().removeClass("active"))}),$("button[data-btn-loading]").on("click",function(){var a=$(this);a.button("loading"),setTimeout(function(){a.button("reset")},3e3),$this=null}),$this=$("#activity > .badge"),parseInt($this.text())>0&&($this.addClass("bg-color-red bounceIn animated"),$this=null)},a}({});initApp.addDeviceType(),initApp.menuPos(),jQuery(document).ready(function(){initApp.SmartActions(),initApp.leftNav(),initApp.domReadyMisc()}),function(a,b,c){function d(){e=b[h](function(){f.each(function(){var b,c,d=a(this),e=a.data(this,j);try{b=d.width()}catch(f){b=d.width}try{c=d.height()}catch(f){c=d.height}(b!==e.w||c!==e.h)&&d.trigger(i,[e.w=b,e.h=c])}),d()},g[k])}var e,f=a([]),g=a.resize=a.extend(a.resize,{}),h="setTimeout",i="resize",j=i+"-special-event",k="delay",l="throttleWindow";g[k]=throttle_delay,g[l]=!0,a.event.special[i]={setup:function(){if(!g[l]&&this[h])return!1;var b=a(this);f=f.add(b);try{a.data(this,j,{w:b.width(),h:b.height()})}catch(c){a.data(this,j,{w:b.width,h:b.height})}1===f.length&&d()},teardown:function(){if(!g[l]&&this[h])return!1;var b=a(this);f=f.not(b),b.removeData(j),f.length||clearTimeout(e)},add:function(b){function d(b,d,f){var g=a(this),h=a.data(this,j);h.w=d!==c?d:g.width(),h.h=f!==c?f:g.height(),e.apply(this,arguments)}if(!g[l]&&this[h])return!1;var e;return a.isFunction(b)?(e=b,d):(e=b.handler,void(b.handler=d))}}}(jQuery,this),$("#main").resize(function(){$(window).width()<979?($.root_.addClass("mobile-view-activated"),$.root_.removeClass("minified")):$.root_.hasClass("mobile-view-activated")&&$.root_.removeClass("mobile-view-activated")});var ie=function(){for(var a,b=3,c=document.createElement("div"),d=c.getElementsByTagName("i");c.innerHTML="<!--[if gt IE "+ ++b+"]><i></i><![endif]-->",d[0];);return b>4?b:a}();if($.fn.extend({jarvismenu:function(a){var b={accordion:"true",speed:200,closedSign:"[+]",openedSign:"[-]"},c=$.extend(b,a),d=$(this);d.find("li").each(function(){0!==$(this).find("ul").size()&&($(this).find("a:first").append("<b class='collapse-sign'>"+c.closedSign+"</b>"),"#"==$(this).find("a:first").attr("href")&&$(this).find("a:first").click(function(){return!1}))}),d.find("li.active").each(function(){$(this).parents("ul").slideDown(c.speed),$(this).parents("ul").parent("li").find("b:first").html(c.openedSign),$(this).parents("ul").parent("li").addClass("open")}),d.find("li a").click(function(){0!==$(this).parent().find("ul").size()&&(c.accordion&&($(this).parent().find("ul").is(":visible")||(parents=$(this).parent().parents("ul"),visible=d.find("ul:visible"),visible.each(function(a){var b=!0;parents.each(function(c){return parents[c]==visible[a]?(b=!1,!1):void 0}),b&&$(this).parent().find("ul")!=visible[a]&&$(visible[a]).slideUp(c.speed,function(){$(this).parent("li").find("b:first").html(c.closedSign),$(this).parent("li").removeClass("open")})}))),$(this).parent().find("ul:first").is(":visible")&&!$(this).parent().find("ul:first").hasClass("active")?$(this).parent().find("ul:first").slideUp(c.speed,function(){$(this).parent("li").removeClass("open"),$(this).parent("li").find("b:first").delay(c.speed).html(c.closedSign)}):$(this).parent().find("ul:first").slideDown(c.speed,function(){$(this).parent("li").addClass("open"),$(this).parent("li").find("b:first").delay(c.speed).html(c.openedSign)}))})}}),jQuery.fn.doesExist=function(){return jQuery(this).length>0},$.navAsAjax||$(".google_maps")){var gMapsLoaded=!1;window.gMapsCallback=function(){gMapsLoaded=!0,$(window).trigger("gMapsLoaded")},window.loadGoogleMaps=function(){if(gMapsLoaded)return window.gMapsCallback();var a=document.createElement("script");a.setAttribute("type","text/javascript"),a.setAttribute("src","http://maps.google.com/maps/api/js?sensor=false&callback=gMapsCallback"),(document.getElementsByTagName("head")[0]||document.documentElement).appendChild(a)}}$.navAsAjax&&($("nav").length&&checkURL(),$(document).on("click",'nav a[href!="#"]',function(a){a.preventDefault();var b=$(a.currentTarget);b.parent().hasClass("active")||b.attr("target")||($.root_.hasClass("mobile-view-activated")?($.root_.removeClass("hidden-menu"),$("html").removeClass("hidden-menu-mobile-lock"),window.setTimeout(function(){window.location.search?window.location.href=window.location.href.replace(window.location.search,"").replace(window.location.hash,"")+"#"+b.attr("href"):window.location.hash=b.attr("href")},150)):window.location.search?window.location.href=window.location.href.replace(window.location.search,"").replace(window.location.hash,"")+"#"+b.attr("href"):window.location.hash=b.attr("href"))}),$(document).on("click",'nav a[target="_blank"]',function(a){a.preventDefault();var b=$(a.currentTarget);window.open(b.attr("href"))}),$(document).on("click",'nav a[target="_top"]',function(a){a.preventDefault();var b=$(a.currentTarget);window.location=b.attr("href")}),$(document).on("click",'nav a[href="#"]',function(a){a.preventDefault()}),$(window).on("hashchange",function(){checkURL()})),$("body").on("click",function(a){$('[rel="popover"]').each(function(){$(this).is(a.target)||0!==$(this).has(a.target).length||0!==$(".popover").has(a.target).length||$(this).popover("hide")})});
/*! SmartAdmin - v1.4.1 - 2014-06-22 */$("#ribbon").append('<div class="demo"><span id="demo-setting"><i class="fa fa-cog txt-color-blueDark"></i></span> <form><legend class="no-padding margin-bottom-10">Layout Options</legend><section><label><input name="subscription" id="smart-fixed-header" type="checkbox" class="checkbox style-0"><span>Fixed Header</span></label><label><input type="checkbox" name="terms" id="smart-fixed-navigation" class="checkbox style-0"><span>Fixed Navigation</span></label><label><input type="checkbox" name="terms" id="smart-fixed-ribbon" class="checkbox style-0"><span>Fixed Ribbon</span></label><label><input type="checkbox" name="terms" id="smart-fixed-footer" class="checkbox style-0"><span>Fixed Footer</span></label><label><input type="checkbox" name="terms" id="smart-fixed-container" class="checkbox style-0"><span>Inside <b>.container</b> <div class="font-xs text-right">(non-responsive)</div></span></label><label style="display:block;"><input type="checkbox" id="smart-topmenu" class="checkbox style-0"><span>Menu on <b>top</b></span></label> <span id="smart-bgimages"></span></section><section><h6 class="margin-top-10 semi-bold margin-bottom-5">Clear Localstorage</h6><a href="javascript:void(0);" class="btn btn-xs btn-block btn-primary" id="reset-smart-widget"><i class="fa fa-refresh"></i> Factory Reset</a></section> <h6 class="margin-top-10 semi-bold margin-bottom-5">SmartAdmin Skins</h6><section id="smart-styles"><a href="javascript:void(0);" id="smart-style-0" data-skinlogo="img/logo.png" class="btn btn-block btn-xs txt-color-white margin-right-5" style="background-color:#4E463F;"><i class="fa fa-check fa-fw" id="skin-checked"></i>Smart Default</a><a href="javascript:void(0);" id="smart-style-1" data-skinlogo="img/logo-white.png" class="btn btn-block btn-xs txt-color-white" style="background:#3A4558;">Dark Elegance</a><a href="javascript:void(0);" id="smart-style-2" data-skinlogo="img/logo-blue.png" class="btn btn-xs btn-block txt-color-darken margin-top-5" style="background:#fff;">Ultra Light</a><a href="javascript:void(0);" id="smart-style-3" data-skinlogo="img/logo-pale.png" class="btn btn-xs btn-block txt-color-white margin-top-5" style="background:#f78c40">Google Skin</a></section></form> </div>');var smartbgimage="<h6 class='margin-top-10 semi-bold'>Background</h6><img src='img/pattern/graphy-xs.png' data-htmlbg-url='img/pattern/graphy.png' width='22' height='22' class='margin-right-5 bordered cursor-pointer'><img src='img/pattern/tileable_wood_texture-xs.png' width='22' height='22' data-htmlbg-url='img/pattern/tileable_wood_texture.png' class='margin-right-5 bordered cursor-pointer'><img src='img/pattern/sneaker_mesh_fabric-xs.png' width='22' height='22' data-htmlbg-url='img/pattern/sneaker_mesh_fabric.png' class='margin-right-5 bordered cursor-pointer'><img src='img/pattern/nistri-xs.png' data-htmlbg-url='img/pattern/nistri.png' width='22' height='22' class='margin-right-5 bordered cursor-pointer'><img src='img/pattern/paper-xs.png' data-htmlbg-url='img/pattern/paper.png' width='22' height='22' class='bordered cursor-pointer'>";$("#smart-bgimages").fadeOut(),$("#demo-setting").click(function(){$("#ribbon .demo").toggleClass("activate")}),$('input[type="checkbox"]#smart-fixed-header').click(function(){$(this).is(":checked")?$.root_.addClass("fixed-header"):($('input[type="checkbox"]#smart-fixed-ribbon').prop("checked",!1),$('input[type="checkbox"]#smart-fixed-navigation').prop("checked",!1),$.root_.removeClass("fixed-header"),$.root_.removeClass("fixed-navigation"),$.root_.removeClass("fixed-ribbon"))}),$('input[type="checkbox"]#smart-fixed-navigation').click(function(){$(this).is(":checked")?($('input[type="checkbox"]#smart-fixed-header').prop("checked",!0),$.root_.addClass("fixed-header"),$.root_.addClass("fixed-navigation"),$('input[type="checkbox"]#smart-fixed-container').prop("checked",!1),$.root_.removeClass("container")):($('input[type="checkbox"]#smart-fixed-ribbon').prop("checked",!1),$.root_.removeClass("fixed-navigation"),$.root_.removeClass("fixed-ribbon"))}),$('input[type="checkbox"]#smart-fixed-ribbon').click(function(){$(this).is(":checked")?($('input[type="checkbox"]#smart-fixed-header').prop("checked",!0),$('input[type="checkbox"]#smart-fixed-navigation').prop("checked",!0),$('input[type="checkbox"]#smart-fixed-ribbon').prop("checked",!0),$.root_.addClass("fixed-header"),$.root_.addClass("fixed-navigation"),$.root_.addClass("fixed-ribbon"),$('input[type="checkbox"]#smart-fixed-container').prop("checked",!1),$.root_.removeClass("container")):$.root_.removeClass("fixed-ribbon")}),$('input[type="checkbox"]#smart-fixed-footer').click(function(){$(this).is(":checked")?$.root_.addClass("fixed-page-footer"):$.root_.removeClass("fixed-page-footer")}),$('input[type="checkbox"]#smart-rtl').click(function(){$(this).is(":checked")?$.root_.addClass("smart-rtl"):$.root_.removeClass("smart-rtl")}),$("#smart-topmenu").on("change",function(){$(this).prop("checked")?(localStorage.setItem("sm-setmenu","top"),location.reload()):(localStorage.setItem("sm-setmenu","left"),location.reload())}),"top"==localStorage.getItem("sm-setmenu")?$("#smart-topmenu").prop("checked",!0):$("#smart-topmenu").prop("checked",!1),$('input[type="checkbox"]#smart-fixed-container').click(function(){$(this).is(":checked")?($.root_.addClass("container"),$('input[type="checkbox"]#smart-fixed-ribbon').prop("checked",!1),$.root_.removeClass("fixed-ribbon"),$('input[type="checkbox"]#smart-fixed-navigation').prop("checked",!1),$.root_.removeClass("fixed-navigation"),smartbgimage?($("#smart-bgimages").append(smartbgimage).fadeIn(1e3),$("#smart-bgimages img").bind("click",function(){var a=$(this),b=$("html");bgurl=a.data("htmlbg-url"),b.css("background-image","url("+bgurl+")")}),smartbgimage=null):$("#smart-bgimages").fadeIn(1e3)):($.root_.removeClass("container"),$("#smart-bgimages").fadeOut())}),$("#reset-smart-widget").bind("click",function(){return $("#refresh").click(),!1}),$("#smart-styles > a").on("click",function(){var a=$(this),b=$("#logo img");$.root_.removeClassPrefix("smart-style").addClass(a.attr("id")),b.attr("src",a.data("skinlogo")),$("#smart-styles > a #skin-checked").remove(),a.prepend("<i class='fa fa-check fa-fw' id='skin-checked'></i>")});